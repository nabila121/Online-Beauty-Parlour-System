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
        
        tr{
            padding-bottom: 2px;
        }
        
        td input{
            border: none;
            border-bottom: 2px solid rgb(255, 0, 102);
        }
        
        #id1{
            padding-top: 150px;
        }
        
        #button{
            border-bottom: none;
            background-color: rgb(255, 0, 102);
            color: white;
        }
        
        table{
            height: 100%;
            background-color: white;
        }
        
        body{
            background-image: url('img/blog/7.jpg');
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }
        
        #id2{
            height: 30%;
            width: 20%;
            background-color: rgb(0, 34, 51);
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
        
    
    <div id="id2" align="center">
     <form action="customer_login.php" method="post" id="id1">
         <table align="center">
             <tbody>
                 <tr>
                     <td>Name: <input type="text" name="c_name" placeholder="Enter Name"><br><br></td>
                 </tr>
                 <tr>
                     <td>Password: <input type="password" name="c_password" placeholder="Enter Password"><br><br></td>
                 </tr>
                 <tr>
                     <td><input type="submit" id="button" value="LOG IN"></td>
                 </tr>
             </tbody>
         </table>
    </form>
    </div>
    
    <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
            
                if(isset($_POST['c_name'])) $c_name=$_POST['c_name'];
                if(isset($_POST['c_password'])) $c_password=$_POST['c_password'];
            
            $c_password=md5($c_password);
           
            
            
            
            try{
                $sqlquery="SELECT * FROM CUSTOMER WHERE c_name='$c_name' AND c_password='$c_password'";                
                $result=$conn->query($sqlquery);
//                $table=$result->fetchAll();
//                foreach($table as $row){
//                    $_SESSION['id']=$row[0];
//                    
//                    
//                }
                if($result->rowCount()==1){
                    $table=$result->fetchAll();
                    $_SESSION['user_name']=$c_name;
                    $_SESSION['id']=$table[0][0];
                    echo "<script>location.assign('home.php')</script>";
                }
                else{
                    echo "register first";
                }
                
            }
            catch(PDOException $e){
                echo "<script>console.log('query error')</script>";
                
            }
        }
        ?>


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