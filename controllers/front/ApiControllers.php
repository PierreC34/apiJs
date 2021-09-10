<?php 


include "models/front/ApiManager.php";

class ApiController{

    private $apiManager;


function __construct()
{
    $this->apiManager= new ApiManager;

}
public function getAnimaux(){
    $animals = $this->apiManager->getAnimauxDB();
    var_dump($animals);
    $tab = [];
    foreach ($animals as $value){
        if(!array_key_exists($value->animal_id,$tab)){
            $tab[$value->animal_id] = [
            'Id'=> $value->animal_id,
            'Nom' =>$value->ainmal_nom,
            'Description' =>$value->animal_description ,
            'Image' => $value -> animal_image,
            'Famille' => [
                'Id_Famille'=>$value->famille_id,
                'Nom_Famille'=>$value->famille_libelle,
                'Description_Famille'=>$value->famille_description
            ]];
        }
        $tab[$value->animal_id]["continents"][]=[
            "continents_nom"=>$value->continent_libelle
        ];

    }
    // $this->apiManager->sendJson($tab);
}
public function getAllanimauxDB(){
    $allAnimaux = $this->apiManager->getDBanimaux();
    echo $allAnimaux ;
}
public function selectOneAnimalDB($id){
    $oneAnimal = $this->apiManager->selectOneAnimal($id);
    echo $oneAnimal;
}
}