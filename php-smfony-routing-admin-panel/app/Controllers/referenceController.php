<?php
namespace App\Controllers;
use App\Models\Model;
use Symfony\Component\Routing\RouteCollection;

class referenceController extends pageController   
 {

    public function indexAction( RouteCollection $routes )
 {

        $referenceList =  $this->app->pdoPrepare( 'SELECT * FROM outreferences  ORDER BY id DESC' );
        require_once APP_ROOT . '/views/reference.php';

    }

    public function referenceAdd( RouteCollection $routes ) {
        $referenceImg = $this->app->upload( 'referenceImg', '../public/assets/images/referenceImg/' );
        $referanceTitle = $_POST[ 'referanceTitle' ];
        $referanceUrl = $_POST[ 'referanceUrl' ];
        $argsAdd = [ 'referencesImg' => $referenceImg, 'referencesTitle' => $referanceTitle, 'referencesUrl' => $referanceUrl ];
        if($this->pdoEmpty($argsAdd)){
            $this->app->getSecurity( $argsAdd );
            $result = $this->app->pdoInsert( 'outreferences', $argsAdd );

            if ( $result ) {
                echo '1';
            } else {
                echo '0';
            }
        }else{
            echo "5";
        }

    }

    public function referenceEditter( RouteCollection $routes ) {
        $referenceId = $_POST[ 'referenceId' ];
        $referenceImg = $this->app->upload( 'referenceImg', '../public/assets/images/referenceImg/' );
        $referanceTitle = $_POST[ 'referanceTitle' ];
        $referanceUrl = $_POST[ 'referanceUrl' ];

        if ( empty( $_FILES[ 'referenceImg' ][ 'name' ] ) ) {
            $argsArray = "
        
            referencesTitle = '" . $referanceTitle . "',
            referencesUrl = '" . $referanceUrl . "'
    
        WHERE id=$referenceId ";
        } else {
            $argsArray = "
        
            referencesImg = '" . $referenceImg . "',
            referencesTitle = '" . $referanceTitle . "',
            referencesUrl = '" . $referanceUrl . "'
        
            WHERE id=$referenceId ";
        }

        $this->app->getSecurity( $argsArray );
        $query = $this->app->pdoUpdate( 'outreferences', $argsArray );

        if ( $query ) {
            echo '1';
        } else {
            echo '0';
        }
    }

}