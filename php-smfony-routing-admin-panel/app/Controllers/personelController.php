<?php
namespace App\Controllers;
use App\Models\Model;
use Symfony\Component\Routing\RouteCollection;

class personelController extends pageController   
 {

    public function indexAction( RouteCollection $routes )
 {

        $personelList =  $this->app->pdoPrepare( 'SELECT * FROM users WHERE userStatu<4 ORDER BY id DESC' );
        $personelYetki = $this->app->pdoPrepare( 'SELECT * FROM adminpermission' );

        require_once APP_ROOT . '/views/personel.php';

    }

    public function personelEditView( RouteCollection $routes ) {
        if ( isset( $_POST[ 'personelDuzenle' ] ) ) {

            $id = $_POST[ 'id' ];
            $html = '';
            $result =  $this->app->pdoPrepare( "SELECT * FROM users WHERE userStatu<4 and id=$id" );
            if ( $result ) {

                $html = '
            
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalgridLabel">Personel Düzenle</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="adminEditter" onsubmit="return false;" method="post">
            <div class="row g-3">
            <div class="col-xxl-6">
            <div>
                <label for="firstName" class="form-label">Adınız</label>
                <input type="text" class="form-control" name="firstName" value="'.$result[ 0 ][ 'userName' ].'" placeholder="Adınızı Giriniz">
            </div>
            </div>
            <!--end col-->
            <div class="col-xxl-6">
            <div>
                <label for="lastName" class="form-label">Soyadınız</label>
                <input type="text" class="form-control" value="'.$result[ 0 ][ 'userSurname' ].'" name="surname" placeholder="Soyadınızı Giriniz">
            </div>
            </div>
            <!--end col-->
            <div class="col-lg-12">
            <label class="form-label">Admin Yetki</label>
            <div>';

                $result2 = $this->app->pdoPrepare( 'SELECT * FROM adminpermission WHERE statu<4' );

                foreach ( $result2 as $key2 => $valuePermission ) {
                    $var = '';
                    $formPost = 'serialize2("adminEditter","/personelEdit")';
                    if ( $result[ 0 ][ 'userRole' ] == $valuePermission[ 'id' ] ) {
                        $var =  'checked';
                    }

                    $html .= '<div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio"'.$var.' name="status" id="inlineRadio1" value="'.$valuePermission[ 'id' ].'">
                    <label class="form-check-label" for="inlineRadio1">'.$valuePermission[ 'authority' ].'</label>
                </div>';

                }

                $html .= '</div>
            </div>
            
            
            <!--end col-->
            <div class="col-xxl-6">
            <label for="emailInput" class="form-label">Mail Adresi</label>
            <input type="email" class="form-control" value="'.$result[ 0 ][ 'usersMail' ].'" name="mail" id="emailInput" placeholder="Mail Adresinizi Giriniz">
            </div>
            
            <div class="col-xxl-6">
            <label for="emailInput" class="form-label">Telefon Numarası</label>
            <input type="phone" class="form-control" value="'.$result[ 0 ][ 'userPhone' ].'" id="emailInput" name="phone" placeholder="Telefon Numaranızı  Giriniz">
            </div>
            <!--end col-->
            <div class="col-xxl-6">
            <label for="passwordInput" class="form-label">Profil Resmi </label>
            <input type="file" class="form-control" name="profile" id="passwordInput">
            </div>
            <input type="hidden" class="form-control" name="id" value="'.$result[ 0 ][ 'id' ].'" id="passwordInput">
            <input type="hidden" class="form-control" name="adminEdit" >
            
            <!--end col-->
            <div class="col-lg-12">
            <div class="hstack gap-2 justify-content-end">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" onclick='.$formPost.'>Düzenle</button>
            </div>
            </div>
            <!--end col-->
            </div>
            <!--end row-->
            </form>
            </div>
            </div>
            
            ';
            }
            echo $html;

        }

    }

    public function personelEdit( RouteCollection $routes ) {
        if ( isset( $_POST[ 'adminEdit' ] ) ) {

            $name = $_POST[ 'firstName' ];
            $surname = $_POST[ 'surname' ];
            $id = $_POST[ 'id' ];
            if ( isset( $_POST[ 'status' ] ) ) {
                $statu = $_POST[ 'status' ];
            } else {
                $statu = 0;
                echo '5';
                exit();
            }
            $mail = $_POST[ 'mail' ];
            $phone = $_POST[ 'phone' ];
            if ( $_FILES[ 'profile' ][ 'name' ] == '' || $_FILES[ 'profile' ][ 'name' ] == null ) {

                $args = [ $name, $surname, $mail, $phone ];
                $empty = $this->app->pdoEmpty( $args );
                if ( $empty ) {

                    $argsArray = "
        
                    userName = '" . $name . "',
                    userSurname = '" . $surname . "',
                    usersMail = '" . $mail . "',
                    userPhone = '" . $phone . "',
                    userRole = " . $statu . "
                    WHERE id=$id ";

                    $this->app->getSecurity( $argsArray );
                    $query = $this->app->pdoUpdate( 'users', $argsArray );

                    echo '1';
                } else {

                    echo '5';
                    exit();
                }
            } else {

                $profilImg = $this->app->upload( 'profile', 'assets/images/profileImages/' );

                $argsArray = "
        
                userName = '" . $name . "',
                userSurname = '" . $surname . "',
                usersMail = '" . $mail . "',
                userPhone = '" . $phone . "',
                userImage = '" . $profilImg . "',
                userRole = " . $statu . "
                WHERE id=$id ";

                $this->app->getSecurity( $argsArray );
                $query = $this->app->pdoUpdate( 'users', $argsArray );

                echo '1';
            }
        }
    }

    public function personelAdd( RouteCollection $routes ) {
        if ( isset( $_POST[ 'adminAdd' ] ) ) {

            $name = $_POST[ 'firstName' ];
            $surname = $_POST[ 'surname' ];
            if ( isset( $_POST[ 'status' ] ) ) {
                $statu = $_POST[ 'status' ];
            } else {
                $statu = 0;
                echo '5';
                exit();
            }
            $mail = $_POST[ 'mail' ];

            $sql = "usersMail='$mail'";
            $result = $this->app->pdoQuery( "SELECT COUNT(*) AS count_number FROM users WHERE $sql" );

            if ( $result[ 0 ][ 'count_number' ]>0 ) {

                echo '9';
                exit();
            }

            $phone = $_POST[ 'phone' ];
            if ( isset( $_POST[ 'profile' ] ) ) {
                $profilImg = $_POST[ 'profile' ];
            } else {
                $profilImg = '';
            }
            if ( $_FILES[ 'profile' ][ 'name' ] == '' || $_FILES[ 'profile' ][ 'name' ] == null ) {
                echo '5';
                exit();
            } else {

                $profilImg = $this->app->upload( 'profile', 'assets/images/profileImages/' );
            }
            $passwordHash = $this->app->securitySetHash( $_POST[ 'password' ] );
            $args = [ $name, $surname, $mail, $phone, $passwordHash ];
            $empty = $this->app->pdoEmpty( $args );
            if ( $empty ) {

                $this->app->getSecurity( $args );
                $argsAdd = [ 'userName' => $name, 'userSurname' => $surname, 'usersMail' => $mail, 'userPhone' => $phone, 'userPasswordHash' => $passwordHash, 'userImage' => $profilImg, 'userStatu' => 1, 'usersMailStatu' => 0, 'userRole' => $statu ];
                $result = $this->app->pdoInsert( 'users', $argsAdd );
                echo '1';
            } else {

                echo '5';
                exit();
            }
        }
    }

}