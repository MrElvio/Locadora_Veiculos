<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="content-Type" content="text/html; charset=iso-8859-1" />
    <?php header("Content-Type: text/html; charset=ISO-8859-1", true);?>
    <title>Atualizar dados do Cliente</title>
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
        <input type="search" name="pr" placeholder="Procure por Veiculos" maxlength="35">
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
    Atualize dados do Clientes
</section>
<form method="post" class="Formulario">
    <input type="text" placeholder="Codigo do Veiculo" name="Codigo" size="20" maxlength="10" required><br><br>
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
        <option value="modelo">Corolla</option>
    </select>
    <br>
    <input type="text" placeholder="Ano do Modelo" name="anomodelo" size="20" maxlength="4" class="vtxt" required>
    <input type="text" placeholder="Placa" name="placa" size="20" maxlength="16"class="vtxt"><br>
    <input type="checkbox" name="alugado" tabindex="0"> Alugado
    <input type="checkbox" name="batido" tabindex="0"> Batido<br>
    <input type="text" placeholder="Kilómetro atual" name="kmatual" size="20" maxlength="8" class="vtxt" required>
    <input type="text" placeholder="Valor da diária" name="valordiaria" size="20" maxlength="3"class="vtxt" required><br>
    <input type="text" placeholder="Descição" name="descricao" size="47" maxlength="40" required><br>
    <input type="submit" name="submit" value="Atualizar">
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_projetolocadora";

    if(isset($_POST["Codigo"])) {

        $codigo = $_POST["Codigo"];
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


        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Erro na conexão com o Banco");
        }
        else {
            $sql = "UPDATE Veiculo set modelo = '$modelo', marca='$marca',anomodelo=$anomodelo,placa ='$placa',alugado = $alugado,batido = $batido,kmatual=$kmatual,valordiaria=$valordiaria,descricao ='$descricao',tipoveiculo='$tipoveiculo' where codigo = $codigo";
            echo"<br><br>";
            if ($conn->query($sql) === TRUE) {
                echo "<span><b>Aviso:</b> Dados Atulizados com Sucesso</span>";
            } else {
                echo "<span><b>Aviso:</b> Erro ao atualizar, verifique os dados!<span>" . $sql . "<br>" . $conn->error;
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
