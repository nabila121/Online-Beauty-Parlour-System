<!DOCTYPE HTML>
<html>
    <head>
        <title>Sign Up</title>
    </head>
    <body>
        <form action="home.html" method="post">
        Name:<input type="text" name="uname" placeholder="Full Name"><br><br>
        email:<input type="email" name="uemail" placeholder="Email"><br><br>
        Password:<input type="text" name="upass" placeholder="Password"><br><br>
        Phone:<input type="number" name="uphone" placeholder="Phone Number"><br><br>
        Address:<input type="text" name="uaddress" placeholder="Address"><br><br>
        <input type="button" value="submit">
        </form>
        
        <?php
        if($_SERVER['REQUEST_METHOD']=="POST"){
            if(isset($_POST['uname'])) $uname=$_POST['uname'];
            if(isset($_POST['uemail'])) $uemail=$_POST['uemail'];
            if(isset($_POST['upass'])) $upass=$_POST['upass'];
            if(isset($_POST['uphone']) $uphone=$_POST['uphone'];
            if(isset($_POST['uaddress'])) $uaddress=$_POST['uaddress'];
               
               try{
                   $conn=new PDO("mysql:host=localhost;dbname=online_parlour;",'root','');
                   echo "<script>console.alert('connection successful')</script>";
                   
                   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                   
               }
               catch(PDOException $e){
                   echo "<script>console.alert('connection error')</script>";
                   
               }
               
               try{
                   $sqlquery="INSERT INTO customer VALUES('$uname','$upass','$uaddress','$uphone','$uemail')";
                   $conn->exec($sqlquery);
                   echo "<script>console.alert('insertion successful')</script>";
                   
               }
               catch(PDOException $e){
                   echo "<script>console.alert('query error')</script>";
                   
               }
            
        }
        ?>
    </body>
</html>