<?php
    $html = '
        <div class="search">
            <form class="" action="' . TP_REL_ROOT . 'search" method="get">
                <input type="text" name="keyword" placeholder="Tìm kiếm" required />
                <input type="submit" value="GO" />
                <div class="clearfix"> </div>
            </form>
        </div>
    ';

    echo $html;
?>
