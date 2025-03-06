<?php
include '../dao/conexao.php';
require_once "./back-end/login/validador_acesso.php";

$id_aluno = $_SESSION["idAluno"];

$querySelect = "SELECT nome FROM tb_aluno
    WHERE tb_aluno.idAluno = '$id_aluno'
";

$query = $conexao->query($querySelect);

$resultado = $query->fetchAll();

?>
<aside id="itens">
    <div id="burguer" onclick="clickmenu()" class="toogle2">
        <span class="menu"></span>
        <span class="menu"></span>
        <span class="menu"></span>
    </div>
    <nav>
        <ul>
        <?php foreach ($resultado as $resultado) {?>
            <h2 class="nome-do-aluno border-nome"><?=$resultado[0]?></h2>
            <?php }?>
            <li class="indice-side">Menu</li>
            <li><a href="index.php"><i class="fa-solid fa-house"></i> Home</a></li>
            <li><a href="painel-de-vagas.php"><i class="fa-solid fa-briefcase" style="color: #ffffff;"></i> Painel de vagas</a></li>
            <li><a href="processos-seletivos.php"><i class="fa-solid fa-people-group"></i> Processo Seletivo</a></li>
            <li><a href="notificacoes.php"><i class="fa-solid fa-bell" style="color: #ffffff;"></i> Notificações</a></li>
            <li><a href="recomendacoes.php"><i class="fa-solid fa-envelope"></i> Recomendações</a></li></a>
            <li class="indice-side borda">Pessoal</li>
            <li><a href="perfil.php"><i class="fa-solid fa-user" style="color: #ffffff;"></i> Meus Dados</a></li>
            <li><a href="curriculo.php"><i class="fa-solid fa-file-invoice" style="color: #ffffff;"></i> Curriculo</a></li>
            <li class="indice-side borda">Suporte</li>
            <li><a href="contato.php"><i class="fa-solid fa-headset" style="color: #ffffff;"></i> Fale Conosco</a></li>
            <li><a href="#"><i class="fa-solid fa-gear" style="color: #ffffff;"></i> Configurações</a></li>
            <li><a href="back-end/login/logout.php"><i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i> Sair</a></li>
        </ul>



    </nav>
</aside>
<script>

    function clickmenu() {
        if (itens.style.display == 'none') {
            itens.style.display = 'block'
            main.style.display = 'flex'

        } else if (itens.style.display == 'block') {
            itens.style.display='none'

        } else {
            itens.classList.add('show')
            itens.style.display = 'block'
            console.log('nao sei')
        }
    }
</script>
