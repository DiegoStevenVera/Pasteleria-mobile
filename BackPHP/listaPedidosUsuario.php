<?PHP
$hostname="localhost";
$database="id6210924_pasteleria";
$username="id6210924_root";
$password="12345";
$json=array();
	if(isset($_GET["dni"])){
		$dni=$_GET['dni'];
		$conexion=mysqli_connect($hostname,$username,$password,$database);

		$consulta="SELECT 
                p.*
            FROM Pedidos p
            WHERE p.Clientes_dni_cliente= '{$dni}'";

	    $resultado=mysqli_query($conexion,$consulta);

     	if($consulta){
        
            if(sizeof(mysqli_fetch_array($resultado))>0){
                while( $reg = mysqli_fetch_array($resultado)){
                    $result["id_pedidos"] = $reg['id_pedidos'];
                    $result["direccion_envio"] = $reg['direccion_envio'];
                    $result["fecha_orden"] = $reg['fecha_orden'];
                    $result["fecha_entrega"] = $reg['fecha_entrega'];
                    $result["hora_entrega"] = $reg['hora_entrega'];
                    $result["estado"] = $reg['estado'];
                    $result["Clientes_dni_cliente"] = $reg['Clientes_dni_cliente'];
                    $result["Cupones_id_cupones"] = $reg['Cupones_id_cupones'];
                    $json['pedidos'][]=$result;
                }
                header("HTTP/1.0 200");
                mysqli_close($conexion);
			    echo json_encode($json);
            }else{
                $json['pedidos']=[];
                mysqli_close($conexion);
                header("HTTP/1.0 202");
			    echo json_encode($json);
            }

		}
	}
?>
