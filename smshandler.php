<?php
    include "connection.php";
    $mobile_no= $_REQUEST['sender'];
    $msg= $_REQUEST['content'];
    $my_array  = preg_split("/ /", $msg);
    $submsg2=$my_array[1];
    $submsg3=$my_array[2];
    $mess = "";
    if($submsg2 == "INFO"){
        $mess = "1 for Setting up Environment\n2 for Searching for tender\n3 for Bidding for tender\n4 for Payment process\n5 for Bid status";
        $apiKey = urlencode('YkY8jGibVjE-12cV28RXFzR80GDYUyundi2RHDY2Vb');
	    $numbers = array($mobile_no);
        $sender = urlencode('TMITRA');
        $numbers = implode(',', $numbers);
        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $mess);
        $ch = curl_init('https://api.textlocal.in/send/');
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $response = curl_exec($ch);
	    curl_close($ch);
	
	    // Process your response here
	    echo $response;
    }
?>
