<?php
namespace App\Controllers;

use App\Controllers\ApiService;

class PageLoader extends BaseController
{


    private $mgtSiteUrl = "http://localhost/products/zCommerceMgt/";


    private function page_loader($viewName,$data){

        echo view("templates/header",$data);
        echo view("pages/".$viewName,$data);
        echo view("templates/footer",$data);

    }

    public function store_finder()
    {
        # code...
    }

    public function store($storeCode){

        $apiService = new ApiService();
        
        $storeData = json_decode($apiService->post("fetch-store-by-code",array("store_code"=>$storeCode)),TRUE)["data"];


        if (!$storeData) {
            return redirect()->to(site_url("store-finder"));
            exit;
        }

        $allProducts = json_decode($apiService->post("fetch-products-by-store-code",array("store_code"=>$storeCode)),TRUE)["data"];
        $allCategories = json_decode($apiService->post("fetch-categories-by-store-code",array("store_code"=>$storeCode)),TRUE)["data"];
        
        $data = array(
            "title" => $storeData["name"],
            "logo" => $this->mgtSiteUrl.$storeData["logo"],
            "mgtSiteUrl" => $this->mgtSiteUrl,
            "products" => $allProducts,
            "categories" => $allCategories,
            "store_code" => $storeCode
        );        

        

        $this->page_loader("home",$data);
        
    }
}
