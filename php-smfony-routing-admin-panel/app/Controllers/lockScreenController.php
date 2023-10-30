<?php
namespace App\Controllers;
use App\Models\Model;
use Symfony\Component\Routing\RouteCollection;

class lockScreenController extends pageController
{

    public function indexAction( RouteCollection $routes )
    {
        $settingsData =  $this->app->pdoPrepare( 'SELECT * FROM settings WHERE id=1' );

        if($settingsData[0]["LockScreen"]==0){
            $argsArray = "
        LockScreen = 1
        
        WHERE id=1 ";
            $this->app->getSecurity($argsArray);
            $query2 = $this->app->pdoUpdate('settings', $argsArray);

        }


        require_once APP_ROOT . '/views/lockScreen.php';

    }

    public function  lockScreenOpen(RouteCollection $routes){

        $password = $_POST["password"];
        $result = $this->app->pdoQuery("SELECT * FROM users WHERE id=".$_SESSION["uid"]);
        if (password_verify($password, $result[0]["userPasswordHash"])) {

            $argsArray = "
        LockScreen = '0'
        
        WHERE id=1 ";
            $this->app->getSecurity($argsArray);
            $query2 = $this->app->pdoUpdate('settings', $argsArray);
            if($query2){
                echo "1";
            }

        }else{
            echo "0";
        }


    }



}