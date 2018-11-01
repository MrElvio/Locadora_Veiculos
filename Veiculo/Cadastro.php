<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="content-Type" content="text/html; charset=iso-8859-1" />
    <?php header("Content-Type: text/html; charset=ISO-8859-1", true);?>
    <title>Cadastrar Veículo</title>
    <link rel="stylesheet" href="../estilo.css">
</head>
<body>
<header>
    <nav class="Menu">
        <ul>
            <a href="../Index.php"><li>Home</li></a>
            <a href="../Cliente/Cadastro.php"><li> Cliente</li></a>
            <a href="Cadastro.php"><li>Veiculo</li></a>
            <a href="../Aluguel/Alugar.php"><li>Aluguel</li></a>
        </ul>
    </nav>
</header>
<section class="Pesquisar">
    <form action="Pesquisando.php" method="post">
        <input type="search" name="pr" placeholder="Procure Veiculos" maxlength="35">
        <input type="submit" value="Buscar">
    </form>
</section>
<section class="menu2">
    <a href="Cadastro.php">Cadastrar</a><a href="Atualizar.php">Atualizar</a><a href="Excluir.php">Excluir</a><br>
</section>
<section class="Imagem">
    <img src="../Imagens/icnVeiculo.png" class="icn">
    <br>
    <br>
    Cadastre um novo Cliente
</section>
<form method="post" class="Formulario">
    <br>
    <br>
    <label for="tipoveiculo">Tipo de Automóvel</label><br>
    <select name="tipoveiculo" role="presentation" width="20px" id="tipoveiculo">
        <option value="Automóvel">Automóvel</option>
    </select><br><br>
    <label for="marca">Marca</label><br>
    <select name="marca" role="presentation" width ="20px" id="marca">
        <option value="Toyota">Toyota</option>
    </select><br><br>
    <label for="modelo">Modelo</label><br>
    <select name="modelo" role="presentation" width="20px" id="modelo">
        <option value="Corolla">Corolla</option>
    </select>
    <br>
    <input type="text" placeholder="Ano do Modelo" name="anomodelo" size="20" maxlength="4" class="vtxt" required>
    <input type="text" placeholder="Placa" name="placa" size="20" maxlength="16"class="vtxt"><br>
    <input type="checkbox" name="alugado" tabindex="-1"> Alugado
    <input type="checkbox" name="batido" tabindex="-1"> Batido<br>
    <input type="text" placeholder="Kilómetro atual" name="kmatual" size="20" maxlength="8" class="vtxt" required>
    <input type="text" placeholder="Valor da diária" name="valordiaria" size="20" maxlength="3"class="vtxt" required><br>
    <input type="text" placeholder="Descição" name="descricao" size="47" maxlength="40" required><br>
    <input type="submit" name="submit" value="Cadastrar">
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_projetolocadora";

    if(isset($_POST["submit"])) {


        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Erro na conexão com o Banco");
        }

        else {

            $modelo = $_POST["modelo"];
            $marca = $_POST["marca"];
            $anomodelo = $_POST["anomodelo"];
            $placa = $_POST["placa"];
            $kmatual = $_POST["kmatual"];
            $valordiaria = $_POST["valordiaria"];
            $descricao = $_POST["descricao"];
            $tipoveiculo = $_POST["tipoveiculo"];

        if(isset($_POST["alugado"]))
            $alugado = 1;
        else
            $alugado = 0;

        if(isset($_POST["batido"]))
            $batido = 1;
        else
            $batido = 0;


        $sql = "INSERT INTO Veiculo (Modelo,Marca,AnoModelo,Placa,Alugado,Batido,KmAtual,ValorDiaria,Descricao,TipoVeiculo)
        VALUES ('$modelo', '$marca', $anomodelo,'$placa',$alugado,$batido,$kmatual,$valordiaria,'$descricao','$tipoveiculo')";
echo $sql;
        echo"<br>";
        if ($conn->query($sql) === TRUE) {
            echo "<span><b>Aviso:</b> Veiculo cadastrado com sucesso!</span>";
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

