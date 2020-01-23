<?php
    $id=-1;
if(isset($_GET['id'])){
    $id=$_GET['id'];
    
    echo "<script>console.log($id);</script>";
}
?>
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
      
      #id1{
          width: 100%;
          height: 10%;
          background-color: rgb(51, 133, 255);
      }
      
      #id2{
          width: 100%;
          height: 50%;
          padding-left: 95px;
          padding-top: 50px;
      }
      
      td input{
          border: none;
          border-bottom: 2px solid rgb(38, 0, 77);
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
          background-color: rgb(210, 121, 210);
      }
      
      body{
          background-image: url('img/blog/14.jpg');
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

<li><a href="create_beautician.php"><i class="glyphicon glyphicon-sort"></i>
Create Beautician </a></li>
<li id="id3"><a href="view_beautician.php"><i class="glyphicon glyphicon-align-left"></i>
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
Update Beautician</h2>
    </div>
    <div id="id2" align="center">
        
        <?php
        try{
            $sqlquery="SELECT * FROM beautician WHERE b_id='$id'";
            $object = $conn->query($sqlquery);
            if($object->rowCount()==1){
                $result=$object->fetchAll();
        ?>
     <form action="view_beautician.php" method="post">
         <table>
             <tr>
                 <td>Beautician Id:  <input type="text" name="b_id" value="<?php echo $result[0][0]?>" readonly><br><br></td>
             </tr>
             <tr>
                 <td>Beautician Name:  <input type="text" name="b_name" value="<?php echo $result[0][1]?>" readonly><br><br></td>
             </tr>
             <tr>
                 <td>dob:  <input type="date" name="b_dob" value="<?php echo $result[0][2]?>"><br><br></td>
             </tr>
             <tr>
                 <td>Phone:  <input type="text" name="b_phone" value="<?php echo $result[0][3]?>"><br><br></td>
             </tr>
             <tr>
                 <td>Address:  <input type="text" name="b_address" value="<?php echo $result[0][4]?>"><br><br></td>
             </tr>
             <tr>
                 <td>Salary:  <input type="number" name="b_salary" value="<?php echo $result[0][6]?>" min=10000 max=50000 step=5000><br><br></td>
             </tr>
             <tr>
                 <td>Joining Date:  <input type="date" name="b_joiningdate" value="<?php echo $result[0][7]?>"><br><br></td>
             </tr>
             <tr>
                 <td>
             Expert:
        <select name="b_expert">
            <option>None</option>
            <?php
            try{
                $sqlquery="SELECT s_name FROM service GROUP BY s_name";
                $object=$conn->query($sqlquery);
                $result=$object->fetchAll();
                
                foreach ($result as $row){
                    
            ?>
            <option><?php echo $row[0]?></option>
            <?php
                    
                }
                
            }
            catch(PDOException $e){
                echo "<script>console.log('query error')";
                
            }
            ?>
        </select><br><br>
                 </td>
             </tr>
             <tr>
                 <td>
        <input type="submit" value="Add" id="button1">
        <input type="reset" value="Reset" id="button2">
                 </td>
             </tr>
         </table>
        
    </form>
    <?php
            }
            else{
                echo "<script>location.assign('service_orders.php')</script>";
            }
        }
    catch(PDOException $e){
        echo "<script>console.log('query error')</script>";
    }
    ?>
    </div>
</body>
</html>
