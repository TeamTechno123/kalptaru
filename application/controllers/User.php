<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
  public function __construct(){
    parent::__construct();
    date_default_timezone_set('Asia/Kolkata');
  }

  public function logout(){
    $this->session->sess_destroy();
    header('location:'.base_url().'User');
  }

/**************************      Login      ********************************/
  public function index(){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' && $kalp_company_id == ''){
      $this->form_validation->set_rules('mobile', 'Mobile No', 'trim|required');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');
      if ($this->form_validation->run() == FALSE) {
      	$this->load->view('Admin/User/login');
      } else{
        $mobile = $this->input->post('mobile');
        $password = $this->input->post('password');

        $login = $this->User_Model->check_login($mobile, $password);
        // print_r($login);
        if($login == null){
          $this->session->set_flashdata('msg','login_error');
          header('location:'.base_url().'User');
        } else{
          // echo 'null not';
          $this->session->set_userdata('kalp_user_id', $login[0]['user_id']);
          $this->session->set_userdata('kalp_company_id', $login[0]['company_id']);
          $this->session->set_userdata('kalp_role_id', $login[0]['role_id']);
          // $this->session->set_userdata('branch_id', $login[0]['branch_id']);
          header('location:'.base_url().'User/dashboard');
        }
      }
    }
    else{
      header('location:'.base_url().'User/dashboard');
    }
  }

/**************************      Dashboard      ********************************/
  public function dashboard(){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' && $kalp_company_id == ''){ header('location:'.base_url().'User'); }

    $this->load->view('Admin/Include/head');
    $this->load->view('Admin/Include/navbar');
    $this->load->view('Admin/User/dashboard');
    $this->load->view('Admin/Include/footer');
  }

/**************************      Company Information      ********************************/

  // Company List...
  public function company_list(){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' && $kalp_company_id == ''){ header('location:'.base_url().'User'); }

    $data['company_list'] = $this->Master_Model->get_list($kalp_company_id,'company_id','ASC','company');
    $this->load->view('Admin/Include/head', $data);
    $this->load->view('Admin/Include/navbar', $data);
    $this->load->view('Admin/User/company_list', $data);
    $this->load->view('Admin/Include/footer', $data);
  }

  // Edit Company...
  public function edit_company($company_id){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' && $kalp_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('company_name', 'company_name', 'trim|required');
    $this->form_validation->set_rules('company_address', 'company_address', 'trim|required');

    if ($this->form_validation->run() != FALSE) {
      $up_data = $_POST;
      $this->Master_Model->update_info('company_id', $company_id, 'company', $up_data);
      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'User/company_list');
    }
    $company_info = $this->Master_Model->get_info('company_id', $company_id, 'company');
    $data['country_list'] = $this->Master_Model->get_list('','country_name','ASC','country');
    $data['state_list'] = $this->Master_Model->get_list('','state_name','ASC','state');
    $data['district_list'] = $this->Master_Model->get_list('','district_name','ASC','district');

    $company_info = $this->Master_Model->get_info_arr('company_id',$company_id,'company');
    if(!$company_info){ header('location:'.base_url().'User/company_list'); }
    $data['update'] = 'update';
    $data['update_company'] = 'update';
    $data['company_info'] = $company_info[0];
    $data['act_link'] = base_url().'User/edit_company/'.$company_id;

    $this->load->view('Admin/Include/head', $data);
    $this->load->view('Admin/Include/navbar', $data);
    $this->load->view('Admin/User/company_information', $data);
    $this->load->view('Admin/Include/footer', $data);
  }


