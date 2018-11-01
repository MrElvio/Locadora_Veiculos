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
            <a href="Cadastro.php"><li> Cliente</li></a>
            <a href="../Veiculo/Cadastro.php"><li>Veiculo</li></a>
            <a href="../Aluguel/Alugar.php"><li>Aluguel</li></a>
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
                $sql = 'Select * from Cliente where nome LIKE "%'.$dado.'%"';
            else
                $sql = "Select * from Cliente";
        }
        else
        {
            if(isset($_POST["txtprocurar"]))
            {
                $dado = $_POST["txtprocurar"];
                $sql = 'Select * from Cliente where nome LIKE "%'.$dado.'%"';
            }
            else
            {

                $sql = "Select * from Cliente";
            }
        }
        $result = $conn->query($sql);


        if ($result->num_rows > 0) {

       echo"<table>
    <tr>
        <th>Codigo</th>
        <th >Nome</th>
        <th >CPF</th>
        <th>Endereco</th>
        <th>Email</th>
        <th>Telefone</th>
    </tr>";

            while ($row = $result->fetch_assoc()) {
                $Codigo = $row['Codigo'];
                $Nome = $row['Nome'];
                $CPF = $row['CPF'];
                $Endereco = $row['Endereco'];
                $Email = $row['Email'];
                $Telefone = $row['Telefone'];


                echo " <tr>";
                echo "<td>" . $Codigo . "</td>";
                echo "<td>" . $Nome . "</td>";
                echo "<td>" . $CPF . "</td>";
                echo "<td>" . $Endereco . "</td>";
                echo "<td>" . $Email . "</td>";
                echo "<td>" . $Telefone . "</td>";
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
