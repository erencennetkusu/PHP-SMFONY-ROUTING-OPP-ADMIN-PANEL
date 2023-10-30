<?php
namespace App\Controllers;
use App\Models\Model;
use Symfony\Component\Routing\RouteCollection;

class memberController extends pageController   
 {

    public function indexAction( RouteCollection $routes )
 {

    $membersResult = $this->app->pdoPrepare( 'SELECT * FROM member ORDER BY id DESC ');
        require_once APP_ROOT . '/views/member.php';

    }

}