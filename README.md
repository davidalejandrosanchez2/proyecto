# proyecto
Proyectofinalcurso

-Para la parte de base de datos xampp:
Para que funcione la importación de la base datos se debe de crear en el phpMYAdmin una base de datos vacía llamada usuarios y dentro importar la base de datos usuarios.SQL .

Después los ficheros Register,Login,cometarioscu,Restaurantesid irán a la ruta C:\xampp\htdocs

//---------------------------------------------------------

-Para la parte de android:

*En la clase RegisterRequest  en la linea ->  private static final String REGISTER_REQUEST_URL="http://192.168.1.84:8081/Register.php";

*En la clase LoginRequest en linea -> private static final String 
LOGIN_REQUEST_URL="http://192.168.1.84:8081/Login.php";

*En la clase CucharaComentarios  en linea -> private static final String 
 Comentarios_REQUEST_URL="http://192.168.1.84:8081/cometarioscu.php";
 
 *En la clase Restaurantes  en linea -> private static final String 
RESTAU_REQUEST_URL="http://192.168.1.84:8081/Restaurantesid.php";
 

La dirección ip tendrá que ser la propia del ordenador ya que el usuario no podrá registrarse,iniciar sección ,enviar comentarios etc.. ya que la gran parte de la aplicación esta en la base de datos. 



