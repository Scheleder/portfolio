<?php
function coverterNomeCidadeEmNomeEstado($cidade_ibge){
	
	$uf = substr($cidade_ibge, -2);

	switch ($uf) {
		case 'AC': return  'Acre'; break;
		case 'AL': return  'Alagoas'; break;
		case 'AP': return  'Amapá'; break;
		case 'AM': return  'Amazonas'; break;
		case 'BA': return  'Bahia'; break;
		case 'CE': return  'Ceará'; break;
		case 'DF': return  'Distrito Federal'; break;
		case 'ES': return  'Espírito Santo'; break;
		case 'GO': return  'Goiás'; break;
		case 'MA': return  'Maranhão'; break;
		case 'MT': return  'Mato Grosso'; break;
		case 'MS': return  'Mato Grosso do Sul'; break;
		case 'MG': return  'Minas Gerais'; break;
		case 'PA': return  'Pará'; break;
		case 'PB': return  'Paraíba'; break;
		case 'PR': return  'Paraná'; break;
		case 'PE': return  'Pernambuco'; break;
		case 'PI': return  'Piauí'; break;
		case 'RJ': return  'Rio de Janeiro'; break;
		case 'RN': return  'Rio Grande do Norte'; break;
		case 'RS': return  'Rio Grande do Sul'; break;
		case 'RO': return  'Rondônia'; break;
		case 'RR': return  'Roraima'; break;
		case 'SC': return  'Santa Catarina'; break;
		case 'SP': return  'São Paulo'; break;
		case 'SE': return  'Sergipe'; break;
		case 'TO': return  'Tocantins'; break;
		default: return "Não informado"; break;
	  }
}

function getDataUserPorId($conexao, $id_usuario){
		$sql = "SELECT * FROM gni_usuarios WHERE idg_usuario='$id_usuario'";

		try {

				$objeto = $conexao->prepare($sql);
				$objeto->execute();

				if ($objeto->rowCount() > 0) {
	 				 $row = $objeto->fetch(PDO::FETCH_OBJ);

	 				 return $row;
	 			}

		} catch (PDOException $e) {
				echo '<script>alert("Erro: ' . $e->getMessage() . '")</script>';
		}
		finally {
				$objeto = null;
		}
}





function listarBancos($conexao){
		$sql = "SELECT * FROM cfg_lista_bancos ORDER BY nome ASC";

		try {
				$objeto = $conexao->prepare($sql);
				return ($objeto->execute()) ? $objeto : false;

		} catch (PDOException $e) {
				echo '<script>alert("Erro: ' . $e->getMessage() . '")</script>';
		}
		finally {
				$objeto = null;
		}
}


function listarTiposContaBancaria($conexao){
		$sql = "SELECT * FROM cfg_tipo_conta_bancaria ORDER BY nome ASC";

		try {
				$objeto = $conexao->prepare($sql);
				return ($objeto->execute()) ? $objeto : false;

		} catch (PDOException $e) {
				echo '<script>alert("Erro: ' . $e->getMessage() . '")</script>';
		}
		finally {
				$objeto = null;
		}
}



function listarEstados($conexao){
		$sql = "SELECT * FROM cfg_lista_estados ORDER BY nome ASC";

		try {
				$objeto = $conexao->prepare($sql);
				return ($objeto->execute()) ? $objeto : false;

		} catch (PDOException $e) {
				echo '<script>alert("Erro: ' . $e->getMessage() . '")</script>';
		}
		finally {
				$objeto = null;
		}
}

function listarMunicipiosPorEstado($conexao, $uf){
		$sql = "SELECT * FROM cfg_lista_municipios WHERE uf = '$uf' ORDER BY nome ASC";

		try {
				$objeto = $conexao->prepare($sql);
				return ($objeto->execute()) ? $objeto : false;

		} catch (PDOException $e) {
				echo '<script>alert("Erro: ' . $e->getMessage() . '")</script>';
		}
		finally {
				$objeto = null;
		}
}

// Instalação do novo sistema de cidades e bairros baseado no IBGE

function listarTodosMunicipiosComEstado($conexao){
		$sql = "SELECT * FROM cfg_lista_municipios ORDER BY nome ASC";

		try {
				$objeto = $conexao->prepare($sql);
				return ($objeto->execute()) ? $objeto : false;

		} catch (PDOException $e) {
				echo '<script>alert("Erro: ' . $e->getMessage() . '")</script>';
		}
		finally {
				$objeto = null;
		}
}

function listarBairrosPorCodigoCidade($conexao, $cod_cidade){
		$sql = "SELECT * FROM cfg_lista_bairros WHERE cod_cidade = '$cod_cidade' ORDER BY nome_bairro ASC";

		try {
				$objeto = $conexao->prepare($sql);
				return ($objeto->execute()) ? $objeto : false;

		} catch (PDOException $e) {
				echo '<script>alert("Erro: ' . $e->getMessage() . '")</script>';
		}
		finally {
				$objeto = null;
		}
}

function tratamentoDeString($string){
	return
		addslashes(
			htmlentities(
				//utf8_decode(
					trim($string)
				//)
			)
		)
	;

	/*
		trim(); //remove espaços em branco antes e depois da string
		utf8_decode(); //ajusta os caracteres acentuados
		htmlentities(); //converte simbolos html em entidades html
		addslashes(); //troca ' ou " por \' ou \"
	*/
}


