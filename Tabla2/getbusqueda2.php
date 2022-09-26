<?php

/**
 * Iniciar servidor de pruebas
 * php -S localhost:8000
 */
 


// ConexiÃ³n a la base de datos
try {
    $mbd = new PDO('mysql:host=localhost;dbname=tallerphp1', 'root', '');
} catch (PDOException $e) {
    print "Â¡Error!: " . $e->getMessage() . "<br/>";
    die();
}


$ID = $_GET['ID'];

try {    
   

    $timeback=$mbd->prepare("SELECT * FROM tabla2 WHERE ID = ?");
     
    $timeback->bindParam(1, $_GET['ID']);

     $timeback->execute();
     $results = $timeback->fetchAll(PDO::FETCH_ASSOC);


    
    // Retorno resultados
    header('Content-type:application/json;charset=utf-8');
    echo json_encode($results);

} catch (PDOException $e) {
    print "Â¡Error!: " . $e->getMessage() . "<br/>";
    die();

}




?>