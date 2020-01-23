<?php
session_start();
$cid=$_SESSION['id'];
if($_SERVER['REQUEST_METHOD']=="POST"){
    if($_POST['updateop']=='yes'){
    //var_dump($_POST);
    //echo "<script>window.alert('within update')</script>";
    try{
        $conn=new PDO("mysql:host=localhost;dbname=online_parlour;",'root','');
        echo "<script>console.log('connection successful')</script>";


        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    catch(PDOException $e){
        echo "<script>console.log('connection error')</script>";

    }
    
   
    $oid=$sid="";
    
    if(isset($_POST['id'])) $oid=$_POST['id'];
    if(isset($_POST['s_id'])) $sid=$_POST['s_id'];
    
    ///echo "<script>window.alert('$oid $sid')</script>";
    
    $delquery="delete from order_service where o_id=$oid";
    $conn->exec($delquery);
    
    
    if(isset($_POST['orderedBy'])) $orderedBy=$_POST['orderedBy'];
    if(isset($_POST['c_email'])) $c_email=$_POST['c_email'];
    if(isset($_POST['phone'])) $phone=$_POST['phone'];
    if(isset($_POST['address'])) $address=$_POST['address'];
    if(isset($_POST['area'])) $area=$_POST['area'];
    if(isset($_POST['o_date'])) $o_date=$_POST['o_date'];
    if(isset($_POST['o_time'])) $o_time=$_POST['o_time'];
    if(isset($_POST['service'])) $service1=$_POST['service'];
    if(isset($_POST['description'])) $description=$_POST['description'];
    ///$field=array('facial','hair dressing','makeup','message','nail','waxing');
    $result=array();
    
    if(count($service1)>0){
        foreach($service1 as $row){
            $result[]=$row;
        }
    }
    ///var_dump($result);
    
    $no_of_service=count($result);
    ///echo $no_of_service;

    try{
        $delquery="delete from orders where o_id=$oid";
        $conn->exec($delquery);
        
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

            $sqlquery="INSERT INTO order_service(o_id,s_id) VALUES((SELECT MAX(o_id) FROM orders),(SELECT s_id FROM service WHERE s_name='$result[$i]'))";
            $conn->exec($sqlquery);
            echo "<script>console.log('insert')</script>";
        }
    }
    catch(PDOException $e){
        echo "<script>console.log('query error')</script>";
        echo $e->getMessage();
    }


    
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Beautician Lists</title>
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
  #btn{
            border-radius: 10px;
            background-color: rgb(255, 0, 102);
            color: white;
      }
      #search{
            border-radius: 8px;
      }
      
      #id6{
          width: 75%;
          padding-left: 380px;
      }
      
      hr{
          width: 60%;
          background-color: rgb(255, 0, 102);
      }
      
      #menu>thead>tr>th{
          color: white;
          background-color: rgb(77, 0, 57);
          text-align: center;
          padding: 15px;
          border: 2px solid rgb(255, 0, 102);
          border-bottom: 5px solid rgb(255, 0, 102);
      }
      
      #menu>tbody>tr>td{
          color: rgb(255, 0, 102);
          background-color: white;
          text-align: center;
          padding: 15px;
          border: 2px solid rgb(255, 0, 102);
      }
      
      #button1{
          border-radius: 5px;
          color: white;
          background-color: rgb(255, 0, 102);
      }
      
      #button2{
          border-radius: 5px;
          color: white;
          background-color: rgb(255, 0, 102);
      }
      
      #menu{
          border: 2px solid rgb(255, 0, 102); 
          width: 100%;
          height: 50%;
      }
      
      #id7{
          padding-top: 15px;
      }
      
      #menu>tbody>tr:hover{
          background-color: rgb(255, 204, 153);
      }
      
      #id5{
          background-color: rgb(102, 0, 51);
      }
      
      #id8{
          padding-top: 20px;
      }
      
      body{
          background-image: url('img/blog/11.jpg');
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
                
                $user=$_SESSION['user_name'];
                
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

<div id="id5">
  <h2 style="text-align:center;color:rgb(255, 0, 102);">
All Orders Lists</h2>
        </div>
  <hr>  
        <div id="id6" align="center">
<table id="menu">
    <thead>
      <tr>
          
          <th>Name</th>
        <th>Date</th>
        <th>Time</th>
        <th>Types of Services</th>
        <th>No. of Services</th>
        <th>Price</th>
        <th>Total Bill</th>
          <th></th>
      </tr>
    </thead>
    <tbody>
        <?php
        try{
            if(isset($_GET['id'])){
                $o_id=$_GET['id'];
                $sqlquery="DELETE FROM orders WHERE o_id='$o_id'";
                $conn->exec($sqlquery);
                echo "<script>console.log('delete row')</script>";
            }
            
        }
        catch(PDOException $e){
            echo "<script>console.log('delete query error')</script>";
            
        }
        
        ///showing
        try{
            $sqlquery="SELECT orders.o_id, orders.orderedBy, orders.o_date, orders.o_time, orders.no_ofservice, orders.total_bill, order_service.s_id, service.s_price,orders.confirm, service.s_name FROM orders join order_service join service WHERE orders.o_id=order_service.o_id AND order_service.s_id=service.s_id AND orders.c_id=$cid AND confirm=0";
            $pdostmt=$conn->query($sqlquery);
            $table=$pdostmt->fetchAll();
    foreach($table as $row){
        
        ?>
        
      <tr>
          <td><?php echo $row[1]?></td> 
        <td> <?php echo $row[2]; ?> </td>
        <td> <?php echo $row[3]; ?> </td>
        <td> <?php echo $row[9]?> </td>


        <td> <?php echo $row[4]; ?> </td>
          <td> <?php echo $row[7]; ?> </td>
        
        <td> <?php echo $row[5]; ?> </td>
          
          
          <td><input type="button" value="Delete" id="button1" onclick="deleteRow(<?php echo $row[0]?>)">
    <input type="button" value="Update" id="button2"onclick="updateRow(<?php echo $row[0]?>,<?php echo $row[6]?>)">
            </td>
          
      </tr>
  
        
        <?php
        
        
    }
        }
        catch(PDOException $e){
            echo "<script>console.log('query error')</script>";
        }
        ?>
        
    </tbody>
  </table>
    
    <div id="id7">
        
        
    
    </div>
        </div>
        
    
    <script>
        function deleteRow(id){
            location.assign('ordered_list.php?id='+id);
            
        }
    </script>
    <script>
        function updateRow(id,s_id){
            location.assign('update_order.php?id='+id+"&s_id="+s_id);
        }
    </script>
    
    
    <script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/main.js"></script>
        </div>
    </body>
</html>
