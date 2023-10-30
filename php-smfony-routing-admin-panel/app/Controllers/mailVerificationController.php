<?php
namespace App\Controllers;
use App\Models\Model;
use Symfony\Component\Routing\RouteCollection;

class mailVerificationController 
{
	public function index(RouteCollection $routes)
	{
        $app = new Model();
   
      
            require_once APP_ROOT . '/views/mailVerification.php';	
     

       
	}



    public function mailVerificationSend(RouteCollection $routes){
        $app = new Model();
        if(isset($_POST["mailAdresiDogrula"])){

            $mail =  $_SESSION["mail"];
            $result = $app->pdoQuery("SELECT * FROM users WHERE usersMail='$mail'");
            $mailCode = $_POST["mailCode"];
            $usersCode = $result[0]["usersMailCode"];
            $esifre = $_POST["esifre"];
            $ysifre = $_POST["ysifre"];
            if($usersCode==$mailCode){
        
                if($esifre==$ysifre){
        
                    $passwordHad = $app->securitySetHash($ysifre);
        
                    $argsArray = "
        
                    usersMailStatu = 1,
                    userPasswordHash = '".$passwordHad."'
                
                    WHERE usersMail='$mail' ";
                
                    $app->getSecurity($argsArray);
                    $query = $app->pdoUpdate("users", $argsArray);
                    if($query){echo "20"; unset($_SESSION["mail"]);}else{echo "21";}
        
                }else{
        
                    echo "22";
                }
        
            }else{
        
                echo "21";
            }
        }
}

}