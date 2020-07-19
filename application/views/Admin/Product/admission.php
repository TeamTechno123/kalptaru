<!DOCTYPE html>
<html>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header pt-0 pb-2">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-left mt-2">
            <h4>Admission Form</h4>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card <?php if(!isset($update)){ echo 'collapsed-card'; } ?>">
              <div class="card-header">
                <h3 class="card-title"> <?php if(isset($update)){ echo 'Update'; } else{ echo 'Add New'; } ?> Admission</h3>
                <div class="card-tools">
                  <?php if(!isset($update)){
                    echo '<button type="button" class="btn btn-sm btn-primary" data-card-widget="collapse">Add New</button>';
                  } else{
                    echo '<a href="'.base_url().'Master/slider" type="button" class="btn btn-sm btn-outline-info" >Cancel Edit</a>';
                    // echo '<a href="'.base_url().'Product/admission" type="button" class="btn btn-sm btn-info-outline" >Cancel Edit</a>';
                  } ?>
                </div>
              </div>
              <!--  -->
                <div class="card-body px-0 py-0 " <?php if(isset($update)){ echo 'style="display: block;"'; } else{ echo 'style="display: none;"'; } ?>>
                  <form class="input_form m-0" id="form_action" role="form" action="" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="row p-4">
                      <div class="form-group col-md-12">
                        <label>Full Name of Student</label>
                        <input type="text" class="form-control form-control-sm" name="admission_name" id="admission_name" value="<?php if(isset($admission_info)){ echo $admission_info['admission_name']; } ?>"  placeholder="Enter Full Name of Student" required >
                      </div>
                      <div class="form-group col-md-12">
                        <label>Student Address</label>
                        <input type="text" class="form-control form-control-sm" name="admission_address" id="admission_address" value="<?php if(isset($admission_info)){ echo $admission_info['admission_address']; } ?>"  placeholder="Enter Student Address" required >
                      </div>

                      <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control form-control-sm" name="admission_email" id="admission_email" value="<?php if(isset($admission_info)){ echo $admission_info['admission_email']; } ?>" >
                      </div>
                      <div class="form-group col-md-6">
                        <label>Mobile</label>
                        <input type="number" class="form-control form-control-sm" name="admission_mobile" id="admission_mobile" value="<?php if(isset($admission_info)){ echo $admission_info['admission_mobile']; } ?>" required >
                      </div>

                      <div class="form-group col-md-6">
                        <label>Date of Birth</label>
                        <input type="text" class="form-control form-control-sm" name="admission_dob" value="<?php if(isset($admission_info)){ echo $admission_info['admission_dob']; } ?>" id="date1" data-target="#date1" data-toggle="datetimepicker" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Gender</label>
                        <select class="form-control form-control-sm" name="admission_gender" id="admission_gender" data-placeholder="Select Gender" required>
                          <option value="">Select Gender</option>
                          <option value="Male" <?php if(isset($admission_info) && $admission_info['admission_gender'] == 'Male'){ echo 'selected'; } ?>>Male</option>
                          <option value="Female" <?php if(isset($admission_info) && $admission_info['admission_gender'] == 'Female'){ echo 'selected'; } ?>>Female</option>
                          <!-- <option value="Other">Other</option> -->
                        </select>
                      </div>

                      <div class="form-group col-md-6 select_sm">
                        <label>Select Course Category</label>
                        <select class="form-control select2" name="course_category_id" id="course_category_id" data-placeholder="Select Course Category" required>
                          <option value="">Select Course Category</option>
                          <?php foreach ($course_category_list as $list1) { ?>
                            <option value="<?php echo  $list1->course_category_id; ?>" <?php if(isset($admission_info) && $admission_info['course_category_id'] == $list1->course_category_id){ echo 'selected'; } ?>><?php echo  $list1->course_category_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Select Course</label>
                        <select class="form-control select2" name="course_id" id="course_id" data-placeholder="Select Course " required>
                          <option value="">Select Course </option>
                          <?php if(isset($course_list)){ foreach ($course_list as $list1) { ?>
                            <option value="<?php echo  $list1->course_id; ?>" <?php if(isset($admission_info) && $admission_info['course_id'] == $list1->course_id){ echo 'selected'; } ?>><?php echo  $list1->course_name; ?></option>
                          <?php } } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-12">
                        <label>Candidate qualification with stream </label>
                        <textarea class="form-control form-control-sm"  name="admission_qualification" id="admission_qualification" placeholder=""><?php if(isset($admission_info)){ echo $admission_info['admission_qualification']; } ?></textarea>
                      </div>

                      <div class="form-group col-md-6 mt-3">
                        <label>Student Passport Photo</label>
                        <input type="file" class="form-control form-control-sm" name="admission_stud_image" id="admission_stud_image" >
                      </div>
                      <div class="form-group col-md-6 mt-3">
                        <?php if(isset($admission_info) && $admission_info['admission_stud_image']){ ?>
                          <label>Uploaded Passport Photo</label><br>
                          <img width="200px" src="<?php echo base_url() ?>assets/images/admission/<?php echo $admission_info['admission_stud_image'];  ?>" alt="Slider Image">
                          <input type="hidden" name="old_admission_stud_image" value="<?php echo $admission_info['admission_stud_image']; ?>">
                        <?php } ?>
                      </div>

                      <div class="form-group col-md-6 mt-3">
                        <label>Educational Document</label>
                        <input type="file" class="form-control form-control-sm" name="admission_edu_doc" id="admission_edu_doc" >
                      </div>
                      <div class="form-group col-md-6 mt-3">
                        <?php if(isset($admission_info) && $admission_info['admission_edu_doc']){ ?>
                          <label>Uploaded Educational Document</label><br>
                          <img width="200px" src="<?php echo base_url() ?>assets/images/admission/<?php echo $admission_info['admission_edu_doc'];  ?>" alt="Slider Image">
                          <input type="hidden" name="old_admission_edu_doc" value="<?php echo $admission_info['admission_edu_doc']; ?>">
                        <?php } ?>
                      </div>

                      <div class="form-group col-md-6 mt-3">
                        <label>Adhar Card</label>
                        <input type="file" class="form-control form-control-sm" name="admission_adhar_card" id="admission_adhar_card" >
                      </div>
                      <div class="form-group col-md-6 mt-3">
                        <?php if(isset($admission_info) && $admission_info['admission_adhar_card']){ ?>
                          <label>Uploaded Adhar Card</label><br>
                          <img width="200px" src="<?php echo base_url() ?>assets/images/admission/<?php echo $admission_info['admission_adhar_card'];  ?>" alt="Slider Image">
                          <input type="hidden" name="old_admission_adhar_card" value="<?php echo $admission_info['admission_adhar_card']; ?>">
                        <?php } ?>
                      </div>

                    </div>
                    <div class="card-footer clearfix" style="display: block;">
                      <div class="row">
                        <div class="col-md-6 text-left">
                          <!-- <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="course_status" id="course_status" value="0" <?php if(isset($admission_info) && $admission_info['course_status'] == 0){ echo 'checked'; } ?>>
                            <label for="course_status" class="custom-control-label">Disable This Admission</label>
                          </div> -->
                        </div>
                        <div class="col-md-6 text-right">
                          <a href="<?php base_url(); ?>Product/admission" class="btn btn-sm btn-default px-4 mx-4">Cancel</a>
                          <?php if(isset($update)){
                            echo '<button class="btn btn-sm btn-primary float-right px-4">Update</button>';
                          } else{
                            echo '<button class="btn btn-sm btn-success float-right px-4">Save</button>';
                          } ?>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
            </div>
          </div>


          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List All Admissions </h3>
              </div>
              <div class="card-body p-2">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="d-none">#</th>
                    <th class="wt_50">Action</th>
                    <th>Student Name</th>
                    <th class="wt_75">Mobile</th>
                    <th class="">Category</th>
                    <th class="">Course</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; foreach ($admission_list as $list) { $i++;
                      $course_category_details = $this->Master_Model->get_info_arr_fields('course_category_name','course_category_id', $list->course_category_id, 'course_category');
                      $course_details = $this->Master_Model->get_info_arr_fields('course_name','course_id', $list->course_id, 'course');
                    ?>
                    <tr>
                      <td class="d-none"><?php echo $i; ?></td>
                      <td class="text-center">
                        <div class="btn-group">
                          <a href="<?php echo base_url() ?>Product/edit_admission/<?php echo $list->admission_id; ?>" type="button" class="btn btn-sm btn-default"><i class="fa fa-edit text-primary"></i></a>
                          <a href="<?php echo base_url() ?>Product/delete_admission/<?php echo $list->admission_id; ?>" type="button" class="btn btn-sm btn-default" onclick="return confirm('Delete this Sub Category Information');"><i class="fa fa-trash text-danger"></i></a>
                        </div>
                      </td>
                      <td><?php echo $list->admission_name; ?></td>
                      <td><?php echo $list->admission_mobile; ?></td>
                      <td><?php if($course_category_details){ echo $course_category_details[0]['course_category_name']; } ?></td>
                      <td><?php if($course_details){ echo $course_details[0]['course_name']; } ?></td>



                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>
</html>

<script type="text/javascript">
  $("#course_category_id").on("change", function(){
    var course_category_id =  $('#course_category_id').find("option:selected").val();
    $.ajax({
      url:'<?php echo base_url(); ?>Product/get_course_by_id',
      type: 'POST',
      data: {"course_category_id":course_category_id},
      context: this,
      success: function(result){
        $('#course_id').html(result);
      }
    });
  });

  // $("#sub_category_id").on("change", function(){
  //   var sub_category_id =  $('#sub_category_id').find("option:selected").val();
  //   $.ajax({
  //     url:'<?php echo base_url(); ?>Product/get_sub_category_two_by_sub',
  //     type: 'POST',
  //     data: {"sub_category_id":sub_category_id},
  //     context: this,
  //     success: function(result){
  //       $('#sub_category_two_id').html(result);
  //     }
  //   });
  // });

</script>
