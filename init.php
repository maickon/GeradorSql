<?php
require_once 'classes/tags.class.php';
inicializa();
function inicializa(){
	$init = 1;
	$tag = new tags();
	if(file_exists(dirname(__FILE__).'/config.php')):
		require_once(dirname(__FILE__).'/config.php');
	else:
		$init = 0;
		$tag->open('div','class="alert-box alert"');
			die($tag->inprime('O Arquivo de configuração não foi inicializado, contate o adminstrador.','decode'));
		$tag->close('div');
	endif;

	if(!defined('BASEPATH') || !defined('BASEURL')):
		$init = 0;
		$tag->open('div','class="alert-box alert"');
			die($tag->inprime('Faltam configurações básicas do sistema, contate o adminstrador.','decode'));
		$tag->close('div');
	endif;

	if($init == 1):
		$classes = array(
					'tags.class' 
				);
		_autoload($classes,CLASSESPATH);
		
		$funcoes = array(
				'formularios',
				'geral'
				
			);
		_autoload($funcoes,FUNCOESPATH);
	endif;

	if(isset($_GET['logoff']) == TRUE):
		$user = new usuarioAdmin();
		$user->logoff();
		exit;
	endif;
}

function load_class($className){	
	$pasta = opendir(CLASSESPATH);
	$classes = array();
	$i=0;
	while($p = readdir($pasta)):
		if($p != '.' and $p != '..'):
			$classes[$i] = $p;
			$i++;
		endif;
	endwhile;
	$arqClasse = $classes;
	for($i=0;$i<count($arqClasse);$i++):
		if($arqClasse[$i] == $className):
			//echo CLASSESPATH.$arqClasse[$i].'<br/>';
			require_once CLASSESPATH.$arqClasse[$i];
		else:
		endif;
	endfor;
}

function listarDiretorio($caminho,$modo='dir ou file'){
	if($modo == 'dir'):
		$pasta = opendir($caminho.CLASSESPATH);
		$classes = array();
		$i=0;
		while($p = readdir($pasta)):
			if($p != '.' and $p != '..'):
				$classes[$i] = $p;
				$i++;
			endif;
		endwhile;
		return $classes;
	elseif($modo == 'file'):
		$pasta = opendir($caminho);
		$classes = array();
		$i=0;
		while($p = readdir($pasta)):
			if($p != '.' and $p != '..'):
				$classes[$i] = $p;
				$i++;
			endif;
		endwhile;
		return $classes;
	else:
		echo 'Parâmetro modo inválido.';
	endif;
}

function _autoload(array $list_file, $dir=''){
	$tag = new tags();
	if(!empty($dir)): 
		$dir_ = $dir;
	else:
		$tag->open('div','class="alert-box alert"');
			die($tag->inprime('Deretório de classe não definido no arquivo de configuração, contate o adminstrador.','decode'));
		$tag->close('div');
	endif;
	for($c=0; $c<count($list_file); $c++):
		if(file_exists(BASEPATH.$dir_.$list_file[$c].'.php')):
			require_once(dirname(__FILE__).'/'.$dir_.$list_file[$c].'.php');
		else:
			$tag->open('div','class="alert-box alert"');
				die($tag->inprime('Diretório '.$list_file[$c].' inválido, contate o adminstrador.'));
			$tag->close('div');
		endif;
	endfor;
}

?>
