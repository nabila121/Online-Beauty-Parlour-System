<?php

$searchval="";
if(isset($_GET['search'])) $searchval=$_GET['search'];

try{
    $conn=new PDO("mysql:host=localhost;dbname=online_parlour",'root','');

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $ex){
    echo "<script>window.alert('db connection errror')</script>";
}
?>
<style>
    tr{
            border-bottom: 1px dotted rgb(255, 0, 102);
            padding-bottom: 20px;
            padding-left: 0px;
        }
        
        td{
            padding-bottom: 10px;
            padding-top: 10px;
            color: rgb(255, 0, 102);
        }
    
    #id2{
           box-shadow: 10px 10px 10px 0px rgb(255, 0, 102);       
            width: 50%;
/*            float: left;*/
        }
        
        #id1{
            background-color: rgb(255, 204, 153);
            padding-top:10%;
        }
    
    .id3{
        box-shadow: 10px 10px 10px 0px rgb(255, 0, 102);       
        width: 50%;
        height: 50%;
    }
</style>

<?php
$searchquery="SELECT * FROM service WHERE description LIKE '%$searchval%'";
if($searchval==""){
            echo "<div align='center'><div class='id3' align='center'>No Data Found</div></div>";
}
else{
    try{
    $object=$conn->query($searchquery);
    if($object->rowCount() == 0){
        echo "<div align='center'><div class='id3' align='center'>No Data Found</div></div>";
    }
    else{

        $tablecode="";
        $table=$object->fetchAll();
        ?>
        <div align="center">
            <span id="id1">
                <section id="id2">
        <table align="center" style="width:70%;height:30%;">
        <tbody>
        <?php
        foreach($table as $row){
            $tablecode.= "<tr><td style='padding-right:45px; padding-left:30px;'>$row[2]</td>
                            <td style='text-align:center;'>$row[3]/=</td></tr>";
        }
        
        echo $tablecode;
        ?>
        </tbody>
</table>
                </section>
            </span>
</div>

<?php
    }
}
catch(PDOException $ex1){
    echo "<script>console.log('search error')</script>";
}

    
}



?>