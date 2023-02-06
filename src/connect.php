<?php
    if(($handle = curl_init())===false) {
        echo 'Curl-Error: ' . curl_error($handle);
    } else {
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_FAILONERROR, true); 
    }
?>
