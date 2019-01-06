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

		$consulta="SELECT * FROM Cuentas WHERE correo_electronico= '{$user}' AND contrasena = '{$pw}'";
		$resultado=mysqli_query($conexion,$consulta);

		if($consulta){
            
			if($reg=mysqli_fetch_array($resultado)){
				$json['datos'][]=$reg;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}



		else{
			$results["user"]='aaa';
			$results["pw"]='aaa';
			$json['datos'][]=$results;
			echo json_encode($json);
		}

	}
	else{
		   	$results["user"]='bbb';
			$results["pw"]='bbb';
			$json['datos'][]=$results;
			echo json_encode($json);
		}
?>
