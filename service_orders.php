<!DOCTYPE html>
<html lang="en">
<head>
  <title>ADMIN PANEL : online parlour</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }



/* slideshow designs */

* {box-sizing:border-box}
body {font-family: Verdana,sans-serif;}
.mySlides {display:none}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}
/* Caption text */
.text1 {
  color: black;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 5.5s;
  animation-name: fade;
  animation-duration: 5.5s;
}

@-webkit-keyframes fade {
  from {opacity: .6} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
      
      #id6{
          width: 85%;
          padding-left: 300px;
      }
      
      hr{
          width: 60%;
          background-color: rgb(255, 0, 102);
      }
      
      #menu>thead>tr>th{
          color: white;
          background-color: rgb(94, 65, 34);
          text-align: center;
          padding: 15px;
          border: 2px solid rgb(0, 51, 102);
          border-bottom: 5px solid rgb(0, 51, 102);
      }
      
      #menu>tbody>tr>td{
          color: rgb(255, 0, 102);
          background-color: white;
          text-align: center;
          padding: 15px;
          border: 2px solid rgb(0, 51, 102);
      }
      
      
      
      #menu{
          border: 2px solid rgb(255, 0, 102); 
          width: 100%;
          height: 50%;
          box-shadow: 10px 0px 10px 0px rgb(0, 0, 153);
      }
      
      #id7{
          padding-top: 15px;
      }
      
      #menu>tbody>tr:hover{
          background-color: rgb(255, 204, 153);
      }
      
      #id9{
          background-color: rgb(0, 0, 51);
          padding-top: 0px;
      }
      
      #id8{
          padding-top: 20px;
      }
      
      body{
          background-color: rgb(153, 204, 255);
      }
      
      #button1{
          border-radius: 2px;
          background-color: rgb(0, 0, 51);
          color: white;
      }
      
      #button2{
          border-radius: 2px;
          background-color: rgb(0, 0, 51);
          color: white;
      }
      
      #button3{
          border-radius: 2px;
          background-color: rgb(0, 0, 51);
          color: white;
      }
      
      #btn{
          width: 20%;
      }
      
      #id1{
          background-color: rgb(153, 0, 115);
      }
  </style>
</head>
<body>



<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      
      <a class="navbar-brand" href="home.php" style="color:#1E90FF;"> Online Parlour&nbsp;&nbsp;</a>
   
          <a class="navbar-brand" href="#" style="color:#1E90FF;"><span style="color:#7CFC00; font-size:10dp;"></span>
      <span class="glyphicon glyphicon-user">AdminPanel
      </span>
        </a>
        
      
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
          <li><a href="admin_home.php"><span class="glyphicon glyphicon-home"> Home</span></a></li>

<li><a href="customers.php"><i class="glyphicon glyphicon-th-list"></i> Customers Lists</a></li>
<li id="id1"><a href="service_orders.php"><i class="glyphicon glyphicon-shopping-cart"></i>
Service Orders</a></li>
<!--<li><a href="expenses.php"><i class="glyphicon glyphicon-stats"></i>
Daily Cost & Income</a></li>-->
<li><a href="create_service.php"><i class="glyphicon glyphicon-plus"></i>
Create Service</a></li>
<li><a href="view_service.php"><i class="glyphicon glyphicon-list-alt"></i>
View Service list</a></li>

<li><a href="create_beautician.php"><i class="glyphicon glyphicon-sort"></i>
Create Beautician </a></li>
<li><a href="view_beautician.php"><i class="glyphicon glyphicon-align-left"></i>
View Beautician List</a></li>
<li><a href="post_offer.php"><i class="glyphicon glyphicon-stats"></i>
Post Offer</a></li>
<li><a href="admin_logout.php"><i class="glyphicon glyphicon-sort"></i>
Log Out </a></li>
        
      </ul>
    </div>
  </div>
</nav>

<?php
    try{
        $conn=new PDO("mysql:host=localhost;dbname=online_parlour",'root','');
        echo "<script>console.log('Connection successful')</script>";
        
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }
    catch(PDOException $e){
        echo "<script>console.log('connection error')</script>";
        
    }
    
?>

    <div id="id9">
<div id="id5">
  <h2 style="text-align:center;color:white;">
