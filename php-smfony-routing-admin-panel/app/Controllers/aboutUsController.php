<?php
namespace App\Controllers;
use App\Models\Model;
use Symfony\Component\Routing\RouteCollection;

class aboutUsController extends pageController   
 {

    public function indexAction( RouteCollection $routes )
 {

    $aboutUsList =  $this->app->pdoPrepare( 'SELECT * FROM aboutus  ORDER BY id DESC' );
        require_once APP_ROOT . '/views/aboutUs.php';

    }


    public function aboutUsAdd(RouteCollection $routes){
        $aboutUsTitle = $_POST["aboutUsTitle"];
        $aboutUsDescription = $_POST["aboutUsDescription"];
        $argsAdd = [ 'aboutUsTitle' => $aboutUsTitle, 'aboutUsDescription' => $aboutUsDescription];
        $this->app->getSecurity( $argsAdd );
        $result = $this->app->pdoInsert( 'aboutus', $argsAdd );

        if ( $result ) {
            echo '1';
        } else {
            echo '0';
        }
    }
    public function aboutUsEditter(RouteCollection $routes){
        $aboutUsID = $_POST["aboutUsID"];
        $aboutUsTitle = $_POST["aboutUsTitle"];
        $aboutUsDescription = $_POST["aboutUsDescription"];
        $argsArray = "
        
        aboutUsTitle = '" . $aboutUsTitle . "',
        aboutUsDescription = '" . $aboutUsDescription . "'
    
        WHERE id=$aboutUsID ";

        $this->app->getSecurity( $argsArray );
        $query = $this->app->pdoUpdate( 'aboutus', $argsArray );

        if ( $query ) {
            echo '1';
        } else {
            echo '0';
        }
    }

}