<?php
   /*primero recogeremos los datos enviados de la parte del login de la aplicación y  buscaremos si esos datos están en la tabla de datos */     
    $con = mysqli_connect("localhost", "root", "", "usuarios");
   $Usuario = $_POST["Usuario"];
    $Clave = $_POST["Clave"];
    $statement = mysqli_prepare($con, "select * from datos WHERE Usuario = ? AND Clave = ?");
    mysqli_stmt_bind_param($statement, "ss", $Usuario, $Clave);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $user_id, $Nombre, $Correo, $Usuario, $Clave);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;  
        $response["Nombre"] = $Nombre;
        $response["Correo"] = $Correo;
         $response["Usuario"] = $Usuario;
         $response["Clave"] = $Clave;
         $response["user_id"] = $user_id;
          

    }

  
    echo json_encode($response);

?>