All Customers Ordered Service Lists</h2>
</div>
  <hr>
    </div>
    
    <?php
    
    if($_SERVER['REQUEST_METHOD']=="POST"){
        ///insert 
        if(isset($_POST['back'])){
            echo "<script>location.assign('service_orders.php')</script>";
        }
        else{
        if(isset($_POST['o_id'])) $o_id=$_POST['o_id'];
        if(isset($_POST['b_name'])) $b_name=$_POST['b_name'];        
        if(isset($_POST['no_ofservice'])) $no_ofservice=$_POST['no_ofservice'];
        if(isset($_POST['total_bill'])) $total_bill=$_POST['total_bill'];
        
        try{
            $sqlquery="UPDATE orders SET b_id=(SELECT b_id FROM beautician WHERE b_name='$b_name'),
            no_ofservice='$no_ofservice',total_bill='$total_bill' WHERE o_id='$o_id'";
            $conn->exec($sqlquery);
            echo "<script>console.log('update successful')</script>";
        }
        catch(PDOException $e){
            echo "<script>console.log('query error')</script>";
            
        }
    }
    }
        
            
            ?>
    <?php
    if(isset($_GET['id'])){
        $confirm=1;
        try{
        $sqlquery="UPDATE orders SET confirm='$confirm' WHERE o_id=".$_GET['id'];
        $conn->exec($sqlquery);
        echo "<script>console.log('update successful')</script>";
        }
        catch(PDOException $e){
            echo "<script>console.log('query error')</script>";
        }
    }
    else{
        $confirm=0;
        try{
        $sqlquery="UPDATE orders SET confirm='$confirm' WHERE o_id=40";
        $conn->exec($sqlquery);
        echo "<script>console.log('update successful')</script>";
        }
        catch(PDOException $e){
            echo "<script>console.log('query error')</script>";
        }
    }
    ?>
    <div id="id6" align="center">
<table id="menu">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
          <th>Phone</th>
          <th>Area</th>
          <th>Ordered Date</th>
          <th>Ordered Time</th>
          <th>Description</th>
          <th>Assign to Beautician</th>
      </tr>
    </thead>
    <tbody>
        <?php
        try{
            $sqlquery="SELECT * FROM orders";
            $pdostmt=$conn->query($sqlquery);
            $table=$pdostmt->fetchAll();
            
    foreach($table as $row){
        ?>
      <tr>
        <td> <?php echo $row[0]; ?> </td>
        <td> <?php echo $row[3]; ?> </td>
        <td> <?php echo $row[4]; ?> </td>
          <td><?php echo $row[5]?></td>
          <td><?php echo $row[6]?></td>
          <td><?php echo $row[7]?></td>
          <td><?php echo $row[8]?></td>
          <td><?php echo $row[11]?></td>
          <td id='btn'>
              <?php
        try{
        $sqlquery="SELECT b_name FROM beautician WHERE b_id=(SELECT b_id FROM orders WHERE o_id='$row[0]')";
        $object=$conn->query($sqlquery);
        if($object->rowCount()==1){
            $result=$object->fetchAll();
        ?>
                     <input type="button" value='<?php echo $result[0][0];?>' id="button1" 
                        onclick="updateRow(<?php echo $row[0]?> );">
              <input type="button" value="Confirm" id='button3' 
                        onclick="confirmRow(<?php echo $row[0]?> );">
            
            <?php
        }
            else{
                ?>
                <input type="button" value="Assign" id='button2' 
                        onclick="updateRow(<?php echo $row[0]?> );">
              
              <input type="button" value="Confirm" id='button3' 
                        onclick="confirmRow(<?php echo $row[0]?> );">
                
            <?php
            }
        }catch(PDOexception $e){
            echo "<script>console.log('error')</script>";
        }
            ?>
                     
          </td>
      </tr>
      <?php }
        }
        catch(PDOException $e){
            echo "<script>console.log('query error')</script>";
        }
        ?>
        <script>
        function updateRow(id){
            location.assign('assign_beautician.php?orderno='+id);
        }
    </script>
        <script>
            function confirmRow(id){
                location.assign('service_orders.php?id='+id);
                
            }
        </script>
    </tbody>
  </table>
</div>
</body>
</html>
