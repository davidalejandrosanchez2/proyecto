<?php
    $con = mysqli_connect("localhost", "root", "", "usuarios");
    $Nombre = $_POST['Nombre'];
    $Correo = $_POST['Correo'];
    $Clave = $_POST['Clave'];
    $Usuario = $_POST['Usuario'];
    $statement = mysqli_prepare($con, " insert into datos (Nombre, Correo, Clave, Usuario) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($statement, "ssis", $Nombre, $Correo, $Usuario, $Clave);
    mysqli_stmt_execute($statement);
    
    $response = array();
    $response["success"] = true;  
    
    echo json_encode($response);
?>

