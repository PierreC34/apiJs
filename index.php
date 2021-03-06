<?php 
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "
https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

include "controllers/front/ApiControllers.php";

$controllers = new ApiController ; 


if(empty($_GET['page'])){
    require('index.php');
}else{
    $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
    switch ($url[0]) {
        case "Front":
            if(empty($url[1])){
                echo "Partie empty";
                var_dump($url);
            }
            else if ($url[1] == 'Animaux'){
                echo "Animaux";
                $controllers->getAnimauxDB();
            }
            else if ($url[1] == 'Animal'){

                echo "Animal";
                $controllers->selectOneAnimal($url[2]);
               
            }
            else if ($url[1] == 'Continents'){
                echo "Continents";
                var_dump($url);
            }
            else if ($url[1] == 'Familles'){
                echo "Familles";
                var_dump($url);
            }
            else{
                throw new Exception('Probleme');
            }
            break;
    } 
}