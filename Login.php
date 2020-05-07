<?php
    $con = mysqli_connect("localhost", "root", "", "usuarios");

   $Usuario = $_POST["Usuario"];
    $Clave = $_POST["Clave"];
    
    
    
    $statement = mysqli_prepare($con, "select * from datos WHERE Usuario = ? AND Clave = ?");
    mysqli_stmt_bind_param($statement, "ss", $Usuario, $Clave);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $userID, $Nombre, $Correo, $Usuario, $Clave);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;  
        $response["Nombre"] = $Nombre;
        $response["Correo"] = $Correo;
         $response["Usuario"] = $Usuario;
         $response["Clave"] = $Clave;  
       
       
    }
    
    echo json_encode($response);
?>
