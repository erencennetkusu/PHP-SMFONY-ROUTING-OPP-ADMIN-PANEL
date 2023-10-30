<?php
namespace App\Controllers;
use App\Models\Model;
use App\Controllers\pageController;
use Symfony\Component\Routing\RouteCollection;

class ourTeamController   extends pageController {
    public function indexAction( RouteCollection $routes )
    {
        $app = new Model();
        $ourTeamList =  $this->app->pdoPrepare( 'SELECT * FROM ourTeam ORDER BY id DESC ' );
        require_once APP_ROOT . '/views/ourTeam.php';

    }

    public function ourTeamAdd( RouteCollection $routes){

        $ourTeamImg = $this->app->upload( 'ourTeamImg', '../public/assets/images/ourTeamImg/' );
        $ourTeamName = $_POST[ 'ourTeamName' ];
        $ourTeamTitle = $_POST[ 'ourTeamTitle' ];
        $argsAdd = [ 'ourTeamImg' => $ourTeamImg, 'ourTeamName' => $ourTeamName, 'ourTeamTitle' => $ourTeamTitle];
        $this->app->getSecurity( $argsAdd );
        $result = $this->app->pdoInsert( 'ourTeam', $argsAdd );

        if ( $result ) {
            echo '1';
        } else {
            echo '0';
        }


    }

    public function ourTeamEditter( RouteCollection $routes){

        $ourTeamImg = $this->app->upload( 'ourTeamImg', '../public/assets/images/ourTeamImg/' );
        $id =  $_POST["ourTeamId"];
        $ourTeamName = $_POST[ 'ourTeamName' ];
        $ourTeamTitle = $_POST[ 'ourTeamTitle' ];


        if ( empty( $_FILES[ 'ourTeamImg' ][ 'name' ] ) ) {
            $argsArray = "
        
            ourTeamName = '" . $ourTeamName . "',
            ourTeamTitle = '" . $ourTeamTitle . "'
    
        WHERE id=$id ";
        } else {
            $argsArray = "
        
            ourTeamName = '" . $ourTeamName . "',
            ourTeamTitle = '" . $ourTeamTitle . "',
            ourTeamImg = '" . $ourTeamImg . "'
    
        WHERE id=$id ";
        }

        $this->app->getSecurity( $argsArray );
        $query = $this->app->pdoUpdate( 'ourTeam', $argsArray );

        if ( $query ) {
            echo '1';
        } else {
            echo '0';
        }
    }
}