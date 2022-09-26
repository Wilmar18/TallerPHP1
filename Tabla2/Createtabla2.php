<?php 
 

try {
    $mbd = new PDO('mysql:host=localhost;dbname=tallerphp1', 'root', '');
} catch (PDOException $e) {
    print "Â¡Error!: " . $e->getMessage() . "<br/>";
    die();
}



try 
{    
   
    $statement=$mbd->prepare("INSERT INTO tabla2 (fk_ID, campoVarchar1, campoVarchar2,campodatetime,campodate,campoint,campofloat,campoemail) VALUES (:fk,:campoVar1,:campoVar2,:campodt,:campod,:campoint,:campofloat,:email)");
    

    $statement->bindParam(':fk', $_POST['fk_ID']);
    $statement->bindParam(':campoVar1', $_POST['campoVarchar1']);
    $statement->bindParam(':campoVar2', $_POST['campoVarchar2']);
    $statement->bindParam(':campodt', $_POST['campodatetime']); //YYYY-MM-DD hh:mm:ss
    $statement->bindParam(':campod', $_POST['campodate']);//'YYYY-MM-DD
    $statement->bindParam(':campoint', $_POST['campoint']);
    $statement->bindParam(':campofloat', $_POST['campofloat']);
    $statement->bindParam(':email', $_POST['campoemail']);
    
    
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