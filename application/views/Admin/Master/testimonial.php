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
            <h4>Testimonial</h4>
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
                <h3 class="card-title"> <?php if(isset($update)){ echo 'Update'; } else{ echo 'Add New'; } ?> Testimonial</h3>
                <div class="card-tools">
                  <?php if(!isset($update)){
                    echo '<button type="button" class="btn btn-sm btn-primary" data-card-widget="collapse">Add New</button>';
                  } else{
                    echo '<a href="'.base_url().'Master/testimonial" type="button" class="btn btn-sm btn-primary" >Add New</a>';
                  } ?>
                </div>
              </div>
              <!--  -->
                <div class="card-body p-0 " <?php if(isset($update)){ echo 'style="display: block;"'; } else{ echo 'style="display: none;"'; } ?>>
                  <form class="input_form m-0" id="form_action" role="form" action="" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="row p-4">
                      <div class="form-group col-md-12 ">
                        <label>Enter Testimonial Title</label>
                        <input type="text" class="form-control form-control-sm" name="testimonial_name" id="testimonial_name" value="<?php if(isset($testimonial_info)){ echo $testimonial_info['testimonial_name']; } ?>" placeholder="Enter Testimonial Title" required>
                      </div>
                      <div class="form-group col-md-12 ">
                        <label>Discription</label>
                        <textarea class="form-control form-control-sm" name="testimonial_desc" id="testimonial_desc" rows="3" required><?php if(isset($testimonial_info)){ echo $testimonial_info['testimonial_desc']; } ?></textarea>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Testimonial Image</label>
                        <input type="file" class="form-control form-control-sm" name="testimonial_image" id="testimonial_image" >
                      </div>
                      <div class="form-group col-md-6">
                        <?php if(isset($testimonial_info) && $testimonial_info['testimonial_image']){ ?>
                          <label>Uploaded Testimonial Image</label><br>
                          <img width="200px" src="<?php echo base_url() ?>assets/images/website/<?php echo $testimonial_info['testimonial_image'];  ?>" alt="Testimonial Image">
                          <input type="hidden" name="old_testimonial_img" value="<?php echo $testimonial_info['testimonial_image']; ?>">
                        <?php } ?>
                      </div>
                    </div>
                    <div class="card-footer clearfix" style="display: block;">
                      <div class="row">
                        <div class="col-md-6 text-left">
                          <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="testimonial_status" id="testimonial_status" value="0" <?php if(isset($testimonial_info) && $testimonial_info['testimonial_status'] == 0){ echo 'checked'; } ?>>
                            <label for="testimonial_status" class="custom-control-label">Disable This Testimonial</label>
                          </div>
                        </div>
                        <div class="col-md-6 text-right">
                          <a href="<?php base_url(); ?>Master/testimonial" class="btn btn-sm btn-default px-4 mx-4">Cancel</a>
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
                <h3 class="card-title">List All Testimonial Information</h3>
              </div>
              <div class="card-body p-2">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="d-none">#</th>
                    <th class="wt_50">Action</th>
                    <th>Testimonial Name</th>
                    <th>Image</th>
                    <th class="wt_50">Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; foreach ($testimonial_list as $list) { $i++;
                    ?>
                    <tr>
                      <td class="d-none"><?php echo $i; ?></td>
                      <td class="text-center">
                        <div class="btn-group">
                          <a href="<?php echo base_url() ?>Master/edit_testimonial/<?php echo $list->testimonial_id; ?>" type="button" class="btn btn-sm btn-default"><i class="fa fa-edit text-primary"></i></a>
                          <a href="<?php echo base_url() ?>Master/delete_testimonial/<?php echo $list->testimonial_id; ?>" type="button" class="btn btn-sm btn-default" onclick="return confirm('Delete this Testimonial Information');"><i class="fa fa-trash text-danger"></i></a>
                        </div>
                      </td>
                      <td><?php echo $list->testimonial_name; ?></td>
                      <td><a target="_blank" href="<?php echo base_url() ?>assets/images/website/<?php echo $list->testimonial_image;?>"><?php echo $list->testimonial_image; ?></a></td>
                      <td>
                        <?php if($list->testimonial_status == 0){ echo '<span class="text-danger">Inactive</span>'; }
                          else{ echo '<span class="text-success">Active</span>'; } ?>
                      </td>
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
