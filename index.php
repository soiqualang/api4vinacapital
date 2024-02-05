<?php

// http://data.dothanhlong.org/vinacapital/?fundname=VFF
if(isset($_REQUEST['fundname'])){
    $fundname = $_REQUEST['fundname'];
    // VESAF
    // VEOF
    // VLBF
    // VFF
    
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://vinacapital.com/wp-admin/admin-ajax.php',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      // CURLOPT_POSTFIELDS => array('action' => 'getchartfundnav','fundname' => 'VESAF'),
      CURLOPT_POSTFIELDS => array('action' => 'getchartfundnav','fundname' => $fundname),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    echo $response;
}


?>