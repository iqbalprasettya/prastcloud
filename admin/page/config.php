<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : '';
switch ($page) {


    // Page
  case 'hero':
    include "page/hero.php";
    break;

  case 'service':
    include "page/service.php";
    break;

  case 'about':
    include "page/about.php";
    break;

  case 'blog':
    include "page/blog.php";
    break;

  case 'testi':
    include "page/testi.php";
    break;

  case 'partner':
    include "page/partner.php";
    break;

  case 'user':
    include "page/user.php";
    break;

  case 'message':
    include "page/message.php";
    break;

  case 'coming-soon':
    include "page/coming-soon.php";
    break;

  case 'add-testi':
    include "page/add-testi.php";
    break;

  case 'add-blog':
    include "page/add-blog.php";
    break;

  case 'delete-blog':
    include "page/delete.php";
    break;

  case 'add-service':
    include "page/add-service.php";
    break;

  case 'add-partner':
    include "page/add-partner.php";
    break;

  case 'edit-hero':
    include "page/edit-hero.php";
    break;

  case 'edit-service':
    include "page/edit-service.php";
    break;

  case 'edit-about':
    include "page/edit-about.php";
    break;

  case 'edit-blog':
    include "page/edit-blog.php";
    break;

  case 'edit-testi':
    include "page/edit-testi.php";
    break;

  default:
    include "page/dashboard.php";
}
