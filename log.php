<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ip = $_SERVER['REMOTE_ADDR']; 
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $time = date("Y-m-d H:i:s");
    
    $data = "[$time] IP: $ip | Agent: $userAgent | Action: " . $_POST['action'] . "\n";
    file_put_contents("inspect_log.txt", $data, FILE_APPEND);
    echo "Logged";
}
?>
