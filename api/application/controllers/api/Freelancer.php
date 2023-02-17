<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/controllers/api/APIAuth.php';

/**
 * Freelancer class.
 *
 * @extends REST_Controller
 */
class Freelancer extends APIAuth
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
    }

    /**
     * get freelancer sidebar
     *
     * @param [type] $userId
     * @return void
     */
    public function getSearchProperties_get()
    {
        $data['message'] = "Data fetched successfully";
        $data['status'] = TRUE;
        $siteLanguage = 1;

        $getSkills = $this->db->get("seller_skills");
        $rowCount = $getSkills->num_rows();

        if ($rowCount > 0) {
            $oSkills = $getSkills->result_object();
            $skills = [];
            foreach ($oSkills as $key => $oSkill) {
                $tagTitle = $oSkill->skill_title;
                $tagId = $oSkill->skill_id;
                if (!empty($tagTitle)) {
                    $skills[$tagId] = $tagTitle;
                }
            }
            $data['data']['skills'] = array_unique(array_filter($skills));
        }
        $getSellers = $this->db->query("select DISTINCT seller_level from sellers");
        $rowCount = $getSellers->num_rows();
        if ($rowCount > 0) {
            $oSellers = $getSellers->result_object();
            $levels = [];
            foreach ($oSellers as $key => $oSeller) {
                $levelId = $oSeller->seller_level;
				$levelTitle = $this->db->get_where("seller_levels_meta", array("level_id" => $levelId, "language_id" => $siteLanguage))->row()->title;
                $levels[$levelId] = $levelTitle;
            }
            $data['data']['seller_levels'] = array_unique(array_filter($levels));
        }

        $getLangauges = $this->db->query("select DISTINCT seller_language from sellers");
        $rowCount = $getLangauges->num_rows();
        if ($rowCount > 0) {
            $oLangauges = $getLangauges->result_object();
            $languages = [];
            foreach ($oLangauges as $key => $oLangauge) {
                $languageId = $oLangauge->seller_language;

                $select_seller_languges = $this->db->get_where("seller_languages",array('language_id' => $languageId));
                $languageTitle = @$select_seller_languges->row()->language_title;
                if(!empty($languageTitle)){
                    $languages[$languageId] = $languageTitle;
                }
            }
            $data['data']['langauges'] = array_unique(array_filter($languages));
        }
        $this->response($data, 200);
    }

    public function index_get()
    {
        // Get Search Params if present in requests
        $params = [];
        $params['skill_id'] = $this->input->get("skill_id") ?? null;
        $params['online_sellers'] = $this->input->get("online_sellers") ?? null;
        $params['seller_level_id'] = $this->input->get("seller_level_id") ?? null;
        $params['seller_language_id'] = $this->input->get("seller_language_id") ?? null;

        $filterType = "search";

        $queryWhere = freelancersQueryWhere("query_where", $params);
        $where_path = freelancersQueryWhere("where_path", $params);
        $whereValues = freelancersQueryWhere("values", $params);

        $query_where_skills = isset($queryWhere) ? $queryWhere[1] : "";
	    $queryWhere = isset($queryWhere) ? $queryWhere[0] : "";

        $this->load->helper('url');
        $this->load->library("pagination");

        $page = ($this->input->get("page")) ? $this->input->get("page") : 1;
        $limit = ($this->input->get("per_page")) ? $this->input->get("per_page") : 5;
        $pagePosition = (($page - 1) * $limit);
        $orderBy = $this->input->get("order") ?? "DESC";

        $whereLimit = " ORDER BY seller_level {$orderBy} LIMIT {$limit} OFFSET {$pagePosition}";

        dd("FREELANCER UNDER CONSTRUCTION");

        $spQuery = "SELECT DISTINCT proposals.* FROM proposals INNER JOIN sellers ON proposals.proposal_seller_id = sellers.seller_id INNER JOIN instant_deliveries ON proposals.proposal_id = instant_deliveries.proposal_id {$queryWhere}";
        $sQuery = "SELECT DISTINCT proposals.* FROM proposals INNER JOIN sellers ON proposals.proposal_seller_id = sellers.seller_id INNER JOIN instant_deliveries ON proposals.proposal_id = instant_deliveries.proposal_id {$queryWhere} {$whereLimit}";

        //get total number of records from database for pagination
        $query = $this->db->query($spQuery, $whereValues);
        $rowCount = $query->num_rows();
        $qProposals = $this->db->query($sQuery, $whereValues);

        if ($rowCount == 0) {
            $data['status'] = FALSE;
            $data['message'] = "Sorry, we don't found with these search criterias. Please try with other search information.";
            $statusCode = 200;

            $this->response($data, $statusCode);
        }

        $oProposals = $qProposals->result_object();
        $res = [];
        $siteLanguage = 1;
        foreach ($oProposals as $key => $oProposal) {
            $res[$key] = $oProposal;

            $proposalId = $oProposal->proposal_id;
            $proposalPrice = $oProposal->proposal_price;
            if ($proposalPrice == 0) {
                $get_p_1 = $this->db->get_where("proposal_packages", array("proposal_id" => $proposalId, "package_name" => "Basic"));
                $proposalPrice = $get_p_1->row()->price;
            }
            $res[$key]->proposal_price = $proposalPrice;
            $res[$key]->proposal_img1 = getImageUrl2("proposals", "proposal_img1", $oProposal->proposal_img1);

            // Seller
            $proposalSellerId = $oProposal->proposal_seller_id;
            $sellArr = [];
            $getSeller = $this->db->get_where("sellers", array("seller_id" => $proposalSellerId));
            $rowSeller = $getSeller->row();

            $sellArr['seller_user_name'] = $rowSeller->seller_user_name;
            $sellArr['seller_image'] = getImageUrl2("sellers", "seller_image", $rowSeller->seller_image);
            $sellArr['seller_level'] = $rowSeller->seller_level;
            $sellArr['seller_status'] = $rowSeller->seller_status;
            if ($sellArr['seller_image'] == "")
                $sellArr['seller_image'] = "empty-image.png";

            @$sellArr['seller_level'] = $this->db->get_where("seller_levels_meta", array("level_id" => $sellArr['seller_level'], "language_id" => $siteLanguage))->row()->title;

            // Seller Reviews
            $proposalReviews = [];
            $selectBuyerReviews = $this->db->get_where("buyer_reviews", array("proposal_id" => $proposalId));
            $countReviews = $selectBuyerReviews->num_rows();
            $total = 0;
            $averageRating = 0;
            if ($countReviews > 0) {
                $oBuyerReviews = $selectBuyerReviews->result_object();
                foreach($oBuyerReviews as $oBuyerReview) {
                    $proposalBuyerRating = $oBuyerReview->buyer_rating;
                    array_push($proposalReviews, $proposalBuyerRating);
                }
                $total = array_sum($proposalReviews);
                $averageRating = $total / count($proposalReviews);
            }
            $reviews['total'] = $total;
            $reviews['average_rating'] = $averageRating;
            $sellArr['reviews'] = $reviews;

            $res[$key]->seller = $sellArr;
        }
        $data['status'] = TRUE;
        $data['message'] = "Data fetched successfully";
        $data['data'] = $res;

        $data['data'] = $res;
        $baseUrl = "api/v1/search?per_page={$page}&page=";

        $totalPages = ceil( $rowCount / $limit);
        $data['meta_data']['total'] = $rowCount;
        $data['meta_data']['per_page'] = $limit;
        $data['meta_data']['total_pages'] = $totalPages;
        $data['meta_data']['page'] = $page;
        $data['meta_data']['pagination'] = paginate($totalPages, $baseUrl);

        $this->response( $data, 200 );

    }
}
