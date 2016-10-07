<?php
require_once 'cabecalho.php';
// Conexão com o banco de dados
connectDataBase();

$funcionario = $_SESSION['usuario'];

// Consulta para pegar o id do funcionário (para salvar na tabela de agendamentos de consultas mais abaixo)
$sql = "SELECT fun_id FROM funcionarios WHERE fun_usuario='$funcionario'";
$result = mysqli_query($connection, $sql);
$arr = mysqli_fetch_array($result);

$idFuncionario = $arr['fun_id'];
$idPaciente = $_POST['id'];
$data = $_POST['data_consulta'];
$hora = $_POST['hora_consulta'];
$status = "Agendada";

//Consulta para pegar o nome do paciente que está marcando a consulta para exibir uma mensagem personalizada quando a consulta for concluída
$sql = "SELECT pac_nome FROM pacientes WHERE pac_id='$idPaciente'";
$result = mysqli_query($connection, $sql);
$arr = mysqli_fetch_array($result);

$paciente = $arr['pac_nome'];

// Consulta para saber se já existe um agendamento para a data/hora pretendida
$sql = "SELECT agd_data, agd_hora FROM agendamentos WHERE agd_data = '$data' AND agd_hora = '$hora'";
$result = mysqli_query($connection, $sql);
$rows = mysqli_num_rows($result);

// Se não existir agendamento para essa data/hora, agenda a consulta normalmente.
if($rows == 0) {
	$sql = "INSERT INTO `agendamentos` (`agd_fun_id`, `agd_pac_id`, `agd_data`, `agd_hora`, `agd_status`) VALUES ('$idFuncionario', '$idPaciente', '$data', '$hora', '$status')";

	if(mysqli_query($connection, $sql)) {
	    echo "<div class='container marketing'>
	            <div class='container theme-showcase' role='main'>
	                <h3>Consulta do(a) senhor(a) " . $paciente . " foi marcada com sucesso!!</h3><br>
	                <a href='paciente.php?id=" . $idPaciente . "'>Voltar à página do paciente</a>
	            </div>
	          </div>
	    ";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
	}
} else {
	// Se existir um agendamento para a data/hora desejadas, exibe mensgaem de erro!
	echo "<div class='container marketing'>
	            <div class='container theme-showcase' role='main'>
	                <h3>Já existe uma consulta marcada para a data e horário desejados.<br> Por favor, selecione outra data ou horário!!</h3><br>
	                <a href='consulta.php?id=" . $idPaciente . "'>Voltar à página de marcação de consulta</a>
	            </div>
	      </div>
	    ";
}
disconnectDataBase();
require_once 'rodape.php';
?>