<?php
    require "connect.php";
    if (isset($_POST["x"]) && isset($_POST["y"]) && isset($_POST["date"]) && isset($_POST["time"]) && isset($_POST["duration"])) {
        $url = "ml-lab-7b3a1aae-e63e-46ec-90c4-4e430b434198.ukwest.cloudapp.azure.com:60999/report";
        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $url);
        curl_setopt($handle, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
        $post = array("x"=>$_POST["x"], "y"=>$_POST["y"], "date"=>$_POST["date"], "time"=>$_POST["time"], "duration"=>$_POST["duration"]);
        curl_setopt($handle, CURLOPT_POSTFIELDS, json_encode($post));
        $server_output = curl_exec($handle);
    }
    echo '<script> alert("Report successfully recorded"); window.location.href="home.php"; </script>';
?>
