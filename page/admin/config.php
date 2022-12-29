<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : '';
switch ($page) {


    // Page
  case 'hero':
    include "page/admin/hero.php";
    break;

  case 'service':
    include "page/admin/service.php";
    break;

  case 'about':
    include "page/admin/about.php";
    break;

  case 'blog':
    include "page/admin/blog.php";
    break;

  case 'testi':
    include "page/admin/testi.php";
    break;

  case 'partner':
    include "page/admin/partner.php";
    break;

  case 'user':
    include "page/admin/user.php";
    break;

  case 'message':
    include "page/admin/message.php";
    break;

  case 'coming-soon':
    include "page/admin/coming-soon.php";
    break;

  case 'add-testi':
    include "page/admin/add-testi.php";
    break;

  case 'add-blog':
    include "page/admin/add-blog.php";
    break;

  case 'delete-blog':
    include "page/admin/delete.php";
    break;

  case 'add-service':
    include "page/admin/add-service.php";
    break;

  case 'add-partner':
    include "page/admin/add-partner.php";
    break;

  case 'edit-hero':
    include "page/admin/edit-hero.php";
    break;

  case 'edit-service':
    include "page/admin/edit-service.php";
    break;

  case 'edit-about':
    include "page/admin/edit-about.php";
    break;

  case 'edit-blog':
    include "page/admin/edit-blog.php";
    break;

  case 'edit-testi':
    include "page/admin/edit-testi.php";
    break;

  default:
    include "page/admin/dashboard.php";
}
