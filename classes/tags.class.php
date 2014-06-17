<?php
class tags{
	private $sinal_maior;
	private $sinal_menor;
	private $barra;
	
	function __construct(){
		$this->sinal_maior_com_barra = "/>";
		$this->sinal_maior = ">";
		$this->sinal_menor = "<";
		$this->sinal_menor_com_barra = "</";
	}
	function open($tag, $propiedades=null){
		if($propiedades == null):
			if($tag == 'meta'):
				echo "$this->sinal_menor$tag$this->sinal_maior\n";
			elseif($tag == 'hr' || $tag == 'br' || $tag == 'img' || $tag == 'input' || $tag == 'link'):
				echo "$this->sinal_menor$tag$this->sinal_maior_com_barra\n";
			else:
				echo "$this->sinal_menor$tag$this->sinal_maior\n";
			endif;
		else:
			if($tag == 'meta'):
				echo "$this->sinal_menor$tag $propiedades$this->sinal_maior\n";
			elseif($tag == 'hr' || $tag == 'br' || $tag == 'img' || $tag == 'input' || $tag == 'link'):
				echo "$this->sinal_menor$tag $propiedades $this->sinal_maior_com_barra\n";
			else:
				echo "$this->sinal_menor$tag $propiedades$this->sinal_maior\n";
			endif;
		endif;
	}
	
	function close($tag){
		echo "$this->sinal_menor_com_barra$tag$this->sinal_maior\n";
	}
	
	function inprime($string, $modo=null){
		$barra_n = "\n";
		$tabulacao = "\t";
		if($modo == 'decode'):
			print $tabulacao.utf8_decode($string).$barra_n;
		elseif($modo == 'encode'):
			print $tabulacao.utf8_encode($string).$barra_n;
		else:
			print $tabulacao.$string.$barra_n;
		endif;
		
	}
	
	function loadCss($import=false){
		$pasta = opendir(CSSPATH);
		$barra_n = "\n";
		$css = array();
		$i=0;
		while($p = readdir($pasta)):
			if($p != '.' and $p != '..'):
				$css[$i] = $p;
				$i++;
			endif;
		endwhile;
		
		$arqCss = $css;
		for($i=0;$i<count($arqCss);$i++):
			if($import == true):
				print '<style type="text/css">@import url("'.CSSPATH.$arqCss[$i].'");</style>'.$barra_n.'';
			else:
				print '<link href="'.CSSPATH.$arqCss[$i].'" rel="stylesheet"" />'.$barra_n.'';
			endif;
		endfor;
	
	}
	
	function loadJs(){
		$pasta = opendir(JSPATH);
		$barra_n = "\n";
		$js = array();
		$i=0;
		while($p = readdir($pasta)):
			if($p != '.' and $p != '..'):
				$js[$i] = $p;
				$i++;
			endif;
		endwhile;
		
		$arqJs = $js;
		for($i=0;$i<count($arqJs);$i++):
			print '<script src="'.JSPATH.$arqJs[$i].'"></script>'.$barra_n.'';		
		endfor;
	}
	
	function loadCkEditor($arquivo=null, $remoto=false){
		if($arquivo != null):
			if($remoto == false) $arquivo = $arquivo.'.js';
				echo '<script type="text/javascript" src="'.$arquivo.'"></script>';		
		endif;
	}

}
?>