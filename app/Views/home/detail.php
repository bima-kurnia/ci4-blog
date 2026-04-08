<h1><?= esc($post['title']); ?></h1>

<p><?= esc($post['content']); ?></p>

<?php if($post['image']): ?>
    <img src="<?= base_url('uploads/' . $post['image']) ?>" alt="thumbnail" width="200">
<?php endif; ?>

<a href="/">Kembali ke Home</a>