<?php
  $kalp_user_id = $this->session->userdata('kalp_user_id');
  $kalp_company_id = $this->session->userdata('kalp_company_id');
  $kalp_role_id = $this->session->userdata('kalp_role_id');
  $company_info = $this->Master_Model->get_info_arr_fields('company_name','company_id', $kalp_company_id, 'company');
  $user_info = $this->Master_Model->get_info_arr_fields('user_name','user_id', $kalp_user_id, 'user');
?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url(); ?>User/logout">
        <i class="fas fa-sign-out-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
  </ul>
</nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light"><?php echo $company_info[0]['company_name']; ?></span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $user_info[0]['user_name']; ?></a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>User/dashboard" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link head">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Company
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a <?php if(isset($update_company)){ echo 'href="'.$act_link.'"'; } else{ ?> href="<?php echo base_url(); ?>User/company_list" <?php } ?> class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Company Information</p>
              </a>
            </li>
            <li class="nav-item">
              <a <?php if(isset($update_user)){ echo 'href="'.$act_link.'"'; } else{ ?> href="<?php echo base_url(); ?>User/user_information" <?php } ?> class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>User</p>
              </a>
            </li>
            <li class="nav-item">
              <a <?php if(isset($update_role)){ echo 'href="'.$act_link.'"'; } else{ ?> href="<?php echo base_url(); ?>User/role" <?php } ?> class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Role</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- <li class="nav-item has-treeview">
          <a href="#" class="nav-link head">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Master
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a <?php if(isset($update_unit)){ echo 'href="'.$act_link.'"'; } else{ ?> href="<?php echo base_url(); ?>Master/unit" <?php } ?> class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Unit</p>
              </a>
            </li>
            <li class="nav-item">
              <a <?php if(isset($update_gst)){ echo 'href="'.$act_link.'"'; } else{ ?> href="<?php echo base_url(); ?>Master/gst" <?php } ?> class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>GST Slab</p>
              </a>
            </li>
          </ul>
        </li> -->

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link head">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Website
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a <?php if(isset($update_slider)){ echo 'href="'.$act_link.'"'; } else{ ?> href="<?php echo base_url(); ?>Master/slider" <?php } ?> class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Slider</p>
              </a>
            </li>
            <li class="nav-item">
              <a <?php if(isset($update_testimonial)){ echo 'href="'.$act_link.'"'; } else{ ?> href="<?php echo base_url(); ?>Master/testimonial" <?php } ?> class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Testimonial</p>
              </a>
            </li>
            <li class="nav-item">
              <a <?php if(isset($update_gallery)){ echo 'href="'.$act_link.'"'; } else{ ?> href="<?php echo base_url(); ?>Master/gallery" <?php } ?> class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Gallery</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link head">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Course
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a <?php if(isset($update_course_category)){ echo 'href="'.$act_link.'"'; } else{ ?> href="<?php echo base_url(); ?>Product/course_category" <?php } ?> class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Course Category</p>
              </a>
            </li>
            <li class="nav-item">
              <a <?php if(isset($update_course)){ echo 'href="'.$act_link.'"'; } else{ ?> href="<?php echo base_url(); ?>Product/course" <?php } ?> class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Course</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="<?php echo base_url(); ?>Product/admission" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>Admission</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>Product/admission_enquiry" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>Admission Enquiries</p>
          </a>
        </li>

      </nav>
    <!-- /.sidebar-menu -->
    </div>
  <!-- /.sidebar -->
  </aside>
