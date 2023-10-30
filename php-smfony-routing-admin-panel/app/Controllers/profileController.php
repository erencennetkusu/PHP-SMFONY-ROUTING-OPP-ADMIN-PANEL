<?php
namespace App\Controllers;
use App\Models\Model;
use Symfony\Component\Routing\RouteCollection;

class profileController extends pageController
{

    public function indexAction(RouteCollection $routes)
    {


        require_once APP_ROOT . '/views/profile.php';

    }

    public function profileUpdates(RouteCollection $routes)
    {

        $id = $_SESSION["uid"];
        $userName = $_POST["userName"];
        $userSurname = $_POST["userSurname"];
        $userPhone = $_POST["userPhone"];
        $usersMail = $_POST["usersMail"];
        $userPasswordHash = $this->app->securitySetHash($_POST["userPasswordHash"]);
        $mailVerification = $_POST["mailVerification"];

        $argsEmpty = [$userName,$userSurname,$userPhone,$usersMail,$_POST["userPasswordHash"],$mailVerification];

        $empty = $this->app->pdoEmpty($argsEmpty);
        if(!$empty){echo "5";exit();}

        $usersData = $this->app->pdoPrepare("SELECT * FROM users WHERE id=" . $_SESSION["uid"]);

        if ($usersData[0]["profileVerificationCode"] == $mailVerification) {
            $argsArray = "
        
        userName = '" . $userName . "',
        userSurname = '" . $userSurname . "',
        usersMail = '" . $usersMail . "',
        userPhone = '" . $userPhone . "',
        userPasswordHash = '" . $userPasswordHash . "'
        
    
        WHERE id=$id ";
            $this->app->getSecurity($argsArray);

            $query = $this->app->pdoUpdate('users', $argsArray);
            if($query){

                $argsArray = "
        
        profileVerificationCode = '0000'
        
    
        WHERE id=$id ";
                $this->app->getSecurity($argsArray);
                $query2 = $this->app->pdoUpdate('users', $argsArray);

                echo "1";
                sleep(1);
                 session_destroy();
            }else{
                echo "0";
            }
        }else{
            echo "21";
        }




}

public  function profileImgUpload(RouteCollection $routes){


        $resim = $this->app->upload( 'resim', 'assets/images/profileImages/' );
        $id = $_SESSION["uid"];
        $argsArray = "
        userImage = '".$resim."'
        WHERE id=$id ";
        $this->app->getSecurity($argsArray);
        $query2 = $this->app->pdoUpdate('users', $argsArray);

    echo "1";
}




    }

