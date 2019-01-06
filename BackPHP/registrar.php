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
    
    var_dump($fecha);
    ///////////////////////////////

    $conexion=mysqli_connect($hostname,$username,$password,$database);

    $consulta="INSERT INTO Cuentas VALUES (NULL,'{$correo}','{$pw}')";
    $resultado=mysqli_query($conexion,$consulta);

    if($consulta){
        var_dump($dni);
        $consulta2="INSERT INTO Clientes VALUES ('{$dni}','{$name}','{$apellido}','{$direccion}',
						'{$distrito}','{$fecha}','{$celular}','{$foto}',
						(SELECT id_cuentas from Cuentas where correo_electronico = '{$correo}' and contrasena = '{$pw}'))";
        $resultado=mysqli_query($conexion,$consulta2);

        if ($consulta2) {
            var_dump($dni);
            $consulta3="SELECT * FROM Clientes WHERE dni_cliente = '{$dni}'";
            $resultado=mysqli_query($conexion,$consulta3);
            if($reg=mysqli_fetch_array($resultado)){
                $json['datos'][]=$reg;
            }
            mysqli_close($conexion);
            echo json_encode($json);
        }
    }
    else{
        $results["correo"]='';
        $results["pw"]='';
        $results["names"]='';
        $json['datos'][]=$results;
        echo json_encode($json);
    }

}
else{

    $results["dni"]='';
    $results["ape"]='';
    $results["name"]='';
    $results["dir"]='';
    $results["dis"]='';
    $results["fechN"]='';
    $results["cel"]='';
    $results["correo"]='';
    $results["pw"]='';

    $json['datos'][]=$results;
    echo json_encode($json);
}
?>
