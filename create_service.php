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
      
      #id1{
          width: 100%;
          height: 20%;
          padding: 20px;
          margin-top: 0px;
          background-color: rgb(255, 51, 255);
      }
      
      #id2{
          width: 100%;
          height: 50%;
          padding-top: 30px;
      }
      
      tr{
          padding: 2px;
      }
      
      table{
          padding-left: 20px;
          background-color: rgb(255, 128, 223);
          box-shadow: 10px 0px 10px 10px rgb(172, 57, 115);
      }
      
      td input{
          border: none;
          border-bottom: 2px solid rgb(0, 0, 51);
      }
      
      body{
          margin-top: 0px;
          background-color: rgb(255, 221, 153);
      }
      
      #btn{
          border-radius: 5px;
          border-bottom: 0px;
          background-color: rgb(0, 0, 51);
          color: white;
      }
      
      #id3{
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
<li><a href="service_orders.php"><i class="glyphicon glyphicon-shopping-cart"></i>
Service Orders</a></li>
<!--<li><a href="expenses.php"><i class="glyphicon glyphicon-stats"></i>
Daily Cost & Income</a></li>-->
<li id="id3"><a href="create_service.php"><i class="glyphicon glyphicon-plus"></i>
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
    <div id="id1">
  <h2 style="text-align:center;color:rgb(102, 0, 51);"><u style="color: rgb(153, 0, 115);">
      Service Add</u></h2> 
        </div>
    <div id="id2">
    <form action="create_service.php" method="post">
        <table align="center">
            <tr>
                <td>Name:  <input type="text" name="s_name" placeholder="Enter Service Name"><br><br></td>
            </tr>
            <tr>
                <td>Description:  <input type="text" name="description"><br><br></td>
            </tr>
            <tr>
                <td>Price:  <input type="text" name="s_price"><br><br></td>
            </tr>
            <tr>
                <td><input type="submit" value="Add" id="btn"></td>
            </tr>
        </table>
    </form>
    
    <?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(isset($_POST['s_name'])) $s_name=$_POST['s_name'];
        if(isset($_POST['description'])) $description=$_POST['description'];
        if(isset($_POST['s_price'])) $s_price=$_POST['s_price'];
                       
                    
                    try{
                    
                    $sqlquery="INSERT INTO service(s_name,description,s_price) VALUES('$s_name','$description','$s_price')";
                    
                    $conn->query($sqlquery);
                    echo "<script>console.log('insert')</script>";
                    }
                    catch(PDOException $e){
                        echo "<script>console.log('error')</script>";                       
                    }
                }          
    ?>
</div>

</body>
</html>
