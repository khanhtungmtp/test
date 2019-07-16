<?php
    $exec = new Exec( HOST, USER, PASS, DBNAME );
    $sql = new Sql();

    $cateList = $exec -> get($sql -> get(1632));
    $cateListHtml = '';
    foreach($cateList as $key => $cate) {
        $cateListHtml .= '<option value="' . $cate['blog_cate_id'] . '">' . $cate['blog_cate_name'] . '</option>';
    }

    $html = '
    <select class="selects js_filter" style="width: 250px; float: right; margin-left: 20px; margin-bottom: 50px;" name="">
        <option value="0">Chọn danh mục</option>
        ' . $cateListHtml . '
    </select>
    ';

    echo $html;
?>