function removCaractEspecial($string){

        $string = htmlentities($string, ENT_NOQUOTES, 'UTF-8');
        $string = preg_replace('`&([a-z]{1,2})(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i', '\1', $string);
        $string = html_entity_decode($string, ENT_NOQUOTES, 'UTF-8');
        $string = preg_replace(array('`[^a-z0-9]`i','`[-]+`'), ' ', $string);
        $string = preg_replace('/( ){2,}/', '$1', $string);
        $string = strtoupper(trim($string));


	return $string;
}



function deixa2casasDepoisDoPonto($num){
	$part = explode(".",$num);
	$num = $part[0].".".substr($part[1], 0, 2);
	return $num;
}

function trocarpontoporvirgula($num){
	$num = str_replace('.', ',',$num);
	return $num;
}

function numerointeiro($num){
	$num = number_format($num, 2, '.', '');
	return $num;
}




function maiusculasSemAcentos($string_trabalhada){
    return strtoupper(preg_replace(array(
    						"/(á|à|ã|â|ä|Á|À|Ã|Â|Ä)/",
    						"/(é|è|ê|ë|É|È|Ê|Ë|&)/",
    						"/(í|ì|î|ï|Í|Ì|Î|Ï)/",
    						"/(ó|ò|õ|ô|ö|Ó|Ò|Õ|Ô|Ö)/",
    						"/(ú|ù|û|ü|Ú|Ù|Û|Ü)/",
    						"/(ñ|Ñ)/",
    						"/(ç|Ç)/"
    						),explode(" ","A E I O U N C"),$string_trabalhada));
}

function colocarPontuacaoCPFcNPJ ($entrata_dado) {
	$vCJ = strlen($entrata_dado);
	if($vCJ=='11'){
		$l = $entrata_dado;
		$c1 = substr($l, 0, -8);
		$c2 = substr($l, 3, -5);
		$c3 = substr($l, 6, -2);
		$c4 = substr($l, 9);
		$cpfCnpj_output = $c1.".".$c2.".".$c3."-".$c4;
	}elseif($vCJ=='14'){
		$l = $entrata_dado;
		$c1 = substr($l, 0, -12);
		$c2 = substr($l, 2, -9);
		$c3 = substr($l, 5, -6);
		$c4 = substr($l, 8, -2);
		$c5 = substr($l, 12);
		$cpfCnpj_output = $c1.".".$c2.".".$c3."/".$c4."-".$c5;
	}
	return $cpfCnpj_output;
}

function converteDataParaDB ($data_in) {
	$dataON = str_replace('/', '', $data_in);
	$data_Y = substr($dataON, -4);
	$data_M = substr($dataON, 2, -4);
	$data_D = substr($dataON, 0, -6);
	return $data_Y."-".$data_M."-".$data_D;
}

function converteDataParaMostrar ($data_in) {
	$dataON = str_replace('-', '', $data_in);
	$data_Y = substr($dataON, 0, -4);
	$data_M = substr($dataON, 4, -2);
	$data_D = substr($dataON, -2);
	return $data_D."/".$data_M."/".$data_Y;
}

function converteDataETimeParaMostrar ($data_time_in) {


	//2020-04-22 01:26:26
	$data_in = substr($data_time_in, 0, -9);

	$hora_in = substr($data_time_in, 11, -3);

	$dataON = str_replace('-', '', $data_in);
	$data_Y = substr($dataON, 0, -4);
	$data_M = substr($dataON, 4, -2);
	$data_D = substr($dataON, -2);

	return $data_D."/".$data_M."/".$data_Y." - ".$hora_in;
}


function converteDataETimeParaMostrarSemHora ($data_time_in) {


	//2020-04-22 01:26:26
	$data_in = substr($data_time_in, 0, -9);

	$hora_in = substr($data_time_in, 11, -3);

	$dataON = str_replace('-', '', $data_in);
	$data_Y = substr($dataON, 0, -4);
	$data_M = substr($dataON, 4, -2);
	$data_D = substr($dataON, -2);

	return $data_D."/".$data_M."/".$data_Y;
}



function validarData($data) {
	$data = str_replace('/', '', $data);
	$data = str_replace('-', '', $data);

	if (strlen($data) !== 8) {
		return false;
	}

	$dia = (int) substr($data, 0, 2);
	$mes = (int) substr($data, 2, 2);
	$ano = (int) substr($data, 4, 4);

	if (@checkdate($mes, $dia, $ano)) {
		return true;
	}
	else {
		return false;
	}
}

function converterDataParaStringNoFormatoDoBanco($data) {
	$data = str_replace('/', '', $data);
	$data = str_replace('-', '', $data);

	$dia = substr($data, 0, 2);
	$mes = substr($data, 2, 2);
	$ano = substr($data, 4, 4);

	return $ano."-".$mes."-".$dia;
}

function converterDataParaBancoDeDados($data) {
	$data = str_replace('/', '', $data);
	$data = str_replace('-', '', $data);

	if (trim($data) === "") {
		return "";
	}

	$dia = substr($data, 0, 2);
	$mes = substr($data, 2, 2);
	$ano = substr($data, 4, 4);

	$data = $dia."-".$mes."-".$ano;

	$data = date("Y-m-d", strtotime($data));
 	return $data;
}

