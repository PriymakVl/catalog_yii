<?php
$this->title = 'Add Form Product';
?>
<div class="container">
	<h1 class="text-center"><?= $this->title ?></h1>
	
    <?= $this->render('_form', ['product' => $product]); ?>
</div>

