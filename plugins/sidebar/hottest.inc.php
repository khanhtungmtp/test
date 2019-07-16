<?php
    $exec = new Exec( HOST, USER, PASS, DBNAME );
    $sql = new Sql();

    $hottest = $exec -> get($sql -> get(2012));

    $html = '';

    foreach($hottest as $key => $post) {

        $thumbnail = json_decode($post['post_thumbnail'], true);

        $html .= '
            <div class="post">
                <img class="post-thumbnail" src="' . TP_REL_ROOT . 'uploads/public/' . $thumbnail[0] . '" alt="' . $post['post_title'] . '" />
                <div class="content">
                    <h1 class="post-title"><a href="' . TP_REL_ROOT . $post['post_seo_url'] . '">' . $post['post_title'] . '</a></h1>
                    <p class="post-date">' . date('d-m-Y', $post['post_time']) . '</p>
                </div>
                <div class="clearfix"></div>
            </div>
        ';
    }

    echo $html;
?>
