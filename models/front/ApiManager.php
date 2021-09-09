<?php 

require "models/front/Model.class.php";

class ApiManager extends Model{

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
    
        return $data;
    }
}