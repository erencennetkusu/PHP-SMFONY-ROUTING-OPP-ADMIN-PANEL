<?php
namespace App\Controllers;
use App\Models\Model;
use Symfony\Component\Routing\RouteCollection;

class menuController extends pageController   
 {

    public function indexAction( RouteCollection $routes )
 {

        $menuList =  $this->app->pdoPrepare( 'SELECT * FROM adminmenuler WHERE menuStatu<4 ORDER BY menuSira ASC' );

        require_once APP_ROOT . '/views/menu.php';

    }

    public function menuEditter( RouteCollection $routes ) {

        if ( isset( $_POST[ 'menuEdit' ] ) ) {

            $menuName = $_POST[ 'menuName' ];
            $menuURL = $_POST[ 'menuURL' ];
            $menuIcon = $_POST[ 'menuIcon' ];
            $menuSira = $_POST[ 'menuSira' ];
            $menuId = $_POST[ 'menuId' ];

            $argsArray = "
        
            menuAdi = '" . $menuName . "',
            menuUrl = '" . $menuURL . "',
            menuIcon = '" . $menuIcon . "',
            menuSira = " . $menuSira . "
        
            WHERE id=$menuId ";

            $this->app->getSecurity( $argsArray );
            $query = $this->app->pdoUpdate( 'adminmenuler', $argsArray );

            if ( $query ) {
                echo '1';
            } else {
                echo '0';
            }

        }
    }

    public function menuAdd( RouteCollection $routes ) {
        if ( isset( $_POST[ 'menuAdd' ] ) ) {

            $menuName = $_POST[ 'menuName' ];
            $menuURL = $_POST[ 'menuURL' ];
            $menuIcon = $_POST[ 'menuIcon' ];
            $menuSira = $_POST[ 'menuSira' ];

            $argsAdd = [ 'menuAdi' => $menuName, 'menuUrl' => $menuURL, 'menuIcon'=>$menuIcon, 'menuSira'=>$menuSira];
            $this->app->getSecurity( $argsAdd );
            $result = $this->app->pdoInsert( 'adminmenuler', $argsAdd );

            if ( $result ) {
                echo '1';
            } else {
                echo '0';
            }

        }
    }
}