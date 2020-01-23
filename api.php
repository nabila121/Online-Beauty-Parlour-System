<?php
if($_SERVER['REQUEST_METHOD']=="OPTIONS"){
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
	header("Access-Control-Allow-Headers: Content-Type");
	header("Access-Control-Allow-Max-Age: 86400");
}


if($_SERVER['REQUEST_METHOD']=='POST'){
	///setting the headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	
	///receiving the entity body of HTTP requests
	$jsonstring=file_get_contents("php://input");
	
	$phparray=json_decode($jsonstring,true);
	
	///connecting to database
	try{
		$conn=new PDO("mysql:host=localhost;dbname=online_parlour",'root','');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		///automatically setting the next available id to the next student
		///next available id = current maxid + 1
		$maxidquery="SELECT MAX(s_id) FROM service";
		$table=$conn->query($maxidquery)->fetchAll();
		
		$s_id=$table[0][0]+1;
		$s_name=$phparray['s_name'];
		$description=$phparray['description'];
		$s_price=$phparray['s_price'];
		
		$insertquery="INSERT INTO service VALUES('$s_id','$s_name','$description','$s_price')";
		$conn->exec($insertquery);
		
		http_response_code(201);
		echo json_encode(array("message"=>"service added successfully", "id"=>$s_id));
		
	}
	catch(PDOException $ex){
		///database or query error
		http_response_code(503);

		echo json_encode(array("message"=>"Service Unavailable"));
	}
}
?>