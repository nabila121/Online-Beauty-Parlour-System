<!DOCTYPE html>
<html lang="en">
<head>
  <title>ADMIN PANEL : online parlour</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="script.js" defer></script>
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
      
      #id1{
          width: 100%;
          height: 30%;
          background-color: rgb(255, 77, 166);
      }
      
      #id2{
          width: 100%;
          height: 50%;
          padding-left: 95px;
          padding-top: 50px;
      }
      
      td input{
          border: none;
          border-bottom: 2px solid rgb(102, 0, 51);
      }
      
      #button1{
          border-bottom: none;
          border-radius: 5px;
          color: white;
          background-color: rgb(102, 0, 51);
      }
      
      #button2{
          border-bottom: none;
          border-radius: 5px;
          color: white;
          background-color: rgb(102, 0, 51);
      }
      
      table{
          box-shadow: 10px 0px 10px 0px rgb(255, 153, 153);
          background-color: rgb(255, 238, 204);
      }
      
      body{
          background-image: url('img/blog/13.jpg');
          background-repeat: no-repeat;
          background-size: 100% 150%;
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
<li><a href="create_service.php"><i class="glyphicon glyphicon-plus"></i>
Create Service</a></li>
<li><a href="view_service.php"><i class="glyphicon glyphicon-list-alt"></i>
View Service list</a></li>

<li id="id3"><a href="create_beautician.php"><i class="glyphicon glyphicon-sort"></i>
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
  <h2 style="text-align:center;color:rgb(51, 0, 38);">
Beautician Add</h2>
    </div>
    <div id="id2" align="center">
     <form action="#" method="post">
         <table>
             <tr>
                 <td>Name:  <input type="text" id="b_name" name="b_name" placeholder="Enter Name"><span id="war1" style="color:red;display:none;">First character must be A-Z a-z</span><br><br></td>
             </tr>
             <tr>
                 <td>Date Of Birth:  <input type="date" id="b_dob" name="b_dob"><br><br></td>
             </tr>
             <tr>
                 <td>Phone:  <input type="text" id="b_phone" name="b_phone" placeholder="Phone Number"><br><br></td>
             </tr>
             <tr>
                 <td>Address:  <input type="text" name="b_address" placeholder="Enter Address"><br><br></td>
             </tr>
             <tr>
                 <td>Expert:  <input type="text" name="b_expert"><br><br></td>
             </tr>
             <tr>
                 <td>Salary:  <input type="number" name="b_salary" min="10000" max="50000" step="5000"><br><br></td>
             </tr>
             <tr>
                 <td>Joining Date:  <input type="date" id="b_joiningdate" name="b_joiningdate"><br><br></td>
             </tr>
             <tr>
                 <td><input type="submit" value="Add" id="button1"></td>
                 <td><input type="reset" value="Reset" id="button2"></td>
             </tr>
         </table>
         </form>
   
    
    <?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(isset($_POST['b_name'])) $b_name=$_POST['b_name'];
        if(isset($_POST['b_dob'])) $b_dob=$_POST['b_dob'];
        if(isset($_POST['b_phone'])) $b_phone=$_POST['b_phone'];
        if(isset($_POST['b_address'])) $b_address=$_POST['b_address'];
        if(isset($_POST['b_expert'])) $b_expert=$_POST['b_expert'];
        if(isset($_POST['b_salary'])) $b_salary=$_POST['b_salary'];
        if(isset($_POST['b_joiningdate'])) $b_joiningdate=$_POST['b_joiningdate'];
        
        
        try{
            $sqlquery="INSERT INTO beautician(b_name,b_dob,b_phone,b_address,b_expert,b_salary,b_joiningdate)
            VALUES('$b_name','$b_dob','$b_phone','$b_address','$b_expert','$b_salary',
            '$b_joiningdate')";
            $conn->exec($sqlquery);
            echo "<script>console.log('insertion succesful')</script>";
            
        }
        catch(PDOException $e){
            echo "<script>console.log('query error')</script>";
        }
    }
    ?>
</div>
    
</body>
</html>
