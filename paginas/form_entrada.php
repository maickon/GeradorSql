<?php
$tag = new tags();
$selectLabels = array('Pastas');
$selectNames = array('pastas');
$selectOptions = listarDiretorio('C:\Program Files\EasyPHP-5.3.8.0\www\Zend','file');

$checkLabel = array();
$checkName = array();

$projeto = null;

$tag->open('div','align="" class="container"');
	
	$tag->open('fieldset');
		$tag->open('legend');
			$tag->inprime('Selecione um projeto para exportar suas classes em um arquivo .sql');
		$tag->close('legend');
		
		$tag->open('div','align="" class="span12"');
			$tag->open('div','class="input-append"');
				$tag->open('form','class="userForm" method="post" action="" enctype="multipart/form-data" ');
				
					select($selectLabels, $selectNames, $selectOptions);
					$tag->open('input','type="submit" name="exibir" value="Carregar arquivos de classe" class="btn"');
				
				$tag->close('form');
			$tag->close('div');
		$tag->close('div');	
		
		$tag->open('div','class="span12"');
			if(isset($_POST['exibir'])):
				$tag->open('form','class="userForm" method="post" action="" enctype="multipart/form-data" ');
					$selectOptionsDir = listarDiretorio('C:\Program Files\EasyPHP-5.3.8.0\www\Zend\\'.$_POST['pastas'].'\\','dir');
					$classNames = listarArquivosDeClasse($selectOptionsDir);
					checkbox($selectOptionsDir, $selectOptionsDir, $classNames);					
					$tag->open('input','type="submit" name="enviar" value="Exportar classes em arquivos .sql" class="btn"');
				$tag->close('form');
			endif;
		$tag->close('div');
	$tag->close('fieldset');
	if(isset($_POST['enviar'])):
		$arq_classe = array();
		for($i=0; $i<=99; $i++):
			if(isset($_POST['class'.$i.''])) echo $_POST['class'.$i.''].'<br/>';
			if(isset($_POST['class'.$i.''])) $arq_classe[$i] = $_POST['class'.$i.''];	
		endfor;
		
		if(isset($_POST['enviar'])):
			$pasta = $_POST['pastas'];
			echo $pasta.'jaja';
		endif;
		print_r($arq_classe);
		gerar_sql($arq_classe);
	endif;
$tag->close('div');
?>