function converterDataDoBancoDeDadosParaVisualizacao($data) {
 	if (($data === "1969-12-31") || ($data === "0000-00-00") || ($data === null) || ($data === "")) {
 		$data = "";
 	}
 	else {
 		$data = date("d/m/Y", strtotime($data));
 	}
 	return $data;
}

function converterDataEHoraDoBancoDeDadosParaVisualizacao($data) {
	$data = date("d/m/Y G:i:s", strtotime($data));
	return $data;
}

function imprimirDataDeHojePorExtenso() {
	setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    return strftime('%d de %B de %Y', strtotime('today'));
}

function imprimirMesAnoDaDataInformada($data) {
	$data = str_replace('/', '-', $data);
	setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    return utf8_encode(strftime('%B de %Y', strtotime($data)));
}

function dataInformadaEhMenorQueDataDeHoje($dataInformada) {
	$dataInformada = str_replace('/', '', $dataInformada);
	$dataInformada = str_replace('-', '', $dataInformada);

	$dia = substr($dataInformada, 0, 2);
	$mes = substr($dataInformada, 2, 2);
	$ano = substr($dataInformada, 4, 4);

	$dataInformada = new DateTime($mes."/".$dia."/".$ano);
	$dataDeHoje = new DateTime(date("m/d/Y"));

	if ($dataInformada < $dataDeHoje) {
		return true;
	}
	else {
		return false;
	}
}

function converterDataVisualizadaParaDataDeComparacao($data) {
	$data = str_replace('/', '', $data);
	$data = str_replace('-', '', $data);

	$dia = substr($data, 0, 2);
	$mes = substr($data, 2, 2);
	$ano = substr($data, 4, 4);

	$data = new DateTime($mes."/".$dia."/".$ano);

	return $data;
}

function conveterDataParaTimeStamp($data){
	$data = str_replace('/', '', $data);
	$data = str_replace('-', '', $data);

	$dia = substr($data, 0, 2);
	$mes = substr($data, 2, 2);
	$ano = substr($data, 4, 4);

	return mktime(0, 0, 0, $mes, $dia, $ano);
}

function calculaQuantidadeDeDiasEntreDuasDatas($dataInicial, $dataFinal){
   $time1 = conveterDataParaTimeStamp($dataInicial);
   $time2 = conveterDataParaTimeStamp($dataFinal);

   $tMaior = $time1>$time2 ? $time1 : $time2;
   $tMenor = $time1<$time2 ? $time1 : $time2;

   $diff = $tMaior - $tMenor;
   $numeroDeDias = $diff / 86400; //86400 é o número de segundos que 1 dia possui

   return (int) $numeroDeDias;
}

function mascararNumeros($numero, $mascara) {
	/*
		EXEMPLOS

		$cnpj = "11222333000199";
		$cpf = "00100200300";
		$cep = "08665110";
		$data = "10102010";

		echo mascararNumeros($cnpj,'##.###.###/####-##');
		echo mascararNumeros($cpf,'###.###.###-##');
		echo mascararNumeros($cep,'#####-###');
		echo mascararNumeros($data,'##/##/####');
	*/

	$numeroMascarado = '';
	$k = 0;

	for ($i = 0; $i <= strlen($mascara) - 1; $i++) {
		if ($mascara[$i] == '#') {
			if (isset($numero[$k])) {
				$numeroMascarado .= $numero[$k++];
			}
		}
		else {
			if (isset($mascara[$i])) {
				$numeroMascarado .= $mascara[$i];
			}
		}
	}

	return $numeroMascarado;
}

function pegarUltimoDiaDoMesAnterior($data) {

	$data = str_replace('/', '', $data);
	$data = str_replace('-', '', $data);

	$dia = substr($data, 0, 2);
	$mes = substr($data, 2, 2);
	$ano = substr($data, 4, 4);

	$data = $dia."-".$mes."-".$ano;

	$mes = Date('m', strtotime($data));
	$ano = Date('Y', strtotime($data));

	if ($mes === "01") {
		$mes = "12";
		$ano = $ano - 1;
	}
	else {
		$mes = str_pad($mes - 1, 2, "0", STR_PAD_LEFT);
	}

	$dia = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);

	return $dia."/".$mes."/".$ano;
}

function pegarUltimoDiaDaDataInformada($data) {

	$data = str_replace('/', '', $data);
	$data = str_replace('-', '', $data);

	$dia = substr($data, 0, 2);
	$mes = substr($data, 2, 2);
	$ano = substr($data, 4, 4);

	$data = $dia."-".$mes."-".$ano;

	$mes = Date('m', strtotime($data));
	$ano = Date('Y', strtotime($data));

	$mes = str_pad($mes, 2, "0", STR_PAD_LEFT);

	$dia = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);

	return $dia."/".$mes."/".$ano;
}

function formatarValorDuasCasasDecimais($valor) {
	return number_format($valor, 2, ',', '.');
}

function colocarEspacosEmBrancoADireita($palavra, $quantidadeDeEspacos) {
	$palavra = substr($palavra, 0 , $quantidadeDeEspacos);
	return str_pad($palavra, $quantidadeDeEspacos, " ");
}

function colocarZerosAEsquerda($numero, $quantidadeDeZeros) {
	$numero = substr($numero, 0 , $quantidadeDeZeros);
	return str_pad($numero, $quantidadeDeZeros, "0", STR_PAD_LEFT);
}

