<?php

include 'connection.php';

$query = "SELECT COUNT(IF(phase_id=1,1, NULL)) 'setting',COUNT(IF(phase_id=2,1, NULL)) 'search',COUNT(IF(phase_id=3,1, NULL)) 'bidding',COUNT(IF(phase_id=4,1, NULL)) 'payment',COUNT(IF(phase_id=5,1, NULL)) 'status',COUNT(IF(phase_id=6,1, NULL)) 'technical' FROM `request`";

$result = mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){
	$row = mysqli_fetch_assoc($result);
	echo json_encode($row);
}else{
	echo "Error".mysqli_error($con);
}

?>