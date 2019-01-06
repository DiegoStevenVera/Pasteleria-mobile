<?PHP
$hostname="localhost";
$database="id6210924_pasteleria";
$username="id6210924_root";
$password="12345";
$json=array();
    if( isset($_POST["apellido"]) && isset($_POST["direccion"]) &&
    isset($_POST["distrito"]) && isset($_POST["fecha_nacimiento"]) &&
    isset($_POST["celular"]) && isset($_POST["dni"]) && isset($_POST["nombre"]) ){
        
        $dni = $_POST["dni"];
        $name = $_POST["nombre"];
        $lastName = $_POST["apellido"];
        $direction = $_POST["direccion"];
        $district = $_POST["distrito"];
        $birthDate = $_POST["fecha_nacimiento"];
        $cellphone = $_POST["celular"];
        
		$conexion=mysqli_connect($hostname,$username,$password,$database);

		$consulta="CALL ActualizarPerfil('{$dni}','{$name}','{$lastName}','{$direction}','{$district}','{$birthDate}','{$cellphone}');";

	    $resultado=mysqli_query($conexion,$consulta);

    	if($consulta){
            $reg=mysqli_fetch_array($resultado);
			if( $reg['v_response'] == 1){
                header("HTTP/1.0 200");
				$json['response']=$reg['v_response'];
				echo json_encode($json);
			}else {
			    header("HTTP/1.0 404");
				$json['response']=$reg['v_response'];
				echo json_encode($json);
			}
			
			
			mysqli_close($conexion);
		}
	}
?>