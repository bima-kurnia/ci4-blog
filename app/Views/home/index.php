<h1>Blog CI4</h1>

<form action="/search" method="get">
    <input type="text" name="q" placeholder="Cari artikel...">
    <button type="submit">Search</button>
</form>

<ul>
<?php foreach($posts as $post): ?>
    <li>
        <a href="/post/<?= $post['slug']; ?>"><?= esc($post['title']); ?></a>
    </li>
<?php endforeach; ?>
</ul>

<h3>Pages:</h3>
<?= $pager->links() ?>