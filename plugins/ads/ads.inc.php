<?php
    $exec = new Exec( HOST, USER, PASS, DBNAME );
    $sql = new Sql();

    $ads = $exec -> get($sql -> get(2002), array(
        ':name' => 'ads'
    ));

    $ads = $ads[0]['setting_value'];
    $ads = json_decode($ads, true);


    $html = '';
    foreach($ads as $key => $ad) {
        $picture = json_decode($ad['item_image'], true);

        $html .= '
            <li>
                <a href="' . $ad['item_link'] . '" title="' . $ad['item_title'] . '">
                    <img src="' . TP_REL_ROOT . '/uploads/public/' . $picture[0] . '" alt="' . $ad['item_alt'] . '" />
                </a>
            </li>
        ';
    }

    echo $html;
?>
