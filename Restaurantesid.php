<?php
    $con = mysqli_connect("localhost", "root", "", "usuarios");
    /*recogemos el nombre del restaurante de la parte de selección de la aplicación  y hacemos una selección del id del restaurante, el nombre del restaurante y  la descripción del restaurante */
      $Nombre = $_POST["Nombre"];
    $statement = mysqli_prepare($con, " select r.restaurante_id,r.Nombre,r.Descripcion from  restaurantes r where nombre = ? ");
   mysqli_stmt_bind_param($statement, "s", $Nombre);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    //nos devolverá el id del restaurante, el nombre y la descripción 
    mysqli_stmt_bind_result($statement, $restaurante_id,$mbre,$Descripcion);
     $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;  
        $response["restaurante_id"] = $restaurante_id;
        $response["Nombre"] = $mbre;
        $response["Descripcion"] = $Descripcion; 
      
    }
    

 /*   hacemos un conteo de los comentarios   del restaurante seleccionado  */
    $statement1 = mysqli_prepare($con, "select count(c.comentario) from comentarios c where c.restaurante_id = ? ");
    /*el id del restaurnate sera la clave para buscar el contenido de comentarios*/
    mysqli_stmt_bind_param($statement1, "i", $restaurante_id);
    mysqli_stmt_execute($statement1);
    /*nos devolvera el contenido de la fila comentario de la tabla comentarios*/
    mysqli_stmt_bind_result($statement1, $comentario);
   
     while(mysqli_stmt_fetch($statement1)){
        $response["numeroComentarios"]= $comentario;
    }
  

/*esta parte sera la parte crucial, ya  no solo  le indicaremos que nos seleccione y devuelva los comentarios de un restaurante seleccionado , sino que también le indicamos que ese restaurante no tiene comentarios, para que en la aplicación  la parte de ver los comentarios no nos genere un error  */

    $response["comentario"] = false;
    if($response["numeroComentarios"]>0) {
      
    $response["comentario"] = true;

 
   try {  
          $query = "select c.comentario from comentarios c where c.restaurante_id =" . $restaurante_id;
        $result = $con->query($query);

    for ($i=0; $i < $result->num_rows; $i++) { 

        $response["comentarios"][$i] = $result->fetch_row();


    }
  
     
   } catch (Exception $e) {
       echo " fallo";
   }


 }


    echo json_encode($response);

?>