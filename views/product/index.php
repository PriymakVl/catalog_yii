<?php

use yii\helpers\Html;
use yii\helpers\Url;

$num = 1;
$this->title = 'Products';
?>
<div class="container">
	<h1 class="text-center"><?= $this->title ?></h1>

	<a href="/product/add" class="btn btn-primary btn-lg mb-3" role="button">Add product</a>
	
	<table class="table table-bordered table-hover">
		<thead class="thead-dark">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Name</th>
				<th scope="col">Price</th>
				<th scope="col">Image</th>
				<th scope="col">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($products as $product): ?>
			<tr>
				<th scope="row"><? echo $num++; ?></th>
				<td>
					<a href="<?= Url::to('/product/view/' . $product->id) ?>"><? echo $product->name; ?></a>
				</td>
				<td><? echo $product->price; ?></td>
				<td>
					<img src="/web/img/<?= $product->img; ?>" height="100px">
				</td>
				<td>
					<a href="/product/delete/<?= $product->id ?>"   class="btn btn-danger btn-sm">Delete</a>
					<a href="/product/edit/<?= $product->id ?>" class="btn btn-primary btn-sm" >Edit</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<!-- pagination links -->
	<? //include '../pagination.php'; ?>
</div>

