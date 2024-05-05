<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DBPablo";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
$sql = "SELECT idCuenta, tipoCuenta, idPersona, departamento, numeroCuenta, codigoCuenta, saldo FROM cuenta";
$result = $conn->query($sql);
echo "<a class='dropdown-item'href='Ahorro.php'>Cuentas de Ahorro</a>
      <a class='dropdown-item'href='Corriente.php'>Cuentas de Corrientes</a>
      <a class='dropdown-item'href='PlazoFijo.php'>Cuentas de Plazo Fijo</a>";
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID Cuenta</th>
                <th>Tipo de Cuenta</th>
                <th>ID Persona</th>
                <th>Departamento</th>
                <th>Número de Cuenta</th>
                <th>Código de Cuenta</th>
                <th>Saldo</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["idCuenta"]."</td>
                <td>".$row["tipoCuenta"]."</td>
                <td>".$row["idPersona"]."</td>
                <td>".$row["departamento"]."</td>
                <td>".$row["numeroCuenta"]."</td>
                <td>".$row["codigoCuenta"]."</td>
                <td>".$row["saldo"]."</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron cuentas bancarias.";
}
$conn->close();
?>