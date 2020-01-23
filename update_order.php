<?php
$id=-1;
$id1=-1;

if(isset($_GET['id'])&&isset($_GET['s_id'])){
    $id=$_GET['id'];
    $id1=$_GET['s_id'];
    
    echo "<script>console.log($id);</script>";
    echo "<script>console.log($id1);</script>";
}

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
        
        #button1{
            border-bottom: none;
            border-radius: 10px;
            background-color: rgb(255, 0, 102);
            color: white;
        }
        
        #button2{
            border-bottom: none;
            border-radius: 10px;
            background-color: rgb(255, 0, 102);
            color: white;
        }
        
        #id5{
            padding-top: 75px;
        }
        
        #id6{
            background-color: rgb(255, 204, 204);
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
                <li><a href="contact.html">Contact</a></li>
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
    <?php
        try{
            $sqlquery="SELECT * FROM orders WHERE o_id='$id'";
            $object = $conn->query($sqlquery);
            if($object->rowCount()==1){
                $result=$object->fetchAll();
        ?>
	
        <div id="id6">
            <h2 style="text-align:center;color:rgb(255, 0, 102);"><u>Update Order List</u></h2>
        </div>
         <div id=id1>
             <div id="id7">
         <form action="ordered_list.php" method="post" id="id5">
             <input type="hidden" name="updateop" value="yes">
             <input type="hidden" name="id" value="<?php echo $id?>">
             <input type="hidden" name="s_id" value="<?php echo $id1?>">
        <table align="center" id="menu">
            <tbody>
                <tr>
                    <td colspan="2">Name: <input type="text" name="orderedBy" placeholder="Enter Name" value="<?php echo $result[0][3]?>"><br><br></td>
                </tr>
                <tr>
                    <td colspan="2">Phone: <input type="tel" name="phone" placeholder="Enter Phone Number" value="<?php echo $result[0][5]?>"><br><br></td>
                    <td>Address: <input type="text" name="address" placeholder="Enter Address" value="<?php echo $result[0][4]?>"><br><br></td>
                </tr>
                <tr>
                    <td colspan="2">Appointment Date: <input type="date" name="o_date" value="<?php echo $result[0][7]?>"><br><br></td>
                    <td>Appointment Time: <input type="time" name="o_time" value="<?php echo $result[0][8]?>"><br><br></td>
                </tr>
                <tr rowspan="5">
                    <td><select name="area" value="<?php echo $result[0][6]?>">
                        <option value="dkaka">Dhaka</option>
                        <option value="khulna">Khulna</option>
                  <option value="rajshahi">Rajshahi</option>
                <option value="shylet">Shylet</option>
                <option value="chittagong">Chittagong</option>
            </select><br></td>
                    <td colspan="2">Which type of service you want?<br><br>
            
            <?php
            try{
                $sqlquery1="SELECT * FROM service GROUP BY s_name";
                $result1= $conn->query($sqlquery1);
                $table1 = $result1->fetchAll();
                foreach($table1 as $row1){
                    
            ?>
            <input type="checkbox" value="<?php echo $row1[1]?>" name="service[]"><?php echo $row1[1]?><br>
            
            <?php
                echo "<script>console.log('insert service')</script>";
                    
            }
        
                    
                
            }
            catch(PDOException $e){
                echo "<script>console.log('service query error')</script>";
                
            }
            ?></td>
                
                </tr>
                <tr rowspan="5">
                    <td colspan="3">Description:
                        <textarea name="description" style="width:100%;height:100%;" value="<?php echo $result[0][11]?>"></textarea><br><br></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Book" id="button1"></td>
                    <td><input type="button" value="Back" id="button2" onclick="display(<?php echo $result[0][0]?>)"></td>
                </tr>
            </tbody>
        </table>
             </form>
             </div>
    </div>
        <?php
            }
        
            else{
                echo "<script>location.assign('ordered_list.php')</script>";
            }
        }
    catch(PDOException $e){
        echo "<script>console.log('query error')</script>";
    }
    ?>
        <script>
            function display(id){
                location.assign('ordered_list.php');
            }
            
        </script>
    
    </div>


	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/main.js"></script>

    </body>
</html>