<?php

set_time_limit (500);
error_reporting(0);
$connection = new MongoDB\Client('mongodb://localhost:27017');
$database = $connection->local;
$collection = $database->pais;
$result = [];
if($_POST){
  for ($codigo=1; $codigo <=300 ; $codigo++) {
    try {
      $api = file_get_contents("https://restcountries.eu/rest/v2/callingcode/$codigo");
      $json = json_decode($api);
      if(isset($json)){
        foreach ($json as $key => $pais) {
          $document = array(
            'nombrePais' => $pais->name,
            'capitalPais' => $pais->capital,
            'region' =>  $pais->region,
            'poblacion' =>  $pais->population,
            'latitud' => $pais->latlng[0],
            'longitud' => $pais->latlng[1],
            'codigoPais' => $pais->numericCode
          );
          $paisBuscado = $collection->findOne(array('codigoPais' => $pais-numericCode ));
          if($paisBuscado != NULL){
            //EXISTE
            $collection->updateOne(array('codigoPais' => $pais->numericCode),array('$set' => $document));
          }else {
            //NO EXISTE
            $collection->insertOne($document);
          }

        }
      }else{
        continue;
      }
    } catch (\Exception $e) {}
    }
  }

  if($_GET){
    switch ($_GET["method"]) {
      case '1':
      $result=$collection->find();
      break;
      case '2':
      $result=$collection->find(array('region' => 'Americas'));
      break;
      case '3':
      $result=$collection->find(array('region'=>'Americas'),array('poblacion' => array('$gt' =>  100000000)));
      break;
      case '4':
      $result=$collection->find(array('region' => array('$ne' => 'Africa')));
      break;
      case '5':
      $document = array(
        'nombrePais' => 'Egipto',
        'poblacion' => 95000000
      );
      $collection->updateOne(array('nombrePais' => 'Egypt'),array('$set' => $document));
      $egipto = $collection->find(array('nombrePais' => 'Egipto'));
      $result=$egipto;
      break;
      case '6':
      $collection->deleteOne(array('codigoPais' => '258'));
      break;
      case '7':
      $result=$collection->find(array('poblacion'=>array('$gt' =>  50000000)),array('poblacion' => array('$lt' => 150000000)));
      break;
      case '8':
      $pipeline = array(
        array('$sort' => array('nombrePais' => 1))
      );
      $result = $collection->aggregate($pipeline)->toArray();
      break;
      default:
      // code...
      break;
    }
  }

  ?>
