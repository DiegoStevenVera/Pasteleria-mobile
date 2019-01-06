<?PHP
$hostname="localhost";
$database="id6210924_pasteleria";
$username="id6210924_root";
$password="12345";
$json=array();

		$conexion=mysqli_connect($hostname,$username,$password,$database);

		$consulta="SELECT * FROM Categorias";
		$resultado=mysqli_query($conexion,$consulta);

		if($consulta){

			if($reg=mysqli_fetch_array($resultado)){
				$json['datos'][]=$reg;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}



		else{
			$results["user"]='';
			$results["pw"]='';
			$results["names"]='';
			$json['datos'][]=$results;
			echo json_encode($json);
		}


?>
