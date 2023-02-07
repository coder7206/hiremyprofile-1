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
	public function categories_get($userId) {
        $response = $this->request_model->getSellerCategories($userId);

        $data['message'] = "No records";
        $data['status'] = FALSE;

        if (count($response['data']) > 0) {
            $data['message'] = "Data fetched successfully";
            $data['status'] = TRUE;
            $data['data'] = $response['data'];
        }
        $this->response( $data, 200 );
    }

    /**
	 * Sellers Buyer Request
	 *
	 * @access public
	 * @return void
	 */
	public function sellerBuyerRequest_get($userId, $categoryId) {
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

            $totalPages = ceil( $response['total'] / $limit);
            $data['meta_data']['total'] = $response['total'];
            $data['meta_data']['per_page'] = $limit;
            $data['meta_data']['total_pages'] = $totalPages;
            $data['meta_data']['page'] = $page;
            $data['meta_data']['pagination'] = paginate($totalPages, $baseUrl);
        }
        $this->response( $data, 200 );
    }

    /**
	 * Sellers Offer Sent
	 *
	 * @access public
	 * @return void
	 */
	public function offersSent_get($userId) {
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

            $totalPages = ceil( $response['total'] / $limit);
            $data['meta_data']['total'] = $response['total'];
            $data['meta_data']['per_page'] = $limit;
            $data['meta_data']['total_pages'] = $totalPages;
            $data['meta_data']['page'] = $page;
            $data['meta_data']['pagination'] = paginate($totalPages, $baseUrl);
        }

        $this->response( $data, 200 );
    }
}
