<?PHP
$hostname="localhost";
$database="id6210924_pasteleria";
$username="id6210924_root";
$password="12345";
$json=array();

	if(isset($_GET["correo"]) && isset($_GET["pw"])){
        $correo=$_GET['correo'];
		$pw=$_GET['pw'];

		$conexion=mysqli_connect($hostname,$username,$password,$database);

		$consulta="SELECT * FROM Cuentas WHERE correo_electronico= '{$correo}' AND contrasena = '{$pw}'";
		$resultado=mysqli_query($conexion,$consulta);

		if($consulta){

      $consulta="SELECT cl.dni_cliente, cl.nombre, cl.apellido, cu.correo, cl.Fotos_id_fotos FROM Clientes cl INNER JOIN Cuentas cu on cl.Cuentas_id_cuentas = cu.id_cuentas  
					WHERE cu.correo_electronico = '{$correo}' and cu.contrasena = '{$pw}'";
      $resultado=mysqli_query($conexion,$consulta);
      
			if ($consulta) {
				if($reg=mysqli_fetch_array($resultado)){
					$json['datos'][]=$reg;
				}
				mysqli_close($conexion);
				echo json_encode($json);
			}else{
				$results["DNI"]='';
				$results["apellido"]='';
				$results["nombre"]='';
                $results["correo"]='';
                $results["idFoto"]='';
				$json['datos'][]=$results;
				echo json_encode($json);
			}


		}



		else{
			$results["user"]='';
			$results["pw"]='';
			$results["names"]='';
			$json['datos'][]=$results;
			echo json_encode($json);
		}

	}
	else{
		   	$results["user"]='';
			$results["pw"]='';
			$results["names"]='';
			$json['datos'][]=$results;
			echo json_encode($json);
		}
?>
