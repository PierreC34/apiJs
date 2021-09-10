<?php

require "models/front/Model.class.php";

class ApiManager extends Model
{

    // private $listeAnimaux ;

    // public function addListeAnimaux($animaux){
    //     $this->listeAnimaux[]=$animaux ;
    // }
    // public function getListeAnimaux(){
    //     return $this->listeAnimaux;
    // }
    public function getAnimauxDB()
    {
        $sql = "SELECT * FROM animal";
        $req = $this->getDB()->query($sql);
        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return Model::sendJson($data);
    }
    public function getDBanimaux()
    {
        $sql = "SELECT animal.animal_id,animal.animal_nom,animal.animal_description,animal.animal_image,famille.famille_libelle,continent.continent_libelle  from animal
    inner join famille , animal_continent , continent 
    where animal.famille_id = famille.famille_id 
    and animal.animal_id = animal_continent.animal_id 
    and animal_continent.continent_id=continent.continent_id ;";
        $req = $this->getDB()->query($sql);
        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return Model::sendJson($data);
    }
    public function selectOneAnimal($id)
    {
        $sql = "SELECT * FROM animal 
            inner join famille , animal_continent , continent 
            Where animal.animal_id = $id
            and animal.famille_id = famille.famille_id 
            and animal.animal_id = animal_continent.animal_id 
            and animal_continent.continent_id=continent.continent_id";
        $req = $this->getDB()->query($sql);
        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return Model::sendJson($data);
    }
}
