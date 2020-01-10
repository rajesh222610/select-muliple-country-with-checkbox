<?php 
$con = mysqli_connect("localhost","root","","smiling_house");
mysqli_query($con,'SET CHARACTER SET utf8'); 
$query = "SELECT * FROM wp_country";
$recods = mysqli_query($con,$query);
$data = [];
while ($row = mysqli_fetch_assoc($recods)) {
	$data[$row['id']] = $row;
	$cityquery = "SELECT * FROM wp_booking_pal_address WHERE country_id=".$row['id'];
	$cityrecods = mysqli_query($con,$cityquery);
	while ($crow = mysqli_fetch_assoc($cityrecods)) {
		  $data[$row['id']]['city'][] =$crow; 
        
	}
}

 // echo "<pre>"; 
//print_r($data);
 echo json_encode($data);
   exit();
// return $data;
// die();

//$file = date('Y-m-d').'.json';
// file_put_contents($file, json_encode($data));
//echo json_encode($data);
 //die();
?>


