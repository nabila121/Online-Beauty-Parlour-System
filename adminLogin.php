<!DOCTYPE HTML>
<html>
    <head>
        <title>Admin Log In</title>
        <style>
            #id1{
                width: 30%;
                height: 30%;
                padding-top: 230px;
                padding-left: 572px;
            }
            
            #id2{
                width: 100%;
                height: 15%;
                background-color: rgb(77, 25, 51);
                margin-top: 0px;
            }
            
            h1{
                color: rgb(255, 26, 102);
                text-align: center;
            }
            
            #id3{
                height: 50%;
                background-color: rgb(77, 25, 77);
            }
            
            body{
                margin: 0px;
                background-image: url('img/blog/12.jpg');
                background-size: 100% 150%;
                background-repeat: no-repeat;
            }
            
            td{
                padding-bottom: 5px;
                padding-top: 5px;
            }
            
            td input{
                border: none;
                border-bottom: 2px solid rgb(41, 41, 61);
                color: rgb(96, 32, 96);
            }
            
            table{
                border: 2px solid black;
                padding: 50px;
                background-color: rgb(153, 0, 102);
            }
            
            #btn{
                border-bottom: none;
                color: rgb(96, 32, 96);
                background-color: rgb(255, 153, 255);
                
            }
            
            #button{
                border-bottom: none;
                color: rgb(96, 32, 96);
                background-color: rgb(255, 153, 255);
                
            }
            
            
        </style>
        
    </head>
    <body>
        <div id="id3">
        <div id="id2">
            <h1>Admin Panel</h1>
        </div>
        </div>
        <div id="id1" align="center">
        <form action="adminLogin.php" method="post">
            <table>
                <tr>
                    <td>Name: <input type="text" name="admin_name" placeholder="Enter Name"><br><br></td>
                </tr>
                <tr>
                    <td>Password: <input type="password" name="admin_pass" placeholder="Enter Password"><br><br></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Log In" id="btn"></td>
                    <td><input type="submit" name="back" value="Back" id="button"></td>
                </tr>
            </table>
        </form>
        </div>
        
        <?php
        
        try{
                $conn=new PDO("mysql:host=localhost;dbname=online_parlour;",'root','');
                echo "<script>console.log('Connection successful')</script>";
                session_start();
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            }
            catch(PDOException $e){
                echo "<script>console.log('Connection error')</script>";
                
            }
        if($_SERVER['REQUEST_METHOD']=="POST"){
            if(isset($_POST['back'])){
                echo "<script>location.assign('home.php')</script>";
            }
            else{
            if(isset($_POST['admin_name'])) $admin_name=$_POST['admin_name'];
            if(isset($_POST['admin_pass'])) $admin_pass=$_POST['admin_pass'];
            
            
            try{
                $sqlquery="SELECT * FROM admin WHERE admin_name='$admin_name' AND admin_pass='$admin_pass'";
                
                $result=$conn->query($sqlquery);
                if($result->rowCount()>0){
                    $_SESSION['admin_name']=$admin_name;
                    echo "<script>location.assign('admin_home.php')</script>";
                }
                
            }
            catch(PDOException $e){
                echo "<script>console.log('query error')</script>";
                
            }
        }
        }
        ?>
        
    </body>
</html>