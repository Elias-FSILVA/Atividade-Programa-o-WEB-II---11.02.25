<?php
$jsonFile = 'usuarios.json';

if (file_exists($jsonFile)) {
    $usuarios = json_decode(file_get_contents($jsonFile), true);

    echo json_encode($usuarios);
} else {
    echo json_encode(["message" => "Arquivo de dados não encontrado."]);
}
?>