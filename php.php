<?php
include 'admin/conn.php';

$sql = "SELECT
ai.marca,
ai.modelo,
ai.url2,
ai.categoria,
ai.codimg,
ai.valor
FROM (
SELECT
marca,
modelo,
i.url2,
categoria,
a.codimg,
valor,
ROW_NUMBER() OVER(PARTITION BY a.id ORDER BY i.id) RN FROM tickets.autosusados a
LEFT JOIN tickets.imagenesautos i
ON a.codimg=i.codimg
) ai
WHERE RN = 1 and ai.categoria='Vehiculo'
";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}


$sql1 = "SELECT
ai.marca,
ai.modelo,
ai.url2,
ai.categoria,
ai.codimg,
ai.valor
FROM (
SELECT
marca,
modelo,
i.url2,
categoria,
a.codimg,
valor,
ROW_NUMBER() OVER(PARTITION BY a.id ORDER BY i.id) RN FROM tickets.autosusados a
LEFT JOIN tickets.imagenesautos i
ON a.codimg=i.codimg
) ai
WHERE RN = 1 and ai.categoria='Carro de carga'
";
$stmt1 = sqlsrv_query( $conn, $sql1 );
if( $stmt1 === false) {
    die( print_r( sqlsrv_errors(), true) );
}


?>