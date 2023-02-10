<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/controllers/api/APIAuth.php';

/**
 * Proposal class.
 *
 * @extends REST_Controller
 */
class Proposal extends APIAuth
{
    /**
     * __construct function.
     *
     * @access public
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Proposal_model');
    }

    /**
     * SHOW | GET method.
     *
     * @return Response
     */
    public function index_get($userId, $status)
    {
        $this->load->helper('url');
        $this->load->library("pagination");

        $page = ($this->input->get("page")) ? $this->input->get("page") : 1;
        $limit = ($this->input->get("per_page")) ? $this->input->get("per_page") : 10;
        $pagePosition = (($page - 1) * $limit);

        $response = $this->Proposal_model->getProposals($userId, $status, $limit, $pagePosition);

        $total = $response['total'];
        $data['message'] = "No records";
        $data['status'] = FALSE;

        if ($total > 0) {
            $proposals = $response['data'];
            $data['message'] = "Data fetched successfully";
            $data['status'] = TRUE;
            $res = [];

            if ($status == 'modification') {
                foreach ($proposals as $key => $oResult) {
                    $res[$key] = $oResult;
                    $proposalId = $oResult->proposal_id;

                    $select_modification = $this->db->query("SELECT * FROM proposal_modifications WHERE proposal_id = {$proposalId} ORDER BY 1 DESC");
                    $row_modification = $select_modification->row();
                    $res[$key]->modification_message = $row_modification->modification_message;
                }
            } else {
                foreach ($proposals as $key => $oResult) {
                    $res[$key] = $oResult;
                    $proposalId = $oResult->proposal_id;

                    $proposalPrice = $oResult->proposal_price;
                    if ($proposalPrice == 0) {
                        $get_p = $this->db->get_where("proposal_packages", array("proposal_id" => $proposalId, "package_name" => "Basic"));
                        $res[$key]->proposal_price = $get_p->row()->price;
                    }

                    $res[$key]->proposal_img1 = getImageUrl2("proposals", "proposal_img1", $oResult->proposal_img1);
                    $count_orders = $this->db->get_where("orders", array("proposal_id" => $proposalId));
                    $res[$key]->count_offers = $count_orders->num_rows();
                }
            }

            $data['data'] = $res;
            $baseUrl = "api/v1/proposals/{$userId}/{$status}?per_page={$page}&page=";

            $totalPages = ceil($response['total'] / $limit);
            $data['meta_data']['total'] = $response['total'];
            $data['meta_data']['per_page'] = $limit;
            $data['meta_data']['total_pages'] = $totalPages;
            $data['meta_data']['page'] = $page;
            $data['meta_data']['pagination'] = paginate($totalPages, $baseUrl);
        }

        $this->response($data, 200);
    }

    /**
     * UPDATE Status [PAUSE/approve] | PUT method.
     * approval: Submit for approval
     *
     * @return Response
     */
    public function updateStatus_put($userId, $id, $status)
    {
        $acceptedStatuses = ['pause', 'activate', 'approval'];

        $data['message'] = "Invalid Status or something with wrong.";
        $data['status'] = FALSE;
        $statusCode = 200;

        if (in_array($status, $acceptedStatuses)) {
            $updatBy['proposal_id'] = $id;
            $updatBy['proposal_seller_id'] = $userId;
            $getProposal = $this->db->get_where("proposals", $updatBy);

            if ($getProposal->num_rows() == 1) {
                if ($status == 'pause') {
                    $statusVal = "admin_pause";
                    insert_log(1, "proposal", $id, "paused");
                } else if ($status == 'activate') {
                    $currentStatus = $getProposal->row()->proposal_status;
                    if ($currentStatus == "pause") {
                        $user = get_seller_info($userId);
                        $pendingProposal = $user->no_of_gigs;

                        if ($pendingProposal > 0) {
                            $statusVal = "active";
                        } else {
                            $data['message'] = "Quata exceeds, Please upgrade you membership plan!";
                            return $this->response($data, $statusCode);
                        }
                    } elseif ($currentStatus == "admin_pause") {
                        $statusVal = "pending";
                    }
                } else if ($status == 'approval') {
                    $select_modification = $this->db->query("SELECT * FROM proposal_modifications WHERE proposal_id = {$id} ORDER BY 1 DESC");
                    $countModification = $select_modification->num_rows();

                    if ($countModification > 0) {
                        $statusVal = "pending";
                        $this->db->delete("proposal_modifications", array("proposal_id" => $id));
                    } else {
                        $data['message'] = "Proposal doesn't need for approval.";
                        return $this->response($data, $statusCode);
                    }
                }
                $updateData['proposal_status'] = $statusVal;

                $response = $this->Proposal_model->update($updateData, $updatBy);

                if ($response > 0) {
                    $data['message'] = "Proposal status updated successfully";
                    $data['status'] = TRUE;
                    $statusCode = 204;
                }
            }
        }

        return $this->response($data, $statusCode);
    }
}
