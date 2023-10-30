<?php
namespace App\Controllers;
use App\Models\Model;
use Symfony\Component\Routing\RouteCollection;

class customerController  extends pageController
{
	public function index(RouteCollection $routes)
	{
        $app = new Model();
   
        
        $customerList =  $app->pdoPrepare("SELECT customer.id,customer.customerName,customer.customerCompanyName,
        customer.customerSurname,customer.customerTitle,customer.customerAdress,customer.customerPhone,
        customer.customerMailAdress,customer.customerType,customer.customerTaxNumber,customer.customerFaxPhone,
        customer.customerProvince,customer.customerDistrict,customer.custormerCountry,
        customer.custormerPostCode,customer.customerStatu,customer.customerDate,province.id AS provinceId,province.name AS provinceName,
        district.name AS districtName
        FROM customer
        INNER JOIN province  ON customer.customerProvince = province.id 
        INNER JOIN district  ON customer.customerDistrict =  district.id;");
        $resultProvince =  $app->pdoPrepare("SELECT * FROM province");
        $resultDistrict =  $app->pdoPrepare("SELECT * FROM district");
      
            require_once APP_ROOT . '/views/customer.php';	
     
       
	}



    

}