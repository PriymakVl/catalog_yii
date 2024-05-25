<?php 
    use yii\widgets\LinkPager;
    // use yii\bootstrap4\LinkPager;
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
                <p class="price">price: <span><?= $product['price']; ?></span>$</p>
                <a href="/cart/add/<?= $product['id'] ?>" class="btn btn-primary btn-block">Add to cart</a>
            </div>
        </div>
    <? endforeach; ?>
</main>

<?//= $this->render('@app/views/templates/pagination', ['p' => $p, 'defaultPage' => 1]) ?>

<?php echo LinkPager::widget([
    'pagination' => $p,
    'options' => ['class' => 'pagination justify-content-center mt-3'], // CSS класс для контейнера пагинации
    'linkContainerOptions' => ['class' => 'page-item'], // CSS класс для контейнера ссылок
    'linkOptions' => ['class' => 'page-link'], // CSS класс для каждой ссылки
    //'firstPageLabel' => 'Первая', // Текст ссылки на первую страницу
    //'lastPageLabel' => 'Последняя', // Текст ссылки на последнюю страницу
    'prevPageLabel' => 'Prev', // Текст ссылки на предыдущую страницу
    'nextPageLabel' => 'Next', // Текст ссылки на следующую страницу


    ]); ?>