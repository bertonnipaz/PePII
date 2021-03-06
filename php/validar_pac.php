<?php
require_once 'cabecalho.php';
// Conexão com o banco de dados
connectDataBase();

// Salva os dados preenchidos no formulário em variáveis para inserir no banco de dados
$nome = strtoupper($_POST['nome']);
$nome = mysqli_real_escape_string($connection, $nome);

$endereco = mysqli_real_escape_string($connection, $_POST['endereco']);
if(isset($_POST['numero']) && $_POST['numero'] != ""){
	$numero = mysqli_real_escape_string($connection, $_POST['numero']);
} else {
	$numero = "S/N";
}
$bairro = mysqli_real_escape_string($connection, $_POST['bairro']);
$cidade = mysqli_real_escape_string($connection, $_POST['cidade']);
if(isset($_POST['rg']) && $_POST['rg'] != ""){
	$rg = mysqli_real_escape_string($connection, $_POST['rg']);
} else {
	$rg = "Não Cadastrado";
}
if(isset($_POST['cpf']) && $_POST['cpf'] != ""){
	$cpf = mysqli_real_escape_string($connection, $_POST['cpf']);
} else {
	$cpf = "Não Cadastrado";
}
$endereco .= ", Nº " . $numero . ", " . $bairro . " - " . $cidade;
$endereco = strtoupper($endereco);
$endereco = mysqli_real_escape_string($connection, $endereco);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$nasc = mysqli_real_escape_string($connection, $_POST['nasc']);
$fone1 = mysqli_real_escape_string($connection, $_POST['fone1']);
if(isset($_POST['fone2']) && $_POST['fone2'] != ""){
	$fone2 = mysqli_real_escape_string($connection, $_POST['fone2']);
} else {
	$fone2 = "Não Cadastrado";
}
// Query para saber se já existe um usuário cadastrado com alguns dos dados passados no cadastro (para evitar duplicidade de usuários)
$sql = "SELECT * FROM `pacientes`";
$result = mysqli_query($connection, $sql);
$contains = false;
while($array = mysqli_fetch_assoc($result)) {
	if($array['pac_cpf'] == $cpf && $cpf != "Não Cadastrado" || $array['pac_rg'] == $rg && $rg != "Não Cadastrado") {
		$contains = true;
		break;
	}
}
if($contains) {
	echo "<div class='container marketing'>
			<div class='container theme-showcase' role='main'>
				<h2>Já existe um paciente cadastrado com o CPF ou RG informados!!</h2><br>
				<button class='btn btn-warning voltar' onClick='history.go(-1)'>Voltar</button>
				<a href='home.php' class='btn btn-primary voltar'>Ir à Página Inicial</a>
			</div>
		</div>
		";
} else {
// Query para inserção dos dados do paciente no banco de dados
	$sql = "INSERT INTO `pacientes` (`pac_nome`, `pac_endereco`, `pac_rg`, `pac_cpf`, `pac_email`, `pac_data_nasc`, `pac_telefone_1`, `pac_telefone_2`) VALUES ('$nome', '$endereco', '$rg', '$cpf', '$email', '$nasc', '$fone1', '$fone2')";

// Se a query foi executada com sucesso, exibe uma mensagem e dois links (um para voltar à página de cadastro e outro para ir à página principal)
	if(mysqli_query($connection, $sql)) {
		echo "<div class='container marketing'>
				<div class='container theme-showcase' role='main'>
					<h2>Paciente cadastrado com sucesso!!</h2><br>
					<a href='cadastro_pacientes.php' class='btn btn-warning voltar'>Cadastrar outro Paciente</a>
					<a href='home.php' class='btn btn-primary voltar'>Ir à Página Inicial</a>
				</div>
			</div>
		";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($connection);
	}
}
disconnectDataBase();
require_once 'rodape.php';
?>