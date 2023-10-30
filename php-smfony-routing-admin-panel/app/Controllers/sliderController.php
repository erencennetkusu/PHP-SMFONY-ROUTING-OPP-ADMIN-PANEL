<?php
namespace App\Controllers;
use App\Models\Model;
use Symfony\Component\Routing\RouteCollection;

class sliderController extends pageController   
 {

    public function indexAction( RouteCollection $routes )
 {

        $sliderList =  $this->app->pdoPrepare( 'SELECT * FROM slider  ORDER BY id DESC' );
        require_once APP_ROOT . '/views/slider.php';

    }

    public function sliderAdd( RouteCollection $routes ) {
        $sliderImg = $this->app->upload( 'sliderImg', '../public/assets/images/sliderImg/' );
        $sliderTitle = $_POST[ 'sliderTitle' ];
        $sliderDescription = $_POST[ 'sliderDescription' ];
        $argsAdd = [ 'sliderImg' => $sliderImg, 'sliderTitle' => $sliderTitle, 'sliderDescription' => $sliderDescription ];
        $this->app->getSecurity( $argsAdd );
        $result = $this->app->pdoInsert( 'slider', $argsAdd );

        if ( $result ) {
            echo '1';
        } else {
            echo '0';
        }
    }

    public function sliderEditter( RouteCollection $routes ) {
        $sliderImg = $this->app->upload( 'sliderImg', '../public/assets/images/sliderImg/' );
        $sliderId = $_POST[ 'sliderId' ];
        $sliderTitle = $_POST[ 'sliderTitle' ];
        $sliderDescription = $_POST[ 'sliderDescription' ];

        if ( empty( $_FILES[ 'sliderImg' ][ 'name' ] ) ) {
            $argsArray = "
        
            sliderTitle = '" . $sliderTitle . "',
            sliderDescription = '" . $sliderDescription . "'
    
        WHERE id=$sliderId ";
        } else {
            $argsArray = "
        
            sliderImg = '" . $sliderImg . "',
            sliderTitle = '" . $sliderTitle . "',
            sliderDescription = '" . $sliderDescription . "'
        
            WHERE id=$sliderId ";
        }

        $this->app->getSecurity( $argsArray );
        $query = $this->app->pdoUpdate( 'slider', $argsArray );

        if ( $query ) {
            echo '1';
        } else {
            echo '0';
        }
    }

}