/*******************************    User Information      ****************************/

  // Add User...
  public function user_information(){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' || $kalp_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('user_name', 'First Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $user_status = $this->input->post('user_status');
      if(!isset($user_status)){ $user_status = '1'; }
      $save_data = $_POST;
      $save_data['user_status'] = $user_status;
      $save_data['company_id'] = $kalp_company_id;
      $save_data['user_addedby'] = $kalp_user_id;
      $user_id = $this->Master_Model->save_data('user', $save_data);

      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'User/user_information');
    }
    $data['role_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'role_status','1','','','','','role_id','ASC','role');

    $data['user_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'is_admin','0','','','','','user_id','ASC','user');
    $this->load->view('Admin/Include/head', $data);
    $this->load->view('Admin/Include/navbar', $data);
    $this->load->view('Admin/User/user_information', $data);
    $this->load->view('Admin/Include/footer', $data);
  }

  // Edit/Update Education Level...
  public function edit_user($user_id){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' || $kalp_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('user_name', 'First Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $user_status = $this->input->post('user_status');
      if(!isset($user_status)){ $user_status = '1'; }
      $update_data = $_POST;
      $update_data['user_status'] = $user_status;
      $update_data['user_addedby'] = $kalp_user_id;
      $this->Master_Model->update_info('user_id', $user_id, 'user', $update_data);

      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'User/user_information');
    }

    $user_info = $this->Master_Model->get_info_arr('user_id',$user_id,'user');
    if(!$user_info){ header('location:'.base_url().'User/user_information'); }
    $data['update'] = 'update';
    $data['update_user'] = 'update';
    $data['user_info'] = $user_info[0];
    $data['act_link'] = base_url().'User/edit_user/'.$user_id;

    $data['user_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'is_admin','0','','','','','user_id','ASC','user');
    $this->load->view('Admin/Include/head', $data);
    $this->load->view('Admin/Include/navbar', $data);
    $this->load->view('Admin/User/user_information', $data);
    $this->load->view('Admin/Include/footer', $data);
  }

  //Delete Education Level...
  public function delete_user($user_id){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' || $kalp_company_id == ''){ header('location:'.base_url().'User'); }
    $this->Master_Model->delete_info('user_id', $user_id, 'user');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'User/user_information');
  }


/*******************************    Role Information      ****************************/

  // Add Role...
  public function role(){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' || $kalp_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('role_name', 'Role Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $role_status = $this->input->post('role_status');
      if(!isset($role_status)){ $role_status = '1'; }
      $save_data = $_POST;
      $save_data['role_status'] = $role_status;
      $save_data['company_id'] = $kalp_company_id;
      $save_data['role_addedby'] = $kalp_user_id;
      $user_id = $this->Master_Model->save_data('role', $save_data);

      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'User/role');
    }

    $data['role_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'','','','','','','role_id','ASC','role');
    $this->load->view('Admin/Include/head', $data);
    $this->load->view('Admin/Include/navbar', $data);
    $this->load->view('Admin/User/role', $data);
    $this->load->view('Admin/Include/footer', $data);
  }

  // Edit/Update Role...
  public function edit_role($role_id){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' || $kalp_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('role_name', 'Role Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $role_status = $this->input->post('role_status');
      if(!isset($role_status)){ $role_status = '1'; }
      $update_data = $_POST;
      $update_data['role_status'] = $role_status;
      $update_data['role_addedby'] = $kalp_user_id;
      $this->Master_Model->update_info('role_id', $role_id, 'role', $update_data);

      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'User/role');
    }

    $role_info = $this->Master_Model->get_info_arr('role_id',$role_id,'role');
    if(!$role_info){ header('location:'.base_url().'User/role'); }
    $data['update'] = 'update';
    $data['update_role'] = 'update';
    $data['role_info'] = $role_info[0];
    $data['act_link'] = base_url().'User/edit_role/'.$role_id;

    $data['role_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'','','','','','','role_id','ASC','role');
    $this->load->view('Admin/Include/head', $data);
    $this->load->view('Admin/Include/navbar', $data);
    $this->load->view('Admin/User/role', $data);
    $this->load->view('Admin/Include/footer', $data);
  }

  //Delete Role...
  public function delete_role($role_id){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' || $kalp_company_id == ''){ header('location:'.base_url().'User'); }
    $this->Master_Model->delete_info('user_id', $user_id, 'user');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'User/role');
  }




/*******************************  Check Duplication  ****************************/
  public function check_duplication(){
    $column_name = $this->input->post('column_name');
    $column_val = $this->input->post('column_val');
    $table_name = $this->input->post('table_name');
    $company_id = '';
    $cnt = $this->Master_Model->check_duplication($company_id,$column_val,$column_name,$table_name);
    echo $cnt;
  }





}
?>
