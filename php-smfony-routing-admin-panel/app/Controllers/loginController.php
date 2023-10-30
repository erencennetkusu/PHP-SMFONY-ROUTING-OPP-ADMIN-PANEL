<?php
namespace App\Controllers;
use App\Models\Model;
use Symfony\Component\Routing\RouteCollection;

class loginController 
{
	public function index(RouteCollection $routes)
	{
        $app = new Model();
   
        if(isset($_SESSION["uid"]) && isset($_SESSION["role"])  && isset($_SESSION["firstlastname"])){

            header('Location: /');	
        }else{

            $data = $app->securitySetHash("591163");
            require_once APP_ROOT . '/views/login.php';	
        }
        

        
		
       
	}


    public function loginSubmit(RouteCollection $routes){

        $app = new Model();

        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            if (!empty($email) || !empty($password)) {
                $app->getSecurity($email, $password);
                $sql = "usersMail='$email'";
                $result = $app->pdoQuery("SELECT * FROM users WHERE $sql");
                $userID = $result[0]["id"];
                if (password_verify($password, $result[0]["userPasswordHash"])) {
                    if ($result[0]["userStatu"] == 0) {
                        echo "3";
                       
                        exit();
                    }
        
                    if ($result[0]["usersMailStatu"] == 0) {  
                        $mailCode = mt_rand(0,10).mt_rand(10,50).mt_rand(50,200);
                        $argsArray = "
                        usersMailCode = $mailCode
                        WHERE id=$userID ";
        
                        $app->getSecurity($argsArray);
                        $query = $app->pdoUpdate("users", $argsArray);
                        $app->MailGonder($result[0]["usersMail"],"İŞ TAKİP SİSTEMİ | Mail Doğrulama İşlemi","Mail Doğrulama Kodunuz : ".$mailCode);
                        echo "7";
                        $_SESSION["mail"] = $email;
                        exit();
                    }
                    $_SESSION['firstlastname']     = $result[0]["userName"] . " " . $result[0]["userSurname"];
                    $_SESSION["mail"] = $email;
                    $_SESSION["role"] = $result[0]["userRole"];
                    $_SESSION["uid"] =  $result[0]["id"];
                    echo "1";
                } else {
                    echo "4";
                }
                exit();
            } else {
                echo "2";
            }
        }
       	
    }

    public function mailVerification(RouteCollection $routes){
        $app = new Model();
    }

  
}