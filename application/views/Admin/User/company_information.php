<!DOCTYPE html>
<html>
<?php
  $page = "company_information";
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center mt-2">
            <h1>Company Information</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10 offset-md-1">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Company Information</h3>
              </div>
              <form class="input_form" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="card-body row">
                  <div class="form-group col-md-12">
                    <label>Company Name</label>
                    <input type="text" class="form-control form-control-sm" name="company_name" id="company_name" value="<?php if(isset($company_info)){ echo $company_info['company_name']; } ?>" placeholder="Enter Company Name" required>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Address</label>
                    <textarea class="form-control form-control-sm" rows="3" name="company_address" id="company_address" placeholder="Enter Company Address" required><?php if(isset($company_info)){ echo $company_info['company_address']; } ?></textarea>
                  </div>
                  <div class="form-group col-md-4 select_sm">
                    <label>Select Country</label>
                    <select class="form-control select2" name="country_id" id="country_id" data-placeholder="Select Country" required>
                      <option value="">Select Country</option>
                      <?php if(isset($country_list)){ foreach ($country_list as $list) { ?>
                      <option value="<?php echo $list->country_id; ?>" <?php if(isset($company_info) && $company_info['country_id'] == $list->country_id){ echo 'selected'; } ?>><?php echo $list->country_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4 select_sm">
                    <label>Select State</label>
                    <select class="form-control select2" name="state_id" id="state_id" data-placeholder="Select State" required>
                      <option value="">Select State</option>
                      <?php if(isset($state_list)){ foreach ($state_list as $list) { ?>
                      <option value="<?php echo $list->state_id; ?>" <?php if(isset($company_info) && $company_info['state_id'] == $list->state_id){ echo 'selected'; } ?>><?php echo $list->state_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4 select_sm">
                    <label>Select District</label>
                    <select class="form-control select2" name="district_id" id="district_id" data-placeholder="Select District" required>
                      <option value="">Select District</option>
                      <?php if(isset($district_list)){ foreach ($district_list as $list) { ?>
                      <option value="<?php echo $list->district_id; ?>" <?php if(isset($company_info) && $company_info['district_id'] == $list->district_id){ echo 'selected'; } ?>><?php echo $list->district_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Statecode</label>
                    <input type="number" class="form-control form-control-sm" name="company_statecode" id="company_statecode" value="<?php if(isset($company_info)){ echo $company_info['company_statecode']; } ?>" placeholder="Statecode">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Pin/Zip Code</label>
                    <input type="number" class="form-control form-control-sm" name="company_pincode" id="company_pincode" value="<?php if(isset($company_info)){ echo $company_info['company_pincode']; } ?>" placeholder="Pin/Zip Code">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Mobile No. 1</label>
                    <input type="number" class="form-control form-control-sm" name="company_mob1" id="company_mob1" value="<?php if(isset($company_info)){ echo $company_info['company_mob1']; } ?>" placeholder="Mobile No. 1" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Mobile No. 2 / Landline No.</label>
                    <input type="number" class="form-control form-control-sm" name="company_mob2" id="company_mob2" value="<?php if(isset($company_info)){ echo $company_info['company_mob2']; } ?>" placeholder="Mobile No. 2">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Email Id</label>
                    <input type="email" class="form-control form-control-sm" name="company_email" id="company_email" value="<?php if(isset($company_info)){ echo $company_info['company_email']; } ?>" placeholder="Email" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Website</label>
                    <input type="text" class="form-control form-control-sm" name="company_website" id="company_website" value="<?php if(isset($company_info)){ echo $company_info['company_website']; } ?>" placeholder="Website">
                  </div>
                  <div class="form-group col-md-6">
                    <label>PAN No.</label>
                    <input type="text" class="form-control form-control-sm" name="company_pan_no" id="company_pan_no" value="<?php if(isset($company_info)){ echo $company_info['company_pan_no']; } ?>" placeholder="Pan No.">
                  </div>
                  <div class="form-group col-md-6">
                    <label>GST No.</label>
                    <input type="text" class="form-control form-control-sm" name="company_gst_no" id="company_gst_no" value="<?php if(isset($company_info)){ echo $company_info['company_gst_no']; } ?>" placeholder="GST No.">
                  </div>

                  <?php if(isset($update)){ }else{ ?>
                    <div class="form-group col-md-6">
                      <label>Company Logo</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="company_logo" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Browse Logo</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      No file selected.
                    </div>
                    <div class="form-group col-md-6">
                      <label>Email Id</label>
                      <input type="email" class="form-control form-control-sm" name="admin_email" id="admin_email" placeholder="Admin Email" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Password</label>
                      <input type="password" class="form-control form-control-sm" name="admin_password" id="admin_password" placeholder="Admin Password" required>
                    </div>
                  <?php } ?>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update Company</button>
                  <a href="<?php echo base_url(); ?>/User/company_list" class="btn btn-default ml-4">Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>
</body>
</html>
