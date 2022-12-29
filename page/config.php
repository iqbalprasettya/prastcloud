<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : '';
switch ($page) {

    case 'blog':
        include "page/blog.php";
        break;

    case 'blog-details':
        include "page/blog-details.php";
        break;

}
