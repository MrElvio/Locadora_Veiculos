<!DOCTYPE html>
<html lang="pt-br">
<head>

    <title>Pesquisar Clientes</title>
    <meta http-equiv="content-Type" content="text/html; charset=iso-8859-1" />
    <?php header("Content-Type: text/html; charset=ISO-8859-1", true);?>
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
    <form method="post">
        <input type="search" name="txtprocurar" placeholder="Procure Veiculos" maxlength="35">
        <input type="submit" value="Buscar" name="submit">
    </form>
</section>
<section class="menu2">
    <a href="Cadastro.php">Cadastrar</a><a href="Atualizar.php">Atualizar</a><a href="Excluir.php">Excluir</a><br>
</section>
<section class="Buscar">


    </select><br>

    <?php


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_projetolocadora";
    $dado = "Celson";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Falha na conexao: " . $conn->connect_error);
    }
    else {

           
            if (isset($_POST["pr"])) {
                $dado = $_POST["pr"];

                if (!$dado == "")
                    $sql = 'Select * from Veiculo where nome LIKE "%' . $dado . '%"';
                else
                    $sql = "Select * from Veiculo";
            } else {
                if (isset($_POST["txtprocurar"])) {
                    $dado = $_POST["txtprocurar"];
                    $sql = 'Select * from Veiculo where descricao LIKE "%' . $dado . '%"';
                } else {

                    $sql = "Select * from Veiculo";
                }
            }
            $result = $conn->query($sql);


            if ($result->num_rows > 0) {

                echo "<table>
    <tr>
       <th>Codigo</th>
        <th>Descricao</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Alugado</th>
        <th>Batido</th>
        <th>Diária(R$)</th>
        <th>Km Atual(Km)</th>
        <th>Ano</th>
        <th>Placa</th>
        <th>Tipo</th>
    </tr>";

                while ($row = $result->fetch_assoc()) {

                    $Codigo = $row['Codigo'];
                    $modelo = $row['Modelo'];
                    $marca = $row['Marca'];
                    $anomodelo = $row['AnoModelo'];
                    $alugado = $row['Alugado'];
                    $placa = $row['Placa'];
                    $batido = $row['Batido'];
                    $kmatual = $row['KmAtual'];
                    $valordiaria = $row['ValorDiaria'];
                    $descricao = $row['Descricao'];
                    $tipoveiculo = $row['TipoVeiculo'];

                    if($alugado =="0")
                        $alugado="Nao";
                    else
                        $alugado="Sim";

                    if($batido =="0")
                        $batido="Nao";
                    else
                        $batido="Sim";
                    
                    echo " <tr>";
                    echo "<td>" . $Codigo . "</td>";
                    echo "<td>" . $descricao . "</td>";
                    echo "<td>" . $marca . "</td>";
                    echo "<td>" . $modelo . "</td>";
                    echo "<td>" . $alugado . "</td>";
                    echo "<td>" . $batido . "</td>";
                    echo "<td>" . $valordiaria . "</td>";
                    echo "<td>" . $kmatual . "</td>";
                    echo "<td>" . $anomodelo . "</td>";
                    echo "<td>" . $placa . "</td>";
                    echo "<td>" . $tipoveiculo . "</td>";
                    echo "</tr>";


                }
            } else {
                echo "<img src='../tristeicon.png'>";
                echo "<h2>Nenhum dado encontrado!!..</h2>";
            }
            $conn->close();

    }
    ?>
    </table>

</section>
<footer>

</footer>
</body>
</html>
