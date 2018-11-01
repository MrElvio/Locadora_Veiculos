<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="content-Type" content="text/html; charset=iso-8859-1" />
    <?php header("Content-Type: text/html; charset=ISO-8859-1", true);?>
    <title>Devolver Veículo</title>
    <link rel="stylesheet" href="../estilo.css">
</head>
<body>
<header>
    <nav class="Menu">
        <ul>
            <a href="../Index.php"><li>Home</li></a>
            <a href="../Cliente/Cadastro.php"><li> Cliente</li></a>
            <a href="../Veiculo/Cadastro.php"><li>Veiculo</li></a>
            <a href="Alugar.php"><li>Aluguel</li></a>
        </ul>
    </nav>
</header>

<section class="Pesquisar">
    <form action="Pesquisando.php" method="post">
        <input type="search" name="pr" placeholder="Procure por Alugueis" maxlength="35">
        <input type="submit" value="Buscar">

    </form>
</section>
<section class="menu2">
    <a href="Alugar.php">Alugar</a><a href="Devolver.php">Devolver</a>
</section>
<section class="Imagem">
    <img src="../Imagens/icnVeiculo.png" class="icn">
    <br>
    <br>
    Devolver Veículo
</section>
<form method="post" class="Formulario" action="#">
    <br>
    <br>

    <input type="text" placeholder="Código do Aluguel" name="codigo" class="txtcodigo" required><br>
    <input type="submit" name="Executar" value="Devolver">
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

            $sql = "UPDATE veiculo set alugado = 0 where codigo IN (SELECT codigoveiculo from aluguel where codigo =$codigo)";

            if ($conn->query($sql) === TRUE) {
                echo "<span><b>Aviso:</b> Devolvido com sucesso</span>";
            } else {
                echo "<span><b>Aviso:</b> Erro ao devolver, verifique Código</span>";
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
