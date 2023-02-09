<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/controllers/api/APIAuth.php';

/**
 * Request class.
 *
 * @extends REST_Controller
 */
class Request extends APIAuth
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

        $this->load->model('request_model');
    }

    /**
     * Get categories function.
     *
     * @access public
     * @return void
     */
    public function categories_get($userId)
    {
        $response = $this->request_model->getSellerCategories($userId);

        $data['message'] = "No records";
        $data['status'] = FALSE;

        if (count($response['data']) > 0) {
            $data['message'] = "Data fetched successfully";
            $data['status'] = TRUE;
            $data['data'] = $response['data'];
        }
        $this->response($data, 200);
    }

    /**
     * Sellers Buyer Request
     *
     * @access public
     * @return void
     */
    public function sellerBuyerRequest_get($userId, $categoryId)
    {
        $this->load->helper('url');
        $this->load->library("pagination");

        $page = ($this->input->get("page")) ? $this->input->get("page") : 1;
        $limit = ($this->input->get("per_page")) ? $this->input->get("per_page") : 10;
        $searchKeyword = ($this->input->get("s")) ? $this->input->get("s") : "";
        $pagePosition = (($page - 1) * $limit);

        $response = $this->request_model->getSellerBuyerRequests($userId, $categoryId, $searchKeyword, $limit, $pagePosition);

        $total = $response['total'];
        $data['message'] = "No records";
        $data['status'] = FALSE;

        if ($total > 0) {
            $requests = $response['data'];
            $data['message'] = "Data fetched successfully";
            $data['status'] = TRUE;
            $res = [];
            foreach ($requests as $key => $oResult) {
                $res[$key] = $oResult;

                $request_id = $oResult->request_id;
                $seller_id = $oResult->seller_id;
                $cat_id = $oResult->cat_id;
                $child_id = $oResult->child_id;

                $siteLanguage = 1;

                $get_meta = $this->db->get_where("cats_meta", array("cat_id" => $cat_id, "language_id" => $siteLanguage));
                $row_meta = $get_meta->row();
                $res[$key]->category_title = $row_meta->cat_title;

                $get_meta = $this->db->get_where("child_cats_meta", array("child_id" => $child_id, "language_id" => $siteLanguage));
                $row_meta = $get_meta->row();
                $res[$key]->category_child_title = $row_meta->child_title;

                $select_request_seller = $this->db->get_where("sellers", array("seller_id" => $seller_id));
                $row_request_seller = $select_request_seller->row();
                $res[$key]->request_seller_user_name = $row_request_seller->seller_user_name;
                $res[$key]->request_seller_image = getImageUrl2("sellers", "seller_image", $row_request_seller->seller_image);

                $count_send_offers = $this->db->get_where("send_offers", array("request_id" => $request_id));
                $res[$key]->count_send_offers = $count_send_offers->num_rows();
                $count_offers = $this->db->get_where("send_offers", array("request_id" => $request_id, "sender_id" => $userId));
                $res[$key]->count_send_offers = $count_offers->num_rows();
            }

            $data['data'] = $res;
            $baseUrl = "api/v1/requests/{$userId}/sellers/{$categoryId}?per_page={$page}&page=";

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
     * Sellers Offer Sent
     *
     * @access public
     * @return void
     */
    public function offersSent_get($userId)
    {
        $this->load->helper('url');
        $this->load->library("pagination");

        $page = ($this->input->get("page")) ? $this->input->get("page") : 1;
        $limit = ($this->input->get("per_page")) ? $this->input->get("per_page") : 10;
        $pagePosition = (($page - 1) * $limit);

        $response = $this->request_model->getSellerOffersSent($userId, $limit, $pagePosition);
        $total = $response['total'];
        $data['message'] = "No records";
        $data['status'] = FALSE;

        if ($total > 0) {
            $qOffers = $response['data'];
            $data['message'] = "Data fetched successfully";
            $data['status'] = TRUE;
            $res = [];
            foreach ($qOffers as $key => $oOffers) {
                $res[$key] = $oOffers;

                $request_id = $oOffers->request_id;
                $proposal_id = $oOffers->proposal_id;

                $select_proposals = $this->db->get_where("proposals", array("proposal_id" => $proposal_id));
                $row_proposals = $select_proposals->row();
                $res[$key]->proposal_title = @$row_proposals->proposal_title;

                $get_requests = $this->db->get_where("buyer_requests", array("request_id" => $request_id));
                $row_requests = $get_requests->row();
                $seller_id = $row_requests->seller_id;
                $cat_id = $row_requests->cat_id;
                $child_id = $row_requests->child_id;
                $res[$key]->request_title = $row_requests->request_title;
                $res[$key]->request_description = $row_requests->request_description;
                $siteLanguage = 1;

                $get_meta = $this->db->get_where("cats_meta", array("cat_id" => $cat_id, "language_id" => $siteLanguage));
                $row_meta = $get_meta->row();
                $res[$key]->category_title = $row_meta->cat_title;

                $get_meta = $this->db->get_where("child_cats_meta", array("child_id" => $child_id, "language_id" => $siteLanguage));
                $row_meta = $get_meta->row();
                $res[$key]->category_child_title = $row_meta->child_title;

                $select_request_seller = $this->db->get_where("sellers", array("seller_id" => $seller_id));
                $row_request_seller = $select_request_seller->row();
                $res[$key]->request_seller_user_name = $row_request_seller->seller_user_name;
                $res[$key]->request_seller_image = getImageUrl2("sellers", "seller_image", $row_request_seller->seller_image);
            }

            $data['data'] = $res;
            $baseUrl = "api/v1/requests/{$userId}/sellers/offers-sent?per_page={$page}&page=";

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
     * Manage Request
     *
     * @access public
     * @return void
     */
    public function sellerManageRequest_get($userId, $status)
    {
        $this->load->helper('url');
        $this->load->library("pagination");

        $page = ($this->input->get("page")) ? $this->input->get("page") : 1;
        $limit = ($this->input->get("per_page")) ? $this->input->get("per_page") : 10;
        $pagePosition = (($page - 1) * $limit);

        $response = $this->request_model->getManagerRequests($userId, $status, $limit, $pagePosition);

        $total = $response['total'];
        $data['message'] = "No records";
        $data['status'] = FALSE;

        if ($total > 0) {
            $requests = $response['data'];
            $data['message'] = "Data fetched successfully";
            $data['status'] = TRUE;
            $res = [];
            if ($status == 'modification') {
                foreach ($requests as $key => $oResult) {
                    $res[$key] = $oResult;
                    $requestId = $oResult->request_id;

                    $select_modification = $this->db->query("SELECT * FROM request_modifications WHERE request_id = {$requestId} ORDER BY 1 DESC");
                    $row_modification = $select_modification->row();
                    $res[$key]->modification_message = $row_modification->modification_message;
                }
            } else {
                foreach ($requests as $key => $oResult) {
                    $res[$key] = $oResult;
                    $requestId = $oResult->request_id;

                    $qOffers = $this->db->get_where("send_offers", array("request_id" => $requestId, "status" => 'active'));
                    $res[$key]->count_offers = $qOffers->num_rows();
                }
            }

            $data['data'] = $res;
            $baseUrl = "api/v1/requests/{$userId}/buyer/{$status}?per_page={$page}&page=";

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
     * approve: Submit for approval
     *
     * @return Response
     */
    public function updateRequestStatus_put($userId, $id, $status)
    {
        $acceptedStatuses = ['pause', 'approve'];

        $data['message'] = "Invalid Status or something with wrong.";
        $data['status'] = FALSE;
        $status = 200;
        if (in_array($status, $acceptedStatuses)) {
            // pending should be status for approve as this needs to approve from admin
            $updateData['request_status'] = $status == 'approve' ? 'pending' : 'pause';
            $updatBy['request_id'] = $id;
            $updatBy['seller_id'] = $userId;
            $response = $this->request_model->update($updateData, $updatBy);

            if ($response > 0) {
                $data['message'] = "Data updated successfully";
                $data['status'] = TRUE;
                $status = 204;
            }
        }

        $this->response($data, $status);
    }

    /**
     * DELETE method.
     *
     * @return Response
     */
    public function index_delete($userId, $id)
    {
        $response = $this->request_model->delete(['request_id' => $id, 'seller_id' => $userId]);
        $data['message'] = "Not deleted";
        $data['status'] = FALSE;
        $status = 200;
        if ($response > 0) {
            $data['message'] = "Data deleted successfully";
            $data['status'] = TRUE;
            $status = 204;
        }

        $this->response($data, $status);
    }

    /**
     * Request offers | GET method.
     *
     * @return Response
     */
    public function requestOffers_get($userId, $id)
    {
        $data['message'] = "Data not found";
        $data['status'] = FALSE;
        $status = 404;
        $getRequest = $this->db->get_where("buyer_requests", array("request_id" => $id, "seller_id" => $userId, "request_status" => "active"));

        if ($getRequest->num_rows() > 0) {
            $data['message'] = "Data fetched successfully";
            $data['status'] = TRUE;
            $res = [];

            $res = $getRequest->row();

            $catId = $res->cat_id;
            $childId = $res->child_id;

            $siteLanguage = 1;

            $get_meta = $this->db->get_where("cats_meta", array("cat_id" => $catId, "language_id" => $siteLanguage));
            $row_meta = $get_meta->row();
            $res->category_title = $row_meta->cat_title;
            $get_meta = $this->db->get_where("child_cats_meta", array("child_id" => $childId, "language_id" => $siteLanguage));
            $row_meta = $get_meta->row();
            $res->category_child_title = $row_meta->child_title;
            $get_offers = $this->db->get_where("send_offers", array("request_id" => $id, "status" => 'active'));
            $res->count_offers = $get_offers->num_rows();

            if ($res->count_offers > 0) {
                $oOffers = $get_offers->result_object();
                $offers = [];
                foreach ($oOffers as $key => $offer) {
                    $offers[$key] = $offer;

                    $proposalId = $offer->proposal_id;
                    $senderId = $offer->sender_id;

                    $qSender = $this->db->get_where("sellers", array("seller_id" => $senderId));
                    $oSender = $qSender->row();
                    $sender = (object) [];
                    $sender->sender_user_name = $oSender->seller_user_name;
                    $sender->sender_level = $oSender->seller_level;
                    $sender->sender_image = $oSender->seller_image;
                    $sender->sender_status = $oSender->seller_status;
                    $offers[$key]->sender = $sender;

                    // USER RATING
					$qBuyerReviews = $this->db->get_where("buyer_reviews", array("review_seller_id" => $senderId));
					$countReviews = $qBuyerReviews->num_rows();

                    $reviews = [];
                    $reviews['average'] = "0";
                    $reviews['average_rating'] = "0";
                    $reviews['count_reviews'] = $countReviews;
					if ($countReviews > 0) {
						$ratings = [];
                        $qBuyerReviews = $qBuyerReviews->result_object();
						foreach ($qBuyerReviews as $oBuyerReviews) {
						  $buyerRating = $oBuyerReviews->buyer_rating;
						  array_push($ratings, $buyerRating);
						}
						$total = array_sum($ratings);
						$reviews['average'] = $total / count($ratings);
						$reviews['average_rating'] = substr($reviews['average'], 0, 1);
					}
                    $offers[$key]->sender->reviews = $reviews;

                    $qProposal = $this->db->get_where("proposals", array("proposal_id" => $proposalId));
                    $oProposal = $qProposal->row();
                    $proposal = (object) [];
                    $proposal->proposal_title = $oProposal->proposal_title;
                    $proposal->proposal_url = $oProposal->proposal_url;
                    $proposal->proposal_img1 = getImageUrl2("proposals", "proposal_img1", $oProposal->proposal_img1);
                    $offers[$key]->proposal = $proposal;
                }
                $res->offers = $offers;
            }

            $data['data'] = $res;
        }

        $this->response($data, $status);
    }
}
