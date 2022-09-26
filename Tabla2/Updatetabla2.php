<?php

try {
    $mbd = new PDO('mysql:host=localhost;dbname=tallerphp1', 'root', '');
} catch (PDOException $e) {
    print "Â¡Error!: " . $e->getMessage() . "<br/>";
    die();
}


try 
{    
 
   

   $statement=$mbd->prepare("UPDATE tabla2 SET campoVarchar1=:campoVar1, campoVarchar2=:campoVar2,campodatetime=:campodt,campodate=:campod,campoint=:campoint,campofloat=:campofloat,campoemail=:email WHERE ID=:ID");
   $statement->bindParam(':ID', $_POST['ID']); 
   $statement->bindParam(':campoVar1', $_POST['campoVarchar1']);
   $statement->bindParam(':campoVar2', $_POST['campoVarchar2']);
   $statement->bindParam(':campodt', $_POST['campodatetime']); //YYYY-MM-DD hh:mm:ss
   $statement->bindParam(':campod', $_POST['campodate']); //'YYYY-MM-DD
   $statement->bindParam(':campoint', $_POST['campoint']);
   $statement->bindParam(':campofloat', $_POST['campofloat']);
   $statement->bindParam(':email', $_POST['campoemail']);
   
   $statement->execute();


   $timeback=$mbd->prepare("SELECT * FROM tabla2 WHERE ID = :ID");
     
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