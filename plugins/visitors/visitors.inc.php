<?php
    function getUserIP() {
        if( array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
            if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',')>0) {
                $addr = explode(",",$_SERVER['HTTP_X_FORWARDED_FOR']);
                return trim($addr[0]);
            } else {
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
        }
        else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }


    $exec = new Exec( HOST, USER, PASS, DBNAME );
    $sql = new Sql();

    $newest = $exec -> get($sql -> get(2011));

    // Count online
    $online = $exec -> get($sql -> get(2024), array(
        ':start' => time() - 600, // Online expire in 10 mins
        ':end' => time()
    ));

    // Count total
    $total = $exec -> get($sql -> get(2025));

    // Update / insert each refresh
    $ips = array();
    foreach($online as $key => $visit) {
        array_push($ips, $visit['visit_ip']);
    }

    if(in_array(getUserIP(), $ips)) {
        // Update last active
        $exec -> exec($sql -> get(2023), array(
            ':visit_time' => time(),
            ':visit_ip' => getUserIP(),
            ':start' => time() - 600,
            ':end' => time()
        ));
    } else {
        // This is new visitor
        $exec -> exec($sql -> get(2022), array(
            ':visit_ip' => getUserIP(),
            ':visit_time' => time()
        ));
    }



    echo '
        <li>Tổng truy cập: ' . count($total) . '</li>
        <li>Đang truy cập: ' . count($online) . '</li>
    ';
?>
