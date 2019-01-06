<?PHP
$hostname="localhost";
$database="id6210924_pasteleria";
$username="id6210924_root";
$password="12345";
$json=array();
    if(isset($_POST["v_direccion_envio"]) && isset($_POST["v_fecha_orden"]) &&
    isset($_POST["v_fecha_entrega"]) && isset($_POST["v_hora_entrega"]) &&
    isset($_POST["v_estado"]) && isset($_POST["v_clientes_id_clientes"]) &&
    isset($_POST["v_cupones_id_cupones"]) && isset($_POST["v_string"])){
        $direction = $_POST["v_direccion_envio"];
        $orderDate = $_POST["v_fecha_orden"];
        $deliveryDate = $_POST["v_fecha_entrega"];
        $deliveryTime = $_POST["v_hora_entrega"];
        $status = $_POST["v_estado"];
        $idClient = $_POST["v_clientes_id_clientes"];
        $idCupon = $_POST["v_cupones_id_cupones"];
        $string = $_POST["v_string"];

    $conexion=mysqli_connect($hostname,$username,$password,$database);

	$consulta="CALL RealizarCompra('{$direction}','{$orderDate}','{$deliveryDate}','{$deliveryTime}','{$status}','{$idClient}','{$idCupon}','{$string}');";

    $resultado=mysqli_query($conexion,$consulta);

	if($consulta){
        
		if($reg=mysqli_fetch_array($resultado)){
			$json['id_pedido']=$reg['v_id_pedido'];
			$json['response']=$reg['v_response'];
		}
		mysqli_close($conexion);
		echo json_encode($json);
	}

}
?>
