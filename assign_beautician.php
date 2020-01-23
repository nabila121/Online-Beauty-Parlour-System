<?php
    $orderno=-1;
if(isset($_GET['orderno'])){
    $orderno=$_GET['orderno'];
    
    echo "<script>console.log($orderno);</script>";
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
            width: 100%;
            height: 30%;
            padding-left: 10px;
        }
        
        #button1{
            border-bottom: none;
            border-radius: 10px;
            background-color: rgb(255, 0, 102);
            color: white;
        }
      
      #id2{
          width: 100%;
          height: 15%;
      }
      
      #button2{
            border-bottom: none;
            border-radius: 10px;
            background-color: rgb(255, 0, 102);
            color: white;
        }
      
      #button3{
            border-bottom: none;
            border-radius: 10px;
            background-color: rgb(255, 0, 102);
            color: white;
        }
      
  </style>
</head>
<body>




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
    <div id="id2">
  <h2 style="text-align:center;color:rgb(255, 51, 153);">
Assign Beautician to Customer</h2>
    </div>
    <div id="id1">
        <?php
        try{
            $sqlquery="SELECT * FROM orders WHERE o_id='$orderno'";
            $object = $conn->query($sqlquery);
            if($object->rowCount()==1){
                $result=$object->fetchAll();
        ?>
         <form action="service_orders.php" method="post">
        <table align="center" id="menu">
            <tbody>
                <tr>
                    <td> Order Id:  <input type="text" name="o_id" value="<?php echo $result[0][0]?>" readonly><br><br></td>
                    </tr>
                <tr>
                    <td>Customer Name:  <input type="text" name="orderedBy" value="<?php echo $result[0][3]?>" readonly><br><br></td>
                </tr>
                <tr>
                    <td>Address:  <input type="text" name="address" value="<?php echo $result[0][4]?>" readonly><br><br></td>
                </tr>
                <tr>
                    <td>Area:  <input type="text" name="area" value="<?php echo $result[0][6]?>" readonly><br><br></td>
                </tr>
                <tr>
                    <td>Service:  <input type="text" name="service" value="<?php echo $result[0][12]?>" readonly><br><br></td>
                    </tr>
                <tr>
                    <td>Services Description:  <input type="text" name="description" value="<?php echo $result[0][11]?>" readonly><br><br></td>
                </tr>
                <tr>
                    <td>Ordered Date:  <input type="date" name="o_date" value="<?php echo $result[0][7]?>" readonly><br><br></td>
                    </tr>
                <tr>
                    <td> Time:  <input type="time" name="o_time" value="<?php echo $result[0][8]?>" readonly><br><br></td>
                </tr>
                <tr>
                    <td> No. of Service:  <input type="number" name="no_ofservice" value="<?php echo $result[0][9]?>"><br><br></td>
                    </tr>
                <tr>
                    <td>Total Bill:  <input type="text" name="total_bill"><br><br></td>
                </tr>
                <tr rowspan="3">
                    <td colspan="2">Beautician Name:  <br><br>
                        <select name="b_name">
                            <option>None</option>
                            <?php
            try{
                $sqlquery="SELECT b_name FROM beautician";
                $object=$conn->query($sqlquery);
                $result=$object->fetchAll();
                
                foreach ($result as $row){
                    
            ?>
            <option><?php echo $row[0]?></option>
            <?php
                    
                }
                
            }
            catch(PDOException $e){
                echo "<script>console.log('beautician name query error')";
                
            }
            ?>
        </select><br><br>
                        </td>
                </tr>
                <tr>
                    <td><input type="submit" value="Add" id="button1">
                        <input type="submit" name="back" value="Back" id="button3"></td>
                    <td><input type="reset" value="Reset" id="button2"></td>
                    
                </tr>
            
            
            </tbody>
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
