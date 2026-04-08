<h2>Edit Artikel</h2>

<form action="/posts/update/<?= $post['id']; ?>" method="post">
    <input type="text" name="title" value="<?= $post['title']; ?>"><br>
    <textarea name="content"><?= $post['content']; ?></textarea><br>
    <button type="submit">Update</button>
</form>