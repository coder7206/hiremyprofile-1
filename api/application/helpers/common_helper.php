<?php (defined('BASEPATH')) or exit('No direct script access allowed');

function dd($data)
{
  echo "<pre>";
  print_r($data);
  exit;
}

function getGeoFromIP($ip)
{
  return unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $ip));
}

function sendEmail($to, $from, $subject, $message = "", $template = "", $tplData = [])
{
  $ci = &get_instance();

  $ci->load->config('email');
  $ci->load->library('email');
  $ci->email->set_newline("\r\n");

  $to_email = is_array($to) ? $to['to_email'] : $to;
  $to_name = is_array($to) ? $to['to_name'] : $to;
  $from_email = is_array($from) ? $from['from_email'] : $from;
  $from_name = is_array($from) ? $from['from_name'] : $from;

  $ci->email->from($from_email, $from_name);
  $ci->email->to($to_email, $to_name);
  $ci->email->subject($subject);

  if ($template != "") {
    $message = loadEmailTemplate($template, $tplData);
  }
  $ci->email->message($message);

  if ($ci->email->send()) {
    return true;
  } else {
    show_error($ci->email->print_debugger());
  }
}

function proceedSendEmails($userData, $adminData = [])
{
  $ci = &get_instance();

  $ci->load->library('email');
  $ci->load->model('general_model');

  $generailSetting = $ci->general_model->getGenerailSetting();

  $to['to_email'] = $userData['to'];
  $to['to_name'] = $userData['seller_user_name'];
  $from['from_email'] = isset($userData['from']) ? $userData['from'] : $generailSetting->site_email_address;
  $from['from_name'] = isset($userData['from_name']) ? $userData['from_name'] : $generailSetting->site_name;
  $subject = $userData['subject'];
  $template = $userData['template'];

  // EMAIL CONFIG
  $userData['site_url'] = $generailSetting->site_url;
  $userData['site_logo'] = $generailSetting->site_logo;
  $userData['site_name'] = $generailSetting->site_name;

  return sendEmail($to, $from, $subject, '', $template, $userData);

  // TODO NOTIFY IF $adminData has data
  //   $admins = $ci->general_model->getAdmins();
  // dd($admins->num_rows());
  // result_object
}

function loadEmailTemplate($file, $data = [])
{
  $ci = &get_instance();

  $main2 = ['email_confirmation', 'password_reset'];
  if (in_array($data['template'], $main2))
    $file = "main2";
  else
    $file = "main";


  return $ci->load->view("emails/{$file}.php", $data, TRUE);
}

function img_url($name)
{
  $ci = &get_instance();

  $generailSetting = $ci->general_model->getGenerailSetting();

  echo $generailSetting->site_url . "/images/email/" . $name;
}

function paginate($totalPages, $url)
{
  // Now start looping
  $baseUrl = [];
  for ($i = 1; $i <= $totalPages; $i++) {
    // And set the new URL for the next page
    $baseUrl[] = $url . $i;
  }

  return ($baseUrl);
}

function getImageUrl2($table, $field, $key)
{
  $ci = &get_instance();

  $field2 = $field . '_s3';
  $folder = getFolderName($table);

  if ($field == "seller_cover_image") {
    $folder = "cover_images";
  }

  $query = $ci->db->get_where($table, ["$field" => $key]);
  $row = $query->row();
  $isS3 = $row->$field2;

  if ($isS3 == 1) {
    return "$folder/$key";
  } else {

    if (empty($key)) {
      $key = "empty-image.png";
    }

    $main_folder = getMainFolderName($folder, $table);

    $key = rawurlencode($key);

    return "$main_folder/$folder/$key";
  }
}

function getFolderName($table)
{

  if ($table == "admins") {
    return "admin/admin_images";
  } elseif ($table == "general_settings") {
    return "images";
  } elseif ($table == "sellers") {
    return "user_images";
  } elseif ($table == "categories") {
    return "cat_images";
  } elseif ($table == "post_categories") {
    return "blog_cat_images";
  } elseif ($table == "proposals") {
    return "proposal_files";
  } elseif ($table == "order_conversations") {
    return "order_files";
  } elseif ($table == "instant_deliveries") {
    return "order_files";
  } elseif ($table == "inbox_messages") {
    return "conversations_files";
  } elseif ($table == "buyer_requests") {
    return "request_files";
  } elseif ($table == "languages") {
    return "images";
  } elseif ($table == "section_boxes") {
    return "box_images";
  } elseif ($table == "home_cards") {
    return "card_images";
  } elseif ($table == "home_section_slider") {
    return "home_slider_images";
  } elseif ($table == "slider") {
    return "slides_images";
  } elseif ($table == "support_tickets") {
    return "ticket_files";
  } elseif ($table == "support_conversations") {
    return "ticket_files";
  } elseif ($table == "knowledge_bank") {
    return "article_images";
  } elseif ($table == "posts") {
    return "post_images";
  }
}

function getMainFolderName($folder, $table)
{
  if ($folder == "proposal_files") {
    $main_folder = "proposals";
  } elseif ($folder == "request_files") {
    $main_folder = "requests";
  } elseif ($folder == "conversations_files") {
    $main_folder = "conversations";
  } elseif ($folder == "images" and $table == "languages") {
    $main_folder = "languages";
  } elseif ($folder == "article_images") {
    $main_folder = "article";
  } elseif ($folder == "admin_images") {
    $main_folder = "admin";
  } else {
    $main_folder = "";
  }

  return $main_folder;
}

function get_seller_info($userId)
{
  $ci = &get_instance();

  $select_login_seller = $ci->db->get_where("sellers", ["seller_id" => $userId]);
  return $select_login_seller->row();
}

function insert_log($admin_id, $work, $work_id, $status)
{
  $ci = &get_instance();
  $date = date("F d, Y H:i:s");

  $data = array(
    'admin_id' => $admin_id,
    'work' => $work,
    'work_id' => $work_id,
    'date' => $date,
    'status' => $status
  );

  return $ci->db->insert('admin_logs', $data);
}

function get_general_settings()
{
  $ci = &get_instance();

  $query = $ci->db->get("general_settings");
  return $query->row();
}

function searchQueryWhere($type, $filterType, $params)
{
  $online_sellers = [];
  $where_online = [];
  $where_country = [];
  $where_level = [];
  $where_language = [];
  $values = [];
  $where_path = "";
  $where_online = [];
  $where_city = [];
  $where_cat = [];
  $where_delivery_times = [];
  $instant_delivery = 0;

  $ci = &get_instance();

  //   if ($params['online_sellers'] != "") {
  //     $qSellers = $ci->db->get_where("sellers", ['seller_status' => "online"]);
  //     if ($qSellers->num_rows() > 0) {
  //       $oSellers = $qSellers->result_object();

  //     }
  //     while ($seller = $sellers->fetch()) {
  //        if (check_status($seller->seller_id) == "Online") {
  //           array_push($online_sellers, $seller->seller_id);
  //        }
  //     }
  //  }

  $queryWhere = "WHERE proposals.proposal_status='active' ";

  if ($type == "query_where")
    return $queryWhere;
  elseif ($type == "where_path")
    return $where_path;
  elseif ($type == "values")
    return $values;
}
