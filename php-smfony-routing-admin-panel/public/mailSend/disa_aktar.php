<?php
ob_start();

require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/Exception.php";
require_once "PHPMailer/SMTP.php";



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$dbhost = "localhost"; //Veritabanın bulunduğu host
$dbuser = "grandby"; //Veritabanı Kullanıcı Adı
$dbpass = "6AxP8x:?Btk"; //Veritabanı Şifresi
$dbdata = "grandby_grandbyte"; //Veritabanı Adı

include 'DBBackupRestore.class.php'; //DBBackup.class.php dosyamızı dahil ediyoruz
$dbBackup = new DBYedek(); // class'imizla $dbBackup nesnemizi olusturduk

	//$kayityeri klasor yolu belirtirken sonunda mutlaka / olmali (klasoradi/) seklinde
	$kayityeri	= "temp/";	// ayni dizin için $kayityeri degiskeni bos birakilmali
	$arsiv		= false;	//Yedeği zip arsivi olarak almak için true // .sql olarak almak için false
	$tablosil	= true;		//DROP TABLE IF EXISTS satırı eklemek için true // istenmiyorsa false
	//Veri için kullanılacak sözdizimi:
	$veritipi	= 1; // INSERT INTO tbl_adı VALUES (1,2,3);
	//$veritipi	= 2; // INTO tbl_adı VALUES (1,2,3), (4,5,6), (7,8,9);
	//$veritipi	= 3; // INSERT INTO tbl_adı (sütun_A,sütun_B,sütun_C) VALUES (1,2,3);
	//$veritipi	= 4; // INSERT INTO tbl_adı (col_A,col_B,col_C) VALUES (1,2,3), (4,5,6), (7,8,9);

	$backup = $dbBackup->Disa_Aktar($kayityeri, $arsiv, $tablosil, $veritipi);

	if($backup){
	
	} else {
		echo 'Beklenmedik hata oluştu!';
	}


if(isset($_POST["mailYedekSend"])){

    $settingList =  $dbBackup->pdoPrepare( 'SELECT * FROM mailSmtpData WHERE id=1' );
    $mail = $_POST["mail"];
    if(!empty($mail)){
        MailGonder($mail,"VERİTABANI YEDEK | ".$settingList[0]["firmaMarka"],"VERİTABANINIZ BAŞARILI ŞEKİLDE YEDEK ALINMIŞTIR | ".$settingList[0]["firmaMarka"],$backup);

        echo "1";
    }else{
        echo "5";
    }

}
	 function MailGonder( $posta_mail, $posta_konu, $posta_mesaj,$serverData ) {

        $mail = new PHPMailer();
        try {
            //Sunucu ayarları
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            // Hata ayıklamak için debug etkin
            $mail->isSMTP();
            // SMTP kullanarak gönderim
            $mail->Host       = 'smtp.gmail.com';
            // SMTP sunucusu
            $mail->SMTPAuth   = true;
            // SMTP kimlik doğrulaması etkin
            $mail->Username   = 'cennetkusueren@gmail.com';
            // SMTP kullanıcısı
            $mail->Password   = 'lvggcguzjlckdsjo';
            // SMTP şifre
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            // TLS ile şifreleme etkin
            $mail->Port       = 587;
            // SMTP port
            //Karakter ayarları
            $mail->CharSet  = 'utf-8';
            //Türkçe karakter sorununun önüne geçecektir.
            $mail->Encoding = 'base64';
            // Alıcılar
            $mail->setFrom( $posta_mail, $posta_konu );
            $mail->addAddress( $posta_mail, $posta_konu );
			$mail->AddAttachment($serverData);
            // Alıcı
            //$mail->addReplyTo( 'info@ornek.com', 'Bilgi' );
            //$mail->addCC( 'cc@ornek.com' );
            //$mail->addBCC( 'bcc@ornek.com' );
            // İçerik
            $mail->isHTML( true );
            // Mail HTML formatında olacaktır.
            $mail->Subject = $posta_konu;
            $mail->Body    = $posta_mesaj;
            $mail->AltBody = 'non-HTML mail istemcileri için mesaj gövdesidir.';
            $mail->send();

        } catch ( Exception $e ) {

        }

    }

$dbBackup->kapat();// $dbBackup nesnemizi kapattik

ob_end_flush();
?>