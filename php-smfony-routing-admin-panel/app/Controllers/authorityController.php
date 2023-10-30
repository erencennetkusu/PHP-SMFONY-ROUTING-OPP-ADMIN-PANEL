<?php
namespace App\Controllers;
use App\Models\Model;
use Symfony\Component\Routing\RouteCollection;

class authorityController extends pageController   
 {

    public function indexAction( RouteCollection $routes )
 {

        $authorityList =  $this->app->pdoPrepare( 'SELECT * FROM adminpermission WHERE statu<4 ORDER BY id ASC' );
        $resultMenu =  $this->app->pdoPrepare( 'SELECT * FROM adminmenuler' );
        require_once APP_ROOT . '/views/authority.php';

    }

    public function permissionAdd( RouteCollection $routes ) {
        if ( isset( $_POST[ 'permissionAdd' ] ) ) {

            $permissionName = $_POST[ 'permissionName' ];
            $permissionAccess = json_encode( $_POST[ 'groupPermission' ], true );

            $argsAdd = [ 'authority' => $permissionName, 'userAccess' => $permissionAccess, 'statu'=>1 ];
            $this->app->getSecurity( $argsAdd );
            $result = $this->app->pdoInsert( 'adminpermission', $argsAdd );

            if ( $result ) {
                echo '1';
            } else {
                echo '0';
            }

        }
    }

    public function permissionEdit( RouteCollection $routes ) {
        if ( isset( $_POST[ 'permissionEdit' ] ) ) {

            $authory = json_encode( $_POST[ 'authority' ], true );
            $permissionName = $_POST[ 'permissionName' ];
            $permissionID = $_POST[ 'permissionID' ];

            $argsArray = "
        
            authority = '" . $permissionName . "',
            userAccess = '" . $authory . "'
        
            WHERE id=$permissionID ";

            $this->app->getSecurity( $argsArray );
            $query = $this->app->pdoUpdate( 'adminpermission', $argsArray );

            if ( $query ) {
                echo '1';
            } else {
                echo '0';
            }

        }
    }

}