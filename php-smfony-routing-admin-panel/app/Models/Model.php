<?php

namespace App\Models;
use PDO;
use PDOException;


require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/Exception.php";
require_once "PHPMailer/SMTP.php";



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Model   {

    protected $pdo = null;

    public function __construct()
 {

        try {
            $this->pdo = new PDO( 'mysql:host='. DB_HOST .';dbname='. DB_NAME .';charset=utf8mb4', DB_USER, DB_PASS );
        } catch ( PDOException $e ) {
            die( $e->getMessage() );
        }
    }

    public function  lastInsertID() {

        return $this->pdo->lastInsertId();
    }

    public function pdoQuery( $sql ) {

        $query = $this->pdo->query( $sql );
        $result = $query->fetchAll( PDO::FETCH_ASSOC );
        if ( $result ) {

            return $result;
        } else {

            return false;
        }
    }

    public function pdoPrepare( $sql, $args = [] ) {

        $prepare = $this->pdo->prepare( $sql );
        $prepare->execute( $args );
        $result = $prepare->fetchAll( PDO::FETCH_ASSOC );
        if ( $result ) {

            return $result;
        } else {

            return false;
        }
    }

    public function pdoInsert( $sql, $args = [] ) {

        $result = 0;
        $dataset1 = '';
        $dataset2 = '';
        foreach ( $args as $key => $value ) {
            $dataset1 .= $key . ',';
            $dataset2 .= ':'.$key.',';
        }

        $dataset1 = substr( $dataset1, 0, strlen( $dataset1 )-1 );
        $dataset2 = substr( $dataset2, 0, strlen( $dataset2 )-1 );

        $query = $this->pdo->prepare( 'INSERT INTO '.$sql.' ('.$dataset1.') VALUES ('.$dataset2.')' );
        $query->execute( $args );
        if ( $query ) {
            $result =  'Başarılı';
        } else {
            $result = 'başarısız';
        }
        return $result ;

    }


    public function pdoEmpty( $variable ) {
        if ( is_array( $variable ) ) {
            foreach ( $variable as $value ) {
                if ( is_null( $value ) ) {
                    return false;
                } elseif ( empty( $value ) ) {
                    return false;
                }
            }
        } elseif ( is_null( $variable ) ) {
            return false;

        } elseif ( empty( $variable ) ) {
            return false;
        }
        return true;
    }

    public function pdoUpdate( $sql, $args ) {

        $update = $this->pdo->prepare( 'UPDATE '.$sql.' SET '.$args );
        $updateControl =  $update->execute();
        if ( $updateControl ) {

            return true;
        } else {

            return false;
        }

    }

    public function  pdoDelete( $sql, $row, $data ) {

        $delete = $this->pdo->prepare( "DELETE FROM $sql WHERE $row=? " );
        $deleteControl = $delete->execute( [ $data ] );
        if ( $deleteControl ) {

            return true;
        } else {

            return false;
        }
    }

    public  function  multipleUpload( $img, $list, $tablo, $sutun, $row, $id ) {
        $klasor = $list;
        $resim_sayisi = count( $_FILES[ $img ][ 'name' ] );
        $result_count = ( int )$this->dataCount( $tablo, "$row=$id" );
        if ( $result_count>0 ) {

            $args = "SELECT * FROM  $tablo  WHERE $row=".$id;
            $this->getSecurity( $args );
            $result_file = $this->pdoQuery( $args );
            foreach ( $result_file as $key => $value ) {

                $files_img = $value[ $sutun ];
                $files_id = $value[ $row ];
                $this->pdoDelete( $tablo, $row, $files_id );
                $dosya = $list.$img;
                if ( file_exists( $dosya ) ) {
                    unlink( $dosya );
                }

            }
            for ( $i = 0; $i < $resim_sayisi; $i++ ) {

                $resimBoyutu = $_FILES[ $img ][ 'size' ][ $i ];
                $tip = $_FILES[ $img ][ 'type' ][ $i ];
                $filename   = uniqid();
                $extension  = pathinfo( $_FILES[ $img ][ 'name' ], PATHINFO_EXTENSION );
                $basename   = $filename . '.' . $extension.'jpg';
                $yeniyol = $klasor.$basename;
                $resimAdi = $basename;
                $args2 = [
                    "$sutun"=>$resimAdi,
                    "$row"=>$id
                ];
                $this->getSecurity( $args2 );
                $this->pdoInsert( $tablo, $args2 );
                if ( $tip == 'image/jpeg' || $tip == 'image/jpg' || $tip == 'image/png' ) {
                    if ( move_uploaded_file( $_FILES[ $img ][ 'tmp_name' ][ $i ], $yeniyol ) ) {
                    } else $yuklenemeyenler[] = $_FILES[ $img ][ 'name' ][ $i ] . ' BİLİNMİYOR';
                } else {
                    $yuklenemeyenler[] = $_FILES[ $img ][ 'name' ][ $i ] . ' UZANTI';
                }
            }
            return true;

        } else {
            for ( $i = 0; $i < $resim_sayisi; $i++ ) {
                $resimBoyutu = $_FILES[ $img ][ 'size' ][ $i ];
                $tip = $_FILES[ $img ][ 'type' ][ $i ];
                $filename   = uniqid();
                $extension  = pathinfo( $_FILES[ $img ][ 'name' ], PATHINFO_EXTENSION );
                $basename   = $filename . '.' . $extension.'jpg';
                $yeniyol = $klasor.$basename;
                $resimAdi = $basename;
                $args2 = [
                    "$sutun"=>$resimAdi,
                    "$row"=>$id

                ];
                $this->getSecurity( $args2 );
                $this->pdoInsert( $tablo, $args2 );
                if ( $tip == 'image/jpeg' || $tip == 'image/jpg' || $tip == 'image/png' ) {
                    if ( move_uploaded_file( $_FILES[ $img ][ 'tmp_name' ][ $i ], $yeniyol ) ) {
                    } else $yuklenemeyenler[] = $_FILES[ $img ][ 'name' ][ $i ] . ' BİLİNMİYOR';
                } else {
                    $yuklenemeyenler[] = $_FILES[ $img ][ 'name' ][ $i ] . ' UZANTI';
                }
            }
            return true;

        }
    }

    public  function  multipleUploadNoDelete( $img, $list, $tablo, $sutun, $row, $id ) {
        $klasor = $list;
        $resim_sayisi = count( $_FILES[ $img ][ 'name' ] );
        $result_count = ( int )$this->dataCount( $tablo, "$row=$id" );
        if ( $result_count>0 ) {

            for ( $i = 0; $i < $resim_sayisi; $i++ ) {

                $resimBoyutu = $_FILES[ $img ][ 'size' ][ $i ];
                $tip = $_FILES[ $img ][ 'type' ][ $i ];
                $filename   = uniqid();
                $extension  = pathinfo( $_FILES[ $img ][ 'name' ], PATHINFO_EXTENSION );
                $basename   = $filename . '.' . $extension.'jpg';
                $yeniyol = $klasor.$basename;
                $resimAdi = $basename;
                $args2 = [
                    "$sutun"=>$resimAdi,
                    "$row"=>$id
                ];
                $this->getSecurity( $args2 );
                $this->pdoInsert( $tablo, $args2 );
                if ( $tip == 'image/jpeg' || $tip == 'image/jpg' || $tip == 'image/png' ) {
                    if ( move_uploaded_file( $_FILES[ $img ][ 'tmp_name' ][ $i ], $yeniyol ) ) {
                    } else $yuklenemeyenler[] = $_FILES[ $img ][ 'name' ][ $i ] . ' BİLİNMİYOR';
                } else {
                    $yuklenemeyenler[] = $_FILES[ $img ][ 'name' ][ $i ] . ' UZANTI';
                }
            }
            return true;

        } else {
            for ( $i = 0; $i < $resim_sayisi; $i++ ) {
                $resimBoyutu = $_FILES[ $img ][ 'size' ][ $i ];
                $tip = $_FILES[ $img ][ 'type' ][ $i ];
                $filename   = uniqid();
                $extension  = pathinfo( $_FILES[ $img ][ 'name' ], PATHINFO_EXTENSION );
                $basename   = $filename . '.' . $extension.'jpg';
                $yeniyol = $klasor.$basename;
                $resimAdi = $basename;
                $args2 = [
                    "$sutun"=>$resimAdi,
                    "$row"=>$id

                ];
                $this->getSecurity( $args2 );
                $this->pdoInsert( $tablo, $args2 );
                if ( $tip == 'image/jpeg' || $tip == 'image/jpg' || $tip == 'image/png' ) {
                    if ( move_uploaded_file( $_FILES[ $img ][ 'tmp_name' ][ $i ], $yeniyol ) ) {
                    } else $yuklenemeyenler[] = $_FILES[ $img ][ 'name' ][ $i ] . ' BİLİNMİYOR';
                } else {
                    $yuklenemeyenler[] = $_FILES[ $img ][ 'name' ][ $i ] . ' UZANTI';
                }
            }
            return true;

        }
    }


    function seflink($text){
        $find = array("/Ğ/","/Ü/","/Ş/","/İ/","/Ö/","/Ç/","/ğ/","/ü/","/ş/","/ı/","/ö/","/ç/");
        $degis = array("G","U","S","I","O","C","g","u","s","i","o","c");
        $text = preg_replace("/[^0-9a-zA-ZÄzÜŞİÖÇğüşıöç]/"," ",$text);
        $text = preg_replace($find,$degis,$text);
        $text = preg_replace("/ +/"," ",$text);
        $text = preg_replace("/ /","-",$text);
        $text = preg_replace("/\s/","",$text);
        $text = strtolower($text);
        $text = preg_replace("/^-/","",$text);
        $text = preg_replace("/-$/","",$text);
        return $text;
    }




    public function upload($img, $list) {
        $input = $img;
        $klasor = $list;
        $target_dir = $klasor;
        $target_file = $target_dir . basename($_FILES[$input]['name']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $filename = uniqid();
        $extension = pathinfo($_FILES[$input]['name'], PATHINFO_EXTENSION);
        $basename = $_FILES[$input]['name'];

        $yeniyol = $target_dir . $basename;

        // Geçerli dosya türlerini tanımlayalım (JPEG ve PNG)
        $allowed_extensions = array('jpg', 'jpeg', 'png',"JPG","PNG");

        // Dosya türünü kontrol edelim
        if (!in_array($extension, $allowed_extensions)) {
            // Geçersiz dosya türü
            return false;
        }

        move_uploaded_file($_FILES[$input]['tmp_name'], $yeniyol);

        return $basename;
    }




    public function dataCount( $sql, $where ) {

        $query = $this->pdo->query( "SELECT COUNT(*) AS data_count FROM $sql WHERE $where" );
        $result = $query->fetchAll( PDO::FETCH_ASSOC );
        if ( $result ) {

            return $result[ 0 ][ 'data_count' ];
        } else {

            return false;
        }
    }

    public function questionAuthority( $sql, $where ) {

        $query = $this->pdo->query( "SELECT * FROM $sql WHERE $where" );
        $result = $query->fetchAll( PDO::FETCH_ASSOC );
        if ( $result ) {

            return $result;
        } else {

            return false;
        }
    }

    public function getSecurity( $data ) {

        if ( is_array( $data ) ) {

            $varible = array_map( 'htmlspecialchars', $data );
            $response = array_map( 'stripslashes', $varible );
            $respon = str_replace( [ 'INSERT', 'DELETE', 'UPDATE', 'delete', 'insert', 'update', 'JOIN', 'SHOW', 'DECLARE', 'ALTER', 'CREATE', 'ADD' ], ' ', $response );
            return $respon;
        } else {

            $varible = htmlspecialchars( $data );
            $response = stripslashes( $varible );
            $respon = str_replace( [ 'INSERT', 'DELETE', 'UPDATE', 'delete', 'insert', 'update', 'JOIN', 'SHOW', 'DECLARE', 'ALTER', 'CREATE', 'ADD' ], ' ', $response );
            return $respon;
        }
    }

    public function dateTime() {

        return date( 'Y-m-d H:i:s' );
    }

    public function  securitySetHash( $data ) {
        $options = [
            'cost' => 12
        ];
        $new_password = password_hash( $data, PASSWORD_DEFAULT, $options );
        return $new_password;
    }

    public function dateCalculate( $t ) {
        $tarih = date( 'Y-m-d' );

        $date_yil = substr( $tarih, 0, 4 );
        $date_ay = substr( $tarih, 5, 6 );
        $date_ay_hesapla = ( int )substr( $date_ay, 0, 2 );
        $date_gun_hesapla = ( int )substr( $date_ay, 3, 5 );

        $t_yil = substr( $t, 0, 4 );
        $t_ay = substr( $t, 5, 6 );
        $t_ay_hesapla = ( int )substr( $t_ay, 0, 2 );
        $t_gun_hesapla = ( int )substr( $t_ay, 3, 5 );
        if ( $date_yil == $t_yil ) {
            if ( $date_ay_hesapla<$t_ay_hesapla ) {
                echo 'Süreniz Dolmuştur';
            } else if ( $date_ay_hesapla>$t_ay_hesapla || $date_ay_hesapla == $t_ay_hesapla && $date_gun_hesapla>$t_gun_hesapla ) {
                echo 'Süreniz Dolmuştur';
            } else if ( $date_ay_hesapla>$t_ay_hesapla || $date_ay_hesapla == $t_ay_hesapla && $date_gun_hesapla<$t_gun_hesapla ||
            $date_gun_hesapla == $t_gun_hesapla ) {
                echo 'Süreniz Geçerlidir';
            }
        } else {
            echo 'Süresi Dolmuştur';
        }

    }

    function saat_farki( $saat ) {
        date_default_timezone_get( 'Europe/İstanbul' );
        $şuanki_saat = time();
        $gelen_saat = strtotime( $saat );
        $fark = $şuanki_saat - $gelen_saat;
        $dakika = $fark / 60;
        $saniye_farki = floor( $fark - ( floor( $dakika ) * 60 ) );

        $saat = $dakika / 60;
        $dakika_farki = floor( $dakika - ( floor( $saat ) * 60 ) );

        $gun = $saat / 24;
        $saat_farki = floor( $saat - ( floor( $gun ) * 24 ) );

        $yil = floor( $gun/365 );
        $gun_farki = floor( $gun - ( floor( $yil ) * 365 ) );

        $array = array(
            'yil_farki' =>  $yil,
            'gun_farki' =>  $gun_farki,
            'saat_farki' =>  $saat_farki,
            'dakika_farki' =>  $dakika_farki,
            'saniye_farki' =>  $saniye_farki
        );

        return $array;

    }





    public   function systemDataSql(){
        $dbhost = DB_HOST; //Veritabanın bulunduğu host
        $dbuser = DB_USER; //Veritabanı Kullanıcı Adı
        $dbpass = DB_PASS; //Veritabanı Şifresi
        $dbdata = DB_NAME; //Veritabanı Adı



        //$kayityeri klasor yolu belirtirken sonunda mutlaka / olmali (klasoradi/) seklinde
        $kayityeri	= "temp/";	// ayni dizin için $kayityeri degiskeni bos birakilmali
        $arsiv		= false;	//Yedeği zip arsivi olarak almak için true // .sql olarak almak için false
        $tablosil	= true;		//DROP TABLE IF EXISTS satırı eklemek için true // istenmiyorsa false
        //Veri için kullanılacak sözdizimi:
        $veritipi	= 1; // INSERT INTO tbl_adı VALUES (1,2,3);
        //$veritipi	= 2; // INTO tbl_adı VALUES (1,2,3), (4,5,6), (7,8,9);
        //$veritipi	= 3; // INSERT INTO tbl_adı (sütun_A,sütun_B,sütun_C) VALUES (1,2,3);
        //$veritipi	= 4; // INSERT INTO tbl_adı (col_A,col_B,col_C) VALUES (1,2,3), (4,5,6), (7,8,9);

        return  $backup = $this->Disa_Aktar($kayityeri, $arsiv, $tablosil, $veritipi);

    }







    function MailGonderData( $posta_mail, $posta_konu, $posta_mesaj,$serverData ) {

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




    public function MailGonder( $posta_mail, $posta_konu, $posta_mesaj ) {
        $mailData =  $this->pdoPrepare( 'SELECT * FROM  mailSmtpData WHERE id=1' );
        $mail = new PHPMailer();
        try {
            //Sunucu ayarları
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            // Hata ayıklamak için debug etkin
            $mail->isSMTP();
            // SMTP kullanarak gönderim
            $mail->Host       = $mailData[0]["mailHost"];
            // SMTP sunucusu
            $mail->SMTPAuth   = true;
            // SMTP kimlik doğrulaması etkin
            $mail->Username   = $mailData[0]["mailUsername"];
            // SMTP kullanıcısı
            $mail->Password   = $mailData[0]["mailPassword"];
            // SMTP şifre
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            // TLS ile şifreleme etkin
            $mail->Port       =  $mailData[0]["mailPort"];
            // SMTP port
            //Karakter ayarları
            $mail->CharSet  = 'utf-8';
            //Türkçe karakter sorununun önüne geçecektir.
            $mail->Encoding = 'base64';
            // Alıcılar
            $mail->setFrom( $posta_mail, $posta_konu );
            $mail->addAddress( $posta_mail, $posta_konu );
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

}

?>