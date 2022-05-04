<?php
$serverName = "tcp:grandleasing-br.database.windows.net,1433"; //serverName\instanceName
$connectionInfo = array( "Database"=>"informixgl", "UID"=>"informe", "PWD"=>"mdzkx_UPH+G=FJG2ZZrw");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}

?>