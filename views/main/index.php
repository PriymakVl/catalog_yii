<?php 
    use yii\widgets\LinkPager;
?>
<h1>Product Catalog</h1>
<main class="grid">
    <?php foreach ($products as $product): ?>
        <div class="card">
            <img src="/web/img/<?= $product['img']; ?>" alt="tshirt">
            <div class="text">
                <h3>
                    <a href="/product/<?= $product['id']; ?>"><?= $product['name']; ?></a>
                </h3>
                <p class="price">price: <span>10</span>$</p>
                <a href="#" class="btn btn-primary btn-block">Add to cart</a>
            </div>
        </div>
    <? endforeach; ?>
</main>

<?//= $this->render('@app/views/templates/pagination', ['p' => $p, 'defaultPage' => 1]) ?>

<?php echo LinkPager::widget(['pagination' => $p]); ?>