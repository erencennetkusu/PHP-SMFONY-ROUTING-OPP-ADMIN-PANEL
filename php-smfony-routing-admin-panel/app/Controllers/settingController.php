<?php
namespace App\Controllers;
use App\Models\Model;
use Symfony\Component\Routing\RouteCollection;

class settingController extends pageController
 {

    public function indexAction( RouteCollection $routes )
 {

        $settingList =  $this->app->pdoPrepare( 'SELECT * FROM settings  ORDER BY id DESC' );
        $settingsForm =  $this->app->pdoPrepare( 'SELECT * FROM communication  ORDER BY id DESC' );
        $smtpSettings =  $this->app->pdoPrepare( 'SELECT * FROM mailSmtpData  ' );
        require_once APP_ROOT . '/views/setting.php';

    }



    public function settingsEditter( RouteCollection $routes ) {
        $settingsId = $_POST[ 'settingsId' ];
        $settingIcon = $this->app->upload( 'settingIcon', '../public/assets/images/siteImg/' );
        $settingsTitle = $_POST[ 'settingsTitle' ];
        $settingsDescription = $_POST[ 'settingsDescription' ];
        $settingsKeywords = $_POST[ 'settingsKeywords' ];
        $settingsAuthor = $_POST[ 'settingsAuthor' ];


        if ( empty( $_FILES[ 'settingIcon' ][ 'name' ] ) ) {
            $argsArray = "
        
            Title = '" . $settingsTitle . "',
            description = '" . $settingsDescription . "',
            keywords = '" . $settingsKeywords . "',
            author = '" . $settingsAuthor . "'
    
        WHERE id=$settingsId ";
        } else {
            $argsArray = "
        
            icon = '" . $settingIcon . "',
            Title = '" . $settingsTitle . "',
            description = '" . $settingsDescription . "',
            keywords = '" . $settingsKeywords . "',
            author = '" . $settingsAuthor . "'
        
            WHERE id=$settingsId ";
        }

        $this->app->getSecurity( $argsArray );
        $query = $this->app->pdoUpdate( 'settings', $argsArray );

        if ( $query ) {
            echo '1';
        } else {
            echo '0';
        }
    }

    public function settingsForm(RouteCollection $routes){
        $phone = $_POST["phone"];
        $adress = $_POST["adress"];
        $mail = $_POST["mail"];
        $id = $_POST["id"];
        $facebook = $_POST["facebook"];
        $instagram = $_POST["instagram"];
        $twitter = $_POST["twitter"];
        $linkdedin = $_POST["linkdedin"];
        $youtube = $_POST["youtube"];

                 $argsArray = "
        
            phone = '" . $phone . "',
            adress = '" . $adress . "',
            mail = '" . $mail . "',
            facebook = '" . $facebook . "',
            instagram = '" . $instagram . "',
            twitter = '" . $twitter . "',
            linkdedin = '" . $linkdedin . "',
            youtube = '" . $youtube . "'
    
        WHERE id=$id ";

        $this->app->getSecurity( $argsArray );
        $query = $this->app->pdoUpdate( 'communication', $argsArray );

        if ( $query ) {
            echo '1';
        } else {
            echo '0';
        }

    }

    public function smtpSettings(RouteCollection $routes){
        $settingsId = 1;
        $smtpHost = $_POST[ 'smtpHost' ];
        $smtpUserName = $_POST[ 'smtpUserName' ];
        $smtpPassword = $_POST[ 'smtpPassword' ];
        $smtpMailPort = $_POST[ 'smtpMailPort' ];
        $firmaMarka = $_POST["firmaMarka"];



            $argsArray = "
        
            mailHost = '" . $smtpHost . "',
            firmaMarka = '" . $firmaMarka . "',
            mailUsername = '" . $smtpUserName . "',
            mailPassword = '" . $smtpPassword . "',
            mailPort = '" . $smtpMailPort . "'
        
            WHERE id=$settingsId ";

        $this->app->getSecurity( $argsArray );
        $query = $this->app->pdoUpdate( 'mailSmtpData', $argsArray );

        if ( $query ) {
            echo '1';
        } else {
            echo '0';
        }
    }


    public function mailSendSql(RouteCollection $routes){
        $mail = $_POST["mail"];



        echo "1";
    }

}