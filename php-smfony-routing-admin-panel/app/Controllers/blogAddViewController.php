<?php
namespace App\Controllers;
use App\Models\Model;
use Symfony\Component\Routing\RouteCollection;

class blogAddViewController extends pageController
{

    public function indexAction( RouteCollection $routes )
    {

        $blogList =  $this->app->pdoPrepare( 'SELECT * FROM blog  ORDER BY id DESC' );
        require_once APP_ROOT . '/views/blogAdderView.php';

    }



}