<?php
   
    $con = mysqli_connect("localhost", "root", "","usuarios");
    /*primero  recogeremos el id del usuario ,el id del restaurante y el comentario del restaurante seleccionado y lo insertaremos en la tabla comentarios */
    $comentario = $_POST["comentario"];
    $user_id =(int)$_POST["user_id"];
    $restaurante_id =(int)$_POST["restaurante_id"];
    $statement = mysqli_prepare($con, "insert into comentarios (user_id,restaurante_id,comentario) VALUES (?,?,?)");

    //metodo de insertar los datos obtenidos segun su tipo
    mysqli_stmt_bind_param($statement, "iis",$user_id,$restaurante_id,$comentario);
    mysqli_stmt_execute($statement);
    
    $response = array();
    $response["success"] = true;  

    echo json_encode($response);
    
?>
