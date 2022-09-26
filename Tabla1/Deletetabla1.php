<?php

try {
    $mbd = new PDO('mysql:host=localhost;dbname=tallerphp1', 'root', '');
} catch (PDOException $e) {
    print "Â¡Error!: " . $e->getMessage() . "<br/>";
    die();
}



try 
{    
 
    $timeback=$mbd->prepare("SELECT * FROM tabla1 WHERE ID = :ID");
     
    $timeback->bindValue(':ID', $_POST['ID']); 

   $statement=$mbd->prepare("DELETE FROM tabla1 WHERE ID =:ID");
    
   $statement->bindValue(':ID', $_POST['ID']);
   

    $timeback->execute();
    $results = $timeback->fetchAll(PDO::FETCH_ASSOC);

    $statement->execute();
  
    header('Content-type:application/json;charset=utf-8');
    echo json_encode(["mensaje"=> "Registro eliminado satisfactoriamente",
                        "data" => $results]);

} catch (PDOException $e) {
    print "Â¡Error!: " . $e->getMessage() . "<br/>";
    die();

}


?>