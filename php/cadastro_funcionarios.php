<?php
require_once 'cabecalho.php';

// Checa se o usuário está logado e se é o Administrador do Sistema
// Se sim, permite o acesso ao cadastro de funcionários
if(isLogged() && isAdmin()) {
?>
<title>Cadastro de Funcionários</title>
<div class="container marketing">
	<div class="container theme-showcase" role="main">
		<div id="cadastro" class="page-header">
			<h1>Cadastro de Funcionários</h1>
                <button class="btn btn-warning voltar" onClick="history.go(-1)">Voltar</button>
                <a class="btn btn-info voltar" href="javascript:void(0);" onclick="javascript:introJs().setOption('showProgress', true).start();">Tutorial</a>
                <p>Os Campos com <font color="#ce1414"> * </font>são obrigatórios</p>
        </div>
        <div class="row">
            <form method="POST" action="validar_fun.php">
				<div class="col-md-8">
					<label for="nome">Nome *</label>
  					<input type="text" class="form-control" id="nome" name="nome" required placeholder="Digite seu nome" data-step="1" data-intro="Digite aqui o nome do funcionário sem usar acentos ou cedilha" data-position='top'>
				</div>
				<div class="col-md-4">
					<label for="nasc">Data de Nascimento *</label>
  					<input type="date" class="form-control" id="nasc" max-lenght="2" name="nasc" required data-step="2" data-intro="Digite aqui a data de nascimento do funcionário" data-position='top'>
				</div>
				<div class="col-md-4 user">
					<label for="usuario">Usuário *</label>
  					<input type="text" class="form-control" id="usuario" name="usuario" required placeholder="Digite um nome de usuário" data-step="3" data-intro="Digite aqui o nome de usuário para o funcionário (Este nome será usado para ter acesso ao sistema juntamente com a senha que será cadastrada mais adiante" data-position='top'>
				</div>

				<div class="col-md-4 user">
					<label for="senha">Senha *</label>
  					<input type="password" class="form-control" id="senha" name="senha" required placeholder="Digite sua senha" data-step="4" data-intro="Digite aqui uma senha alfanumérica (Apenas letras - maiúsculas ou minúsculas - e números)" data-position='top'>
				</div>
                <div class="col-md-4 user">
                    <label for="confirma_senha">Confirmar Senha *</label>
                    <input type="password" class="form-control" id="confirma_senha" name="confirma_senha" required placeholder="Confirme sua senha" data-step="5" data-intro="Confirme a senha neste campo (Repita a senha digitada anteriormente)" data-position='top'>
                </div>
                <div class="col-md-6 user">
                    <label for="pergunta_secreta">Pergunta Secreta *</label>
                    <select class="form-control" id="pergunta_secreta" name="pergunta_secreta" required placeholder="Escolha uma pergunta" data-step="6" data-intro="Escolha uma pergunta que será necessária para recuperar a senha, caso a esqueça" data-position='top'>
                        <option value="default">Escolha uma pergunta</option>
                        <option value="Qual foi o seu primeiro veículo?">Qual foi o seu primeiro veículo?</option>
                        <option value="Qual o nome do seu primeiro animal de estimação?">Qual o nome do seu primeiro animal de estimação?</option>
                        <option value="Qual sua comida preferida?">Qual sua comida preferida?</option>
                        <option value="Qual o seu filme preferido?">Qual o seu filme preferido?</option>
                        <option value="Pra qual time você torce?">Pra qual time você torce?</option>
                    </select>
                </div>
				<div class="col-md-6 user">
					<label for="resposta">Resposta *</label>
  					<input type="password" class="form-control" id="resposta" name="resposta" required placeholder="Digite a resposta" data-step="7" data-intro="Digite aqui a resposta para a pergunta escolhida" data-position='top'>
				</div>
				<div class="col-md-12">
					<button type="submit" class="btn btn-primary" title="Enviar" data-step="8" data-intro="Depois de preencher os campos, clique aqui para concluir o cadastro" data-position='top'>Enviar</button>
					<button type="reset" class="btn btn-default" title="Limpar" data-step="9" data-intro="Clique aqui para limpar o formulário (Todos os campos serão limpos)" data-position='top'>Limpar</button>
				</div>
			</form>
            <?php
            if(isset($_SESSION['userAlreadyExist'])) {
                ?>
                <div class="col-md-6 alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>Atenção!</h4>
                    Você não pode utilizar esse nome de usuário pois ele já está em uso!
                </div>
                <div class="col-md-7">
                </div>
                <?php
                unset($_SESSION['userAlreadyExist']);
            }
            ?>
		</div>
	</div>
<script type="text/javascript">
$('form').on('submit', function () {
    if($(this).find('input[name="senha"]').val() != $(this).find('input[name="confirma_senha"]').val()) {
        bootbox.alert("Senhas digitadas não conferem!!");
        $('#senha').focus();
        return false;
    }
});
</script>
<?php
} else {
/*Se o usuário não estiver logado e/ou não for administrador do Sistema, exibe uma mensgaem pois apenas
o administrador pode cadastrar funcionários*/
?>
<div class="container marketing">
    <div class="container theme-showcase" role="main">
        <div id="cadastro" class="page-header">
            <h3>Apenas o administrador do sistema pode cadastrar um funcionário</h3>
        </div>
    </div>
</div>
<?php
}
require_once 'rodape.php';
?>