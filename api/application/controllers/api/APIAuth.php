<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product class.
 *
 * @extends REST_Controller
 */
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class APIAuth extends REST_Controller
{
    /**
     * CONSTRUCTOR | LOAD MODEL
     *
     * @return Response
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Authorization_Token');

        $headers = $this->input->request_headers();
        if (isset($headers['Authorization'])) {
            $decodedToken = $this->authorization_token->validateToken($headers['Authorization']);
            if (!$decodedToken['status']) {
                $this->response($decodedToken, REST_Controller::HTTP_FORBIDDEN);
            }
        } else {
            $this->response(['Authentication failed'], REST_Controller::HTTP_FORBIDDEN);
        }
    }
}
