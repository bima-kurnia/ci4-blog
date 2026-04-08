<h2>Daftar Artikel</h2>

<a href="/posts/create">+ Tambah Artikel</a>

<ul>
<?php foreach($posts as $post): ?>
    <li>
        <b><?= esc($post['title']); ?></b>
        <a href="/posts/edit/<?= $post['id']; ?>">Edit</a>
        <a href="/posts/delete/<?= $post['id']; ?>" onclick="return confirm('Yakin hapus?')">Delete</a>
    </li>
<?php endforeach; ?>
</ul>