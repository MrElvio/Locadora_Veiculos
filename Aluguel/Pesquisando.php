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
            <a href="../Veiculo/Cadastro.php"><li>Veiculo</li></a>
            <a href="Alugar.php"><li>Aluguel</li></a>
        </ul>
    </nav>
</header>

<section class="Pesquisar">
    <form method="post">
        <input type="search" name="txtprocurar" placeholder="Procure por Clientes" maxlength="35">
        <input type="submit" value="Buscar">
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

        if(isset($_POST["pr"]))
        {
            $dado = $_POST["pr"];

            if(!$dado == "")
                $sql = 'Select * from Aluguel where codigo LIKE "%'.$dado.'%"';
            else
                $sql = "Select * from Aluguel";
        }
        else
        {
            if(isset($_POST["txtprocurar"]))
            {
                $dado = $_POST["txtprocurar"];
                $sql = 'Select * from Aluguel where codigo LIKE "%'.$dado.'%"';
            }
            else
            {

                $sql = "Select * from Aluguel";
            }
        }
        $result = $conn->query($sql);


        if ($result->num_rows > 0) {

       echo"<table>
    <tr>
        <th>Codigo</th>
        <th >Cliente</th>
        <th >Veiculo</th>
        <th>Data Aluguel</th>
        <th>Data Devolucao</th>
        <th>Data Prazo</th>
        <th>Aluguel (R$)</th>
        <th>Multa (R$)</th>
        <th>Km Entrada</th>
        <th>Km Saida</th>
    </tr>";

            while ($row = $result->fetch_assoc()) {
                $Codigo = $row['Codigo'];
                $codigocliente = $row['CodigoCliente'];
                $codigoveiculo = $row['CodigoVeiculo'];
                $dataaluguel = $row['DataAluguel'];
                $datadevolucao = $row['DataDevolucao'];
                $dataprazo = $row['DataPrazo'];
                $valoraluguel = $row['ValorAluguel'];
                $valormulta = $row['ValorMulta'];
                $kmentrada = $row['KmEntrada'];
                $kmsaida = $row['KmSaida'];


                echo " <tr>";
                echo "<td>" . $Codigo . "</td>";
                echo "<td>" . $codigocliente. "</td>";
                echo "<td>" . $codigoveiculo . "</td>";
                echo "<td>" . $dataaluguel . "</td>";
                echo "<td>" . $datadevolucao . "</td>";
                echo "<td>" . $dataprazo . "</td>";
                echo "<td>" . $valoraluguel . "</td>";
                echo "<td>" . $valormulta . "</td>";
                echo "<td>" . $kmentrada . "</td>";
                echo "<td>" . $kmsaida . "</td>";
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
