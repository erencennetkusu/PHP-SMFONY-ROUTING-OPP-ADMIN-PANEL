<?php
session_start();
ob_start();


use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

$routes->add( 'login-screen', new Route( '/login', array( 'controller' => 'loginController', 'method'=>'index' ), array() ) );

$routes->add( 'homepage', new Route( '/', array( 'controller' => 'homeController', 'method'=>'indexAction' ), array() ) );
$routes->add( 'login-sub', new Route( '/login-submit', array( 'controller' => 'loginController', 'method'=>'loginSubmit' ), array() ) );
$routes->add( 'adasdasds', new Route( '/eren-test', array( 'controller' => 'erenController', 'method'=>'test' ), array() ) );
$routes->add( 'menu-page', new Route( '/menu', array( 'controller' => 'menuController', 'method'=>'indexAction' ), array() ) );
$routes->add( 'menu-edit', new Route( '/menuEditter', array( 'controller' => 'menuController', 'method'=>'menuEditter' ), array() ) );
$routes->add( 'menu-add', new Route( '/menuAdder', array( 'controller' => 'menuController', 'method'=>'menuAdd' ), array() ) );
$routes->add( 'remove-data', new Route( '/removeData', array( 'controller' => 'pageController', 'method'=>'removeData' ), array() ) );
$routes->add( 'aktif-pasif', new Route( '/aktifPasif', array( 'controller' => 'pageController', 'method'=>'aktifPasif' ), array() ) );
$routes->add( 'personel-page', new Route( '/personel', array( 'controller' => 'personelController', 'method'=>'indexAction' ), array() ) );
$routes->add( 'personel-Edit-View', new Route( '/personelEditView', array( 'controller' => 'personelController', 'method'=>'personelEditView' ), array() ) );
$routes->add( 'personel-Edit', new Route( '/personelEdit', array( 'controller' => 'personelController', 'method'=>'personelEdit' ), array() ) );
$routes->add( 'personel-Add', new Route( '/personelAdd', array( 'controller' => 'personelController', 'method'=>'personelAdd' ), array() ) );
$routes->add( 'authority-page', new Route( '/authority', array( 'controller' => 'authorityController', 'method'=>'indexAction' ), array() ) );
$routes->add( 'permission-Add', new Route( '/permissionAdd', array( 'controller' => 'authorityController', 'method'=>'permissionAdd' ), array() ) );
$routes->add( 'permission-Edit', new Route( '/permissionEdit', array( 'controller' => 'authorityController', 'method'=>'permissionEdit' ), array() ) );
$routes->add( 'member-page', new Route( '/member', array( 'controller' => 'memberController', 'method'=>'indexAction' ), array() ) );
$routes->add( 'members-logout', new Route( '/logout', array( 'controller' => 'pageController', 'method'=>'Logout' ), array() ) );
$routes->add( 'members-authority', new Route( '/authority', array( 'controller' => 'pageController', 'method'=>'Logout' ), array() ) );
$routes->add( 'members-mailVerification', new Route( '/mailVerification', array( 'controller' => 'mailVerificationController', 'method'=>'index' ), array() ) );
$routes->add( 'members-mailVerificationSend', new Route( '/mailVerificationSend', array( 'controller' => 'mailVerificationController', 'method'=>'mailVerificationSend' ), array() ) );
$routes->add( 'fault', new Route( '/fault', array( 'controller' => 'faultController', 'method'=>'index' ), array() ) );
$routes->add( 'customer', new Route( '/customer', array( 'controller' => 'customerController', 'method'=>'index' ), array() ) );
$routes->add( 'provinceSelect', new Route( '/provinceSelect', array( 'controller' => 'pageController', 'method'=>'provinceSelect' ), array() ) );
$routes->add( 'aboutUs', new Route( '/hakkimizda', array( 'controller' => 'aboutUsController', 'method'=>'indexAction' ), array() ) );
$routes->add( 'aboutUs-aboutUsAdd', new Route( '/aboutUsAdd', array( 'controller' => 'aboutUsController', 'method'=>'aboutUsAdd' ), array() ) );
$routes->add( 'aboutUs-aboutUsEditter', new Route( '/aboutUsEditter', array( 'controller' => 'aboutUsController', 'method'=>'aboutUsEditter' ), array() ) );
$routes->add( 'blog', new Route( '/blog', array( 'controller' => 'blogController', 'method'=>'indexAction' ), array() ) );
$routes->add( 'blog-blogAdd', new Route( '/blogAdd', array( 'controller' => 'blogController', 'method'=>'blogAdd' ), array() ) );
$routes->add( 'blog-blogEditter', new Route( '/blogEditter', array( 'controller' => 'blogController', 'method'=>'blogEditter' ), array() ) );
$routes->add( 'slider', new Route( '/slider', array( 'controller' => 'sliderController', 'method'=>'indexAction' ), array() ) );
$routes->add( 'slide-sliderAdd', new Route( '/sliderAdd', array( 'controller' => 'sliderController', 'method'=>'sliderAdd' ), array() ) );
$routes->add( 'slide-sliderEditter', new Route( '/sliderEditter', array( 'controller' => 'sliderController', 'method'=>'sliderEditter' ), array() ) );
$routes->add( 'referance', new Route( '/referanslar', array( 'controller' => 'referenceController', 'method'=>'indexAction' ), array() ) );
$routes->add( 'referance-referenceAdd', new Route( '/referenceAdd', array( 'controller' => 'referenceController', 'method'=>'referenceAdd' ), array() ) );
$routes->add( 'referance-referenceEditter', new Route( '/referenceEditter', array( 'controller' => 'referenceController', 'method'=>'referenceEditter' ), array() ) );
$routes->add( 'settings', new Route( '/ayarlar', array( 'controller' => 'settingController', 'method'=>'indexAction' ), array() ) );
$routes->add( 'settings-settingsEditter', new Route( '/settingsEditter', array( 'controller' => 'settingController', 'method'=>'settingsEditter' ), array() ) );
$routes->add( 'removeDataDelete', new Route( '/removeDataDelete', array( 'controller' => 'pageController', 'method'=>'removeDataDelete' ), array() ) );
$routes->add( 'projelerimiz', new Route( '/projelerimiz', array( 'controller' => 'projectController', 'method'=>'indexAction' ), array() ) );
$routes->add( 'projectEditter', new Route( '/projectEditter', array( 'controller' => 'projectController', 'method'=>'projectEditter' ), array() ) );
$routes->add( 'projeAdd', new Route( '/projeAdd', array( 'controller' => 'projectController', 'method'=>'projeAdd' ), array() ) );
$routes->add( 'ourTeam', new Route( '/ekibimiz', array( 'controller' => 'ourTeamController', 'method'=>'indexAction' ), array() ) );
$routes->add( 'ourTeamAdd', new Route( '/ourTeamAdd', array( 'controller' => 'ourTeamController', 'method'=>'ourTeamAdd' ), array() ) );
$routes->add( 'ourTeamEditter', new Route( '/ourTeamEditter', array( 'controller' => 'ourTeamController', 'method'=>'ourTeamEditter' ), array() ) );
$routes->add( 'settingsForm', new Route( '/settingsForm', array( 'controller' => 'settingController', 'method'=>'settingsForm' ), array() ) );
$routes->add( 'mailSendSql', new Route( '/mailSendSql', array( 'controller' => 'settingController', 'method'=>'mailSendSql' ), array() ) );
$routes->add( 'message', new Route( '/message', array( 'controller' => 'messageController', 'method'=>'indexAction' ), array() ) );
$routes->add( 'blogAddView', new Route( '/blogAddView', array( 'controller' => 'blogAddViewController', 'method'=>'indexAction' ), array() ) );
$routes->add( 'blogUpdates', new Route( '/blogUpdates{id}', array( 'controller' => 'blogUpdatesViewController', 'method'=>'indexAction' ), array() ) );
$routes->add( 'removeAllData-data', new Route( '/removeAllData', array( 'controller' => 'pageController', 'method'=>'removeAllData' ), array() ) );
$routes->add( 'smtpSettings', new Route( '/smtpSettings', array( 'controller' => 'settingController', 'method'=>'smtpSettings' ), array() ) );
$routes->add( 'logutController', new Route( '/logutController', array( 'controller' => 'pageController', 'method'=>'logutController' ), array() ) );
$routes->add( 'profile', new Route( '/profile', array( 'controller' => 'profileController', 'method'=>'indexAction' ), array() ) );
$routes->add( 'mailSend', new Route( '/mailSend', array( 'controller' => 'pageController', 'method'=>'mailSend' ), array() ) );
$routes->add( 'profileUpdates', new Route( '/profileUpdates', array( 'controller' => 'profileController', 'method'=>'profileUpdates' ), array() ) );
$routes->add( 'profileImgUpload', new Route( '/profileImgUpload', array( 'controller' => 'profileController', 'method'=>'profileImgUpload' ), array() ) );
$routes->add( 'lockScreen', new Route( '/lockScreen', array( 'controller' => 'lockScreenController', 'method'=>'indexAction' ), array() ) );
$routes->add( 'lockScreenOpen', new Route( '/lockScreenOpen', array( 'controller' => 'lockScreenController', 'method'=>'lockScreenOpen' ), array() ) );


















