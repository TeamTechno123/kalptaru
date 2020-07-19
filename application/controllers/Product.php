<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller{
  public function __construct(){
    parent::__construct();
    date_default_timezone_set('Asia/Kolkata');
  }

  public function index(){

  }

/*********************************** Course Category *********************************/

  // Add Course Category....
  public function course_category(){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' && $kalp_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('course_category_name', 'Course Category', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $course_category_status = $this->input->post('course_category_status');
      if(!isset($course_category_status)){ $course_category_status = '1'; }
      $save_data = $_POST;
      $save_data['course_category_status'] = $course_category_status;
      $save_data['company_id'] = $kalp_company_id;
      $save_data['course_category_addedby'] = $kalp_user_id;
      $course_category_id = $this->Master_Model->save_data('course_category', $save_data);

      if($_FILES['course_category_image']['name']){
        $time = time();
        $image_name = 'course_category_'.$course_category_id.'_'.$time;
        $config['upload_path'] = 'assets/images/category/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = $image_name;
        $filename = $_FILES['course_category_image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $this->upload->initialize($config); // if upload library autoloaded
        if ($this->upload->do_upload('course_category_image') && $course_category_id && $image_name && $ext && $filename){
          $course_category_image_up['course_category_image'] =  $image_name.'.'.$ext;
          $this->Master_Model->update_info('course_category_id', $course_category_id, 'course_category', $course_category_image_up);
          $this->session->set_flashdata('upload_success','File Uploaded Successfully');
        }
        else{
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('upload_error',$error);
        }
      }
      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Product/course_category');
    }

    $data['course_category_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'','','','','','','course_category_id','DESC','course_category');
    $this->load->view('Admin/Include/head', $data);
    $this->load->view('Admin/Include/navbar', $data);
    $this->load->view('Admin/Product/course_category', $data);
    $this->load->view('Admin/Include/footer', $data);
  }

  // Edit/Update Course Category...
  public function edit_course_category($course_category_id){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' && $kalp_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('course_category_name', 'Course Category', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $course_category_status = $this->input->post('course_category_status');
      if(!isset($course_category_status)){ $course_category_status = '1'; }
      $update_data = $_POST;
      unset($update_data['old_course_category_img']);
      $update_data['course_category_status'] = $course_category_status;
      $update_data['course_category_addedby'] = $kalp_user_id;
      $this->Master_Model->update_info('course_category_id', $course_category_id, 'course_category', $update_data);

      if($_FILES['course_category_image']['name']){
        $time = time();
        $image_name = 'course_category_'.$course_category_id.'_'.$time;
        $config['upload_path'] = 'assets/images/category/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = $image_name;
        $filename = $_FILES['course_category_image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $this->upload->initialize($config); // if upload library autoloaded
        if ($this->upload->do_upload('course_category_image') && $course_category_id && $image_name && $ext && $filename){
          $course_category_image_up['course_category_image'] =  $image_name.'.'.$ext;
          $this->Master_Model->update_info('course_category_id', $course_category_id, 'course_category', $course_category_image_up);
          if($_POST['old_course_category_img']){ unlink("assets/images/category/".$_POST['old_course_category_img']); }
          $this->session->set_flashdata('upload_success','File Uploaded Successfully');
        }
        else{
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('upload_error',$error);
        }
      }

      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Product/course_category');
    }

    $course_category_info = $this->Master_Model->get_info_arr('course_category_id',$course_category_id,'course_category');
    if(!$course_category_info){ header('location:'.base_url().'Product/course_category'); }
    $data['update'] = 'update';
    $data['update_course_category'] = 'update';
    $data['course_category_info'] = $course_category_info[0];
    $data['act_link'] = base_url().'Product/edit_course_category/'.$course_category_id;

    $data['course_category_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'','','','','','','course_category_id','DESC','course_category');
    $this->load->view('Admin/Include/head', $data);
    $this->load->view('Admin/Include/navbar', $data);
    $this->load->view('Admin/Product/course_category', $data);
    $this->load->view('Admin/Include/footer', $data);
  }

  //Delete Course Category...
  public function delete_course_category($course_category_id){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' && $kalp_company_id == ''){ header('location:'.base_url().'User'); }
    $course_category_info = $this->Master_Model->get_info_arr_fields('course_category_image, course_category_id', 'course_category_id', $course_category_id, 'course_category');
    if($course_category_info){
      $course_category_image = $course_category_info[0]['course_category_image'];
      if($course_category_image){ unlink("assets/images/category/".$course_category_image); }
    }
    $this->Master_Model->delete_info('course_category_id', $course_category_id, 'course_category');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Product/course_category');
  }


/********************************************** Course **********************************/

  // Add Course....
  public function course(){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' && $kalp_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('course_name', 'Batch Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $course_status = $this->input->post('course_status');
      if(!isset($course_status)){ $course_status = '1'; }

      $save_data = $_POST;
      $save_data['course_status'] = $course_status;
      $save_data['company_id'] = $kalp_company_id;
      $save_data['course_addedby'] = $kalp_user_id;
      $course_id = $this->Master_Model->save_data('course', $save_data);

      if($_FILES['course_image']['name']){
        $time = time();
        $image_name = 'course_'.$course_id.'_'.$time;
        $config['upload_path'] = 'assets/images/course/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = $image_name;
        $filename = $_FILES['course_image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $this->upload->initialize($config); // if upload library autoloaded
        if ($this->upload->do_upload('course_image') && $course_id && $image_name && $ext && $filename){
          $course_image_up['course_image'] =  $image_name.'.'.$ext;
          $this->Master_Model->update_info('course_id', $course_id, 'course', $course_image_up);
          $this->session->set_flashdata('upload_success','File Uploaded Successfully');
        }
        else{
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('upload_error',$error);
        }
      }
      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Product/course');
    }
    $data['course_category_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'course_category_status','1','','','','','course_category_name','ASC','course_category');
    $data['course_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'','','','','','','course_id','DESC','course');
    $this->load->view('Admin/Include/head', $data);
    $this->load->view('Admin/Include/navbar', $data);
    $this->load->view('Admin/Product/course', $data);
    $this->load->view('Admin/Include/footer', $data);
  }

  // Edit/Update Course...
  public function edit_course($course_id){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' && $kalp_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('course_name', 'First Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $course_status = $this->input->post('course_status');
      if(!isset($course_status)){ $course_status = '1'; }

      $update_data = $_POST;

      unset($update_data['old_course_img']);
      $update_data['course_status'] = $course_status;
      $update_data['course_addedby'] = $kalp_user_id;
      $this->Master_Model->update_info('course_id', $course_id, 'course', $update_data);

      if($_FILES['course_image']['name']){
        $time = time();
        $image_name = 'course_'.$course_id.'_'.$time;
        $config['upload_path'] = 'assets/images/course/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = $image_name;
        $filename = $_FILES['course_image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $this->upload->initialize($config); // if upload library autoloaded
        if ($this->upload->do_upload('course_image') && $course_id && $image_name && $ext && $filename){
          $course_image_up['course_image'] =  $image_name.'.'.$ext;
          $this->Master_Model->update_info('course_id', $course_id, 'course', $course_image_up);
          if($_POST['old_course_img']){ unlink("assets/images/course/".$_POST['old_course_img']); }
          $this->session->set_flashdata('upload_success','File Uploaded Successfully');
        }
        else{
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('upload_error',$error);
        }
      }

      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Product/course');
    }

    $course_info = $this->Master_Model->get_info_arr('course_id',$course_id,'course');
    if(!$course_info){ header('location:'.base_url().'Product/course'); }
    $data['update'] = 'update';
    $data['update_course'] = 'update';
    $data['course_info'] = $course_info[0];
    $data['act_link'] = base_url().'Product/edit_course/'.$course_id;
    $data['course_category_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'course_category_status','1','','','','','course_category_name','ASC','course_category');
    $data['course_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'','','','','','','course_id','DESC','course');
    $this->load->view('Admin/Include/head', $data);
    $this->load->view('Admin/Include/navbar', $data);
    $this->load->view('Admin/Product/course', $data);
    $this->load->view('Admin/Include/footer', $data);
  }

  //Delete Course....
  public function delete_course($course_id){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' && $kalp_company_id == ''){ header('location:'.base_url().'User'); }
    $course_info = $this->Master_Model->get_info_arr_fields('course_image, course_id', 'course_id', $course_id, 'course');
    if($course_info){
      $course_image = $course_info[0]['course_image'];
      if($course_image){ unlink("assets/images/course/".$course_image); }
    }
    $this->Master_Model->delete_info('course_id', $course_id, 'course');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Product/course');
  }

  /********************************************** Admission Form **********************************/

    // Add Admission Form....
    public function admission(){
      $kalp_user_id = $this->session->userdata('kalp_user_id');
      $kalp_company_id = $this->session->userdata('kalp_company_id');
      $kalp_role_id = $this->session->userdata('kalp_role_id');
      if($kalp_user_id == '' && $kalp_company_id == ''){ header('location:'.base_url().'User'); }

      $this->form_validation->set_rules('admission_name', 'Batch Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        // $admission_status = $this->input->post('admission_status');
        // if(!isset($admission_status)){ $admission_status = '1'; }

        $save_data = $_POST;
        // $save_data['admission_status'] = $admission_status;
        $save_data['company_id'] = $kalp_company_id;
        $save_data['admission_addedby'] = $kalp_user_id;
        $admission_id = $this->Master_Model->save_data('admission', $save_data);

        if($_FILES['admission_stud_image']['name']){
          $time = time();
          $image_name = 'admission_stud_image_'.$admission_id.'_'.$time;
          $config['upload_path'] = 'assets/images/admission/';
          $config['allowed_types'] = 'jpg|jpeg|png|gif';
          $config['file_name'] = $image_name;
          $filename = $_FILES['admission_stud_image']['name'];
          $ext = pathinfo($filename, PATHINFO_EXTENSION);
          $this->upload->initialize($config); // if upload library autoloaded
          if ($this->upload->do_upload('admission_stud_image') && $admission_id && $image_name && $ext && $filename){
            $admission_stud_image_up['admission_stud_image'] =  $image_name.'.'.$ext;
            $this->Master_Model->update_info('admission_id', $admission_id, 'admission', $admission_stud_image_up);
            $this->session->set_flashdata('upload_success','File Uploaded Successfully');
          }
          else{
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('upload_error',$error);
          }
        }

        if($_FILES['admission_edu_doc']['name']){
          $time = time();
          $image_name = 'admission_edu_doc_'.$admission_id.'_'.$time;
          $config['upload_path'] = 'assets/images/admission/';
          $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
          $config['file_name'] = $image_name;
          $filename = $_FILES['admission_edu_doc']['name'];
          $ext = pathinfo($filename, PATHINFO_EXTENSION);
          $this->upload->initialize($config); // if upload library autoloaded
          if ($this->upload->do_upload('admission_edu_doc') && $admission_id && $image_name && $ext && $filename){
            $admission_edu_doc_up['admission_edu_doc'] =  $image_name.'.'.$ext;
            $this->Master_Model->update_info('admission_id', $admission_id, 'admission', $admission_edu_doc_up);
            $this->session->set_flashdata('upload_success','File Uploaded Successfully');
          }
          else{
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('upload_error',$error);
          }
        }

        if($_FILES['admission_adhar_card']['name']){
          $time = time();
          $image_name = 'admission_adhar_card_'.$admission_id.'_'.$time;
          $config['upload_path'] = 'assets/images/admission/';
          $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
          $config['file_name'] = $image_name;
          $filename = $_FILES['admission_adhar_card']['name'];
          $ext = pathinfo($filename, PATHINFO_EXTENSION);
          $this->upload->initialize($config); // if upload library autoloaded
          if ($this->upload->do_upload('admission_adhar_card') && $admission_id && $image_name && $ext && $filename){
            $admission_adhar_card_up['admission_adhar_card'] =  $image_name.'.'.$ext;
            $this->Master_Model->update_info('admission_id', $admission_id, 'admission', $admission_adhar_card_up);
            $this->session->set_flashdata('upload_success','File Uploaded Successfully');
          }
          else{
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('upload_error',$error);
          }
        }


        $this->session->set_flashdata('save_success','success');
        header('location:'.base_url().'Product/admission');
      }
      $data['course_category_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'course_category_status','1','','','','','course_category_name','ASC','course_category');
      $data['admission_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'','','','','','','admission_id','DESC','admission');
      $this->load->view('Admin/Include/head', $data);
      $this->load->view('Admin/Include/navbar', $data);
      $this->load->view('Admin/Product/admission', $data);
      $this->load->view('Admin/Include/footer', $data);
    }

    // Edit/Update Admission Form...
    public function edit_admission($admission_id){
      $kalp_user_id = $this->session->userdata('kalp_user_id');
      $kalp_company_id = $this->session->userdata('kalp_company_id');
      $kalp_role_id = $this->session->userdata('kalp_role_id');
      if($kalp_user_id == '' && $kalp_company_id == ''){ header('location:'.base_url().'User'); }

      $this->form_validation->set_rules('admission_name', 'First Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        // $admission_status = $this->input->post('admission_status');
        // if(!isset($admission_status)){ $admission_status = '1'; }

        $update_data = $_POST;
        unset($update_data['old_admission_img']);
        // $update_data['admission_status'] = $admission_status;
        $update_data['admission_addedby'] = $kalp_user_id;
        $this->Master_Model->update_info('admission_id', $admission_id, 'admission', $update_data);

        if($_FILES['admission_stud_image']['name']){
          $time = time();
          $image_name = 'admission_stud_image_'.$admission_id.'_'.$time;
          $config['upload_path'] = 'assets/images/admission/';
          $config['allowed_types'] = 'jpg|jpeg|png|gif';
          $config['file_name'] = $image_name;
          $filename = $_FILES['admission_stud_image']['name'];
          $ext = pathinfo($filename, PATHINFO_EXTENSION);
          $this->upload->initialize($config); // if upload library autoloaded
          if ($this->upload->do_upload('admission_stud_image') && $admission_id && $image_name && $ext && $filename){
            $admission_stud_image_up['admission_stud_image'] =  $image_name.'.'.$ext;
            $this->Master_Model->update_info('admission_id', $admission_id, 'admission', $admission_stud_image_up);
            if($_POST['old_admission_stud_image']){ unlink("assets/images/admission/".$_POST['old_admission_stud_image']); }
            $this->session->set_flashdata('upload_success','File Uploaded Successfully');
          }
          else{
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('upload_error',$error);
          }
        }

        if($_FILES['admission_edu_doc']['name']){
          $time = time();
          $image_name = 'admission_edu_doc_'.$admission_id.'_'.$time;
          $config['upload_path'] = 'assets/images/admission/';
          $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
          $config['file_name'] = $image_name;
          $filename = $_FILES['admission_edu_doc']['name'];
          $ext = pathinfo($filename, PATHINFO_EXTENSION);
          $this->upload->initialize($config); // if upload library autoloaded
          if ($this->upload->do_upload('admission_edu_doc') && $admission_id && $image_name && $ext && $filename){
            $admission_edu_doc_up['admission_edu_doc'] =  $image_name.'.'.$ext;
            $this->Master_Model->update_info('admission_id', $admission_id, 'admission', $admission_edu_doc_up);
            if($_POST['old_admission_edu_doc']){ unlink("assets/images/admission/".$_POST['old_admission_edu_doc']); }
            $this->session->set_flashdata('upload_success','File Uploaded Successfully');
          }
          else{
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('upload_error',$error);
          }
        }

        if($_FILES['admission_adhar_card']['name']){
          $time = time();
          $image_name = 'admission_adhar_card_'.$admission_id.'_'.$time;
          $config['upload_path'] = 'assets/images/admission/';
          $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
          $config['file_name'] = $image_name;
          $filename = $_FILES['admission_adhar_card']['name'];
          $ext = pathinfo($filename, PATHINFO_EXTENSION);
          $this->upload->initialize($config); // if upload library autoloaded
          if ($this->upload->do_upload('admission_adhar_card') && $admission_id && $image_name && $ext && $filename){
            $admission_adhar_card_up['admission_adhar_card'] =  $image_name.'.'.$ext;
            $this->Master_Model->update_info('admission_id', $admission_id, 'admission', $admission_adhar_card_up);
            if($_POST['old_admission_adhar_card']){ unlink("assets/images/admission/".$_POST['old_admission_adhar_card']); }
            $this->session->set_flashdata('upload_success','File Uploaded Successfully');
          }
          else{
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('upload_error',$error);
          }
        }

        $this->session->set_flashdata('update_success','success');
        header('location:'.base_url().'Product/admission');
      }

      $admission_info = $this->Master_Model->get_info_arr('admission_id',$admission_id,'admission');
      if(!$admission_info){ header('location:'.base_url().'Product/admission'); }
      $data['update'] = 'update';
      $data['update_admission'] = 'update';
      $data['admission_info'] = $admission_info[0];
      $data['act_link'] = base_url().'Product/edit_admission/'.$admission_id;
      $course_category_id = $admission_info[0]['course_category_id'];
      $data['course_category_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'course_category_status','1','','','','','course_category_name','ASC','course_category');
      $data['course_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'course_status','1','course_category_id',$course_category_id,'','','course_name','ASC','course');

      $data['admission_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'','','','','','','admission_id','DESC','admission');
      $this->load->view('Admin/Include/head', $data);
      $this->load->view('Admin/Include/navbar', $data);
      $this->load->view('Admin/Product/admission', $data);
      $this->load->view('Admin/Include/footer', $data);
    }

    //Delete Admission Form....
    public function delete_admission($admission_id){
      $kalp_user_id = $this->session->userdata('kalp_user_id');
      $kalp_company_id = $this->session->userdata('kalp_company_id');
      $kalp_role_id = $this->session->userdata('kalp_role_id');
      if($kalp_user_id == '' && $kalp_company_id == ''){ header('location:'.base_url().'User'); }
      $admission_info = $this->Master_Model->get_info_arr_fields('admission_stud_image, admission_id', 'admission_id', $admission_id, 'admission');
      if($admission_info){
        $admission_stud_image = $admission_info[0]['admission_stud_image'];
        if($admission_stud_image){ unlink("assets/images/admission/".$admission_stud_image); }
        $admission_edu_doc = $admission_info[0]['admission_edu_doc'];
        if($admission_edu_doc){ unlink("assets/images/admission/".$admission_edu_doc); }
        $admission_adhar_card = $admission_info[0]['admission_adhar_card'];
        if($admission_adhar_card){ unlink("assets/images/admission/".$admission_adhar_card); }
      }
      $this->Master_Model->delete_info('admission_id', $admission_id, 'admission');
      $this->session->set_flashdata('delete_success','success');
      header('location:'.base_url().'Product/admission');
    }

/*************************************************************************************************/
// Add Course....
public function admission_enquiry(){
  $kalp_user_id = $this->session->userdata('kalp_user_id');
  $kalp_company_id = $this->session->userdata('kalp_company_id');
  $kalp_role_id = $this->session->userdata('kalp_role_id');
  if($kalp_user_id == '' && $kalp_company_id == ''){ header('location:'.base_url().'User'); }
  $data['page'] = 'admission_enquiry';
  // $data['admission_enquiry_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'admission_enquiry_status','1','','','','','admission_enquiry_name','ASC','admission_enquiry');
  $this->load->view('Admin/Include/head', $data);
  $this->load->view('Admin/Include/navbar', $data);
  $this->load->view('Admin/Product/admission_enquiry', $data);
  $this->load->view('Admin/Include/footer', $data);
}

/***************************************************************************************************************/
  public function get_course_by_id(){
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $course_category_id = $this->input->post('course_category_id');
    $course_list = $this->Master_Model->get_list_by_id3($kalp_company_id,'course_category_id',$course_category_id,'','','','','course_name','ASC','course');
    echo '<option value="" selected >Select Course</option>';
    foreach ($course_list as $course_list1) {
      echo '<option value="'.$course_list1->course_id.'">'.$course_list1->course_name.'</option>';
    }
  }

  public function get_sub_category_two_by_sub(){
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $sub_category_id = $this->input->post('sub_category_id');
    $sub_category_list = $this->Master_Model->get_list_by_id3($kalp_company_id,'sub_category_id',$sub_category_id,'','','','','sub_category_two_name','ASC','sub_category_two');
    echo '<option value="" selected >Select Sub Category (Level-2)</option>';
    foreach ($sub_category_list as $sub_category_list1) {
      echo '<option value="'.$sub_category_list1->sub_category_two_id.'">'.$sub_category_list1->sub_category_two_name.'</option>';
    }
  }

}
