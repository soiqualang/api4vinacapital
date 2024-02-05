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

// http://data.dothanhlong.org/vinacapital/?vnindex
if(isset($_REQUEST['vnindex'])){
    
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.simplize.vn/api/company/summary/VNINDEX?all=true',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    // echo $response;
    
    // var_dump(json_decode($response, true));
    
    $response = json_decode($response, true);
    
    // echo $response["data"]["ticker"];
    
    echo 'VNINDEX<br>'.$response["data"]["priceClose"].'<br>';
    echo 'netChange<br>'.$response["data"]["netChange"].'<br>';
    echo 'pctChange<br>'.$response["data"]["pctChange"].'%<br>';
    echo 'priceOpen<br>'.$response["data"]["priceOpen"].'<br>';
    echo 'pricePctChg7d<br>'.$response["data"]["pricePctChg7d"].'%<br>';
    echo 'pricePctChg30d<br>'.$response["data"]["pricePctChg30d"].'%<br>';
    echo 'pricePctChgYtd<br>'.$response["data"]["pricePctChgYtd"].'%<br>';
    echo 'pricePctChg1y<br>'.$response["data"]["pricePctChg1y"].'%<br>';
    echo 'pricePctChg3y<br>'.$response["data"]["pricePctChg3y"].'%<br>';
    echo 'pricePctChg5y<br>'.$response["data"]["pricePctChg5y"].'%<br>';
}


?>
