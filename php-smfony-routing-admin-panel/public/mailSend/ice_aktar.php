<?php
session_start();
ob_start();

$dbhost = "localhost"; //Veritabanın bulunduğu host
$dbuser = "grandby"; //Veritabanı Kullanıcı Adı
$dbpass = "6AxP8x:?Btk"; //Veritabanı Şifresi
$dbdata = "grandby_grandbyte"; //Veritabanı Adı

include 'DBBackupRestore.class.php'; //DBBackup.class.php dosyamızı dahil ediyoruz
$dbBackup = new DBYedek(); // class'imizla $dbBackup nesnemizi olusturduk

function upload( $img, $list ) {
    $input = $img;
    $klasor = $list;
    $target_dir = $klasor;
    $target_file = $target_dir . basename( $_FILES[ $input ][ 'name' ] );
    $imageFileType = strtolower( pathinfo( $target_file, PATHINFO_EXTENSION ) );
    $filename   = uniqid();
    $extension  = pathinfo( $_FILES[ $input ][ 'name' ], PATHINFO_EXTENSION );
    $basename   = $_FILES[ $input ][ 'name' ];

    $yeniyol = $target_dir.$basename;
    move_uploaded_file( $_FILES[ $input ][ 'tmp_name' ], $yeniyol );
    return $yeniyol;
}

if(isset($_POST["mailYedekSend"])){

            $loaing =  upload('yedeksql','temp/');
            $maxKomut = 8;
            echo  $dbBackup->importDatabase($loaing);
            echo "1";
            sleep(3);
            session_destroy();



}

/* // içe aktarımı yapılacak veritabanı.
// maxKomut değişkeni yüksek tutmak aynı anda daha fazla verinin işlenmesine olanak tanır ancak hostu yorar
// echo ini_get('max_execution_time'); ile php.ini dosyasındaki değeri kontrol edebilirsiniz öntanımlı süre genelde 30 saniyedir
$maxKomut = 8; // php.ini dosyasındaki maksimum komut dosyası yürütme sınırınızdan daha az olmalı.

$dbBackup->Ice_Aktar($dosya, $maxKomut);*/

$dbBackup->kapat();// $dbBackup nesnemizi kapattik

ob_end_flush();

?>