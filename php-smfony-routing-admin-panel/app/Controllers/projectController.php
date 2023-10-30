<?php
namespace App\Controllers;
use App\Models\Model;
use App\Controllers\pageController;
use Symfony\Component\Routing\RouteCollection;

class projectController   extends pageController {
    public function indexAction( RouteCollection $routes )
    {
        $app = new Model();
        $projectList =  $this->app->pdoPrepare( 'SELECT * FROM project  ORDER BY id DESC' );
        $projectCategory =  $this->app->pdoPrepare( 'SELECT * FROM projectCategory  ' );
        require_once APP_ROOT . '/views/project.php';

    }

    public function projeAdd( RouteCollection $routes){

        $projectImg = $this->app->upload( 'projectImg', '../public/assets/images/projectImg/' );
        $projectTitle = $_POST[ 'projectTitle' ];
        $projectDescription = $_POST[ 'projectDescription' ];
        $projectUrl = $_POST[ 'projectUrl' ];
        $projectCategory = $_POST["projectCategory"];
        $args = [$projectTitle,$projectDescription,$projectUrl,$projectCategory];
        $argsAdd = [ 'projectTitle' => $projectTitle, 'projectDescription' => $projectDescription, 'projectUrl' => $projectUrl, 'projectImg' => $projectImg, 'projectCategory' => $projectCategory ];
        $empty = $this->app->pdoEmpty($args);
        if($empty){

            $this->app->getSecurity( $projectImg,$projectTitle,$projectUrl,$projectCategory );
            $result = $this->app->pdoInsert( 'project', $argsAdd );

            if ( $result ) {
                echo '1';
            } else {
                echo '0';
            }


        }else{
            echo '5';

        }



    }

    public function projectEditter( RouteCollection $routes){

        $projectId = $_POST[ 'projectId' ];
        $projectImg = $this->app->upload( 'projectImg', '../public/assets/images/projectImg/' );
        $projectTitle = $_POST[ 'projectTitle' ];
        $projectDescription = $_POST[ 'projectDescription' ];
        $projectUrl = $_POST[ 'projectUrl' ];
        $projectCategory = $_POST["projectCategory"];
        $args = [$projectTitle,$projectDescription,$projectUrl,$projectCategory];
        $empty = $this->app->pdoEmpty($args);
        if($empty) {

            if (empty($_FILES['projectImg']['name'])) {
                $argsArray = "
        
            projectTitle = '" . $projectTitle . "',
            projectDescription = '" . $projectDescription . "',
            projectUrl = '" . $projectUrl . "',
            projectCategory = '" . $projectCategory . "'
    
        WHERE id=$projectId ";
            } else {
                $argsArray = "
        
            projectTitle = '" . $projectTitle . "',
            projectDescription = '" . $projectDescription . "',
            projectImg = '" . $projectImg . "',
            projectUrl = '" . $projectUrl . "',
            projectCategory = '" . $projectCategory . "'
    
        WHERE id=$projectId ";
            }

            $this->app->getSecurity($projectTitle, $projectImg, $projectUrl, $projectCategory);
            $query = $this->app->pdoUpdate('project', $argsArray);

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