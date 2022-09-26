<?php 
 
try {
    $mbd = new PDO('mysql:host=localhost;dbname=tallerphp1', 'root', '');
} catch (PDOException $e) {
    print "Â¡Error!: " . $e->getMessage() . "<br/>";
    die();
}


try 
{    
   
    $statement=$mbd->prepare("INSERT INTO tabla1 (descripcion, campo3, campo4) VALUES (:ide, :nom, :ape)");


    $statement->bindValue(':ide', $_POST['descripcion']);
    $statement->bindValue(':nom', $_POST['campo3']);
    $statement->bindValue(':ape', $_POST['campo4']);
    
    $statement->execute();
    $ID = $mbd -> lastInsertID();
    
    $terminal=$mbd -> prepare("SELECT * FROM tabla1 WHERE ID=$ID");
    $terminal->execute();
    $results = $terminal->fetchAll(PDO::FETCH_ASSOC);
   
    header('Content-type:application/json;charset=utf-8');    
    echo json_encode($results);

} catch (PDOException $e) {
    header('Content-type:application/json;charset=utf-8');    
    echo json_encode([
        'error' => [
            'codigo' =>$e->getCode() ,
            'mensaje' => $e->getMessage()
        ]
    ]);
}




?>