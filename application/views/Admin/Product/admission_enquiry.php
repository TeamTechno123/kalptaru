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
            <h4>Admission Enquiries</h4>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List All Admission Enquiries </h3>
              </div>
              <div class="card-body p-2">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="d-none">#</th>
                    <!-- <th class="wt_50">Action</th> -->
                    <th>Student Name</th>
                    <th class="wt_75">Mobile</th>
                    <th class="">Email</th>
                    <th class="">Category</th>
                    <th class="">Course</th>
                  </tr>
                  </thead>
                  <!-- <tbody>
                    <?php $i=0; foreach ($admission_list as $list) { $i++;
                      $course_category_details = $this->Master_Model->get_info_arr_fields('course_category_name','course_category_id', $list->course_category_id, 'course_category');
                      $course_details = $this->Master_Model->get_info_arr_fields('course_name','course_id', $list->course_id, 'course');
                    ?>
                    <tr>
                      <td class="d-none"><?php echo $i; ?></td>
                      <td><?php echo $list->admission_name; ?></td>
                      <td><?php echo $list->admission_mobile; ?></td>
                      <td><?php if($course_category_details){ echo $course_category_details[0]['course_category_name']; } ?></td>
                      <td><?php if($course_details){ echo $course_details[0]['course_name']; } ?></td>
                    </tr>
                  <?php } ?>
                  </tbody> -->
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

</script>
