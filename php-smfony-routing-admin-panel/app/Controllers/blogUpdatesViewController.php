<?php
namespace App\Controllers;
use App\Models\Model;
use Symfony\Component\Routing\RouteCollection;

class blogUpdatesViewController extends pageController
{
    public function indexAction($id,RouteCollection $routes)
    {

        $is = preg_replace('/[^.%0-9]/', '', $id);
        $blogList =  $this->app->pdoPrepare( 'SELECT * FROM blog  WHERE id='.$is);
            require_once APP_ROOT . '/views/blogUpdates.php';

    }





}