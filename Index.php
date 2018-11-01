<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="content-Type" content="text/html; charset=iso-8859-1" />
    <?php header("Content-Type: text/html; charset=ISO-8859-1", true);?>
    <link rel="stylesheet" href="estilo.css">
    <title>Pagina Inicial</title>


</head>
<body>
<header>
    <nav class="Menu">
        <ul>
            <a href="Index.php"><li>Home</li></a>
            <a href="Cliente/Cadastro.php"><li> Cliente</li></a>
            <a href="Veiculo/Cadastro.php"><li>Veiculo</li></a>
            <a href="Aluguel/Alugar.php"><li>Aluguel</li></a>
        </ul>
    </nav>
</header>
<h1 align="center" class="sub">Locadora de Veiculos</h1>
<div class="op">

    <form action="Aluguel/Alugar.php" class="btn"><input type="submit" value="Alugar" ></form>
    <form action="Aluguel/Devolver.php" ><input type="submit" value="Devolver"></form>
</div>

</body>
</html>