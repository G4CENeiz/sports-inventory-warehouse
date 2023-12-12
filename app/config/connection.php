<?php
$serverName = "localhost,1433"; // Sesuaikan dengan host dan port
$connectionOptions = array(
    "Database" => "master",
    "Uid" => "sa",
    "PWD" => "Password321"
);

// Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "Connect successfull!";
}
?>
