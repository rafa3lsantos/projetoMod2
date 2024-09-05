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

        if (isset($usuario[$login])) {
            echo "Usuário já existe.\n";
            return;
        }

        $usuario[$login] = $senha;
        echo "Usuário registrado com sucesso!";
        $data = date('d/m/Y H:i:s');
        addLog("Usuario $login registrado as $data");
    }

    function fazerVendas() {
        global $vendas;

        $nomeProduto = readline("Digite o nome do produto: ");
        $valorProduto = readline("Digite o valor do produto: ");

        $vendas[$nomeProduto] = $valorProduto;
        addLog("Produto vendido");
    }

    function menuInicial($usuario) {
        echo "Bem-vindo ao sistema de gerenciamento de caixa\n";
        echo "1. Login\n";
        echo "2. Cadastrar novo usuário\n";
        
        $option = readline("Escolha uma opção: ");
        print_r($usuario);

        switch($option) {
            case 1:
                login($usuario);
                break;
            case 2:
                registrar();
                break;
        }
    }

    function addLog($log) {
        global $logs;

        $logs[] = $log;
    }
    while (true){
    menuInicial($usuario);
}



    // $opcaoEntrada = readline("Escolha sua opção:\n 1 - Registar\n 2 - Login"); 
