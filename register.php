<?php
require_once 'model.php';
$db = new Model();

$data = $_POST;

if( $data['suffering'] == 'otro'){
    $data['suffering'] = $data['other_suffering'];
}

// TODO Registrar los pacientes y los doctores por separado
// TODO los valores para otro deben ubicarse en suferring para ambos casos
// TODO separar los resultados por tipo
$data = [
    $data['first_name'],
    $data['last_name'],
    $data['type'],
    $data['email'],
    $data['suffering'],
    $data['message']
];

$result = $db->insertUser($data);

if ($result){
    return header("Location:index.php?path=success");
    exit();
}

return header("Location:index.php?path=error");
exit();