function retirarVirgulaOuPontoDeValor($valor) {
	$valor = str_replace('.', '', $valor);
	$valor = str_replace(',', '', $valor);

	return $valor;
}

function retirarAcentos($fraseOuPalavra) {
	return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/","/(Ç)/"),explode(" ","a A e E i I o O u U n N c C"), $fraseOuPalavra);
}

function retirarCaracteresNaoRelacionadosANumerosOuLetras($palavra) {
	$palavra = str_replace('-', '', $palavra);
	$palavra = str_replace(' ', '', $palavra);
	$palavra = str_replace('/', '', $palavra);
	$palavra = str_replace('.', '', $palavra);
	$palavra = str_replace(',', '', $palavra);

	return $palavra;
}

//funcão usada no gerar remessa p/ banco sicredi...
// ao usar essa função no codigo para enviar e-mail c/ boleto para o cliente que foi enviado na remessa apresentou o seguinte erro:

//Fatal error: Uncaught Exception: DateTime::__construct(): Failed to parse time string (14/01/2023) at position 0 (1): Unexpected character in /home/gestaoni/www/painel/libs/funcoes.php:495 Stack trace:
//#0 /home/gestaoni/www/painel/libs/funcoes.php(495): DateTime->__construct('14/01/2023')
//#1 /home/gestaoni/www/painel/moduloFinanceiro/view/viewEnviosEmailBoleto.php(38):gerarLinkDoBoletoParaEnvioPorEmail('143203', '14/01/2023', '26/01/2023')
//#2 {main} thrown in /home/gestaoni/www/painel/libs/funcoes.php on line 495


function gerarLinkDoBoletoParaEnvioPorEmail($idDaReceita, $dataDoCadastro, $dataDeVencimento) {

	$dataDoCadastroAux = new DateTime($dataDoCadastro);
	$dataCodigoA .= $dataDoCadastroAux->format('dmy');
	$dataCodigoB .= $dataDoCadastroAux->format('ymd');

	$dataDoVencimentoAux = new DateTime($dataDeVencimento);
	$dataCodigoC .= $dataDoVencimentoAux->format('myd');

	$link = $dataCodigoA . "xabl1Oim" . $dataCodigoB . $dataCodigoC . "18712335659925" . $idDaReceita;

	return $link;
}

// construido para gerar a lista de letras que compoe o link do boleto 06/02/23
function convertNumberToLyrics($number){

	if($number == '1'){ $letra = 'A'; }
	if($number == '2'){ $letra = 'b'; }
	if($number == '3'){ $letra = 'X'; }
	if($number == '4'){ $letra = 'y'; }
	if($number == '5'){ $letra = 'n'; }
	if($number == '6'){ $letra = 'E'; }
	if($number == '7'){ $letra = 'g'; }
	if($number == '8'){ $letra = 'h'; }
	if($number == '9'){ $letra = 'p'; }
	if($number == '0'){ $letra = 's'; }

	return $letra;
}
// construido para gerar a lista de letras que compoe o link do boleto 06/02/23
function converteDataEmFlagLetras($data){

	$valor = str_replace('/', '', $data);

	$arr1 = str_split($valor);

	$r1 = convertNumberToLyrics($arr1[0]);
	$r2 = convertNumberToLyrics($arr1[1]);
	$r3 = $arr1[2];
	$r4 = $arr1[3];
	$r5 = convertNumberToLyrics($arr1[4]);
	$r6 = convertNumberToLyrics($arr1[5]);
	$r7 = convertNumberToLyrics($arr1[6]);
	$r8 = convertNumberToLyrics($arr1[7]);

	$valorMontado = $r1.$r2.$r5.$r6.$r7.$r8.$r4.$r3;

	return $valorMontado;

}

// para não interferir no uso da função acima, foi criado uma outra função para gerar o link do boleto, que deve gerar um valor aleatório antes do idDaReceita... a função acima gera 40 caracteres aleatórios antes do id da receita....
//Abaixo foi criado uma função que recebe os mesmo inputs, mas que gera um md5 com a data de vencimento, gerando 32 caracteres complementados com o "xabl1Oim" + o idDaReceita...
function novoGeradorLinkDoBoletoParaEnvioPorEmail($idDaReceita, $dataDoCadastro, $dataDeVencimento) {

	$dataCodigoA = md5($dataDeVencimento);
	$dataCodigoB = converteDataEmFlagLetras($dataDoCadastro);


	$link = $dataCodigoA . $dataCodigoB .  $idDaReceita;

	return $link;
}


function pegaIdReceitaDoLinkDoBoletoEnviadoPorEmail($link) {
	return substr($link, 40, strlen($link));
}

// generates a random string with letters from 'a' to 'z' and numbers from '1' to '9' with the size that is entered in the parameter
// gera uma string aleatoria com letras de 'a' à 'z' e numeros de '1' à '9' com o tamanho que for inserido no parametro
function randomString($length) {
	$str = "";
	$characters = array_merge(range('a','z'), range('0','9'));
	$max = count($characters) - 1;
	for ($i = 0; $i < $length; $i++) {
		$rand = mt_rand(0, $max);
		$str .= $characters[$rand];
	}
	return $str;
}

