<div class="container">
	<h1 class="text-center">Cart page</h1>
    <main class="grid">
        <? if ($products): ?>
            <?php foreach ($products as $product): ?>
                <article>
                    <img src="img/<? echo $product['img']; ?>" alt="tshirt photo">
                    <div class="text">
                    <h3>
                        <a href="/product/<?= $product['id'] ?>"><? echo $product['name']; ?></a>
                    </h3>
                    <p><? echo $product['description']; ?></p>
                    <a 
                        href="cart.php?delete_id=<? echo $product['id']; ?>" 
                        class="btn btn-primary btn-block">
                        Delete from cart
                    </a>
                    </div>
                </article>
            <? endforeach; ?>
        <?else: ?>
            <p>Корзина пуста</p>
        <? endif; ?>
    </main>
</div>