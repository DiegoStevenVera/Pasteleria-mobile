<?PHP
$hostname="localhost";
$database="id6210924_pasteleria";
$username="id6210924_root";
$password="12345";
$json=array();

    if( isset($_GET["dni"]) && isset($_GET["ape"])&& isset($_GET["name"])
        && isset($_GET["dir"]) && isset($_GET["dis"])&& isset($_GET["fechN"])
        && isset($_GET["cel"]) && isset($_GET["correo"]) && isset($_GET["pw"])
    ){

    $dni=$_GET['dni'];
    $apellido=$_GET['ape'];
    $name=$_GET['name'];
    $direccion=$_GET['dir'];
    $distrito=$_GET['dis'];
    $fecha=$_GET['fechN'];
    $celular=$_GET['cel'];
    $correo=$_GET['correo'];
    $pw=$_GET['pw'];
    $foto='1';

    $conexion=mysqli_connect($hostname,$username,$password,$database);

    $consulta="CALL Registrar('{$dni}','{$name}','{$apellido}','{$direccion}','{$distrito}','{$fecha}','{$celular}','{$correo}','{$pw}')";
    $resultado=mysqli_query($conexion,$consulta);

    if($consulta){
        //$reg=mysqli_fetch_array($resultado);
        if($reg=mysqli_fetch_array($resultado)){
            $json['dni'] = $reg['dni_cliente'];
            $json['nombre'] = $reg['nombre'];
            $json['apellido'] = $reg['apellido'];
            $json['direccion'] = $reg['direccion'];
            $json['distrito'] = $reg['distrito'];
            $json['fecha_nacimiento'] = $reg['fecha_nacimiento'];
            $json['celular'] = $reg['celular'];
            $json['Cuentas_id_cuentas'] = $reg['Cuentas_id_cuentas'];
            $json['Fotos_id_fotos'] = $reg['Fotos_id_fotos'];

            $json['status'] = 1;
            echo json_encode($json);
        }else{
            $json['status'] = 0;
            echo json_encode($json);
        }
        mysqli_close($conexion);
    }
    else{
        $json['status'] = 0;
        echo json_encode($json);
    }

}
?>
