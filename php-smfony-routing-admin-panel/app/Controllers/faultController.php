<?php
namespace App\Controllers;
use App\Models\Model;
use Symfony\Component\Routing\RouteCollection;

class faultController  extends pageController
{
	public function index(RouteCollection $routes)
	{
        $app = new Model();
   
      
            require_once APP_ROOT . '/views/fault.php';	
     

       
	}



    

}