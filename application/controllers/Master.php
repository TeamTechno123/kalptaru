<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Master extends CI_Controller{
    public function __construct(){
      parent::__construct();
      date_default_timezone_set('Asia/Kolkata');
    }

    public function index(){

    }


/********************************* Unit ***********************************/
  // Add Unit...
  public function unit(){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' || $kalp_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('unit_name', 'Unit Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $unit_status = $this->input->post('unit_status');
      if(!isset($unit_status)){ $unit_status = '1'; }
      $save_data = $_POST;
      $save_data['unit_status'] = $unit_status;
      $save_data['company_id'] = $kalp_company_id;
      $save_data['unit_addedby'] = $kalp_user_id;
      $user_id = $this->Master_Model->save_data('unit', $save_data);

      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Master/unit');
    }

    $data['unit_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'','','','','','','unit_id','ASC','unit');
    $this->load->view('Admin/Include/head', $data);
    $this->load->view('Admin/Include/navbar', $data);
    $this->load->view('Admin/Master/unit', $data);
    $this->load->view('Admin/Include/footer', $data);
  }

  // Edit/Update Unit...
  public function edit_unit($unit_id){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' || $kalp_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('unit_name', 'Unit Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $unit_status = $this->input->post('unit_status');
      if(!isset($unit_status)){ $unit_status = '1'; }
      $update_data = $_POST;
      $update_data['unit_status'] = $unit_status;
      $update_data['unit_addedby'] = $kalp_user_id;
      $this->Master_Model->update_info('unit_id', $unit_id, 'unit', $update_data);

      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Master/unit');
    }

    $unit_info = $this->Master_Model->get_info_arr('unit_id',$unit_id,'unit');
    if(!$unit_info){ header('location:'.base_url().'Master/unit'); }
    $data['update'] = 'update';
    $data['update_unit'] = 'update';
    $data['unit_info'] = $unit_info[0];
    $data['act_link'] = base_url().'Master/edit_unit/'.$unit_id;

    $data['unit_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'','','','','','','unit_id','ASC','unit');
    $this->load->view('Admin/Include/head', $data);
    $this->load->view('Admin/Include/navbar', $data);
    $this->load->view('Admin/Master/unit', $data);
    $this->load->view('Admin/Include/footer', $data);
  }

  //Delete Unit...
  public function delete_unit($unit_id){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' || $kalp_company_id == ''){ header('location:'.base_url().'User'); }
    $this->Master_Model->delete_info('unit_id', $unit_id, 'unit');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/unit');
  }


/********************************* GST Slab ***********************************/
  // Add GST Slab...
  public function gst(){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' || $kalp_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('gst_title', 'GST Slab Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $gst_status = $this->input->post('gst_status');
      if(!isset($gst_status)){ $gst_status = '1'; }
      $save_data = $_POST;
      $save_data['gst_status'] = $gst_status;
      $save_data['company_id'] = $kalp_company_id;
      $save_data['gst_addedby'] = $kalp_user_id;
      $user_id = $this->Master_Model->save_data('gst', $save_data);

      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Master/gst');
    }

    $data['gst_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'','','','','','','gst_id','ASC','gst');
    $this->load->view('Admin/Include/head', $data);
    $this->load->view('Admin/Include/navbar', $data);
    $this->load->view('Admin/Master/gst', $data);
    $this->load->view('Admin/Include/footer', $data);
  }

  // Edit/Update GST Slab...
  public function edit_gst($gst_id){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' || $kalp_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('gst_title', 'GST Slab Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $gst_status = $this->input->post('gst_status');
      if(!isset($gst_status)){ $gst_status = '1'; }
      $update_data = $_POST;
      $update_data['gst_status'] = $gst_status;
      $update_data['gst_addedby'] = $kalp_user_id;
      $this->Master_Model->update_info('gst_id', $gst_id, 'gst', $update_data);

      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Master/gst');
    }

    $gst_info = $this->Master_Model->get_info_arr('gst_id',$gst_id,'gst');
    if(!$gst_info){ header('location:'.base_url().'Master/gst'); }
    $data['update'] = 'update';
    $data['update_gst'] = 'update';
    $data['gst_info'] = $gst_info[0];
    $data['act_link'] = base_url().'Master/edit_gst/'.$gst_id;

    $data['gst_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'','','','','','','gst_id','ASC','gst');
    $this->load->view('Admin/Include/head', $data);
    $this->load->view('Admin/Include/navbar', $data);
    $this->load->view('Admin/Master/gst', $data);
    $this->load->view('Admin/Include/footer', $data);
  }

  //Delete GST Slab...
  public function delete_gst($gst_id){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' || $kalp_company_id == ''){ header('location:'.base_url().'User'); }
    $this->Master_Model->delete_info('gst_id', $gst_id, 'gst');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/gst');
  }


/********************************* SLider ***********************************/

  // Add Slider...
  public function slider(){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' && $kalp_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('slider_name', 'slider title', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $slider_status = $this->input->post('slider_status');
      if(!isset($slider_status)){ $slider_status = '1'; }
      $save_data = $_POST;
      $save_data['slider_status'] = $slider_status;
      $save_data['company_id'] = $kalp_company_id;
      $save_data['slider_addedby'] = $kalp_user_id;
      $slider_id = $this->Master_Model->save_data('slider', $save_data);

      if($_FILES['slider_image']['name']){
        $time = time();
        $image_name = 'slider_'.$slider_id.'_'.$time;
        $config['upload_path'] = 'assets/images/website/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = $image_name;
        $filename = $_FILES['slider_image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $this->upload->initialize($config); // if upload library autoloaded
        if ($this->upload->do_upload('slider_image') && $slider_id && $image_name && $ext && $filename){
          $slider_image_up['slider_image'] =  $image_name.'.'.$ext;
          $this->Master_Model->update_info('slider_id', $slider_id, 'slider', $slider_image_up);
          // unlink("assets/images/tours/".$slider_image_old);
          $this->session->set_flashdata('upload_success','File Uploaded Successfully');
        }
        else{
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('upload_error',$error);
        }
      }
      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Master/slider');
    }

    $data['slider_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'','','','','','','slider_id','DESC','slider');
    $this->load->view('Admin/Include/head', $data);
    $this->load->view('Admin/Include/navbar', $data);
    $this->load->view('Admin/Master/slider', $data);
    $this->load->view('Admin/Include/footer', $data);
  }

  // Edit Slider...
  public function edit_slider($slider_id){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' && $kalp_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('slider_name', 'slider title', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $slider_status = $this->input->post('slider_status');
      if(!isset($slider_status)){ $slider_status = '1'; }
      $update_data = $_POST;
      unset($update_data['old_slider_img']);
      $update_data['slider_status'] = $slider_status;
      $update_data['slider_addedby'] = $kalp_user_id;
      $this->Master_Model->update_info('slider_id', $slider_id, 'slider', $update_data);

      if($_FILES['slider_image']['name']){
        $time = time();
        $image_name = 'slider_'.$slider_id.'_'.$time;
        $config['upload_path'] = 'assets/images/website/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = $image_name;
        $filename = $_FILES['slider_image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $this->upload->initialize($config); // if upload library autoloaded
        if ($this->upload->do_upload('slider_image') && $slider_id && $image_name && $ext && $filename){
          $slider_image_up['slider_image'] =  $image_name.'.'.$ext;
          $this->Master_Model->update_info('slider_id', $slider_id, 'slider', $slider_image_up);
          if($_POST['old_slider_img']){ unlink("assets/images/website/".$_POST['old_slider_img']); }
          $this->session->set_flashdata('upload_success','File Uploaded Successfully');
        }
        else{
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('upload_error',$error);
        }
      }
      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Master/slider');
    }
    $slider_info = $this->Master_Model->get_info_arr('slider_id',$slider_id,'slider');
    if(!$slider_info){ header('location:'.base_url().'Master/slider'); }
    $data['update'] = 'update';
    $data['update_slider'] = 'update';
    $data['slider_info'] = $slider_info[0];
    $data['act_link'] = base_url().'Master/edit_slider/'.$slider_id;

    $data['slider_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'','','','','','','slider_id','DESC','slider');
    $this->load->view('Admin/Include/head', $data);
    $this->load->view('Admin/Include/navbar', $data);
    $this->load->view('Admin/Master/slider', $data);
    $this->load->view('Admin/Include/footer', $data);
  }

  // Delete Slider...
  public function delete_slider($slider_id){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' && $kalp_company_id == ''){ header('location:'.base_url().'User'); }
    $slider_info = $this->Master_Model->get_info_arr_fields('slider_image, slider_id', 'slider_id', $slider_id, 'slider');
    if($slider_info){
      $slider_image = $slider_info[0]['slider_image'];
      if($slider_image){ unlink("assets/images/website/".$slider_image); }
    }
    $this->Master_Model->delete_info('slider_id', $slider_id, 'slider');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/slider');
  }


/********************************* Testimonial ***********************************/

  // Add Testimonial...
  public function testimonial(){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' && $kalp_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('testimonial_name', 'testimonial title', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $testimonial_status = $this->input->post('testimonial_status');
      if(!isset($testimonial_status)){ $testimonial_status = '1'; }
      $save_data = $_POST;
      $save_data['testimonial_status'] = $testimonial_status;
      $save_data['company_id'] = $kalp_company_id;
      $save_data['testimonial_addedby'] = $kalp_user_id;
      $testimonial_id = $this->Master_Model->save_data('testimonial', $save_data);

      if($_FILES['testimonial_image']['name']){
        $time = time();
        $image_name = 'testimonial_'.$testimonial_id.'_'.$time;
        $config['upload_path'] = 'assets/images/website/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = $image_name;
        $filename = $_FILES['testimonial_image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $this->upload->initialize($config); // if upload library autoloaded
        if ($this->upload->do_upload('testimonial_image') && $testimonial_id && $image_name && $ext && $filename){
          $testimonial_image_up['testimonial_image'] =  $image_name.'.'.$ext;
          $this->Master_Model->update_info('testimonial_id', $testimonial_id, 'testimonial', $testimonial_image_up);
          // unlink("assets/images/tours/".$testimonial_image_old);
          $this->session->set_flashdata('upload_success','File Uploaded Successfully');
        }
        else{
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('upload_error',$error);
        }
      }
      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Master/testimonial');
    }

    $data['testimonial_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'','','','','','','testimonial_id','DESC','testimonial');
    $this->load->view('Admin/Include/head', $data);
    $this->load->view('Admin/Include/navbar', $data);
    $this->load->view('Admin/Master/testimonial', $data);
    $this->load->view('Admin/Include/footer', $data);
  }

  // Edit Testimonial...
  public function edit_testimonial($testimonial_id){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' && $kalp_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('testimonial_name', 'testimonial title', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $testimonial_status = $this->input->post('testimonial_status');
      if(!isset($testimonial_status)){ $testimonial_status = '1'; }
      $update_data = $_POST;
      unset($update_data['old_testimonial_img']);
      $update_data['testimonial_status'] = $testimonial_status;
      $update_data['testimonial_addedby'] = $kalp_user_id;
      $this->Master_Model->update_info('testimonial_id', $testimonial_id, 'testimonial', $update_data);

      if($_FILES['testimonial_image']['name']){
        $time = time();
        $image_name = 'testimonial_'.$testimonial_id.'_'.$time;
        $config['upload_path'] = 'assets/images/website/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = $image_name;
        $filename = $_FILES['testimonial_image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $this->upload->initialize($config); // if upload library autoloaded
        if ($this->upload->do_upload('testimonial_image') && $testimonial_id && $image_name && $ext && $filename){
          $testimonial_image_up['testimonial_image'] =  $image_name.'.'.$ext;
          $this->Master_Model->update_info('testimonial_id', $testimonial_id, 'testimonial', $testimonial_image_up);
          if($_POST['old_testimonial_img']){ unlink("assets/images/website/".$_POST['old_testimonial_img']); }
          $this->session->set_flashdata('upload_success','File Uploaded Successfully');
        }
        else{
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('upload_error',$error);
        }
      }
      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Master/testimonial');
    }
    $testimonial_info = $this->Master_Model->get_info_arr('testimonial_id',$testimonial_id,'testimonial');
    if(!$testimonial_info){ header('location:'.base_url().'Master/testimonial'); }
    $data['update'] = 'update';
    $data['update_testimonial'] = 'update';
    $data['testimonial_info'] = $testimonial_info[0];
    $data['act_link'] = base_url().'Master/edit_testimonial/'.$testimonial_id;

    $data['testimonial_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'','','','','','','testimonial_id','DESC','testimonial');
    $this->load->view('Admin/Include/head', $data);
    $this->load->view('Admin/Include/navbar', $data);
    $this->load->view('Admin/Master/testimonial', $data);
    $this->load->view('Admin/Include/footer', $data);
  }

  // Delete Testimonial...
  public function delete_testimonial($testimonial_id){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' && $kalp_company_id == ''){ header('location:'.base_url().'User'); }
    $testimonial_info = $this->Master_Model->get_info_arr_fields('testimonial_image, testimonial_id', 'testimonial_id', $testimonial_id, 'testimonial');
    if($testimonial_info){
      $testimonial_image = $testimonial_info[0]['testimonial_image'];
      if($testimonial_image){ unlink("assets/images/website/".$testimonial_image); }
    }
    $this->Master_Model->delete_info('testimonial_id', $testimonial_id, 'testimonial');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/testimonial');
  }


  /********************************* Gallery ***********************************/

    // Add Gallery...
    public function gallery(){
      $kalp_user_id = $this->session->userdata('kalp_user_id');
      $kalp_company_id = $this->session->userdata('kalp_company_id');
      $kalp_role_id = $this->session->userdata('kalp_role_id');
      if($kalp_user_id == '' && $kalp_company_id == ''){ header('location:'.base_url().'User'); }

      $this->form_validation->set_rules('gallery_name', 'gallery title', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $gallery_status = $this->input->post('gallery_status');
        if(!isset($gallery_status)){ $gallery_status = '1'; }
        $save_data = $_POST;
        $save_data['gallery_status'] = $gallery_status;
        $save_data['company_id'] = $kalp_company_id;
        $save_data['gallery_addedby'] = $kalp_user_id;
        $gallery_id = $this->Master_Model->save_data('gallery', $save_data);

        if($_FILES['gallery_image']['name']){
          $time = time();
          $image_name = 'gallery_'.$gallery_id.'_'.$time;
          $config['upload_path'] = 'assets/images/website/';
          $config['allowed_types'] = 'jpg|jpeg|png|gif';
          $config['file_name'] = $image_name;
          $filename = $_FILES['gallery_image']['name'];
          $ext = pathinfo($filename, PATHINFO_EXTENSION);
          $this->upload->initialize($config); // if upload library autoloaded
          if ($this->upload->do_upload('gallery_image') && $gallery_id && $image_name && $ext && $filename){
            $gallery_image_up['gallery_image'] =  $image_name.'.'.$ext;
            $this->Master_Model->update_info('gallery_id', $gallery_id, 'gallery', $gallery_image_up);
            // unlink("assets/images/tours/".$gallery_image_old);
            $this->session->set_flashdata('upload_success','File Uploaded Successfully');
          }
          else{
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('upload_error',$error);
          }
        }
        $this->session->set_flashdata('save_success','success');
        header('location:'.base_url().'Master/gallery');
      }

      $data['gallery_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'','','','','','','gallery_id','DESC','gallery');
      $this->load->view('Admin/Include/head', $data);
      $this->load->view('Admin/Include/navbar', $data);
      $this->load->view('Admin/Master/gallery', $data);
      $this->load->view('Admin/Include/footer', $data);
    }

    // Edit Gallery...
    public function edit_gallery($gallery_id){
      $kalp_user_id = $this->session->userdata('kalp_user_id');
      $kalp_company_id = $this->session->userdata('kalp_company_id');
      $kalp_role_id = $this->session->userdata('kalp_role_id');
      if($kalp_user_id == '' && $kalp_company_id == ''){ header('location:'.base_url().'User'); }

      $this->form_validation->set_rules('gallery_name', 'gallery title', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $gallery_status = $this->input->post('gallery_status');
        if(!isset($gallery_status)){ $gallery_status = '1'; }
        $update_data = $_POST;
        unset($update_data['old_gallery_img']);
        $update_data['gallery_status'] = $gallery_status;
        $update_data['gallery_addedby'] = $kalp_user_id;
        $this->Master_Model->update_info('gallery_id', $gallery_id, 'gallery', $update_data);

        if($_FILES['gallery_image']['name']){
          $time = time();
          $image_name = 'gallery_'.$gallery_id.'_'.$time;
          $config['upload_path'] = 'assets/images/website/';
          $config['allowed_types'] = 'jpg|jpeg|png|gif';
          $config['file_name'] = $image_name;
          $filename = $_FILES['gallery_image']['name'];
          $ext = pathinfo($filename, PATHINFO_EXTENSION);
          $this->upload->initialize($config); // if upload library autoloaded
          if ($this->upload->do_upload('gallery_image') && $gallery_id && $image_name && $ext && $filename){
            $gallery_image_up['gallery_image'] =  $image_name.'.'.$ext;
            $this->Master_Model->update_info('gallery_id', $gallery_id, 'gallery', $gallery_image_up);
            if($_POST['old_gallery_img']){ unlink("assets/images/website/".$_POST['old_gallery_img']); }
            $this->session->set_flashdata('upload_success','File Uploaded Successfully');
          }
          else{
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('upload_error',$error);
          }
        }
        $this->session->set_flashdata('update_success','success');
        header('location:'.base_url().'Master/gallery');
      }
      $gallery_info = $this->Master_Model->get_info_arr('gallery_id',$gallery_id,'gallery');
      if(!$gallery_info){ header('location:'.base_url().'Master/gallery'); }
      $data['update'] = 'update';
      $data['update_gallery'] = 'update';
      $data['gallery_info'] = $gallery_info[0];
      $data['act_link'] = base_url().'Master/edit_gallery/'.$gallery_id;

      $data['gallery_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'','','','','','','gallery_id','DESC','gallery');
      $this->load->view('Admin/Include/head', $data);
      $this->load->view('Admin/Include/navbar', $data);
      $this->load->view('Admin/Master/gallery', $data);
      $this->load->view('Admin/Include/footer', $data);
    }

    // Delete Gallery...
    public function delete_gallery($gallery_id){
      $kalp_user_id = $this->session->userdata('kalp_user_id');
      $kalp_company_id = $this->session->userdata('kalp_company_id');
      $kalp_role_id = $this->session->userdata('kalp_role_id');
      if($kalp_user_id == '' && $kalp_company_id == ''){ header('location:'.base_url().'User'); }
      $gallery_info = $this->Master_Model->get_info_arr_fields('gallery_image, gallery_id', 'gallery_id', $gallery_id, 'gallery');
      if($gallery_info){
        $gallery_image = $gallery_info[0]['gallery_image'];
        if($gallery_image){ unlink("assets/images/website/".$gallery_image); }
      }
      $this->Master_Model->delete_info('gallery_id', $gallery_id, 'gallery');
      $this->session->set_flashdata('delete_success','success');
      header('location:'.base_url().'Master/gallery');
    }

  // public function sub_category_information(){
  //   $kalp_user_id = $this->session->userdata('kalp_user_id');
  //   $kalp_company_id = $this->session->userdata('kalp_company_id');
  //   $kalp_role_id = $this->session->userdata('kalp_role_id');
  //   if($kalp_user_id == '' && $kalp_company_id == ''){ header('location:'.base_url().'User'); }
  //   $this->load->view('Include/head');
  //   $this->load->view('Include/navbar');
  //   $this->load->view('Master/sub_category_information');
  //   $this->load->view('Include/footer');
  // }

/*********************************************** Blog *********************************/

  // Add Blog....
  public function blog(){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' && $kalp_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('blog_title', 'Batch Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $blog_status = $this->input->post('blog_status');
      if(!isset($blog_status)){ $blog_status = '1'; }
      $save_data = $_POST;
      $save_data['blog_status'] = $blog_status;
      $save_data['company_id'] = $kalp_company_id;
      $save_data['blog_addedby'] = $kalp_user_id;
      $save_data['blog_date'] = date('d-m-Y');
      $save_data['blog_time'] = date('h:i:s A');
      $blog_id = $this->Master_Model->save_data('blog', $save_data);

      if($_FILES['blog_image']['name']){
        $time = time();
        $image_name = 'blog_'.$blog_id.'_'.$time;
        $config['upload_path'] = 'assets/images/blog/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = $image_name;
        $filename = $_FILES['blog_image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $this->upload->initialize($config); // if upload library autoloaded
        if ($this->upload->do_upload('blog_image') && $blog_id && $image_name && $ext && $filename){
          $blog_image_up['blog_image'] =  $image_name.'.'.$ext;
          $this->Master_Model->update_info('blog_id', $blog_id, 'blog', $blog_image_up);
          $this->session->set_flashdata('upload_success','File Uploaded Successfully');
        }
        else{
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('upload_error',$error);
        }
      }
      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Master/blog');
    }
    // $data['main_category_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'main_category_status','1','','','','','main_category_id','DESC','main_category');
    $data['blog_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'','','','','','','blog_id','DESC','blog');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Master/blog', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit/Update Blog...
  public function edit_blog($blog_id){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' && $kalp_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('blog_title', 'First Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $blog_status = $this->input->post('blog_status');
      if(!isset($blog_status)){ $blog_status = '1'; }
      $update_data = $_POST;
      unset($update_data['old_blog_image']);
      $update_data['blog_status'] = $blog_status;
      $update_data['blog_addedby'] = $kalp_user_id;
      $update_data['blog_date'] = date('d-m-Y');
      $update_data['blog_time'] = date('h:i:s A');
      $this->Master_Model->update_info('blog_id', $blog_id, 'blog', $update_data);

      if($_FILES['blog_image']['name']){
        $time = time();
        $image_name = 'blog_'.$blog_id.'_'.$time;
        $config['upload_path'] = 'assets/images/blog/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = $image_name;
        $filename = $_FILES['blog_image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $this->upload->initialize($config); // if upload library autoloaded
        if ($this->upload->do_upload('blog_image') && $blog_id && $image_name && $ext && $filename){
          $blog_image_up['blog_image'] =  $image_name.'.'.$ext;
          $this->Master_Model->update_info('blog_id', $blog_id, 'blog', $blog_image_up);
          if($_POST['old_blog_image']){ unlink("assets/images/blog/".$_POST['old_blog_image']); }
          $this->session->set_flashdata('upload_success','File Uploaded Successfully');
        }
        else{
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('upload_error',$error);
        }
      }

      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Master/blog');
    }

    $blog_info = $this->Master_Model->get_info_arr('blog_id',$blog_id,'blog');
    if(!$blog_info){ header('location:'.base_url().'Master/blog'); }
    $data['update'] = 'update';
    $data['update_blog'] = 'update';
    $data['blog_info'] = $blog_info[0];
    $data['act_link'] = base_url().'Master/edit_blog/'.$blog_id;

    // $data['main_category_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'main_category_status','1','','','','','main_category_id','DESC','main_category');
    $data['blog_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'','','','','','','blog_id','DESC','blog');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Master/blog', $data);
    $this->load->view('Include/footer', $data);
  }

  //Delete Blog....
  public function delete_blog($blog_id){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' && $kalp_company_id == ''){ header('location:'.base_url().'User'); }
    $blog_info = $this->Master_Model->get_info_arr_fields('blog_image, blog_id', 'blog_id', $blog_id, 'blog');
    if($blog_info){
      $blog_image = $blog_info[0]['blog_image'];
      if($blog_image){ unlink("assets/images/blog/".$blog_image); }
    }
    $this->Master_Model->delete_info('blog_id', $blog_id, 'blog');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/blog');
  }

/*********************************************** Product ******************************************/

  // Add Product....
  public function product(){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' && $kalp_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('product_name', 'Batch Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $product_status = $this->input->post('product_status');
      if(!isset($product_status)){ $product_status = '1'; }
      $save_data = $_POST;
      unset($save_data['attribute']);
      $save_data['product_status'] = $product_status;
      $save_data['company_id'] = $kalp_company_id;
      $save_data['product_addedby'] = $kalp_user_id;
      $product_id = $this->Master_Model->save_data('product', $save_data);

      foreach($_POST['attribute'] as $multi_data){
        $multi_data['product_id'] = $product_id;
        $multi_data['product_attribute_addedby'] = $kalp_user_id;
        $this->db->insert('product_attribute', $multi_data);
      }

      if($_FILES['product_image']['name']){
        $time = time();
        $image_name = 'product_'.$product_id.'_'.$time;
        $config['upload_path'] = 'assets/images/product/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = $image_name;
        $filename = $_FILES['product_image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $this->upload->initialize($config); // if upload library autoloaded
        if ($this->upload->do_upload('product_image') && $product_id && $image_name && $ext && $filename){
          $product_image_up['product_image'] =  $image_name.'.'.$ext;
          $this->Master_Model->update_info('product_id', $product_id, 'product', $product_image_up);
          $this->session->set_flashdata('upload_success','File Uploaded Successfully');
        }
        else{
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('upload_error',$error);
        }
      }
      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Master/product');
    }
    $data['gst_list'] = $this->Master_Model->get_list_by_id3('','gst_status','1','','','','','gst_id','ASC','gst');
    $data['main_category_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'main_category_status','1','','','','','main_category_id','DESC','main_category');
    $data['unit_list'] = $this->Master_Model->get_list_by_id3('','unit_status','1','','','','','unit_id','ASC','unit');

    $data['product_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'','','','','','','product_id','DESC','product');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Master/product', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit/Update Product...
  public function edit_product($product_id){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' && $kalp_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('product_name', 'First Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $product_status = $this->input->post('product_status');
      if(!isset($product_status)){ $product_status = '1'; }
      $update_data = $_POST;
      unset($update_data['attribute']);
      unset($update_data['old_product_image']);
      $update_data['product_status'] = $product_status;
      $update_data['product_addedby'] = $kalp_user_id;
      $this->Master_Model->update_info('product_id', $product_id, 'product', $update_data);


      foreach($_POST['attribute'] as $multi_data){
        if(isset($multi_data['product_attribute_id'])){
          $product_attribute_id = $multi_data['product_attribute_id'];
          if(!isset($multi_data['product_attribute_price'])){
            $this->Master_Model->delete_info('product_attribute_id', $product_attribute_id, 'product_attribute');
          }else{
            $multi_data['product_attribute_addedby'] = $kalp_user_id;
            $this->Master_Model->update_info('product_attribute_id', $product_attribute_id, 'product_attribute', $multi_data);
          }
        }
        else{
          $multi_data['product_id'] = $product_id;
          $multi_data['product_attribute_addedby'] = $kalp_user_id;
          $this->db->insert('product_attribute', $multi_data);
        }
      }
      if($_FILES['product_image']['name']){
        $time = time();
        $image_name = 'product_'.$product_id.'_'.$time;
        $config['upload_path'] = 'assets/images/product/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = $image_name;
        $filename = $_FILES['product_image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $this->upload->initialize($config); // if upload library autoloaded
        if ($this->upload->do_upload('product_image') && $product_id && $image_name && $ext && $filename){
          $product_image_up['product_image'] =  $image_name.'.'.$ext;
          $this->Master_Model->update_info('product_id', $product_id, 'product', $product_image_up);
          if($_POST['old_product_image']){ unlink("assets/images/product/".$_POST['old_product_image']); }
          $this->session->set_flashdata('upload_success','File Uploaded Successfully');
        }
        else{
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('upload_error',$error);
        }
      }

      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Master/product');
    }

    $product_info = $this->Master_Model->get_info_arr('product_id',$product_id,'product');
    if(!$product_info){ header('location:'.base_url().'Master/product'); }
    $data['update'] = 'update';
    $data['update_product'] = 'update';
    $data['product_info'] = $product_info[0];
    $data['act_link'] = base_url().'Master/edit_product/'.$product_id;

    $main_category_id = $product_info[0]['main_category_id'];
    $data['main_category_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'main_category_status','1','','','','','main_category_name','ASC','main_category');
    $data['sub_category_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'sub_category_status','1','main_category_id',$main_category_id,'','','sub_category_name','ASC','sub_category');
    $data['unit_list'] = $this->Master_Model->get_list_by_id3('','unit_status','1','','','','','unit_id','ASC','unit');
    $data['gst_list'] = $this->Master_Model->get_list_by_id3('','gst_status','1','','','','','gst_id','DESC','gst');

    $data['product_list'] = $this->Master_Model->get_list_by_id3($kalp_company_id,'','','','','','','product_id','DESC','product');
    $data['product_attribute_list'] = $this->Master_Model->get_list_by_id3('','product_id',$product_id,'','','','','product_attribute_id','ASC','product_attribute');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Master/product', $data);
    $this->load->view('Include/footer', $data);
  }

  //Delete Product....
  public function delete_product($product_id){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' && $kalp_company_id == ''){ header('location:'.base_url().'User'); }
    $product_info = $this->Master_Model->get_info_arr_fields('product_image, product_id', 'product_id', $product_id, 'product');
    if($product_info){
      $product_image = $product_info[0]['product_image'];
      if($product_image){ unlink("assets/images/product/".$product_image); }
    }
    $this->Master_Model->delete_info('product_id', $product_id, 'product');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/product');
  }

  public function order_list(){
    $kalp_user_id = $this->session->userdata('kalp_user_id');
    $kalp_company_id = $this->session->userdata('kalp_company_id');
    $kalp_role_id = $this->session->userdata('kalp_role_id');
    if($kalp_user_id == '' && $kalp_company_id == ''){ header('location:'.base_url().'User'); }
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Master/order_list');
    $this->load->view('Include/footer');
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
