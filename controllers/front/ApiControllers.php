<?php 


include "models/front/ApiManager.php";

class ApiController{

    private $apiManager;


function __construct()
{
    $this->apiManager= new ApiManager;

}
public function getAnimaux(){
    $animaux = $this->apiManager->getAnimauxDB();
    var_dump($animaux);
}
}