// encrypt a string
// encripta uma string
function makeHashSIS_USER ($carv) {
	$combinacao = $carv;
	$balanceador = '10';
	$preOrdem = md5('sws');
	// Gera um hash baseado em bcrypt
	return $hash_k = crypt($combinacao, '$2a$' . $balanceador . '$' . $preOrdem . '$');
}


// Funções editar imagens imoveis - implementado abr/17

function excluiSeExisteIMG($Qualfoto, $QualTabela, $QualId, $caminhoIMG, $caminhoIMGt) {
	global $conexao;
	$pega_foto = $conexao->query("SELECT $Qualfoto FROM $QualTabela WHERE id = $QualId");
	$lPgFoto = $pega_foto->fetch(PDO::FETCH_ASSOC);
	$apaga_foto = $lPgFoto[$Qualfoto];

	if($apaga_foto!='') {

		unlink("$caminhoIMG$apaga_foto");
		unlink("$caminhoIMGt$apaga_foto");
	}
}


function excluiImagemBotao($Qualfoto, $QualTabela, $QualId, $caminhoIMG, $caminhoIMGt, $conexao) {
	global $conexao;
	$res_foto_apaga = $conexao->query("SELECT $Qualfoto FROM $QualTabela WHERE id = $QualId");
	$APg = $res_foto_apaga->fetch(PDO::FETCH_ASSOC);
	$nfotoG = $APg[$Qualfoto];
	if($nfotoG!='') {
		unlink("$caminhoIMG$nfotoG");
		unlink("$caminhoIMGt$nfotoG");
	}
	$updt = $conexao->prepare("UPDATE $QualTabela SET $Qualfoto='' WHERE id = :id");
	$updt->bindParam(':id', $QualId, PDO::PARAM_INT);
	$updt->execute();
	$mensagem = '* '.$Qualfoto.' removida do banco com sucesso!<br>';
	return $mensagem;
}


function renomeiaNomeImg($Qualfoto) {
	$ext = pathinfo($Qualfoto);
	$fotoEV = md5(uniqid(time())) . "." . $ext['extension'];
	return $fotoEV;
}

/// nova função redirect img para storage self



