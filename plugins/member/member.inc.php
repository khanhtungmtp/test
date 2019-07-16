<?php
    $exec = new Exec( HOST, USER, PASS, DBNAME );
    $sql = new Sql();

    $members = $exec -> get($sql -> get(2021));

    $html = '';

    foreach($members as $key => $member) {

        $html .= '
            <div class="post">
                <img class="post-thumbnail" src="' . TP_REL_ROOT . 'uploads/public/' . $member['member_avatar'] . '" alt="' . $member['member_name'] . '" />
                <div class="content">
                    <h1 class="post-title"><a href="' . $member['member_link'] . '" target="_blank">' . $member['member_name'] . '</a></h1>
                </div>
                <div class="clearfix"></div>
            </div>
        ';
    }

    echo $html;
?>
