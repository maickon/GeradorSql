<?php

function input($labels, $names, $value='', $disabled=''){
	$tag = new tags();
	for($i=0; $i<count($names); $i++):
		$tag->open('label');
			$tag->inprime($labels[$i]);
		$tag->close('label');
		if($disabled != ''):
			$disabled = 'disabled="disabled"';
		endif;
		if($value == ''):
			$tag->open('input','type="text" '.$disabled.' size="50" name="'.$names[$i].'" value=""');
		else:
			$tag->open('input','type="text" '.$disabled.' size="50" name="'.$names[$i].'" value="'.$value[$i].'"');
		endif;
	endfor;
}

function checkbox($value,$label,$name,$edit=null,$objeto=null,$disabled=''){
	$tag = new tags();
	if($disabled != ''):
		$disabled = 'disabled="disabled"';
	endif;
	if($edit == null && $objeto == null):
		for($i=0; $i<count($value); $i++):
			$tag->open('label','class="checkbox"');
				$tag->open('input','type="checkbox" name="'.$name[$i].'" value="'.$value[$i].'" '.$disabled.'');
					$tag->inprime($label[$i]);
			$tag->close('label');
		endfor;
	else:
		for($i=0; $i<count($value); $i++):
			if(isset($objeto->$name[$i])):
				if($objeto->$name[$i] == $name[$i]):
					$tag->open('label','class="checkbox"');
						$tag->open('input','type="checkbox" name="'.$name[$i].'" value="'.$value[$i].'" '.$disabled.' checked');
						$tag->inprime($label[$i]);
					$tag->close('label');
				else:
					$tag->open('label','class="checkbox"');
						$tag->open('input','type="checkbox" name="'.$name[$i].'" value="'.$value[$i].'" '.$disabled.'');
						$tag->inprime($label[$i]);
					$tag->close('label');
				endif;
			else:
				$tag->open('label','class="checkbox"');
					$tag->open('input','type="checkbox" name="'.$name[$i].'" value="'.$value[$i].'" '.$disabled.'');
					$tag->inprime($label[$i]);
				$tag->close('label');
			endif;
		endfor;
	endif;	
}

function select($labels,$names,$options,$edit=null,$objeto=null,$disabled=''){
	$tag = new tags();
	if($disabled != ''):
		$disabled = 'disabled="disabled"';
	endif;
	if($edit == null && $objeto == null):
		for($i=0; $i<count($labels); $i++):
			$tag->open('label');
				$tag->inprime($labels[$i]);
			$tag->close('label');
			
			$tag->open('select','name="'.$names[$i].'" '.$disabled.'');
			for($j=0; $j<count($options); $j++):
				$tag->open('option');
					$tag->inprime($options[$j]);
				$tag->close('option');
			endfor;
			$tag->close('select');
		endfor;
	else:
		for($i=0; $i<count($labels); $i++):
			$tag->open('label','for="tipo"');
				$tag->inprime($labels[$i]);
			$tag->close('label');
					
			$tag->open('select','id="customDropdown" name="'.$names[$i].'" '.$disabled.'');
					
				$tag->open('option','slected="SELECTED"');
					$tag->inprime(''.limpar_campo_excluir($names[$i], $objeto).'');
				$tag->close('option');
	
				for($i=0; $i<count($options); $i++):
					$tag->open('option');
						$tag->inprime($options[$i]);
					$tag->close('option');
				endfor;
				
			$tag->close('select');
		endfor;
	endif;
}

function textArea($labels,$names,$object=null,$disabled=''){
	$tag = new tags();
	
	for($i=0; $i<count($labels); $i++):
		$tag->open('label');
			$tag->inprime($labels[$i]);
		$tag->close('label');
		
		if($disabled != ''):
			$disabled = 'disabled="disabled"';
		endif;
		
		$tag->open('textarea','class="ckeditor" '.$disabled.' id="editor1" name="'.$names[$i].'"');
			if($object != null):
				$tag->inprime(limpar_campo_excluir($names[$i],$object));
			endif;
		$tag->close('textarea');
		$tag->open('br');
	endfor;
}

function textAreaLimpo($labels,$names,$object=null,$disabled=''){
	$tag = new tags();
	for($i=0; $i<count($labels); $i++):
		$tag->open('label');
			$tag->inprime($labels[$i]);
		$tag->close('label');
		
		if($disabled != ''):
			$disabled = 'disabled="disabled"';
		endif;
		
		$tag->open('textarea','name="'.$names[$i].'" '.$disabled.'');
			if($object != null):
				$tag->inprime(limpar_campo_excluir($names[$i],$object));
			endif;
		$tag->close('textarea');
	endfor;
}

function btAlterarSenha($modulo,$align='left'){
	$tag = new tags();
	$tag->open('div','align="'.$align.'" class="container"');
		$tag->open('input','type="button" onclick="location.href=\'?m='.$modulo.'&t=listar\'" value="Cancelar" class="btn"');
			$tag->inprime(' ');
		$tag->open('input','type="submit" name="mudasenha" value="Salvar alterações" class="btn"');
	$tag->close('div');
}

