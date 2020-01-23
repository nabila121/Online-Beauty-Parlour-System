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
    
    <style>
        .id1{
            height: 150px;
        }
        .id2{
            list-style-type:none;
            padding:10px;
            overflow: hidden;
            padding-left: 350px;
            padding-top: 50px;
        }
        
        .id3{
            padding: 5px;
            display: inline;
            
        }
        
        .id3 a{
            text-decoration: none;
            color: rgb(255, 0, 102);            
            text-align: center;
            padding-left: 80px;
        }
        
        .id3 a:hover{
            text-decoration: underline;
        }
        
        li a.id8{
            text-decoration: underline;
        }
        
        .p{
            display: inline-block;
        }
        
        tr{
            border-bottom: 1px dotted rgb(255, 0, 102);
            padding-bottom: 20px;
            padding-left: 0px;
        }
        
        td{
            padding-bottom: 10px;
            padding-top: 10px;
            color: rgb(255, 0, 102);
        }
        
        #id4{
/*            background-color: red;*/
        }
        
        #id6{
           box-shadow: 10px 10px 10px 10px rgb(255, 0, 102);       
            width: 50%;
            float: left;
        }
        
        #id5{
            background-color: white;
        }
        
        #btn{
            border-radius: 10px;
            background-color: rgb(255, 0, 102);
            color: white;
        }
        
        #search{
            border-radius: 8px;
        }

    </style>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

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
                        var id9=document.getElementById('id9');
                        id9.innerHTML=ajaxreq.responseText;
                    }
                };
                
                ajaxreq.send();
                
            }
                </script>
			</div>
		</div>
	</header>
	<!-- Header section end -->

    <div id="id9">
                                                
	<!-- Page info section -->
	<section class="page-info-section set-bg" data-setbg="img/page-top-bg/1.jpg" >
		<div class="container text-center">
			<h2>Services</h2>
		</div>
	</section>
	<!-- Page info section end -->
    
    <div class="id1">
        <ul class="id2">
				<li class="id3"><a href="services.php">Hair</a></li>
				<li class="id3"><a href="makeup.php">Makeup</a></li>
				<li class="id3"><a href="facial.php" class="id8">Facial</a></li>
                <li class="id3"><a href="message.php">Message</a></li>
				<li class="id3"><a href="nail.php">Nail</a></li>
                <li class="id3"><a href="waxing.php">Waxing</a></li>
        </ul>
    </div>


    <div id="id4">
        <span id="id5">
        <section id="id6">
    <?php
    try{
                        
                    
                    $sqlquery1="SELECT * FROM service WHERE s_name='facial'";
                    $q=$conn->query($sqlquery1);
                    $table=$q->fetchAll();
                    
                    foreach($table as $row){
                        ?>
                          
                           <table align="center" style="width:70%;height:30%;">
                               <tbody>

                                   <tr>
                                       <td style="padding-right:45px; padding-left:30px;"> <?php echo $row[2]?></td>
                                       <td style="text-align:center;"><?php echo $row[3]."/="?></td>
                                       
                                   </tr>
                                   
                               </tbody>
                            </table>
                                                                  
                         
    
                          
            <?php
                    }
                }
        catch(PDOException $e){
            echo "<script>console.log('query error')</script>";
        }                
            
        
        ?>
        </section>
        </span>
        <span style="width:50%;">
            <img src="img/blog/4.jpg" alt="image" style="width:750px;height:250px;">
            <div>
                
                <h2 style="color:rgb(255, 0, 102);padding-left:755px;">Facial services</h2>
                <p style="padding-left:755px;">At the Beauty Parlour, we believe in beauty with a conscience. We have created a salon that offers the highest quality facial services in a setting that is healthier for the environment, our guests and our staff. The Beauty Parlour is designed and built primarily with recycled materials: the floor is made of reclaimed wood from a local grain elevator – preserving and showcasing its natural texture – and most of the fixtures and furniture are refurbished or original vintage pieces.

We carry high quality professional facial products designed to ensure our guests look their best, both in the salon and at home. The facial care products we carry have been carefully chosen based both on performance and eco-sensitivity. As a clean air salon, we offer ammonia-free colour services with little to no scent properties or chemical emanation. This healthier alternative to traditional colouring practices is also safe for expectant mothers and individuals with allergies or scent sensitivities.

Our design and philosophy work hand in hand. We are committed to providing healthy facial care with a low impact on the environment. Come see what you and your facial can do for the Earth.
                </p>
            </div>
        </span>
    </div>


	



	


	

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