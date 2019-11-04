<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Favicon-->
  <link rel="shortcut icon" href="<?php echo base_url();?>app-assets/img/fav.png">
  <!-- Author Meta -->
  <meta name="author" content="CodePixar">
  <!-- Meta Description -->
  <meta name="description" content="">
  <!-- Meta Keyword -->
  <meta name="keywords" content="">
  <!-- meta character set -->
  <meta charset="UTF-8">
  <!-- Site Title -->
  <title>Ali Shop</title>
  <link rel="stylesheet" href="<?php echo base_url();?>app-assets/css/linearicons.css">
  <link rel="stylesheet" href="<?php echo base_url();?>app-assets/css/owl.carousel.css">
  <link rel="stylesheet" href="<?php echo base_url();?>app-assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>app-assets/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo base_url();?>app-assets/css/nice-select.css">
  <link rel="stylesheet" href="<?php echo base_url();?>app-assets/css/nouislider.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>app-assets/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url();?>app-assets/css/main.css">
</head>

<body id="category">
  <script src="<?php echo base_url();?>app-assets/js/vendor/jquery-2.2.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
   crossorigin="anonymous"></script>
  <script src="<?php echo base_url();?>app-assets/js/vendor/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>app-assets/js/jquery.ajaxchimp.min.js"></script>
  <script src="<?php echo base_url();?>app-assets/js/jquery.nice-select.min.js"></script>
  <script src="<?php echo base_url();?>app-assets/js/jquery.sticky.js"></script>
  <script src="<?php echo base_url();?>app-assets/js/nouislider.min.js"></script>
  <script src="<?php echo base_url();?>app-assets/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo base_url();?>app-assets/js/owl.carousel.min.js"></script>
  <!--gmaps Js-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
  <script src="<?php echo base_url();?>app-assets/js/gmaps.min.js"></script>
  <script src="<?php echo base_url();?>app-assets/js/main.js"></script>

  <?php $this->load->view('shop/_partial/js'); ?>
  <?php $this->load->view('shop/_partial/header'); ?>
  <?php echo $Content ?>
  <?php $this->load->view('shop/_partial/footer'); ?>
</body>
</html>