<?php
namespace App\Controllers;
use App\Models\Model;
use Symfony\Component\Routing\RouteCollection;

class pageController    
 {

    protected $app = NULL;
    protected $header = NULL;
    protected $navbar = NULL;
    protected $sidebar = NULL;
    protected $footer = NULL;
    protected $profileResult = NULL;
    protected $roleResult = NULL;
    protected $menuResult = NULL;

    public function __construct() {
        $this->app = new Model();
        $this->header = APP_ROOT.'/views/templates/header.php';
        $this->sidebar = APP_ROOT.'/views/templates/sidebar.php';
        $this->navbar = APP_ROOT.'/views/templates/navbar.php';
    
        $this->footer = APP_ROOT.'/views/templates/footer.php';


        if(!isset($_SESSION["uid"]) && !isset($_SESSION["role"])  && !isset($_SESSION["firstlastname"])){

            header('Location: /login');	
            exit();
        }



   




        $this->profileResult = $this->app->pdoPrepare( 'SELECT * FROM users WHERE id='.$_SESSION[ 'uid' ] );
        $this->roleResult = $this->app->pdoPrepare( 'SELECT * FROM adminpermission WHERE id='.$_SESSION[ 'role' ] );
        $this->menuResult =  $this->app->pdoPrepare( 'SELECT * FROM adminmenuler WHERE menuStatu<4 ORDER BY menuSira ASC' );



       
    }

    public function removeData( RouteCollection $routes ) {
        if ( isset( $_POST[ 'removeData' ] ) ) {
            $tablo = $_POST[ 'tablo' ];
            $row = $_POST[ 'row' ];
            $id = $_POST[ 'sutun' ];
            $args = "
            $row = 4
            WHERE id= $id";
            $this->app->getSecurity( $args );
            $query = $this->app->pdoUpdate( "$tablo", $args );
            if ( $query ) {
                echo 'Kayıt Başarılı Şekilde Silinmiştir.';
            } else {
                echo '0';
            }
        }
    }
    public function removeDataDelete( RouteCollection $routes ) {
        if ( isset( $_POST[ 'removeData' ] ) ) {
            $tablo = $_POST[ 'tablo' ];
            $id = $_POST[ 'row' ];
            $args = "DELETE FROM $tablo WHERE id=".$id;
            $this->app->getSecurity( $args );
            $query = $this->app->pdoQuery( $args );
            if ( $query ) {
                echo 'Kayıt Başarılı Şekilde Silinmiştir.';
            } else {
                echo 'Kayıt Başarılı Şekilde Silinmiştir.';
            }
        }
    }

    public function aktifPasif ( RouteCollection $routes ) {

        if ( isset( $_POST[ 'datestatu' ] ) ) {

            $id = $_POST[ 'id' ];
            $statu = $_POST[ 'statu' ];
            $tablo = $_POST[ 'tablo' ];
            $sutun = $_POST[ 'sutun' ];
            $app->getSecurity( $id, $statu, $tablo, $sutun );
            $args = "
                    $sutun = $statu
        
                    WHERE id= $id";

            $this->app->getSecurity( $args );
            $query = $this->app->pdoUpdate( "$tablo", $args );
            if ( $query ) {
                echo '1';
            } else {
                echo '0';
            }
        }
    }


    public function Logout(RouteCollection $routes){
        session_destroy();
        if(!isset($_SESSION["uid"]) && !isset($_SESSION["role"])  && !isset($_SESSION["firstlastname"])){

            header('Location: /login');	
            exit();
        }
    }


    public function provinceSelect(RouteCollection $routes){
        if(isset($_POST["sehirsearch"])){

            $provinceID = $_POST["product_id"];
        
            $result =  $this->app->pdoPrepare("SELECT * FROM district WHERE cityCode=".$provinceID);
        
            foreach ($result as $key => $value) {
                
                echo "<option value='".$value["id"]."'>".$value["name"]."</option>";
            }
        }
    }

    public function removeAllData( RouteCollection $routes ) {
        if ( isset( $_POST[ 'removeAllData' ] ) ) {
            $tablo = $_POST[ 'tablo' ];
            if(isset($_POST["row"])){$row = $_POST["row"];}

            if(!empty($row)){
                foreach ($row as $key => $value) {
                    $args = "DELETE FROM $tablo WHERE id=".$value;
                    $this->app->getSecurity( $args );
                    $query = $this->app->pdoQuery( $args );
                }
                if ( $query ) {
                    echo '1';
                } else {
                    echo '1';
                }
            }else{
                echo "2";
            }




        }
    }

    public function mailSend(RouteCollection $routes){


        if(isset($_POST["mailSend"])){
            $mailData =  $this->app->pdoPrepare( 'SELECT * FROM  mailSmtpData WHERE id=1' );
            $id = $_SESSION["uid"];
            $postaMail = $_SESSION["mail"];
            $postaKonu =  $mailData[0]["firmaMarka"]." PERSONEL BİLGİ DEĞİŞİM DOĞRULAMA KODU ";
            $postaMesaj = mt_rand(10,99).mt_rand(100,999).mt_rand(1000,9999);
            $argsArray = "
             profileVerificationCode = '" . $postaMesaj . "'
        WHERE id=$id ";
        $query = $this->app->pdoUpdate('users', $argsArray);

            $this->app->MailGonder($postaMail,$postaKonu,$mailData[0]["firmaMarka"]." PERSONEL BİLGİ DEĞİŞİM DOĞRULAMA KODU : ".$postaMesaj);
            echo "1";
        }
    }

    public function logutController(RouteCollection $routes){
        if(isset($_POST["logutController"])){
            if(!isset($_SESSION["uid"]) && !isset($_SESSION["role"])  && !isset($_SESSION["firstlastname"])){

              echo "1";
            }
        }
    }

    

}