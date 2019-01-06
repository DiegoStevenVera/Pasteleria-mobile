<?PHP
$hostname="localhost";
$database="id6210924_pasteleria";
$username="id6210924_root";
$password="12345";
$json=array();
	if(isset($_GET["user"]) && isset($_GET["pw"])){
	    $user=$_GET['user'];
		$pw=$_GET['pw'];
    	$conexion=mysqli_connect($hostname,$username,$password,$database);
    
		$consulta="SELECT
                cli.*,
                f.foto_cliente as foto_usuario,
                cu.*
            FROM Clientes cli
                LEFT JOIN Cuentas cu ON cu.id_cuentas = cli.Cuentas_id_cuentas
                LEFT JOIN Fotos f ON f.id_fotos = cli.Fotos_id_fotos
            WHERE cu.correo_electronico= '{$user}' AND cu.contrasena = '{$pw}'";

	    $resultado=mysqli_query($conexion,$consulta);
        
        //echo mysqli_fetch_array($resultado);
        if($consulta){
            
			if($reg=mysqli_fetch_array($resultado)){
			    $result['dni_cliente'] = $reg['dni_cliente'];
			    $result['nombre'] = $reg['nombre'];
			    $result['apellido'] = $reg['apellido'];
			    $result['direccion'] = $reg['direccion'];
			    $result['distrito'] = $reg['distrito'];
			    $result['fecha_nacimiento'] = $reg['fecha_nacimiento'];
			    $result['celular'] = $reg['celular'];
			    $result['foto_usuario'] = $reg['foto_usuario'];
			    $result['Fotos_id_fotos'] = $reg['Fotos_id_fotos'];
			    $result['Cuentas_id_cuentas'] = $reg['Cuentas_id_cuentas'];
              $result['correo'] = $reg['correo_electronico'];
              $result['password'] = $reg['contrasena'];
              $json['datos'][]=$result;
			    
			    header("HTTP/1.0 200");
			    mysqli_close($conexion);
			    echo json_encode($json);
			}else if ($reg = mysqli_fetch_array($resultado) == null){
			    $json['response'] = 'Usuario y/o contraseña incorrecto';
			    
			    header("HTTP/1.0 403");
			    mysqli_close($conexion);
		    	echo json_encode($json);
			}
			
		}
	}
?>