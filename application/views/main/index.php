<h1>Главная страница</h1>

<?php foreach($news as $val) : ?>

    <h3><?= $val['title']; ?></h3>
    <p><?= $val['description']; ?></p>
    <hr>

<?php endforeach; ?>