function btCadastrar($modulo,$align='left'){
	$tag = new tags();
	$tag->open('div','align="'.$align.'" class="container"');
		$tag->open('input','type="button" onclick="location.href=\'?m='.$modulo.'&t=listar\'" value="Cancelar" class="btn"');
		$tag->inprime(' ');
		$tag->open('input','type="submit" name="cadastrar" value="Salvar dados" class="btn"');
	$tag->close('div');
}

function btEditar($modulo,$align='left'){
	$tag = new tags();
	$tag->open('div','align="'.$align.'" class="container"');
		$tag->open('input','type="button" onclick="location.href=\'?m='.$modulo.'&t=listar\'" value="Cancelar" class="btn"'); 
		$tag->inprime(' ');    
		$tag->open('input','type="submit" name="editar" value="Editar dados" class="btn"');     
	$tag->close('div');
}

function btExcluir($modulo,$align='left'){
	$tag = new tags();
	$tag->open('div','align="'.$align.'" class="container"');
		$tag->open('input','type="button" onclick="location.href=\'?m='.$modulo.'&t=listar\'" value="Cancelar" class="btn"');
		$tag->inprime(' ');
		$tag->open('input','type="submit" name="excluir" value="Excluir dados" class="btn"');
	$tag->close('div');
}

function ths($labels){
	$tag = new tags();
	for($i=0; $i<count($labels); $i++):
		$tag->open('th');
			$tag->inprime($labels[$i]);
		$tag->close('th');
	endfor;;
}

function tds($object){
	$tag = new tags();
	$tag->open('td','class="center"');
		printf('%s',$object);
	$tag->close('td');
}

function botoesCrud($object,$modulo){
	$tag = new tags();
	$tag->open('td','class="center"');
		$tag->open('div');
			$tag->open('a','href="?m='.$modulo.'&t=incluir" title="Novo cadastro"');
				$tag->open('img','src="img/plus.png" alt="Novo cadastro"','/');
			$tag->close('a');
				
			$tag->open('a','href="?m='.$modulo.'&t=editar&id='.$object.'" title="Editar"');
				$tag->open('img','src="img/edit.png" alt="Editar"','/');
			$tag->close('a');
				
			$tag->open('a','href="?m='.$modulo.'&t=excluir&id='.$object.'" title="Excluir"');
				$tag->open('img','src="img/cancel.png" alt="Excluir"','/');
			$tag->close('a');
		$tag->close('div');
	$tag->close('td');
}


function buscar($name,$value,$texto,$action=''){
	$tag = new tags();
	$tag->open('div','class="row"');
		$tag->open('div','class="large-12 columns"');
			$tag->open('form','method="post" action="'.$action.'"');
				$tag->open('div','class="row collapse"');
					$tag->open('div','class="large-9 small-8 columns"');
						$tag->open('input','type="text" title="'.$texto.'"');
					$tag->close('div');	
					
					$tag->open('div','class="large-3 small-3 columns"');
						$tag->open('input','type="button" class="postfix button expand red" title="'.$texto.'" name="'.$name.'" value="'.$value.'"');
					$tag->close('div');
				$tag->close('div');
			$tag->close('form');
		$tag->close('div');
	$tag->close('div');
}


function telaDeLogin($msg="Seja bem vindo"){	
	?>
	<script type="text/javascript">
			$(document).ready(function(){
				$(".form-signin").validate({
				rules:{
				usuario:{required:true, minlength:3},
				senha:{required:true, rangelength:[4,10]}
				}
			});
		});
		</script>
	<?php 
	$tag = new tags();
	$tag->open('div','class="row"');
		$tag->open('div','class="span4"');
			$tag->open('form','method="post" class="form-signin"');
				
			$tag->open('h2','class="form-signin-heading"');
				$tag->inprime($msg);
			$tag->close('h2');
			
			$tag->open('input','type="text" class="input-block-level" placeholder="Login" name="usuario" ');
			$tag->open('input','type="password" class="input-block-level" placeholder="Senha" name="senha" ');
			
			$tag->open('label','class="checkbox"');
				$tag->open('input','type="checkbox" value="remember-me"');
				$tag->inprime('Esqueci a senha.');
			$tag->close('label');
			
			$tag->open('input','name="logar" type="submit" value="Logar" class="btn btn-large btn-primary"');
			
			
			if(isset($_GET['erro'])):
				erro_display($_GET['erro']);
			else:
			endif;
			$tag->close('form');
		$tag->close('div');
		
		$tag->open('div','class="span8"');
			$tag->open('h3');
				$tag->open('hr');
					$tag->inprime('Com o Help Rpg você se reune com seus melhores amigos e juntos experimentam
							   uma ótima aventura com os recurços que lhe oferecemos.');
					$tag->open('br');
					$tag->open('br');
					
					$tag->inprime(' Ainda não os usou? O que está esperando!');
				$tag->open('hr');	
			$tag->close('h3');
		$tag->close('div');
	$tag->close('div');
}

function input_file($labels,$names,$object=null,$disabled=''){
	$tag = new tags();
	if($disabled != ''):
		$disabled = 'disabled="disabled"';
	endif;
	$tag->open('label');
		$tag->inprime($labels);
	$tag->close('label');
	$tag->open('input','type="file" size="50" name="'.$names.'" value="" '.$disabled.'');
}

?>