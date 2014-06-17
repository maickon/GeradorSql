<?php
function listarArquivosDeClasse($classList){
	$n = count($classList);
	$names = array();
	for($i=0; $i<$n; $i++):
		$names[$i] = 'class'.$i;
	endfor;
	return $names;
}

function gerar_sql($class_names_array){
	$qtd = 99;
	if(isset($_POST['enviar'])):
		$pasta = $_POST['pastas'];
	endif;
	for($i=0; $i<$qtd; $i++):
		if(isset($class_names_array[$i])):
			require_once 'C:\Program Files\EasyPHP-5.3.8.0\www\Zend\\classes\\'.$pasta.'\\'.$class_names_array[$i];
		endif;
	endfor;
}
?>