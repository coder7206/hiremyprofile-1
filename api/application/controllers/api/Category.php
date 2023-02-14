<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/controllers/api/APIAuth.php';

/**
 * Category class.
 *
 * @extends REST_Controller
 */
class Category extends APIAuth
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

        $this->load->model('Referral_model');
    }

    /**
     * The get pluck categories
     *
     * @return Response
     */
    public function getPluckCategories_get()
    {
        $data['message'] = "Data fetched successfully";
        $data['status'] = TRUE;
        $siteLanguage = 1;

        $getCategories = $this->db->get("categories");
        if ($getCategories->num_rows() > 0) {
            $oCategories = $getCategories->result_object();
            $categories = [];
            foreach ($oCategories as $key => $oCategory) {
                $catId = $oCategory->cat_id;
                $getMeta = $this->db->get_where("cats_meta", array("cat_id" => $catId, "language_id" => $siteLanguage));
                $rowMeta = $getMeta->row();
                $catTitle = $rowMeta->cat_title;

                $categories[$key] = new stdClass();
                $categories[$key]->category_id = $catId;
                $categories[$key]->category_title = $catTitle;
            }
            $data['data'] = $categories;
        }

        $this->response($data, 200);
    }

    /**
     * get my referrals
     *
     * @param [type] $userId
     * @return void
     */
    public function getSearchProperties_get()
    {
        $categoryId = $this->input->get("category_id");
        $setData = [
            'category_id' => $categoryId,
        ];
        $this->form_validation->set_data($setData);
        $this->form_validation->set_rules('category_id', 'Category Id', 'trim|required|numeric');

        if ($this->form_validation->run() === false) {
            $data['message'] = "Unprocessable Entity";
            $data['errors'] = $this->form_validation->error_array();
            $statusCode = 422;
            // validation not ok, send validation errors to the view
            $this->response($data, $statusCode);
        }

        $data['message'] = "Data fetched successfully";
        $data['status'] = TRUE;
        $siteLanguage = 1;

        $getCountries = $this->db->query("SELECT DISTINCT proposal_seller_id FROM proposals WHERE proposal_cat_id={$categoryId} AND proposal_status='active'");
        $rowCount = $getCountries->num_rows();
        if ($rowCount > 0) {
            $oCountries = $getCountries->result_object();
            $countries = [];
            $cities = [];
            foreach ($oCountries as $key => $oCountry) {
                $sellerId = $oCountry->proposal_seller_id;
                $seller = $this->db->get_where("sellers", ['seller_id' => $sellerId])->row();
                $sellerCountry = $seller->seller_country;
                $sellerCity = $seller->seller_city;

                $countries[$key] = $sellerCountry;
                $cities[$key] = $sellerCity;
            }
            $data['data']['countries'] = array_unique(array_filter($countries));
            $data['data']['cities'] = array_unique(array_filter($cities));
        }

        $getDeliviries = $this->db->query("SELECT DISTINCT delivery_id FROM proposals WHERE proposal_cat_id={$categoryId} AND proposal_status='active'");
        $rowCount = $getDeliviries->num_rows();
        if ($rowCount > 0) {
            $oDeliviries = $getDeliviries->result_object();
            $deliviries = [];
            foreach ($oDeliviries as $key => $oDelivery) {
                $deliveryId = $oDelivery->delivery_id;
                $select_delivery_time = $this->db->get_where("delivery_times", array('delivery_id' => $deliveryId));
                $deliveryTitle = @$select_delivery_time->row()->delivery_title;
                $deliviries[$key] = new stdClass(); //the magic
                $deliviries[$key]->id = $deliveryId;
                $deliviries[$key]->title = $deliveryTitle;
            }
            $data['data']['deliveries'] = array_unique(array_filter($deliviries));
        }

        $getLevels = $this->db->query("SELECT DISTINCT level_id FROM proposals WHERE proposal_cat_id={$categoryId} AND proposal_status='active'");
        $rowCount = $getLevels->num_rows();
        if ($rowCount > 0) {
            $oLevels = $getLevels->result_object();
            $levels = [];
            foreach ($oLevels as $key => $oLevel) {
                $levelId = $oLevel->level_id;
                $levelTitle = @$this->db->get_where("seller_levels_meta", array("level_id" => $levelId, "language_id" => $siteLanguage))->row()->title;
                if (!empty($level_title)) {
                    $levels[$key] = new stdClass(); //the magic
                    $levels[$key]->id = $levelId;
                    $levels[$key]->title = $levelTitle;
                }
            }
            $data['data']['seller_levels'] = array_unique(array_filter($levels));
        }

        $getLangauges = $this->db->query("select DISTINCT language_id from proposals where not language_id='0' and proposal_cat_id={$categoryId} AND proposal_status='active'");
        $rowCount = $getLangauges->num_rows();
        if ($rowCount > 0) {
            $oLangauges = $getLangauges->result_object();
            $languages = [];
            foreach ($oLangauges as $key => $oLangauge) {
                $languageId = $oLangauge->language_id;
                $select_seller_languges = $this->db->get_where("seller_languages",array('language_id' => $languageId));
                $languageTitle = @$select_seller_languges->row()->language_title;
                if(!empty($language_title)){
                    $languages[$key] = new stdClass(); //the magic
                    $languages[$key]->id = $languageId;
                    $languages[$key]->title = $languageTitle;
                }
            }
            $data['data']['langauges'] = array_unique(array_filter($languages));
        }
        $this->response($data, 200);
        dd($rowCount);
    }
}
