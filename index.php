<?php

    $usuarioLogado = null;
    $usuario = [
        'adm' => '12345',
        'dinao' => 'bagua'
    ];
    $vendas = [];
    $logs = [];

    function clearScreen() {
        system('cls');
    }    

    function login() {
        clearScreen();

        global $usuario, $usuarioLogado;

        $login = readline("Digite seu nome de usuário: ");
        $senha = readline("Digite sua senha: ");

        if (isset($usuario[$login]) && $usuario[$login] === $senha) {
            $usuarioLogado = $login;
            echo "Bem-vindo $usuarioLogado\n";
        } else {
            echo "Usuário ou senha inválidos\n";
        }

        $data = date('d/m/Y H:i:s');
        verificarLog("Usuário $login logou as $data");
    }

    function registrar() {
        clearScreen();

        global $usuario;

        $login = readline("Digite seu novo nome de usuário: ");
        $senha = readline("Digite sua nova senha: ");

        if (isset($usuario[$login])) {
            echo "Usuário já existe\n";
            return;
        }

        $usuario[$login] = $senha;
        echo "Usuário registrado com sucesso!\n";
        $data = date('d/m/Y H:i:s');
        verificarLog("Usuário $login registrado às $data");
    }

    function fazerVendas() {
        clearScreen();

        global $vendas;

        $nomeProduto = readline("Digite o nome do produto: ");
        $valorProduto = readline("Digite o valor do produto: ");

        $vendas[$nomeProduto] = $valorProduto;

        $data = date('d/m/Y H:i:s');
        verificarLog("Produto $nomeProduto vendido por R$$valorProduto as $data");
    }

    function verificarLog($log) {
        global $logs;

        $logs[] = $log;
    }

    function menuInicial() {
        global $usuarioLogado;

        echo "Bem-vindo ao sistema de gerenciamento de caixa\n";
        echo "1 - Login\n";
        echo "2 - Cadastrar novo usuário\n";

        $opcaoInicial = readline("Escolha uma opção: ");

        switch($opcaoInicial) {
            case 1:
                login();
                if ($usuarioLogado !== null) {
                    return; 
                }
                break;
            case 2:
                registrar();
                break;
            default:
                echo "Opção inválida.\n";
        }
    }

    function menuPrincipal() {
        global $vendas, $usuarioLogado, $logs;

        while (true) {
            echo "Bem-vindo ao sistema de gerenciamento de caixa\n";
            echo "Usuário: $usuarioLogado\n";
            echo "1 - Vender\n";
            echo "2 - Cadastrar novo usuário\n";
            echo "3 - Verificar Log\n";
            echo "4 - Deslogar\n";

            $opcaoPrincipal = readline("Escolha uma opção: ");

            switch($opcaoPrincipal) {
                case 1:
                    fazerVendas();
                    break;
                case 2:
                    registrar();
                    break;
                case 3:
                    print_r($logs); 
                    break;
                case 4:
                    $usuarioLogado = null;
                    echo "Você foi deslogado.\n";
                    return;
                default:
                    echo "Opção inválida.\n";
            }
        }

    }

    while (true) {
        if ($usuarioLogado == null) {
            menuInicial();
        } else {
            menuPrincipal();
        }
    }
