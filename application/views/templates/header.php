<!DOCTYPE html>
	<head>
		<meta charset="UTF-8">
		<title>Amazing blog</title>
		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/styles.css">
		<script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

		<!-- Custom styles for this template -->
		<link href="<?php echo base_url(); ?>assets/css/blog-home.css" rel="stylesheet">
	</head>
	<body>
		
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>about"  class="nav-link">About</a>
          </li>
<?php
	if(isset($_SESSION['username'])){         
?>
          
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>users/<?php echo $_SESSION['username']; ?>" class="nav-link" id="login_link">My profile</a>
         </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>logout"  class="nav-link">Logout</a>
          </li>
<?php
	}
	else{
?>        
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>login" class="nav-link">Login</a>
         </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>register"  class="nav-link">Register</a>
          </li>
<?php
	}
?>
        </ul>
      </div>
    </div>
  </nav>
 
<div class="container">  