function redirectIMGsw2Storage($UpcaminhoT, $Upcaminho, $Upfile, $watermark_img, $upTamTH, $upTamGR, $rotate) {
	$imagem = $Upcaminho.$Upfile;
	$origem = $Upcaminho.$Upfile;
	$ext = @strtolower(end(explode('.', $origem)));

	// Tamanho das imagens
	$tam_th = $upTamTH;
	$tam_gr = $upTamGR;

	@$thumb = $Upfile;

		if($ext == "jpg" || $ext == "jpeg"){

			$img_origem = @imagecreatefromjpeg($origem);

			if($rotate==''){

			$exif = exif_read_data($origem);
			if (!empty($exif['Orientation'])){
				switch ($exif['Orientation']){
						case 1: // nothing
							break;
						case 2: // horizontal flip
							imageflip($img_origem, IMG_FLIP_HORIZONTAL);
							break;
						case 3: // 180 rotate left
							$img_origem = imagerotate($img_origem, 180, 0);
							break;
						case 4: // vertical flip
							imageflip($img_origem, IMG_FLIP_VERTICAL);
							break;
						case 5: // vertical flip + 90 rotate right
							imageflip($img_origem, IMG_FLIP_VERTICAL);
							$img_origem = imagerotate($img_origem, -90, 0);
							break;
						case 6: // 90 rotate right
							$img_origem = imagerotate($img_origem, -90, 0);
							break;
						case 7: // horizontal flip + 90 rotate right
							imageflip($img_origem, IMG_FLIP_HORIZONTAL);
							$img_origem = imagerotate($img_origem, -90, 0);
							break;
						case 8:    // 90 rotate left
							$img_origem = imagerotate($img_origem, 90, 0);
							break;
					}
			}
		}else{

			$img_origem = imagerotate($img_origem, $rotate, 0);

		}

			$largura = @ImagesX($img_origem);
			$altura = @ImagesY($img_origem);
			@$novaW = intval($upTamTH);
			@$novaH = intval($altura * $upTamTH / $largura);

			$img_final = ImageCreateTrueColor($novaW,$novaH);
			imagecopyresampled($img_final, $img_origem, 0, 0, 0, 0, $novaW, $novaH, $largura, $altura);
			$cropped = imagecrop( $img_final, array( 'x' => 0, 'y' => 0, 'width' => $novaW, 'height' => $novaH ) );
			imagejpeg($cropped, $UpcaminhoT.$thumb);
		}
		elseif ($ext == "gif"){
			$img_origem = @imagecreatefromgif($origem);

			if($rotate==''){

			$exif = exif_read_data($origem);
			if (!empty($exif['Orientation'])){
				switch ($exif['Orientation']){
						case 1: // nothing
							break;
						case 2: // horizontal flip
							imageflip($img_origem, IMG_FLIP_HORIZONTAL);
							break;
						case 3: // 180 rotate left
							$img_origem = imagerotate($img_origem, 180, 0);
							break;
						case 4: // vertical flip
							imageflip($img_origem, IMG_FLIP_VERTICAL);
							break;
						case 5: // vertical flip + 90 rotate right
							imageflip($img_origem, IMG_FLIP_VERTICAL);
							$img_origem = imagerotate($img_origem, -90, 0);
							break;
						case 6: // 90 rotate right
							$img_origem = imagerotate($img_origem, -90, 0);
							break;
						case 7: // horizontal flip + 90 rotate right
							imageflip($img_origem, IMG_FLIP_HORIZONTAL);
							$img_origem = imagerotate($img_origem, -90, 0);
							break;
						case 8:    // 90 rotate left
							$img_origem = imagerotate($img_origem, 90, 0);
							break;
					}
			}

		}else{

			$img_origem = imagerotate($img_origem, $rotate, 0);

		}

			$largura = ImagesX($img_origem);
			$altura = ImagesY($img_origem);
			@$novaW = intval($upTamTH);
			@$novaH = intval($altura * $upTamTH / $largura);
			$img_final = ImageCreateTrueColor($novaW,$novaH);
			imagecopyresampled($img_final, $img_origem, 0, 0, 0, 0, $novaW, $novaH, $largura, $altura);
			$cropped = imagecrop( $img_final, array( 'x' => 0, 'y' => 0, 'width' => $novaW, 'height' => $novaH ) );
			imagegif($cropped, $UpcaminhoT.$thumb);
		}
		elseif ($ext == "png"){
			$img_origem = @imagecreatefrompng($origem);

			if($rotate==''){

			$exif = exif_read_data($origem);
			if (!empty($exif['Orientation'])){
				switch ($exif['Orientation']){
						case 1: // nothing
							break;
						case 2: // horizontal flip
							imageflip($img_origem, IMG_FLIP_HORIZONTAL);
							break;
						case 3: // 180 rotate left
							$img_origem = imagerotate($img_origem, 180, 0);
							break;
						case 4: // vertical flip
							imageflip($img_origem, IMG_FLIP_VERTICAL);
							break;
						case 5: // vertical flip + 90 rotate right
							imageflip($img_origem, IMG_FLIP_VERTICAL);
							$img_origem = imagerotate($img_origem, -90, 0);
							break;
						case 6: // 90 rotate right
							$img_origem = imagerotate($img_origem, -90, 0);
							break;
						case 7: // horizontal flip + 90 rotate right
							imageflip($img_origem, IMG_FLIP_HORIZONTAL);
							$img_origem = imagerotate($img_origem, -90, 0);
							break;
						case 8:    // 90 rotate left
							$img_origem = imagerotate($img_origem, 90, 0);
							break;
					}
			}

		}else{

			$img_origem = imagerotate($img_origem, $rotate, 0);

		}

			$largura = ImagesX($img_origem);
			$altura = ImagesY($img_origem);
			@$novaW = intval($upTamTH);
			@$novaH = intval($altura * $upTamTH / $largura);
			$img_final = ImageCreateTrueColor($novaW,$novaH);

			imagealphablending($img_final, false);
			imagesavealpha($img_final,true);
			$transparent = imagecolorallocatealpha($img_final, 255, 255, 255, 127);
			imagefilledrectangle($img_final, 0, 0, $novaW, $novaH, $transparent);

			imagecopyresampled($img_final, $img_origem, 0, 0, 0, 0, $novaW, $novaH, $largura, $altura);
			$cropped = imagecrop( $img_final, array( 'x' => 0, 'y' => 0, 'width' => $novaW, 'height' => $novaH ) );
			imagepng($cropped, $UpcaminhoT.$thumb);
		}

	if(!$img_origem){
		echo("Erro ao carregar a imagem, talvez formato nao suportado");
		return false;
	}
	ImageDestroy($img_final);

	@$foto_ok = $Upfile;
		if($largura>$altura){
			@$novaW = intval($upTamGR);
			@$novaH = intval($altura * $upTamGR / $largura);
		}else{
			@$novaH = intval($upTamGR);
			@$novaW = intval($largura * $upTamGR / $altura);
		}
		$img_final2 = ImageCreateTrueColor($novaW,$novaH);
		if($ext == "jpg" || $ext == "jpeg"){
			$img_origem = @imagecreatefromjpeg($origem);
			imagecopyresampled($img_final2, $img_origem, 0, 0, 0, 0, $novaW, $novaH, $largura, $altura);

			if($watermark_img<>''){
				// marca d agua
				$padding       = 6; // distance to border in pixels for watermark image
				$opacity      = 80;   // image opacity for transparent watermark
				$watermark    = imagecreatefromgif($watermark_img); // create watermark
				$watermark_size    = getimagesize($watermark_img);
				$watermark_width    = 129;
				$watermark_height    = 73;
				$dest_x       = $novaW - $watermark_width - $padding;
				$dest_y       = $novaH - $watermark_height - $padding;
				ImageCopyMerge($img_final2, $watermark, $dest_x, $dest_y, 0, 0, $watermark_width, $watermark_height, $opacity);
				// marca d agua
			}
			imagejpeg($img_final2, $Upcaminho.$foto_ok);
		}

		elseif ($ext == "gif"){
			$img_origem = @imagecreatefromgif($origem);
			imagecopyresampled($img_final2, $img_origem, 0, 0, 0, 0, $novaW, $novaH, $largura, $altura);

			if($watermark_img<>''){
				// marca d agua
				$padding       = 6; // distance to border in pixels for watermark image
				$opacity      = 80;   // image opacity for transparent watermark
				$watermark    = imagecreatefromgif($watermark_img); // create watermark
				$watermark_size    = getimagesize($watermark_img);
				$watermark_width    = 129;
				$watermark_height    = 73;
				$dest_x       = $novaW - $watermark_width - $padding;
				$dest_y       = $novaH - $watermark_height - $padding;
				ImageCopyMerge($img_final2, $watermark, $dest_x, $dest_y, 0, 0, $watermark_width, $watermark_height, $opacity);
				// marca d agua
			}
			imagegif($img_final2, $Upcaminho.$foto_ok);
		}

		elseif ($ext == "png"){
			$img_origem = @imagecreatefrompng($origem);
			imagealphablending($img_final2, false);
			imagesavealpha($img_final2,true);
			$transparent = imagecolorallocatealpha($img_final2, 255, 255, 255, 127);
			imagefilledrectangle($img_final2, 0, 0, $novaW, $novaH, $transparent);
			imagecopyresampled($img_final2, $img_origem, 0, 0, 0, 0, $novaW, $novaH, $largura, $altura);

			if($watermark_img<>''){
				// marca d agua
				$padding      = 6; // distance to border in pixels for watermark image
				$opacity      = 80;   // image opacity for transparent watermark
				$watermark    = imagecreatefromgif($watermark_img); // create watermark
				$watermark_size    = getimagesize($watermark_img);
				$watermark_width    = 129;
				$watermark_height    = 73;
				$dest_x       = $novaW - $watermark_width - $padding;
				$dest_y       = $novaH - $watermark_height - $padding;
				ImageCopyMerge($img_final2, $watermark, $dest_x, $dest_y, 0, 0, $watermark_width, $watermark_height, $opacity);
				// marca d agua
			}
			imagepng($img_final2, $Upcaminho.$foto_ok);
		}

	ImageDestroy($img_origem);
	ImageDestroy($img_final2);

}




