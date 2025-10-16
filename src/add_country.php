<?php
// Step 1: Conexión a la base de datos
require('../config/database.php');

// Step 2: Obtener datos del formulario
$name = trim($_POST['name']);
$code = trim($_POST['code']);

// Validar campos vacíos
if (empty($name) || empty($code)) {
    echo "<script>alert('Por favor completa todos los campos.');</script>";
    header('refresh:0;url=add_country.html');
    exit();
}

// Step 3: Verificar si ya existe el país
$check_query = "
    SELECT id FROM countries 
    WHERE name = '$name' OR code = $code
    LIMIT 1;
";

$res_check = pg_query($conn_supa, $check_query);

if (pg_num_rows($res_check) > 0) {
    echo "<script>alert('El país ya está registrado.');</script>";
    header('refresh:0;url=add_country.html');
    exit();
}

// Step 4: Insertar nuevo país
$insert_query = "
    INSERT INTO countries (name, code, created_at)
    VALUES ('$name', $code, NOW());
";

$res_insert = pg_query($conn_supa, $insert_query);

// Step 5: Validar resultado
if ($res_insert) {
    echo "<script>alert('País registrado correctamente.');</script>";
    header('refresh:0;url=add_regions.html');
    exit();
} else {
    echo "Error al registrar el país: " . pg_last_error($conn_supa);
}
?>
