<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Product';
?>
<div class="container">
	<h1 class="text-center"><?= $this->title ?></h1>

	<a href="/product/edit/<?= $product->id ?>" class="btn btn-primary btn-lg mb-3" role="button">Edit product</a>
	
	<table class="table table-bordered table-hover">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Name</th>
				<th scope="col">Value</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th scope="row">Name</th>
				<td><?= $product->name; ?></td>
			</tr>
            <tr>
				<th scope="row">Price</th>
				<td><?= $product->price; ?></td>
			</tr>
            <tr>
				<th scope="row">Description</th>
				<td><?= $product->description ?></td>
			</tr>
            <tr>
				<th scope="row">Image</th>
				<td>
					<img src="/web/img/<?= $product->img; ?>" height="100px">
				</td>
			</tr>
		</tbody>
	</table>
</div>

