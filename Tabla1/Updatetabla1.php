<?php

try {
    $mbd = new PDO('mysql:host=localhost;dbname=tallerphp1', 'root', '');
} catch (PDOException $e) {
    print "Â¡Error!: " . $e->getMessage() . "<br/>";
    die();
}


try 
{    
 
   

   $statement=$mbd->prepare("UPDATE tabla1 SET descripcion=:ide, campo3=:nom, campo4=:ape WHERE ID=:ID");
   $statement->bindValue(':ID', $_POST['ID']); 
   $statement->bindValue(':ide', $_POST['descripcion']);
   $statement->bindValue(':nom', $_POST['campo3']);
   $statement->bindValue(':ape', $_POST['campo4']);
   
   $statement->execute();


   $timeback=$mbd->prepare("SELECT * FROM tabla1 WHERE ID = :ID");
     
   $timeback->bindValue(':ID', $_POST['ID']); 

    $timeback->execute();
    $results = $timeback->fetchAll(PDO::FETCH_ASSOC);



    
  
    header('Content-type:application/json;charset=utf-8');
    echo json_encode(["mensaje: Registro actualizado satisfactoriamente," => $results]);

} catch (PDOException $e) {
    print "Â¡Error!: " . $e->getMessage() . "<br/>";
    die();

}
























?>