<h2>Корзина</h2>

<?php foreach ($basket as $item) : ?>
    <div>
        <h3><?= $item['good_id'] ?></h3>
        <button>Купить</button>
    </div>
<?php endforeach; ?>