<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/controllers/api/APIAuth.php';

/**
 * Order class.
 *
 * @extends REST_Controller
 */
class Order extends APIAuth
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

        $this->load->model('order_model');
    }

    /**
	 * register function.
	 *
	 * @access public
	 * @return void
	 */
	public function orderBuyer_get($userId, $status) {
        $this->load->helper('url');
        $this->load->library("pagination");

        $page = ($this->input->get("page")) ? $this->input->get("page") : 1;
        $limit = ($this->input->get("per_page")) ? $this->input->get("per_page") : 10;
        $pagePosition = (($page - 1) * $limit);

        $response = $this->order_model->getBuyerOrders($userId, $status, $limit, $pagePosition);

        $total = $response['total'];
        $data['message'] = "No records";
        $data['status'] = FALSE;

        if ($total > 0) {
            $orders = $response['data'];
            $data['message'] = "Data fetched successfully";
            $data['status'] = TRUE;
            $res = [];
            foreach ($orders as $key => $order) {
                $res[$key] = $order;

                $proposal_id = $order->proposal_id;
                $order_duration = substr($order->order_duration, 0, 1);
                $order_date = $order->order_date;
                $res[$key]->order_due = date("F d, Y", strtotime($order_date . " + $order_duration days"));

                $query = $this->db->get_where('proposals', array('proposal_id' => $proposal_id));
                $row = $query->row();
                $res[$key]->proposal_title = $row->proposal_title;

                $res[$key]->proposal_img1 = getImageUrl2("proposals", "proposal_img1", $row->proposal_img1);
            }

            $data['data'] = $res;
            $baseUrl = "api/v1/orders/{$userId}/buyers/{$status}?per_page={$page}&page=";

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
