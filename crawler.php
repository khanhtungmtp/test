<?php

    require_once("autoload.php");

    // Log to track this crond
    $log = TP_ROOT . '/uploads/log.txt';
    file_put_contents($log, "Crontab just runned on: " . date('H:i:s d/m/Y', time()));

    $exec = new Exec( HOST, USER, PASS, DBNAME );
    $sql = new Sql();

    // Setup CURL to crawl VietNamNet
    $url = "https://vietnamnet.vn/vn/kinh-doanh/";
    $req = curl_init($url);
    curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($req, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6');
    $result = curl_exec($req);
    curl_close($req);

    // Get 5 href attributes at .Top-Cate
    $start = strpos($result, 'class="Top-Cate ');
    $end = strpos($result, 'class="images-home ', $start);
    $topCateHtml = substr($result, $start, $end - $start);
    preg_match_all('/href="([^\"]+)"/', $topCateHtml, $postLinks);
    $postLinks = array_unique($postLinks[1]);

    // Visit 5 hrefs to crawl contents
    $posts = array();
    foreach($postLinks as $link) {
        $req = curl_init('https://vietnamnet.vn' . $link);
        curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($req, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6');
        $result = curl_exec($req);
        curl_close($req);

        $start = strpos($result, '<div class="ArticleDetail ');
        $end = strpos($result, '<div class="m-t-10 ', $start);
        $post = substr($result, $start, $end - $start);
        array_push($posts, $post);
    }

    // Clear
    unset($result, $post);

    // Get plain data from html of each post
    libxml_use_internal_errors(true);
    foreach($posts as $post) {
        $doc = new DOMDocument();
        $doc -> loadHTML(mb_convert_encoding($post, 'HTML-ENTITIES', 'UTF-8'));
        $finder = new DomXPath($doc);

        // Get title
        $classname="title f-22 c-3e";
        $post_title = $finder->query("//*[contains(@class, '$classname')]");
        $post_title = $post_title -> item(0) -> nodeValue;

        // Get post url
        $post_seo_url = toURL($post_title);

        // Check if post had added into db before
        $hadAdded = $exec -> get($sql -> get(2026), array(
            ':url' => $post_seo_url
        ));

        if($hadAdded[0]['amount'] > 0) {
            echo 'breaked <br />';
            continue;
        }

        // Get compact
        $classname="bold ArticleLead";
        $compactEl = $finder->query("//*[contains(@class, '$classname')]");
        $post_compact = $compactEl -> item(0) -> textContent;

        // Get contents
        $articleEl = $compactEl -> item(0) -> parentNode;

        // Remove compact div from post contents
        $articleEl -> removeChild($compactEl -> item(0));

        // Clear
        unset($compactEl);

        // Remove innecessary
        $articleChildEls = $articleEl -> childNodes;

        // Remove all <div> in $articleEl
        foreach($articleChildEls as $el) {
            if($el -> nodeName == 'div') {
                $articleEl -> removeChild($el);
            }
        }

        // Clear
        unset($articleChildEls);

        // Remove all <a>
        $aEls = $doc -> getElementsByTagName('a');
        while($aEls -> length > 0) {
            foreach($aEls as $el) {
                $new = $doc -> createTextNode($el -> textContent);
                $el -> parentNode -> replaceChild($new, $el);
                $aEls = $doc -> getElementsByTagName('a');
            }
        }

        // Upload all image in post
        $imgEls = $doc -> getElementsByTagName('img');
        $i = 1;
        $postAvatars = array();

        foreach($imgEls as $img) {
            $src = $img -> getAttribute('src');
            $imgSource = file_get_contents($src);
            $uploadFileName = $post_seo_url . '-' . $i . '-' . time() . '.jpg';
            array_push($postAvatars, $uploadFileName); // Store all image link
            $uploadFile = TP_ROOT . '/uploads/public/' . $uploadFileName;
            file_put_contents($uploadFile, $imgSource);
            $img -> setAttribute('src', TP_REL_ROOT . 'uploads/public/' . $uploadFileName);
            $i++;
        }

        // Get contents
        $post_content = $doc -> saveHTML($articleEl);

        // Post avatar
        $post_avatar = $postAvatars[0];

        // Build data to save into DB
        $data = array(
            ':admin_id' => 1,
            ':blog_cate_id' => 7,
            ':post_title' => $post_title,
            ':post_page_title' => $post_title,
            ':post_contents' => $post_content,
            ':post_compact' => $post_compact,
            ':post_meta_description' => $post_compact,
            ':post_meta_keywords' => $post_compact,
            ':post_seo_url' => $post_seo_url,
            ':post_allow_comment' => 1,
            ':post_as_draff' => 0,
            ':post_thumbnail' => json_encode([$post_avatar]),
            ':post_time' => time()
        );

        $exec -> exec($sql -> get(160), $data);

    }

    function toURL($str) {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);

        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        $str = preg_replace('/[^0-9a-zA-Z- ]/', '', $str);
        $str = str_replace(' ', '-', $str);
        return strtolower($str);
    }

?>
