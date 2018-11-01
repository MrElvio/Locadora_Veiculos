<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_projetolocadora";

    if(isset($_POST["nome"])) {
        $nome = $_POST["nome"];
        $cpf = $_POST["CPF"];
        $endereco = $_POST["endereco"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Erro na conex�o com o Banco");
        }
    else {
        $sql = "INSERT INTO Cliente (Nome, CPF, Endereco,Email,Telefone)
        VALUES ('$nome', '$cpf', '$endereco','$email','$telefone')";

        if ($conn->query($sql) === TRUE) {
            echo "<span><b>Aviso:</b>Cliente cadastrado com sucesso!</span>";
        } else {
            echo "<span><b>Aviso:</b>Ocorreu algum  erro, verifique os dados</span>";
        }
    }
        $conn->close();
    }
    ?>