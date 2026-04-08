<h1>Artikel Kategori: <?= $category['name'] ?></h1>

<ul>
<?php foreach($posts as $post): ?>
    <li><a href="/post/<?= $post['slug'] ?>"><?= esc($post['title']) ?></a></li>
<?php endforeach; ?>
</ul>

<a href="/">Kembali ke Home</a>