// nova função redirect img para storage self





function redirectIMGsw2($UpcaminhoT, $Upcaminho, $Upfile, $watermark_img) {
	$imagem = $Upcaminho.$Upfile;
	$origem = $Upcaminho.$Upfile;
	$ext = @strtolower(end(explode('.', $origem)));

	@$thumb = $Upfile;
		if($ext == "jpg" || $ext == "jpeg"){
			$img_origem = @imagecreatefromjpeg($origem);
			$largura = @ImagesX($img_origem);
			$altura = @ImagesY($img_origem);
			@$novaW = intval(170);
			@$novaH = intval($altura * 170 / $largura);
			$img_final = ImageCreateTrueColor($novaW,$novaH);
			imagecopyresampled($img_final, $img_origem, 0, 0, 0, 0, $novaW, $novaH, $largura, $altura);
			imagejpeg($img_final, $UpcaminhoT.$thumb);
		}
		elseif ($ext == "gif"){
			$img_origem = @imagecreatefromgif($origem);
			$largura = ImagesX($img_origem);
			$altura = ImagesY($img_origem);
			@$novaW = intval(170);
			@$novaH = intval($altura * 170 / $largura);
			$img_final = ImageCreateTrueColor($novaW,$novaH);
			imagecopyresampled($img_final, $img_origem, 0, 0, 0, 0, $novaW, $novaH, $largura, $altura);
			imagegif($img_final, $UpcaminhoT.$thumb);
		}
		elseif ($ext == "png"){
			$img_origem = @imagecreatefrompng($origem);
			$largura = ImagesX($img_origem);
			$altura = ImagesY($img_origem);
			@$novaW = intval(170);
			@$novaH = intval($altura * 170 / $largura);
			$img_final = ImageCreateTrueColor($novaW,$novaH);

	    imagealphablending($img_final, false);
	    imagesavealpha($img_final,true);
	    $transparent = imagecolorallocatealpha($img_final, 255, 255, 255, 127);
	    imagefilledrectangle($img_final, 0, 0, $novaW, $novaH, $transparent);

			imagecopyresampled($img_final, $img_origem, 0, 0, 0, 0, $novaW, $novaH, $largura, $altura);
			imagepng($img_final, $UpcaminhoT.$thumb);
		}

	if(!$img_origem){
		echo("Erro ao carregar a imagem, talvez formato nao suportado");
		return false;
	}
	ImageDestroy($img_final);

	@$foto_ok = $Upfile;
		if($largura>$altura){
			@$novaW = intval(800);
			@$novaH = intval($altura * 800 / $largura);
		}else{
			@$novaH = intval(600);
			@$novaW = intval($largura * 600 / $altura);
		}
		$img_final2 = ImageCreateTrueColor($novaW,$novaH);
		if($ext == "jpg" || $ext == "jpeg"){
			$img_origem = @imagecreatefromjpeg($origem);
			imagecopyresampled($img_final2, $img_origem, 0, 0, 0, 0, $novaW, $novaH, $largura, $altura);
      // marca d agua
      $padding       = 6; // distance to border in pixels for watermark image
      $opacity      = 80;   // image opacity for transparent watermark
      $watermark    = imagecreatefromgif($watermark_img); // create watermark
      $watermark_size    = getimagesize($watermark_img);
      $watermark_width    = 129;
      $watermark_height    = 73;
      $dest_x       = $novaW - $watermark_width - $padding;
      $dest_y       = $novaH - $watermark_height - $padding;
      ImageCopyMerge($img_final2, $watermark, $dest_x, $dest_y, 0, 0, $watermark_width, $watermark_height, $opacity);
      // marca d agua
			imagejpeg($img_final2, $Upcaminho.$foto_ok);
		}
		elseif ($ext == "gif"){
			$img_origem = @imagecreatefromgif($origem);
			imagecopyresampled($img_final2, $img_origem, 0, 0, 0, 0, $novaW, $novaH, $largura, $altura);
      // marca d agua
      $padding       = 6; // distance to border in pixels for watermark image
      $opacity      = 80;   // image opacity for transparent watermark
      $watermark    = imagecreatefromgif($watermark_img); // create watermark
      $watermark_size    = getimagesize($watermark_img);
      $watermark_width    = 129;
      $watermark_height    = 73;
      $dest_x       = $novaW - $watermark_width - $padding;
      $dest_y       = $novaH - $watermark_height - $padding;
      ImageCopyMerge($img_final2, $watermark, $dest_x, $dest_y, 0, 0, $watermark_width, $watermark_height, $opacity);
      // marca d agua
			imagegif($img_final2, $Upcaminho.$foto_ok);
		}
		elseif ($ext == "png"){
			$img_origem = @imagecreatefrompng($origem);
			imagealphablending($img_final2, false);
			imagesavealpha($img_final2,true);
			$transparent = imagecolorallocatealpha($img_final2, 255, 255, 255, 127);
			imagefilledrectangle($img_final2, 0, 0, $novaW, $novaH, $transparent);
			imagecopyresampled($img_final2, $img_origem, 0, 0, 0, 0, $novaW, $novaH, $largura, $altura);
      // marca d agua
      $padding       = 6; // distance to border in pixels for watermark image
      $opacity      = 80;   // image opacity for transparent watermark
      $watermark    = imagecreatefromgif($watermark_img); // create watermark
      $watermark_size    = getimagesize($watermark_img);
      $watermark_width    = 129;
      $watermark_height    = 73;
      $dest_x       = $novaW - $watermark_width - $padding;
      $dest_y       = $novaH - $watermark_height - $padding;
      ImageCopyMerge($img_final2, $watermark, $dest_x, $dest_y, 0, 0, $watermark_width, $watermark_height, $opacity);
      // marca d agua
			imagepng($img_final2, $Upcaminho.$foto_ok);
		}

	ImageDestroy($img_origem);
	ImageDestroy($img_final2);

}

