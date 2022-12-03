<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : '';
switch ($page) {


    // Page
  case 'hero':
    include "page/admin/hero.php";
    break;

  case 'benefit':
    include "page/admin/benefit.php";
    break;

  case 'about':
    include "page/admin/about.php";
    break;

  case 'news':
    include "page/admin/news.php";
    break;

  case 'testi':
    include "page/admin/testi.php";
    break;

  case 'partner':
    include "page/admin/partner.php";
    break;

  case 'add-testi':
    include "page/admin/add-testi.php";
    break;

  case 'add-news':
    include "page/admin/add-news.php";
    break;

  case 'delete-news':
    include "page/admin/delete.php";
    break;

  case 'add-benefit':
    include "page/admin/add-benefit.php";
    break;

  case 'add-partner':
    include "page/admin/add-partner.php";
    break;

  case 'edit-hero':
    include "page/admin/edit-hero.php";
    break;

  case 'edit-benefit':
    include "page/admin/edit-benefit.php";
    break;

  case 'edit-about':
    include "page/admin/edit-about.php";
    break;

  case 'edit-news':
    include "page/admin/edit-news.php";
    break;

  case 'edit-testi':
    include "page/admin/edit-testi.php";
    break;

  default:
    include "page/admin/dashboard.php";
}
