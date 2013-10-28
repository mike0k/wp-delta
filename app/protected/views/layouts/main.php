<!DOCTYPE html>
<html lang="en">
	<?php $this->renderPartial('//layouts/main/head'); ?>

	<body>
		<?php $this->renderPartial('//layouts/main/header'); ?>
		<div class="content">
			<div class="grid-90 center">
				<div class="boxWhite">
					<?php echo $content; ?>
				</div>
			<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
		<?php $this->renderPartial('//layouts/main/footer'); ?>
	</body>
</html>