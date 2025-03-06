<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/perfil.css">
    <link rel="stylesheet" href="css/componente.css">

    <title>Document</title>
</head>
<body>
    <?php include('../pag-etec/componentes/sidebar.php') ?>
    <?php include ('../pag-etec/componentes/notificacao.php')?>
    
    <section class="parte-pequisa">
    <span class="titulo-perfil">Perfil</span>

    <div class="barra-pesquisa">
    <i class="fa-solid fa-magnifying-glass fa-lg" style="color: #000000;"></i>
            <input  type="text" name="pesquisa" id="pesquisa" placeholder="Pesquise aqui" >
    </div>
    </section>
    
    
    <section class="perfil">
    <div class="alinhar-perfil">
        <div class="imagem-perfil">
            <img src="img/fundo-empresa.jpg" alt="Foto de perfil">
        </div>
     
            
            <h3 class="informacao-usuario">Nome</h3>
            <h4 class="nome-usuario">Etec de Guaianazes</h4>

            <h3 class="informacao-usuario">Email</h3>
            <h4 class="nome-usuario">guainazesetec@etec.sp.gov.br</h4>

            <h3 class="informacao-usuario">Telefone</h3>
            <h4 class="nome-usuario">(11)984286277</h4>

            <h3 class="informacao-usuario">Codigo</h3>
            <h4 class="nome-usuario">118</h4>

            
            <h3 class="informacao-usuario">Municipio</h3>
            <h4 class="nome-usuario">Guaianazes - São Paulo</h4>
    </div>
    </section>

    <script src="https://kit.fontawesome.com/1c065add65.js" crossorigin="anonymous"></script>    
    <script src="./js/etec.js"></script>
</body>
</html>