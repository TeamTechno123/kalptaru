<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Website extends CI_Controller{
    public function __construct(){
      parent::__construct();
      date_default_timezone_set('Asia/Kolkata');
    }

    public function index(){
      $data['page_heading'] = "Home";
      // $this->load->view('Website/include/head', $data);
      // $this->load->view('Website/include/header', $data);
      // $this->load->view('Website/index', $data);
      // $this->load->view('Website/include/footer', $data);
    }

    // public function pharmacy_index(){
    //   $data['page_heading'] = "Pharmacy";
    //   $this->load->view('Website/include/head', $data);
    //   $this->load->view('Website/include/header', $data);
    //   $this->load->view('Website/pharmacy_index', $data);
    //   $this->load->view('Website/include/footer', $data);
    // }
    //
    // public function lab_index(){
    //   $data['page_heading'] = "Lab Tests";
    //   $this->load->view('Website/include/head', $data);
    //   $this->load->view('Website/include/header', $data);
    //   $this->load->view('Website/lab_index', $data);
    //   $this->load->view('Website/include/footer', $data);
    // }
  }
?>
