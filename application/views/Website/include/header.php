<body>

  <section class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light top_navbar">
    <a class="navbar-brand" href="#" > <img src="<?php echo base_url(); ?>assets/images/website/logo.png" alt=""> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav row w-100">
        <li class="nav-item <?php if(isset($page_heading) && $page_heading == 'Pharmacy'){ echo 'active'; } ?> col-md-3">
          <a class="nav-link" href="<?php echo base_url(); ?>Pharmacy">
            <p class="f-22 mb-0 heading_text"><b>Pharmacy</b></p>
            <p class="f-12 mb-0">Medicine & Health</p>
            <p class="f-12 mb-0">Product</p>
          </a>
        </li>
        <li class="nav-item <?php if(isset($page_heading) && $page_heading == 'Doctors'){ echo 'active'; } ?> col-md-3">
          <a class="nav-link" href="<?php echo base_url(); ?>">
            <p class="f-22 mb-0 heading_text"><b>Doctors</b></p>
            <p class="f-12 mb-0">Book an</p>
            <p class="f-12 mb-0">Appointment</p>
          </a>
        </li>
        <li class="nav-item <?php if(isset($page_heading) && $page_heading == 'Lab Tests'){ echo 'active'; } ?> col-md-3">
          <a class="nav-link" href="<?php echo base_url(); ?>Lab-Tests">
            <p class="f-22 mb-0 heading_text"><b>Lab Tests</b></p>
            <p class="f-12 mb-0">Book Tests and</p>
            <p class="f-12 mb-0">Checkups</p>
          </a>
        </li>
        <li class="nav-item dropdown col-md-3 ">
          <div class="row vertical-center" style="height:100% !important;">
            <div class="col-md-4">
              <i class="fa fa-shopping-cart text-white f-22"></i>
            </div>
            <div class="col-md-8">
              <button type="button" class="btn btn-outline-info  text-white" name="button">Login/Sign Up</button>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  </section>

  <section class="container-fluid bg-white">
    <div class="" style="height:20px;">
    </div>
  </section>

  <section class="container heared_white_strip">
    <div class="row">
      <div class="col-md-4">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fas fa-map-marker-alt"></i> </span>
          </div>
          <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="input-group">
          <input type="text" name="search_keyword" id="search_keyword" class="form-control" placeholder="Search By Category / Brand / Product" aria-label="Search By Category / Brand / Product" aria-describedby="basic-addon2" required="">
          <div class="input-group-append">
            <button class="btn " type="submit"><i class="fas fa-search"></i></button>
          </div>
        </div>
        <!-- <input type="text" class="w-100" name="" value=""> -->
      </div>
    </div>
  </section>
