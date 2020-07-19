
  <footer class="mt-2">
    <div class="container py-5">
      <div class="row">
        <div class="col-md-2 offset-md-1">
          <h5 class="mb-3">Know Us</h5>
          <p class="mb-1"><a class="footer_link" href="#">About Us</a></p>
          <p class="mb-1"><a class="footer_link" href="#">Contact Us</a></p>
          <p class="mb-1"><a class="footer_link" href="#">Press Coverage</a></p>
          <p class="mb-1"><a class="footer_link" href="#">Careers</a></p>
        </div>
        <div class="col-md-2">
          <h5 class="mb-3">Our Policies</h5>
          <p class="mb-1"><a class="footer_link" href="#">Privacy Policy</a></p>
          <p class="mb-1"><a class="footer_link" href="#">Terms & Conditions</a></p>
          <p class="mb-1"><a class="footer_link" href="#">Editorial Policy</a></p>
          <p class="mb-1"><a class="footer_link" href="#">Return Policy</a></p>
        </div>
        <div class="col-md-2">
          <h5 class="mb-3">Our Services</h5>
          <p class="mb-1"><a class="footer_link" href="#">Order Medicines</a></p>
          <p class="mb-1"><a class="footer_link" href="#">Bok Lab Tests</a></p>
          <p class="mb-1"><a class="footer_link" href="#">Consult a Doctor</a></p>
          <p class="mb-1"><a class="footer_link" href="#">Ayurveda Articles</a></p>
        </div>
        <div class="col-md-2">
          <h5 class="mb-3">Connect</h5>
          <p class="mb-1 footer_link"><b>Social Links</b></p>
          <a href="#"> <img width="35px" src="<?php base_url(); ?>assets/images/website/fb_logo.png" alt="Facebook"> </a>
          <a href="#"> <img width="35px" src="<?php base_url(); ?>assets/images/website/twitter_logo.png" alt="Facebook"> </a>
          <a href="#"> <img width="35px" src="<?php base_url(); ?>assets/images/website/linked_logo.png" alt="Facebook"> </a>
        </div>
        <div class="col-md-2">
          <h5 class="mb-3">Download App</h5>
          <p class="mb-1"><a href="#"> <img width="100%" src="<?php base_url(); ?>assets/images/website/gplay_logo.png" alt="Facebook"> </a></p>
          <p class="mb-1"><a href="#"> <img width="100%" src="<?php base_url(); ?>assets/images/website/ap_store_logo.png" alt="Facebook"> </a></p>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-4 vertical-center">
          <div class="footer_feature pr-2">
            <i class="fa fa-thumbs-up" aria-hidden="true"></i>
          </div>
          <div class="footer_feature pl-2">
            <h5 class="mb-0">Know Us</h5>
            <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </p>
          </div>
        </div>
        <div class="col-md-4 vertical-center">
          <div class="footer_feature pr-2">
            <i class="fa fa-key" aria-hidden="true"></i>
          </div>
          <div class="footer_feature pl-2">
            <h5 class="mb-0">Secure</h5>
            <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </p>
          </div>
        </div>
        <div class="col-md-4 vertical-center">
          <div class="footer_feature pr-2">
            <i class="fas fa-wallet"></i>
          </div>
          <div class="footer_feature pl-2">
            <h5 class="mb-0">Pocket Friendly</h5>
            <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Bootstrap JS -->
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>

  <script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
  <script type="text/javascript">
        $('.owl_carousel_js').owlCarousel({
        loop:true,
        margin:10,
        navText:["<div class='nav-btn prev-slide'> < </div>","<div class='nav-btn next-slide'> > </div>"],
        nav:true,
        dots: false,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
      })
  </script>
  <script type="text/javascript">
    $('.owl_carousel2').owlCarousel({
      loop:true,
      margin:10,
      navText:["<div class='nav-btn prev-slide'> < </div>","<div class='nav-btn next-slide'> > </div>"],
      nav:true,
      dots: false,
      autoplay:true,
      autoplayTimeout:3000,
      autoplayHoverPause:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:2
          },
          1000:{
              items:2
          }
      }
    })
    $('.owl_carousel_testimonial').owlCarousel({
      loop:true,
      margin:10,
      navText:["<div class='nav-btn prev-slide'> < </div>","<div class='nav-btn next-slide'> > </div>"],
      nav:true,
      dots: false,
      autoplay:true,
      autoplayTimeout:3000,
      autoplayHoverPause:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:1
          },
          1000:{
              items:1
          }
      }
    })
  </script>
</body>
