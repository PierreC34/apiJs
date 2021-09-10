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
    public function getAnimaux()
    {
        $sql = "SELECT * FROM animal";
        $req = $this->getDB()->query($sql);
        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;
    }
    public function getDBanimaux()
    {
        $sql = "SELECT *  from animal
    inner join famille , animal_continent , continent 
    where animal.famille_id = famille.famille_id 
    and animal.animal_id = animal_continent.animal_id 
    and animal_continent.continent_id=continent.continent_id ;";
        $req = $this->getDB()->query($sql);
        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;
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
