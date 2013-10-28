<div class="grid-50 center">
	<div class="boxWhite">
		<div class="grid-80 center">
		<h1>Login</h1>
		<?php $form=$this->beginWidget('CActiveForm', array(
		)); ?>
			<?php echo $form->errorSummary($loginForm); ?>

			<div class="row">
				<?php echo $form->labelEx($loginForm,'username'); ?>
				<?php echo $form->textField($loginForm,'username'); ?>
				<?php echo $form->error($loginForm,'username'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($loginForm,'password'); ?>
				<?php echo $form->passwordField($loginForm,'password'); ?>
				<?php echo $form->error($loginForm,'password'); ?>
			</div>
			
			<div>
				<div class="grid-50">
					<div class="row">
						<?php echo $form->checkbox($loginForm,'rememberMe'); ?>
						<?php echo $form->labelEx($loginForm,'rememberMe'); ?>
					</div>
				</div>
				
				<div class="grid-50">
					<div class="row buttons">
						<?php echo CHtml::submitButton('Login'); ?>
					</div>
				</div>
				<div class="clear"></div>
			</div>

		<?php $this->endWidget(); ?>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
