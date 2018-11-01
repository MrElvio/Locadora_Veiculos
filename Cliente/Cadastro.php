<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="content-Type" content="text/html; charset=iso-8859-1" />
    <?php header("Content-Type: text/html; charset=ISO-8859-1", true);?>
    <title>Cadastrar Cliente</title>
    <link rel="stylesheet" href="../estilo.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="script.js"></script>
      
      
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
    <a href="Cadastro.php">Cadastrar</a><a href="Atualizar.php">Atualizar</a><a href="Excluir.php">Excluir</a><br>
</section>
<section class="Imagem">
    <img src="../Imagens/icnclientes.png">
    <br>
    <br>
    Cadastre um novo Cliente
</section>
<form id="cadcliente" method="post" class="Formulario" action="#">

    <input type="text" placeholder="Nome" name="nome" size="40" maxlength="43" required onended=""><br>
    <input type="text" placeholder="CPF" name="CPF" size="20" maxlength="11" required><span><b> Obs:</b> sem caracteres especiais</span><br>
    <input type="text" placeholder="Endere�o" name="endereco" size="40" maxlength="43" required><br>
    <input type="email" placeholder="Email" name="email" size="40" maxlength="43"><br>
    <input type="text" placeholder="Telefone" name="telefone"><br>
    <input type="button" value="Salvar" id="savar">

    </form>
    <div id="result">

<footer>

</footer>
</body>
</html>

<script type="text/javascript" language="javascript"> 
    $(document).ready(function(){
        $('#salvar').click(function(){
            var dados = $('#cadcliente').serialize();

            $.ajax({
                type: 'POST',
                datatype: 'json',
                url: 'Cadastroajax.php',
                async: true,
                data: dados,
                success: function(response) {
                    location.reload();
                }   
            });
        });
    });


</script>