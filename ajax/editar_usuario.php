<?php
include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
// checking for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once("../libraries/password_compatibility_library.php");
}		
		if (empty($_POST['PrimerNombre2'])){
			$errors[] = "Nombres vacíos";
		} elseif (empty($_POST['Apellido2'])){
			$errors[] = "Apellidos vacíos";
		}  elseif (empty($_POST['Usuario2'])) {
            $errors[] = "Nombre de usuario vacío";
        }  elseif (strlen($_POST['Usuario2']) > 64 || strlen($_POST['Usuario2']) < 2) {
            $errors[] = "Nombre de usuario no puede ser inferior a 2 o más de 64 caracteres";
        } elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['Usuario2'])) {
            $errors[] = "Nombre de usuario no encaja en el esquema de nombre: Sólo aZ y los números están permitidos , de 2 a 64 caracteres";
        } elseif (empty($_POST['Email2'])) {
            $errors[] = "El correo electrónico no puede estar vacío";
        } elseif (strlen($_POST['Email2']) > 64) {
            $errors[] = "El correo electrónico no puede ser superior a 64 caracteres";
        } elseif (!filter_var($_POST['Email2'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Su dirección de correo electrónico no está en un formato de correo electrónico válida";
        } elseif (empty($_POST['Rol2'])){
			$errors[] = "Rol vacíos";
		 } elseif (empty($_POST['Ciudad2'])){
			$errors[] = "Ciudad vacíos";	
        } elseif (
			!empty($_POST['Usuario2'])
			&& !empty($_POST['PrimerNombre2'])
			&& !empty($_POST['Apellido2'])
            && strlen($_POST['Usuario2']) <= 64
            && strlen($_POST['Usuario2']) >= 2
            && preg_match('/^[a-z\d]{2,64}$/i', $_POST['Usuario2'])
            && !empty($_POST['Email2'])
            && strlen($_POST['Email2']) <= 64
            && filter_var($_POST['Email2'], FILTER_VALIDATE_EMAIL)
            && !empty($_POST['Rol2'])
            && !empty($_POST['Ciudad2'])
          )
         {
            require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
			require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
			
				// escaping, additionally removing everything that could be (html/javascript-) code
                $PrimerNombre = mysqli_real_escape_string($con,(strip_tags($_POST["PrimerNombre2"],ENT_QUOTES)));
				$Apellido = mysqli_real_escape_string($con,(strip_tags($_POST["Apellido2"],ENT_QUOTES)));
				$Usuario = mysqli_real_escape_string($con,(strip_tags($_POST["Usuario2"],ENT_QUOTES)));
                $Email = mysqli_real_escape_string($con,(strip_tags($_POST["Email2"],ENT_QUOTES)));
				$Rol = mysqli_real_escape_string($con,(strip_tags($_POST["Rol2"],ENT_QUOTES)));
				$Ciudad = mysqli_real_escape_string($con,(strip_tags($_POST["Ciudad2"],ENT_QUOTES)));

				$user_id=intval($_POST['mod_id']);
					
               
					// write new user's data into database
               $sql = "UPDATE users SET PrimerNombre='".$PrimerNombre."', Apellido='".$Apellido."', Usuario='".$Usuario."', Email='".$Email."', Rol='".$Rol."', Ciudad='".$Ciudad."'
                            WHERE user_id='".$user_id."';";
                    $query_update = mysqli_query($con,$sql);

                    // if user has been added successfully
                    if ($query_update) {
                        $messages[] = "La cuenta ha sido modificada con éxito.";
                    } else {
                        $errors[] = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.";
                    }
                
            
        } else {
            $errors[] = "Un error desconocido ocurrió.";
        }
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>