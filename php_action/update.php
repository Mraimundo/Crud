<?php
// Iniciar Sessão
session_start();
// Conexão com Banco de dados
require_once 'db_connect.php';

if(isset($_POST['btn-editar'])):
    $nome = mysqli_escape_string($connect, $_POST['Nome']);
    $sobrenome = mysqli_escape_string($connect, $_POST['Sobrenome']);
    $email = mysqli_escape_string($connect, $_POST['Email']);
    $idade = mysqli_escape_string($connect, $_POST['Idade']);

    $id = mysqli_escape_string($connect, $_POST['id']);


    $sql = "UPDATE clientes SET Nome = '$nome', Sobrenome = '$sobrenome', Email = '$email', Idade = '$idade' WHERE id = '$id'";

    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Atualizado com Sucesso!!";
        header('Location: ../index.php');
    else:
        $_SESSION['mensagem'] = "Erro ao Atualizar";
        header('Location: ../index.php');
    endif;
endif;

?>