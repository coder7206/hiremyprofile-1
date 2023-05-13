<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/controllers/api/APIAuth.php';

/**
 * User class.
 *
 * @extends REST_Controller
 */
class User extends APIAuth
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

        $this->load->model('User_model');
    }

    /**
     * SHOW Profile of user | GET method.
     *
     * @return Response
     */
    public function index_get()
    {
        $userId = $this->getUserId();
        $qSeller = $this->db->get_where("sellers", ["seller_id" => $userId]);
        $oSeller = $qSeller->row();

        if (!$oSeller) {
            $data['status'] = FALSE;
            $data['message'] = "User doesn't exists";
            $statusCode = 404;
            $this->response($data, $statusCode);
        }
        $sellerId = $oSeller->seller_id;
        $data['status'] = TRUE;
        $data['message'] = "Data fetched successfully";

        $login_seller_name = $oSeller->seller_name;
        $login_seller_email = $oSeller->seller_email;
        $login_seller_phone = $oSeller->seller_phone;
        $login_seller_paypal_email = $oSeller->seller_paypal_email;
        $login_seller_payoneer_email = $oSeller->seller_payoneer_email;
        $login_seller_image = $oSeller->seller_image;
        $login_seller_cover_image = $oSeller->seller_cover_image;
        $login_seller_headline = $oSeller->seller_headline;
        $login_seller_country = $oSeller->seller_country;
        $login_seller_city = $oSeller->seller_city;
        $login_seller_timzeone = $oSeller->seller_timezone;
        $login_seller_language = $oSeller->seller_language;
        $login_seller_about = $oSeller->seller_about;

        $sql = "SELECT * FROM sellers_profile_tmp WHERE seller_id = ? ORDER BY 1 DESC LIMIT 1";
        $qSellerUpdate = $this->db->query($sql, [$sellerId]);

        $oSellerUpdate = $qSellerUpdate->row();
        if ($oSellerUpdate) {
            $userStatus = $oSellerUpdate->status;
            $reviewRemark = $userStatus == 0 ? 'review' : ($userStatus == 2 ? 'modification' : 'active');
            $modificationMsg = $userStatus == 2 ? $oSellerUpdate->feedback : '';
            $tblSeller = "sellers_profile_tmp";

            $login_seller_name = $oSellerUpdate->seller_name;
            $login_seller_phone = $oSellerUpdate->seller_phone;
            $login_seller_country = $oSellerUpdate->seller_country;
            $login_seller_city = $oSellerUpdate->seller_city;
            $login_seller_timzeone = $oSellerUpdate->seller_timezone;
            $login_seller_language = $oSellerUpdate->seller_language;
            $login_seller_image = $oSellerUpdate->seller_image;
            $login_seller_image_s3 = $oSellerUpdate->seller_image_s3;
            $login_seller_cover_image = $oSellerUpdate->seller_cover_image;
            $login_seller_cover_image_s3 = $oSellerUpdate->seller_cover_image_s3;
            $login_seller_headline = $oSellerUpdate->seller_headline;
            $login_seller_about = $oSellerUpdate->seller_about;
          }

        $data['data'] = new stdClass(); //the magic
        $data['data']->profile = [
            'account_status' => $reviewRemark,
            'seller_id' => $oSeller->seller_id,
            'seller_email' => $oSeller->seller_email,
            'seller_user_name' => $oSeller->seller_user_name,
            'seller_name' => $login_seller_name,
            'seller_phone' => $login_seller_phone,
            'seller_country' => $login_seller_country,
            'seller_city' => $login_seller_city,
            'seller_timezone' => $login_seller_timzeone,
            'seller_language' => $login_seller_language,
            'seller_image' => $login_seller_image,
            'seller_about' => $login_seller_about,
            'seller_headline' => $login_seller_headline,
        ];

        // Proffesional
        $qProInfo = $this->db->get_where("seller_pro_info", array("seller_id" => $sellerId));
        $cProInfo = $qProInfo->num_rows();
        $getProInfo = $qProInfo;

        $formStatus = true;
        $showPendingMsg = false;
        $modificationMsg = '';
        $proStatus = null;
        if ($cProInfo > 0) {
            $proInfoData = [];
            foreach ($qProInfo->result() as $oProInfo) {
                $proInfoData[] = $oProInfo;
                $proStatus = $oProInfo->status; // 1=active, 0=pending,2=modification
                $modificationMsg = $oProInfo->feedback;
                // $formStatus = $proStatus == 2 ? true : false;
                if ($proStatus == 0) {
                    $showPendingMsg = true;
                    $formStatus = false;
                }
            }
        }

        $data['data']->professional = [];

        $totalProInfForm = $cProInfo > 0 ? $cProInfo : 1;
        if ($formStatus) : //Show Form if needs to
            if ($modificationMsg != '') {
                $data['data']->professional['modification_request'] = $modificationMsg;
            }
            $data['data']->professional['acount_status'] = $proStatus;

            for ($i = 0; $totalProInfForm > $i; $i++) :
                $catId = $startDate = $endDate = '';
                $cOptions = 0;
                if (isset($proInfoData)) {
                    $spiId = $proInfoData[$i]->id;
                    $catId = $proInfoData[$i]->category_id;
                    $startDate = $proInfoData[$i]->start_date;
                    $endDate = $proInfoData[$i]->end_date;

                    $qOptions = $this->db->get_where("professional_info", ["category_id" => $catId, "status" => 1]);
                    $cOptions = $qOptions->num_rows();
                }
            endfor;
        endif;
        $data['data']->professional['is_pending'] = $showPendingMsg;
        $data['data']->professional['acount_status'] = $proStatus;
        // Occupation
        if ($cProInfo > 0) {
            $occupations = [];
            foreach ($proInfoData as $key => $proRow) {
                $proInfoId = $proRow->id;
                $categoryId = $proRow->category_id;
                $qCategory = $this->db->get_where("cats_meta", ["cat_id" => $categoryId, "language_id" => 1]);
                $oCategory = $qCategory->row();
                $catTitle = $oCategory->cat_title;

                $qOptions = $this->db->get_where("seller_pro_info_options", ["seller_pro_info_id" => $proInfoId]);
                $cOptions = $qOptions->num_rows();

                $occupations[$key]['category_id'] = $categoryId;
                $occupations[$key]['category_title'] = $catTitle;
                $occupations[$key]['start_datte'] = $proRow->start_date;
                $occupations[$key]['end_date'] = $proRow->end_date;
            }

            $data['data']->professional['occupations'] = $occupations;
        }

        $qSkills = $this->db->get_where("skills_relation", ["seller_id" => $sellerId]);
        $skills = [];
        if ($qSkills->num_rows() > 0) {
            foreach ($qSkills->result() as $key=>$oSkills) {
                $relation_id = $oSkills->relation_id;
                $skill_id = $oSkills->skill_id;
                $skill_level = $oSkills->skill_level;

                $get_skill = $this->db->get_where("seller_skills", ["skill_id" => $skill_id]);
                $row_skill = $get_skill->row();
                $skill_title = $row_skill->skill_title;

                $skills[$key]['skill_id'] = $skill_id;
                $skills[$key]['title'] = $skill_title;
                $skills[$key]['level'] = $skill_level;
            }
        }
        $data['data']->professional['skills'] = $skills;

        // $data['data']->account = [];

        $this->response($data, 200);
    }

    /**
     * Change password
     *
     * @return void
     */
    public function changePassword_post()
    {
        $userId = $this->getUserId();
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[7]');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|matches[password]');

        if ($this->form_validation->run() === false) {
            // validation not ok, send validation errors to the view
            $this->response([$this->form_validation->error_array()], 422);
        }

        $qSeller = $this->db->get_where("sellers", ["seller_id" => $userId]);
        $oSeller = $qSeller->row();

        if (!$oSeller) {
            $data['status'] = FALSE;
            $data['message'] = "User doesn't exists";
            $statusCode = 404;
            $this->response($data, $statusCode);
        }
        $sellerId = $oSeller->seller_id;
        $password = $this->input->post("password");
        $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);

        $updateData = [
            'seller_pass' => $encryptedPassword,
        ];

        $this->db->where('seller_id', $sellerId);
        $this->db->update('sellers', $updateData);

        $data['message'] = "Password updated successfully!";
        $data['status'] = TRUE;
        $statusCode = 200;

        return $this->response($data, $statusCode);
    }

    /**
     * Update profile
     *
     * @return void
     */
    public function changeProfile_post()
    {
        $this->form_validation->set_rules('seller_name', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('seller_country', 'Country', 'trim|required');
        $this->form_validation->set_rules('seller_language', 'seller_language', 'trim|required|numeric');

        if ($this->form_validation->run() === false) {
            // validation not ok, send validation errors to the view
            $this->response([$this->form_validation->error_array()], 422);
        }

        $userId = $this->getUserId();
        $qSeller = $this->db->get_where("sellers", ["seller_id" => $userId]);
        $oSeller = $qSeller->row();

        // get form data
        $input = $this->input->post();
        if (isset($input["seller_phone"])) {
            $input['seller_phone'] = $input['country_code'].' '.$input["seller_phone"];
        }

        unset($input['country_code']);
        unset($input['seller_phone']);
        unset($input['user_status']);
        $input['status'] = 0;
        $input['seller_id'] = $userId;

        $qSellerTmp = $this->db->get_where("sellers_profile_tmp", ["seller_id" => $userId]);
        $oSellerTmp = $qSellerTmp->row();

        if ($oSellerTmp) {
            $this->db->where('seller_id', $userId);
            $this->db->update('sellers_profile_tmp', $input);
        }
        else {
            $this->db->insert('sellers_profile_tmp', $input);
        }
        $data['message'] = "Profile updated successfully!";
        $data['status'] = TRUE;
        $statusCode = 200;

        return $this->response($data, $statusCode);
    }

    public function changeProfessional_post($type)
    {
        $userId = $this->getUserId();
        $inserted = 0;
        $formStatus = $this->input->post("form_status");

        $data['message'] = "No records";
        $data['status'] = FALSE;

        // occupations
        if ($type == 'occupations') {
            $occupations = $this->input->post("occupation");

            if (count($occupations) > 0) {
                 // delete
                if (!is_null($formStatus)) {
                    $sql = "DELETE spi, spio FROM seller_pro_info spi LEFT JOIN seller_pro_info_options spio ON spi.id = spio.seller_pro_info_id WHERE spi.seller_id = ?;";
                    $this->db->query($sql, [$userId]);
                }

                foreach ($occupations as $key => $occupation) {
                    $form = [];
                    $form['category_id'] = $occupation['category_id'];
                    $form['start_date'] = $occupation['start_date'];
                    $form['end_date'] = $occupation['end_date'];
                    $form['status'] = 0;
                    $form['seller_id'] = $userId;

                    $insertForm = $this->db->insert("seller_pro_info", $form);

                    if ($insertForm) {
                        $newId = $this->db->insert_id();
                        $options = isset($occupation['option_id']) ? $occupation['option_id'] : false;

                        if ($options) {
                            foreach ($options as $j => $option) {
                                $optionForm = ["seller_pro_info_id" => $newId];
                                $optionForm['professional_info_id'] = $option;

                                $this->db->insert("seller_pro_info_options", $optionForm);
                                $inserted++;
                            }
                        }
                        $inserted++;
                    }
                }

                if ($formStatus == 1) {
                    $this->db->where('seller_id', $userId);
                    $this->db->update('seller_profile_weights', ['professional_weight' => null]);
                }
            }

        } else if ($type == 'skills') {
            $formSkills = $this->input->post("skills");
            $skillsTotalForm = count($formSkills);

            $qSeller = $this->db->get_where("sellers", ["seller_id" => $userId]);
            $oSeller = $qSeller->row();
            $skills = $oSeller->skills;

            if (count($formSkills) > 0) {
                $query = $this->db->where('seller_id', $userId)->get('skills_relation');
                $skillsTotalAdded = $query->num_rows();

                $skillsTotalCanAdd = $skillsTotalAdded > 0 ? $skillsTotalForm - $skillsTotalAdded : $skillsTotalForm;

                // If skills exceeds avaiable quota
                if ($skillsTotalCanAdd > $skills) {
                    $data['message'] = "Available No of skills quota exceeds.";
                } else {
                    $skillError = [];
                    foreach ($formSkills as $key => $skill) {
                        $skillId = $skill['id'];
                        $skillLevel = $skill['level'];

                        if ($skillId == "custom") {
                            $skillName = $this->input->post('skill_name');
                            $query = $this->db->where('skill_title', $skillName)->get('seller_skills');
                            $count = $query->num_rows();

                            if ($count == 1) {
                                $skillError ='skill_already_added';
                            } else {
                                $insertSkill = $this->db->insert("seller_skills", ["skill_title" => $skillName]);
                                $skillId = $this->db->insert_id();
                                $inserted++;
                            }
                        } else {
                            $query = $this->db->where('seller_id', $userId)->where('skill_id', $skillId)->get('skills_relation');
                            $skillCountAlready = $query->num_rows();

                            // Add only if new found
                            if ($skillCountAlready == 0) {
                                $sForm = [
                                    "skill_id" => $skillId,
                                    "skill_level" => $skillLevel,
                                    "seller_id" => $userId,
                                ];
                                $this->db->insert("skills_relation", $sForm);
                                $inserted++;
                            }
                        }
                    }
                }
            }
        }

        if ($inserted > 0) {
            $data['message'] = "Data updated successfully";
            $data['status'] = TRUE;
        }

        $this->response( $data, 200 );
    }
}
