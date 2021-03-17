<?php 


if(isset($_GET['name'])){


$ch = curl_init("https://superheroapi.com/api/10159786368926318/search/".$_GET['name']);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

//set the content type to application/json

//return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//execute the POST request
$result = curl_exec($ch);


$data = json_decode($result, true);
curl_close($ch);



// if($data['status']["code"] = -1){
//     $status = "1";
//     $respuesta = $data['status']["message"];
// }else{
//     $status = "0";  
//     $respuesta = $data['status']["message"];
// }

$payload = json_encode($data);

print_r($payload);



}



?>
