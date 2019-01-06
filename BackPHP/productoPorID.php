<?PHP
$hostname="localhost";
$database="id6210924_pasteleria";
$username="id6210924_root";
$password="12345";
$json=array();

if (isset($_GET["id"])) {
    $id=$_GET['id'];

		$conexion=mysqli_connect($hostname,$username,$password,$database);

		$consulta="SELECT * FROM Productos WHERE id_productos = '{$id}'";
		$resultado=mysqli_query($conexion,$consulta);

		if($consulta){

			if($reg=mysqli_fetch_array($resultado)){
			    $result["id"]=$reg['id_productos'];
                $result["nombre_producto"]=$reg['nombre_producto'];
                $result["descripcion"]=$reg['descripcion'];
				$result["precio"]=$reg['precio'];
				$result["stock"]=$reg['stock'];
				$result["imagen"]=base64_encode($reg['img_producto']);
				$result["calorias"]=$reg['calorias'];
				$result["grasas"]=$reg['grasas'];
				$result["carbohidratos"]=$reg['carbohidratos'];
				$result["proteinas"]=$reg['proteinas'];
                $result["categoria"]=$reg['Categorias_id_categorias'];

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
}
?>
