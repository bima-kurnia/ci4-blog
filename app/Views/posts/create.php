<h2>Tambah Artikel</h2>

<?php if(session()->getFlashdata('errors')): ?>
    <ul>
    <?php foreach(session()->getFlashdata('errors') as $err): ?>
        <li style="color:red"><?= $err ?></li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form action="/posts/store" method="post" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Judul"><br>
    <textarea name="content" placeholder="Isi"></textarea><br>
    <input type="file" name="image"><br>
    
    <button type="submit">Simpan</button>
</form>