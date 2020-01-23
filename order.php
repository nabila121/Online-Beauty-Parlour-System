<?php
session_start();
$cid=$_SESSION['id'];
///echo "<script>window.alert('$cid');</script>";
?>

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
        
        #menu>tbody>tr>td{
            padding-bottom: 5px;
        }
        
        #menu>tbody>tr>td input{
            border: none;
            border-bottom: 2px solid rgb(255, 0, 102);
        }
        
        textarea{
            border: none;
            border-bottom: 2px solid rgb(255, 0, 102);
        }
        
        #menu>tbody>tr{
            padding-bottom: 10px;
        }
        
        #menu{
            box-shadow: 10px 0px 10px 0px rgb(255, 0, 102); 
        }
        
        #id1{
            background-image: url('img/service-bg.png');
        }
        
        #button{
            border-bottom: none;
            border-radius: 10px;
            background-color: rgb(255, 0, 102);
            color: white;
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
	
    <div id="id4">
        
    
    <div id=id1>
         <form action="order.php" method="post">
        <table align="center" id="menu">
            <tbody>
                <tr>
                    <td colspan="2">Name: <input type="text" name="orderedBy" placeholder="Enter Name"><br><br></td>
                    <td>Email: <input type="text" name="c_email" placeholder="Enter Email"><br></td>
                </tr>
                <tr>
                    <td colspan="2">Phone: <input type="tel" name="phone" placeholder="Enter Phone Number"><br><br></td>
                    <td>Address: <input type="text" name="address" placeholder="Enter Address"><br><br></td>
                </tr>
                <tr>
                    <td colspan="2">Appointment Date: <input type="date" name="o_date"><br><br></td>
                    <td>Appointment Time: <input type="time" name="o_time"><br><br></td>
                </tr>
                <tr rowspan="5">
                    <td colspan="2">Which type of service you want?<br><br>
            
            <?php
            try{
                $sqlquery="SELECT * FROM service GROUP BY s_name";
                $result= $conn->query($sqlquery);
                $table = $result->fetchAll();
                foreach($table as $row){
                    
            ?>
            <input type="checkbox" value="<?php echo $row[0]?>" name="service[]"><?php echo $row[1]?><br>
            
            <?php
                echo "<script>console.log('insert service')</script>";
            }
                    
                
            }
            catch(PDOException $e){
                echo "<script>console.log('service query error')</script>";
                
            }
                        
            ?></td>
                    <td><select name="area">
                        <option value="dkaka">Dhaka</option>
                        <option value="khulna">Khulna</option>
                  <option value="rajshahi">Rajshahi</option>
                <option value="shylet">Shylet</option>
                <option value="chittagong">Chittagong</option>
            </select><br></td>
                
                </tr>
                <tr rowspan="5">
                    <td colspan="3">Description:
                        <textarea name="description" style="width:100%;height:100%;"></textarea><br><br></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Book" id="button"></td>
                </tr>
            </tbody>
        </table>
             </form>
    </div>
    <?php
        $user=$_SESSION['user_name'];
        if($_SERVER['REQUEST_METHOD']=="POST"){
            if(isset($_POST['orderedBy'])) $orderedBy=$_POST['orderedBy'];
            if(isset($_POST['c_email'])) $c_email=$_POST['c_email'];
            if(isset($_POST['phone'])) $phone=$_POST['phone'];
            if(isset($_POST['address'])) $address=$_POST['address'];
            if(isset($_POST['area'])) $area=$_POST['area'];
            if(isset($_POST['o_date'])) $o_date=$_POST['o_date'];
            if(isset($_POST['o_time'])) $o_time=$_POST['o_time'];
            if(isset($_POST['service'])) $service=$_POST['service'];
            if(isset($_POST['description'])) $description=$_POST['description'];
            ///$field=array('facial','hair dressing','makeup','message','nail','waxing');
            $result=array();
            foreach($service as $row){
                $result[]=$row;
            }
            $no_of_service=count($result);
            ///echo $no_of_service;
    
            
            try{
                $confirm=0;
                $sqlquery="INSERT INTO orders(c_id,area,o_date,o_time,no_ofservice,description,orderedBy,address,phone,confirm) VALUES($cid,'$area','$o_date','$o_time',$no_of_service,'$description','$orderedBy',
                '$address','$phone','$confirm')";
                
                $conn->exec($sqlquery);
                echo "<script>console.log('Insertion Successful')</script>";
                
            }
            catch(PDOException $e){
                echo "<script>console.log('query error')</script>";
                
                
            }
            try{
                for($i=0;$i<count($result);$i++){
                    $sqlquery="INSERT INTO order_service(o_id,s_id) VALUES((SELECT MAX(o_id) FROM orders),$result[$i])";
                    $conn->exec($sqlquery);
                    echo "<script>console.log('insert')</script>";
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