<?PHP
$hostname="localhost";
$database="id6210924_pasteleria";
$username="id6210924_root";
$password="12345";
$json=array();

		$conexion=mysqli_connect($hostname,$username,$password,$database);

		$consulta="SELECT * FROM Productos";
		$resultado=mysqli_query($conexion,$consulta);

		if($consulta){

			while($reg=mysqli_fetch_array($resultado)){
			    $result["id_producto"]=$reg['id_productos'];
				$result["nombre_producto"]=$reg['nombre_producto'];
				$result["precio"]=$reg['precio'];
				$result["stock"]=$reg['stock'];
				$result["imagen"]=base64_encode($reg['img_producto']);
				$json['datos'][]=$result;
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