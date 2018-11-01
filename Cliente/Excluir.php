<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="content-Type" content="text/html; charset=iso-8859-1" />
    <?php header("Content-Type: text/html; charset=ISO-8859-1", true);?>
    <title>Excluir Cliente</title>
    <link rel="stylesheet" href="../estilo.css">
</head>
<body>
<header>
    <nav class="Menu">
        <ul>
            <a href="../Index.php"><li>Home</li></a>
            <a href="Cadastro.php"><li> Cliente</li></a>
            <a href="../Veiculo/Cadastro.php"><li>Veiculo</li></a>
            <a href="../Aluguel/Alugar.php"><li>Aluguel</li></a>
        </ul>
    </nav>
</header>
<section class="Pesquisar">
    <form action="Pesquisando.php" method="post">
        <input type="search" name="pr" placeholder="Procure por Clientes" maxlength="35">
        <input type="submit" value="Buscar">
    </form>
</section>
<section class="menu2">
    <a href="Cadastro.php">Cadastrar</a><a href="Atualizar.php">Atualizar</a><a href="Excluir.php">Excluir</a>
</section>
<section class="Imagem">
    <img src="../Imagens/icnclientes.png">
    <br>
    <br>
    Exlcua um Cliente
</section>
<form method="post" class="Formulario" action="#">
    <br>
    <br>

    <input type="text" placeholder="Código do Cliente" name="codigo" class="txtcodigo" required><br>
    <input type="submit" name="Executar" value="Excluir">
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_projetolocadora";

    if(isset($_POST["codigo"])) {
        $codigo = $_POST["codigo"];

        $conn = new mysqli($servername, $username, $password, $dbname);
        echo"<br><br>";

        if ($conn->connect_error) {
            die("Erro na conexão com o Banco");
        }
        else {
            $sql = "delete from Cliente WHERE  codigo = $codigo";

            if ($conn->query($sql) === TRUE) {
                echo "<span><b>Aviso:</b>Cliente excluido com sucesso!</span>";
            } else {
                echo "<span><b>Aviso:</b>Erro ao excluir, verifique Código</span>";
            }
        }

        $conn->close();
    }
    ?>
</form>


<footer>

</footer>
</body>
</html>
