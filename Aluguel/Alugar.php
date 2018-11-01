<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="content-Type" content="text/html; charset=iso-8859-1" />
    <?php header("Content-Type: text/html; charset=ISO-8859-1", true);?>
    <title>Alugar Veículo</title>
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
    <img src="../Imagens/icnaluguel.png" class="icn2">
    <br>
    <br>
    Alugar um Veiculo
</section>
<form method="post" class="Formulario">
    <br>
    <br>
    <input type="text" placeholder="Codigo do Cliente" name="codigocliente" size="20" maxlength="10" required class="al">
    <input type="text" placeholder="Codigo do Veiculo" name="codigoveiculo" size="20" maxlength="10" required><br>
    <input type="date" name="dataaluguel"  required class="ald">
    <input type="date" name="dataprazo" required class="ald"><br>
    <input type="date" name="datadevolucao" required class="ald">
    <input type="text" placeholder="Valor do Aluguel" name="valoraluguel" size="20" maxlength="5" required><br>
    <input type="text" placeholder="Valor da Multa" name="valormulta" size="20" maxlength="5" required class="al">
    <input type="text" placeholder="Kilometro de Entrada" name="kmentrada" size="20" maxlength="10" required><br>
    <input type="text" placeholder="Kilometro de Saida" name="kmsaida" size="20" maxlength="10" required>
    <br><br>
    <input type="submit" name="Executar" value="Alugar">
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_projetolocadora";

    if(isset($_POST["codigocliente"])) {

        $codigocliente = $_POST["codigocliente"];
        $codigoveiculo = $_POST["codigoveiculo"];
        $dataaluguel = $_POST["dataaluguel"];
        $datadevolucao = $_POST["datadevolucao"];
        $dataprazo = $_POST["dataprazo"];
        $valoraluguel = $_POST["valoraluguel"];
        $valormulta = $_POST["valormulta"];
        $kmentrada = $_POST["kmentrada"];
        $kmsaida = $_POST["kmsaida"];

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Erro na conexão com o Banco");
        }
    else {
        $sql = "INSERT INTO Aluguel (codigocliente,codigoveiculo,dataaluguel,dataprazo,datadevolucao,valoraluguel,valormulta,kmentrada,kmsaida)
        VALUES ($codigocliente,$codigoveiculo,'$dataaluguel','$dataprazo','$datadevolucao',$valoraluguel,$valormulta,$kmentrada,$kmsaida)";


        if ($conn->query($sql) === TRUE) {
            echo "<span><b>Aviso:</b> Cliente cadastrado com sucesso!</span>";
        } else {
            echo "<span><b>Aviso:</b> Ocorreu algum  erro, verifique os dados</span>";
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
