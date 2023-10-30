<?php
namespace App\Controllers;
use App\Models\Model;
use Symfony\Component\Routing\RouteCollection;

class blogController extends pageController   
 {

    public function indexAction( RouteCollection $routes )
 {

        $blogList =  $this->app->pdoPrepare( 'SELECT * FROM blog  ORDER BY id DESC' );
        require_once APP_ROOT . '/views/blog.php';

    }

    public function blogAdd( RouteCollection $routes ) {
        $blogImg = $this->app->upload( 'blogImg', '../public/assets/images/blogImg/' );
        $blogTitle = $_POST[ 'blogTitle' ];
        $blogDescription = $_POST[ 'blogDescription' ];
        $blogTag = $_POST["blogTag"];
        $blogUrl = $this->app->seflink($_POST[ 'blogTitle' ]);
        $args = [$blogTitle,$blogTag];
        $empty = $this->app->pdoEmpty($args);
        if($empty) {
            $argsAdd = ['blogImg' => $blogImg, 'blogTitle' => $blogTitle, 'blogTagger' => $blogTag, 'blogUrl' => $blogUrl, 'blogDescription' => $blogDescription];
            $this->app->getSecurity($argsAdd);
            $result = $this->app->pdoInsert('blog', $argsAdd);

            if ($result) {
                echo '1';
            } else {
                echo '0';
            }
        }else{
            echo "5";
        }
    }

    public function blogEditter( RouteCollection $routes ) {
        $blogID = $_POST[ 'blogID' ];
        $blogImg = $this->app->upload( 'blogImg', '../public/assets/images/blogImg/' );
        $blogTitle = $_POST[ 'blogTitle' ];
        $blogTag = $_POST["blogTag"];
        $blogDescription = htmlspecialchars($_POST[ 'blogDescription' ]);
        $blogUrl = $this->app->seflink($_POST[ 'blogTitle' ]);
        $args = [$blogTitle,$blogTag];
        $empty = $this->app->pdoEmpty($args);
        if($empty) {
            $this->app->getSecurity($blogID, $blogImg, $blogTitle);
            if (empty($_FILES['blogImg']['name'])) {
                $argsArray = "
        
        blogTitle = '" . $blogTitle . "',
        blogDescription = '" . $blogDescription . "',
        blogUrl = '".$blogUrl."',
        blogTagger = '" . $blogTag . "'
        
    
        WHERE id=$blogID ";
            } else {
                $argsArray = "
        
            blogImg = '" . $blogImg . "',
            blogTitle = '" . $blogTitle . "',
            blogTagger = '" . $blogTag . "',
               blogUrl = '".$blogUrl."',
            blogDescription = '" . $blogDescription . "'
        
            WHERE id=$blogID ";
            }


            $query = $this->app->pdoUpdate('blog', $argsArray);

            if ($query) {
                echo '1';
            } else {
                echo '0';
            }
        }else{
            echo "5";
        }
    }

}