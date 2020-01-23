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
          width: 75%;
          padding-left: 380px;
      }
      
      hr{
          width: 60%;
          background-color: rgb(255, 0, 102);
      }
      
      #menu>thead>tr>th{
          color: white;
          background-color: rgb(61, 0, 153);
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
          background-color: rgb(255, 153, 204);
          padding-top: 0px;
      }
      
      #id8{
          padding-top: 20px;
      }
      
      body{
          background-color: rgb(45, 185, 185);
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

<li id="id1"><a href="customers.php"><i class="glyphicon glyphicon-th-list"></i> Customers Lists</a></li>
<li><a href="service_orders.php"><i class="glyphicon glyphicon-shopping-cart"></i>
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
  <h2 style="text-align:center;">
All Customers Lists</h2>
</div>
  <hr>
    </div>
    <div id="id6" align="center">
<table id="menu">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
        <?php
        try{
            $sqlquery="SELECT * FROM customer";
            $pdostmt=$conn->query($sqlquery);
            $table=$pdostmt->fetchAll();
            
    foreach($table as $row){
        ?>
      <tr>
        <td> <?php echo $row[0]; ?> </td>
        <td> <?php echo $row[1]; ?> </td>
        <td> <?php echo $row[2]; ?> </td>
      </tr>
      <?php }
        }
        catch(PDOException $e){
            echo "<script>console.log('query error')</script>";
        }
        ?> 
    </tbody>
  </table>
</div>
</body>
</html>
