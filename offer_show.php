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
        
        #menu{
            width: 50%;
            height: 20%;
            background-color: rgb(255, 102, 163);
        }
        
        #id1{
            width: 100%;
            height: 30%;
            padding-left: 70px;
            padding-top: 50px;
        }
        
        body{
            background-color: rgb(255, 153, 102);
        }
        
        #id2{
            width: 100%;
            height: 35%;
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
                <li><a href="customer_registration.php">Customer Register</a></li>
                <li><a href="customer_login.php">Log In</a></li>
                <?php
                }
                ?>
                <li><a href="contact.php">Contact</a></li>
			</ul>
            
			<div class="header-right">
                <?php
                if(isset($_SESSION['user_name'])){
                ?>
				<a href="logout.php" class="site-btn sb-line sb-big">Log Out</a>
                
				<a href="order.php" class="site-btn sb-big">Book an Appointment</a>
                <?php
                }
                else{
                    if(isset($_SESSION['admin_name'])){
                    ?>
                        <a href="admin_home.php" class="site-btn sb-line sb-big">Admin</a>
                <?php
                    }
                    else{
                ?>
                <a href="adminLogin.php" class="site-btn sb-line sb-big">Admin</a>
                <?php
                    }
                }
                ?>
                
                
                
			</div>
		</div>
	</header>
	<!-- Header section end -->

    <div id="id4">
     
        <?php
        try{
            $conn=new PDO("mysql:host=localhost;dbname=online_parlour;",'root','');
            echo "<script>console.log('connection successful')</script>";
            
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }
        catch(PDOException $e){
            echo "<script>console.log('connection error')</script>";
            
        }
            
            if($_SERVER['REQUEST_METHOD']=="POST"){
                    
                $description=$_POST['description'];
                $file=$_FILES['file'];
                $start_time=$_POST['start_time'];
                $end_time=$_POST['end_time'];
                $s_name=$_POST['s_name'];
                
                $filename=$file['name'];
                $fileerror=$file['error'];
                $filetmp=$file['tmp_name'];
                $fileext=explode('.',$filename);
                $filecheck=strtolower(end($fileext));
                $fileextstored=array('png','jpg','jpeg');                
                
                
                if(in_array($filecheck,$fileextstored)){
                    $destinationfile='upload/'.$filename;
                    move_uploaded_file($filetmp,$destinationfile);                   
                    
                    try{
                    
                    $sqlquery="INSERT INTO offer(s_id,description,image,start_time,end_time) 
                    VALUES((SELECT s_id FROM service WHERE s_name='$s_name' GROUP BY s_name),'$description','$destinationfile','$start_time','$end_time')";
                    
                    $conn->query($sqlquery);
                    echo "<script>console.log('insert')</script>";
                    }
                    catch(PDOException $e){
                        echo "<script>console.log('error')</script>";
                        var_dump($e->getMessage());
                    }
                }
            }
                    
                    try{
                        
                    
                    $sqlquery1="SELECT * FROM offer ORDER BY start_time";
                    $q=$conn->query($sqlquery1);
                    $table=$q->fetchAll();
                    
                    foreach($table as $row){
                        ?>
        <div id="id2">
         <table id="menu" align="center">
                           
                           <tr>
                               <td>Start From: <?php echo $row[4];?></td>
                           
                           
                               <td>End: <?php echo $row[5]?></td>
                               <br>
             </tr>
                           <tr>
                               <td><?php echo $row[2]?></td>
             </tr>
         </table>
                           <div align="center" id="id1">
                               <img src="<?php echo $row[3];?>" style="width:30%;height:20%;">
                           </div>
            <?php
                    }
                }
        catch(PDOException $e){
            echo "<script>console.log('query error')</script>";
        }                
            
        
        ?>
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