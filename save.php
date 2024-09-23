<?php

$usuario = [
        'adm' => '12345',
    ];
    $vendas = [];
    $logs = [];
    
    function login($login, $senha) {
        global $usuario; 
    
        $login = readline("Insira seu nome de usuário: ");
        $senha = readline("Insira sua senha: ");
    
        if (isset($usuario[$login]) && $usuario[$login] === $senha) {
            echo "Logado";
        } else {
            echo "Nao existe";
        }
    }

    login();

    function addLog($log) {
        global $logs;

        $logs[] = $log;
    }