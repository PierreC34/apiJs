<?php 


include "models/front/ApiManager.php";

class ApiController{

    private $apiManager;


function __construct()
{
    $this->apiManager= new ApiManager;

}
public function getAnimauxDB(){
    $animals = $this->apiManager->getDBAnimaux();
    $tab = [];
    foreach ($animals as $value){
        if(!array_key_exists($value->animal_id,$tab)){
            $tab[$value->animal_id] = [
            'Id'=> $value->animal_id,
            'Nom' =>$value->animal_nom,
            'Description' =>$value->animal_description ,
            'Image' => $value -> animal_image,
            'Famille' => [
                'Id_Famille'=>$value->famille_id,
                'Nom_Famille'=>$value->famille_libelle,
                'Description_Famille'=>$value->famille_description
            ]];
        }
        $tab[$value->animal_id]["continents"][]=[
            "continents_id"=>$value->continent_id,
            "continents_nom"=>$value->continent_libelle
        ];

    }
    $this->apiManager->sendJson($tab);
}
public function getAllanimaux(){
    $allAnimaux = $this->apiManager->getDBanimaux();
    echo $allAnimaux ;
}
public function selectOneAnimal($id){
    $oneAnimal = $this->apiManager->selectOneAnimal($id);
    echo $oneAnimal;
}
}