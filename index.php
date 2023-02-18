<?php
// inclui o arquivo com a lógica do sistema
require_once 'C:\laragon\www\geradordesenhas\gerador_senhas.php';

// define as variáveis para armazenar a senha e a hora gerada
$senha = '';
$hora_gerada = '';

// verifica se a senha foi gerada anteriormente
if (isset($_SESSION['senha_atual']) && isset($_SESSION['hora_gerada'])) {
    $senha = $_SESSION['senha_atual'];
    $hora_gerada = $_SESSION['hora_gerada'];
}

// verifica se o formulário de baixar senha foi submetido
if (isset($_POST['senha_atual']) && isset($_POST['hora_gerada'])) {
    // chama a função para baixar a senha
    baixarSenha($_POST['senha_atual'], $_POST['hora_gerada']);
    // remove as variáveis da sessão
    unset($_SESSION['senha_atual']);
    unset($_SESSION['hora_gerada']);
}

if (isset($_POST['gerar_senha'])) {
    $senha = gerarSenha();
    //echo "A senha gerada é: " . $senha;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Gerador de Senhas</title>
    <!-- inclui os arquivos CSS do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-5">Gerador de Senhas</h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">Nova senha</h3>
                    <p class="card-text">Clique no botão abaixo para gerar uma nova senha:</p>
                    <form method="post">
                        <button id="gerar_senha" class="btn btn-primary btn-block" name="gerar_senha">Gerar senha</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card" id="senha_card" style="display: <?php echo ($senha == '') ? 'none' : 'block'; ?>">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">Senha gerada</h3>
                    <p class="card-text"><?php echo "<b><h2><center>$senha</b></h2></center>";?></p>
            </div>
        </div>
    </div>
</div>