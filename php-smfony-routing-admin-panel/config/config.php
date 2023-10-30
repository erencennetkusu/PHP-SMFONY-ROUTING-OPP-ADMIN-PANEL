<?php
//site name
define('SITE_NAME', 'http://localhost:3000/');

//App Root
define('APP_ROOT', dirname(dirname(__FILE__)));
define('URL_ROOT', '/');
define('URL_SUBFOLDER', '');

//DB Params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'egitim');
define('DB_SERVER_İNFO',$backup_config = array(
    'DB_HOST' => 'localhost',////Database hostname
    'DB_NAME' => 'grandby_grandbyte',//Database name to backup
    'DB_USERNAME' => 'grandby',//Database account username
    'DB_PASSWORD' => '6AxP8x:?Btk',//Database account password
    'INCLUDE_DROP_TABLE' => false,//Include DROP TABLE IF EXISTS
    'SAVE_DIR' => '',//Folder to save file in
    'SAVE_AS' => 'grandby-',//Prepend filename
    'APPEND_DATE_FORMAT' => 'Y-m-d-H-i',//Append date to file name
    'TIMEZONE' => 'UTC',//Timezone for date format
    'COMPRESS' => true,//Compress into gz otherwise keep as .sql
));