<?php


namespace App\Controllers;
use App\Models\Model;
use Symfony\Component\Routing\RouteCollection;

class messageController extends pageController
{

    public function indexAction( RouteCollection $routes )
    {

        $messageList =  $this->app->pdoPrepare( 'SELECT * FROM contactMail ORDER BY  id DESC' );

        require_once APP_ROOT . '/views/message.php';

    }



}