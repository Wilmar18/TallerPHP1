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


// EjecuciÃ³n de la consulta
try {    
    $sql = "SELECT * from tabla1 LIMIT 10";

    // Creo una sentencia preparada
    $statement=$mbd->prepare("SELECT * from tabla1 LIMIT 10");

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
