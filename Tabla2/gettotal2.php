<?php

try {
    $mbd = new PDO('mysql:host=localhost;dbname=tallerphp1', 'root', '');
} catch (PDOException $e) {
    print "Â¡Error!: " . $e->getMessage() . "<br/>";
    die();
}



try {    
   
    $statement=$mbd->prepare("SELECT * from tabla2 ");

    // Ejecuto la sentencia preparada
    $statement->execute();

    // Obtengo todos los datos en un array
    $results = $statement->fetchAll(PDO::FETCH_ASSOC); 

    // DesconexiÃ³n de la base de datos
    $mbd = null;
    
    // Retorno resultados
    header('Content-type:application/json;charset=utf-8');
    echo json_encode($results);

} catch (PDOException $e) {
    print "Â¡Error!: " . $e->getMessage() . "<br/>";
    die();

}




?>