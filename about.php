<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Diva - Beauty salon template</title>
	<meta charset="UTF-8">
	<meta name="description" content="Diva Beauty salon template">
	<meta name="keywords" content="diva, beauty, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/animate.css"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

    <style>
        #btn{
            border-radius: 10px;
            background-color: rgb(255, 0, 102);
            color: white;
        }
        
        #search{
            border-radius: 8px;
        }
    </style>
</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
	
	<!-- Header section -->
	<header class="header-section">
		<div class="header-warp">
			<!-- logo -->
			<?php
            try{
                $conn=new PDO("mysql:host=localhost;dbname=online_parlour;",'root','');
                echo "<script>console.log('connection successful')</script>";
                session_start();
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            }
            catch(PDOException $e){
                echo "<script>console.log('connection error')</script>";
                
            }
            ?>
			<a href="home.php" class="site-logo">
				<img src="img/logo.png" alt="">
			</a>
			<!-- responsive -->
			<div class="nav-switch">
				<i class="fa fa-bars"></i>
			</div>
			<!-- Navigation Menu -->
			<ul class="main-menu">
				<li class="active"><a href="home.php">Home</a></li>
				<li><a href="about.php">About Us</a></li>
				<li><a href="services.php">Services</a></li>
<!--				<li><a href="blog.html">News</a></li>-->
                <?php
                if(isset($_SESSION['user_name'])){
                ?>
                <li><a href="ordered_list.php">Orders</a></li>
                <?php
                }else{
                ?>
                <li><a href="customer_registration.php">Register</a></li>
                <li><a href="customer_login.php">Log In</a></li>
                <?php
                }
                ?>
                <li><a href="contact.php">Contact</a></li>
			</ul>
            <input type="search" id="search" placeholder="Search Here">
            <input type="button" id="btn" value="Search">
			<div class="header-right">
                <?php
                if(isset($_SESSION['user_name'])){
                ?>
				<a href="logout.php" class="site-btn sb-line sb-big">Log Out</a>
                
				<a href="order.php" class="site-btn sb-big">Book an Appointment</a>
                <?php
                }
                else{
                ?>
                <a href="adminLogin.php" class="site-btn sb-line sb-big">Admin</a>
                <?php
                }
                ?>
                
                <script>
                    var searchdata=document.getElementById('search');
            
            var searchbtn=document.getElementById('btn');
            searchbtn.addEventListener('click',ajaxfn);
            
            function ajaxfn(){
                var ajaxreq=new XMLHttpRequest();
                ajaxreq.open('GET','ajaxserve.php?search='+searchdata.value);
                
                ajaxreq.onreadystatechange=function (){
                    
                    if(this.readyState===XMLHttpRequest.DONE && this.status==200){
                        var id4=document.getElementById('id4');
                        id4.innerHTML=ajaxreq.responseText;
                    }
                };
                
                ajaxreq.send();
                
            }
                </script>
            </div>
		</div>
	</header>
	<!-- Header section end -->

    <div id="id4">
                                                
	<!-- Page info section -->
	<section class="page-info-section set-bg" data-setbg="img/page-top-bg/1.jpg" >
		<div class="container text-center">
			<h2>About Us</h2>
		</div>
	</section>
	<!-- Page info section end -->


	<!-- about section -->
	<section class="about-section spad">
		<div class="container">
			<div class="row about-box">
				<div class="col-md-6 about-img">
					<img src="img/about-1.jpg" alt="">
				</div>
				<div class="col-md-6">
					<div class="about-content">
						<h2>Welcome to Diva</h2>
						<p>This gives best services. We have many experts. They are very good. We provide many services in a very cheap price. Customers can get best services.</p>
					</div>
				</div>
			</div>
			<div class="row about-box">
				<div class="col-md-6 about-img col-push">
					<img src="img/about-2.jpg" alt="">
				</div>
				<div class="col-md-6 col-pull">
					<div class="about-content">
						<h2>Inspire</h2>
						<p>We are inspried by online. Now people are very busy. They don't have time to go outside. So in our service they can get all these services at their place. </p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- about section end -->


	


	


	<!--  Newsletter section -->
	<section class="newsletter-section set-bg" data-setbg="img/newsletter-bg.jpg">
		<div class="container">
			<div class="section-title text-white m-0">
					<h2>Stay in touch</h2>
				</div>	
			<form class="newsletter-form">
				<div class="row">
					<div class="col-lg-5">
						<input type="text" placeholder="Your Name">
					</div>
					<div class="col-lg-5">
						<input type="text" placeholder="Your Name">
					</div>
					<div class="col-lg-2">
						<button class="site-btn">Subscribe Now!</button>
					</div>
					<div class="col-lg-12">
						<input type="checkbox" name="one" id="cb-one">
						<label for="cb-one">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere </label>
						<input type="checkbox" name="two" id="cb-two" checked>
						<label for="cb-two">Faucibus orci luctus et ultrices posuere</label>
					</div>
				</div>
			</form>
		</div>
	</section>
	<!--  Newsletter section end -->


	<!-- Footer section -->
	<footer class="footer-section set-bg" data-setbg="img/footer-bg.jpg">
		<div class="footer-warp">
			<div class="footer-widgets">
				<div class="row">
					<div class="col-xl-7 col-lg-7">
						<div class="row">
							<div class="col-xl-4 col-lg-5 col-md-6">
								<div class="footer-widget about-widget">
									<img src="img/logo.png" alt="">
									<p>This parlour gives many types of services.</p>
									<div class="fw-social">
										<a href=""><i class="fa fa-pinterest"></i></a>
										<a href=""><i class="fa fa-facebook"></i></a>
										<a href=""><i class="fa fa-twitter"></i></a>
										<a href=""><i class="fa fa-dribbble"></i></a>
										<a href=""><i class="fa fa-behance"></i></a>
										<a href=""><i class="fa fa-linkedin"></i></a>
									</div>
								</div> 
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 offset-xl-2 offset-lg-1 offset-md-0">
								<div class="footer-widget list-widget">
									<h4 class="fw-title"><i class="flaticon-009-makeup-5"></i>Our Services</h4>
									<ul>
										<li><a href="nail.php">Manicure</a></li>
										<li><a href="nail.php">Pedicure</a></li>
										<li><a href="message.php">Massage</a></li>
										<li><a href="services.php">Hair Dressing</a></li>
										<li><a href="message.php">Spa</a></li>				
									</ul>
									<ul>
										<li><a href="services.php">Wedding Hair</a></li>
										<li><a href="nail.php">Manicure</a></li>
										<li><a href="nail.php">Pedicure</a></li>
										<li><a href="mesage.php">Massage</a></li>
										<li><a href="services.php">Hair Dressing</a></li>										
									</ul>
								</div> 
							</div>
						</div>	
					</div>
					<div>
                Los Pollos<br/>
                NotunBazar, Dhaka, Bangladesh<br/>
                Tel +8801922181860<br/>
            </div>
            <div>
                <h4 style="color:floralwhite;border-bottom:2px solid rgb(255, 71, 26);">Branches</h4>
                <span id="branch-1">
                    <a href="#">Notunbazar, Dhaka</a><br/>
                    <a href="#">Banani, Dhaka</a><br/>
                    <a href="#">Uttara, Dhaka</a><br/>
                    <a href="#">Elephant Road, Dhaka</a><br/>
                    <a href="#">Shantinagar, Dhaka</a>
                </span>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="footer-nav">
					<ul>
						<li><a href="home.php">Home</a></li>
						<li><a href="about.php">About us</a></li>
						<li><a href="services.php">Services</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
				</div>
				<div class="copyright">
					<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer section end -->


	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/main.js"></script>

    </div>
    </body>
</html>