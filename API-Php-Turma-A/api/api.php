<?php
    header("Content-Type: application/json");
    $metodo = $_SERVER['REQUEST_METHOD'];

    $arquivo = 'usuarios.json';

    if(!file_exists($arquivo)){
        file_put_contents($arquivo,json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        //JSON_PRETTY_PRINT serve para formatar JSON_UNESCAPED_UNICODE serve para utilizar caracteres especiais

    }

    $usuarios = json_decode(file_get_contents($arquivo), true);

//    $usuarios = [
//         ["id" => 1, "nome" => "Maria Souza", "email" => "maria@gmail.com"],
//         ["id" => 2, "nome" => "Joao Paulo", "email" => "joaa@gmail.com"]
    // ];

    switch ($metodo){
        case 'GET':
            //echo"AQUI AÇôeS DO MÉTODO GET";
            //Converte paa json e retorna
            echo json_encode($usuarios);
            break;

        case 'POST':
             ///echo"AQUI AÇôeS DO MÉTODO post";
            $dados = json_decode(file_get_contents('php://input'),true);
            //print_r($dados);
            $novousuario = [
                "id"=> $dados["id"],
                "nome"=>$dados["nome"],
                "email"=>$dados["email"]
            ];
             array_push($usuarios,$novousuario);
             echo json_encode('Usuario inserido com scss!');
             print_r($usuarios);

            break;

        default:
            echo"Nao encontrado";
            break;
            
    }

   
    //echo "Metodo da requisição".$metodo

// $usuarios = [
//     ["id" => 1, "nome" => "Maria Souza", "email" => "maria@gmail.com"],
//     ["id" => 2, "nome" => "Joao Paulo", "email" => "joaa@gmail.com"]
// ];

// echo json_encode($usuarios);
?>