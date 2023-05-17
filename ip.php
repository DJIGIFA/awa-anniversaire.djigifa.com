<?php
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    $path = './data/';

    if (!file_exists($path)) {
        mkdir('path/to/directory', 0777, true);

    }

    $file = "ip" . ".txt";
    // Open the file to get existing content

    if(file_exists($file))
    {
        $current = file_get_contents($file);
    }else
    {
        $current = '';
    }
    
    // Append a new person to the file
    $current .= "\n";
    $current .= $date = date('m/d/Y h:i:s a', time()) . "#".$ip;
    // Write the contents back to the file
    file_put_contents($file, $current);

    echo $ip;
?>