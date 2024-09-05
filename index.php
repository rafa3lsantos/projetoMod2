<?php
    //--- FUNÇÕES --- 
    // Login
    // Registrar
    // Fazer Vendas
    // Ver o Log
    // Menu Inicial
    // Menu Principal

    $usuario = [
        'adm' => '12345',
        'dinao' => 'bagua'
    ];
    $vendas = [];
    $logs = [];
    
    function login() {
        global $usuario;
    
        $login = readline("Digite seu nome de usuário: ");
        $senha = readline("Digite sua senha: ");
    
        if (isset($usuario[$login]) && $usuario[$login] === $senha) {
            echo "Logado\n";
        } else {
            echo "Nao existe\n";
        }
    }

    function registrar() {
        global $usuario;

        $login = readline("Digite seu novo nome de usuário: ");
        $senha = readline("Digite sua nova senha: ");

        $usuario[$login] = $senha;
        echo "Usuário registrado com sucesso!";
    }

    function fazerVendas() {
        global $vendas;

        $nomeProduto = readline("Digite o nome do produto: ");
        $valorProduto = readline("Digite o valor do produto: ");
    }

    login();
    login();
    registrar();
    



    // $opcaoEntrada = readline("Escolha sua opção:\n 1 - Registar\n 2 - Login"); 
