<?php
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (!empty($email) && !empty($password)) {
    $arquivo = "usuarios.json";

    $usuarios = [];

    if (file_exists($arquivo)) {
        $dadosJson = file_get_contents($arquivo);
        $usuarios = json_decode($dadosJson, true) ?? [];
    }

    foreach ($usuarios as $usuario) {
        if ($usuario['email'] === $email) {
            echo "Erro: Este email já está cadastrado!";
            exit;
        }
    }

    $senhaHash = password_hash($password, PASSWORD_DEFAULT);

    $novoUsuario = [
        "email" => $email,
        "senha" => $senhaHash
    ];

    $usuarios[] = $novoUsuario;

    if (file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT))) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao salvar os dados.";
    }
} else {
    echo "Por favor, preencha todos os campos!";
}

$email = $_GET['email'] ?? '';
$password = $_GET['password'] ?? '';
?>