function limitarTexto($texto, $limite){
  $contador = strlen($texto);
  if ( $contador >= $limite ) {
      $texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . '...';
      return $texto;
  }
  else{
    return $texto;
  }
}

// Rfmarcol inclusão função pega data mes/ano e ajuta para um mes antes

function pagaMesAnteriorDoMesEano($mesRefIni) {
$month = substr ($mesRefIni, 0, 2);
$year = substr ($mesRefIni, 3, 4);

if($month=="01"){
  $refMes = "12";
  $refAno = $year-1;
}else{
  $refMes = $month-1;
  $refAno = $year;
}
if($refMes=="1"){ $refMes = "01"; }
if($refMes=="2"){ $refMes = "02"; }
if($refMes=="3"){ $refMes = "03"; }
if($refMes=="4"){ $refMes = "04"; }
if($refMes=="5"){ $refMes = "05"; }
if($refMes=="6"){ $refMes = "06"; }
if($refMes=="7"){ $refMes = "07"; }
if($refMes=="8"){ $refMes = "08"; }
if($refMes=="9"){ $refMes = "09"; }

return $refMes."/".$refAno;

}

function pagaMesExtenso($mesRef) {

if($mesRef=="01"){ $nomeMes = "Janeiro"; }
if($mesRef=="02"){ $nomeMes = "Fevereiro"; }
if($mesRef=="03"){ $nomeMes = "Março"; }
if($mesRef=="04"){ $nomeMes = "Abril"; }
if($mesRef=="05"){ $nomeMes = "Maio"; }
if($mesRef=="06"){ $nomeMes = "Junho"; }
if($mesRef=="07"){ $nomeMes = "Julho"; }
if($mesRef=="08"){ $nomeMes = "Agosto"; }
if($mesRef=="09"){ $nomeMes = "Setembro"; }
if($mesRef=="10"){ $nomeMes = "Outubro"; }
if($mesRef=="11"){ $nomeMes = "Novembro"; }
if($mesRef=="12"){ $nomeMes = "Dezembro"; }


return $nomeMes;

}

function pagaMesAbreviado($mesRef) {

if($mesRef=="01"){ $nomeMes = "Jan"; }
if($mesRef=="02"){ $nomeMes = "Fev"; }
if($mesRef=="03"){ $nomeMes = "Mar"; }
if($mesRef=="04"){ $nomeMes = "Abr"; }
if($mesRef=="05"){ $nomeMes = "Mai"; }
if($mesRef=="06"){ $nomeMes = "Jun"; }
if($mesRef=="07"){ $nomeMes = "Jul"; }
if($mesRef=="08"){ $nomeMes = "Ago"; }
if($mesRef=="09"){ $nomeMes = "Set"; }
if($mesRef=="10"){ $nomeMes = "Out"; }
if($mesRef=="11"){ $nomeMes = "Nov"; }
if($mesRef=="12"){ $nomeMes = "Dez"; }


return $nomeMes;

}
