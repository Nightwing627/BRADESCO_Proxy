<?php 

$GetMensagem = read($conn, 'acessos', "WHERE id = '$UserId'");
$MensagemGet = $GetMensagem[0]['user_message'];

?>
<script>
	function send_form_message(){
		document.getElementById('form_message').submit();
		return false;
	}
</script>
<div style="display:block;width:95%;margin:20px auto;text-align:center;color:#ff0000;line-height:1.3em;">
		<?php
			$show_message = str_replace('/', '<br>', $MensagemGet);
			echo $show_message;
		?>
	</div><!-- block_mensagem_send -->
	<a href="#" onclick="return send_form_message();" style="width:300px;height:40px;margin:0 auto;text-align:center;line-height:40px;float:none;text-decoration:none;display:block;background-color:#0072e5;cursor:pointer;
border-radius:3px;color:#fff;font-size:0.8em;border-bottom:3px solid #093765;">
		OK, li e entendi a mensagem
	</a>
	<form action="acesso.php" id="form_message" method="post">
		<input type="hidden" name="sender" value="sended_message">
	</form>
<div class="clear"></div>