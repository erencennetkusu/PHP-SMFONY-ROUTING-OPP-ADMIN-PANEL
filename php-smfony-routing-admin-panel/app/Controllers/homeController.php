<?php
namespace App\Controllers;
use App\Models\Model;
use App\Controllers\pageController;
use Symfony\Component\Routing\RouteCollection;

class homeController   extends pageController {
    public function indexAction( RouteCollection $routes )
    {



        $app = new Model();

        $webList =  $this->app->pdoPrepare( 'SELECT COUNT(*) AS countView FROM WebSiteView  ' );
        $blogList =  $this->app->pdoPrepare( 'SELECT COUNT(*) AS countView FROM blog  ' );
        $ourTeam =  $this->app->pdoPrepare( 'SELECT COUNT(*) AS countView FROM ourTeam  ' );
        $messageList =  $this->app->pdoPrepare( 'SELECT COUNT(*) AS countView FROM  contactMail  ' );
        $projectList =  $this->app->pdoPrepare( 'SELECT COUNT(*) AS countView FROM  project  ' );
        $webListData =  $this->app->pdoPrepare( 'SELECT *  FROM WebSiteView   ORDER BY id DESC limit 10' );
        $messageListData =  $this->app->pdoPrepare( 'SELECT *  FROM contactMail WHERE messageStatu=0  ORDER BY id DESC limit 10' );


        require_once APP_ROOT . '/views/home.php';

    }
}