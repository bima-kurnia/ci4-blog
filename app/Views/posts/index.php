<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-base-200 min-h-screen">

    <!-- Navbar -->
    <div class="navbar bg-base-100 shadow-md px-6">
        <div class="flex-1">
            <a class="text-xl font-bold">Blog CI4</a>
        </div>
        <div class="flex-none">
            <a href="/posts/create" class="btn btn-primary btn-sm">
                + Tambah Artikel
            </a>
        </div>
    </div>

    <!-- Container -->
    <div class="max-w-4xl mx-auto p-6">

        <h2 class="text-2xl font-bold mb-6">Daftar Artikel</h2>

        <div class="space-y-4">
            <?php foreach($posts as $post): ?>
                <div class="card bg-base-100 shadow">
                    <div class="card-body flex flex-row items-center justify-between">

                        <div>
                            <h3 class="font-semibold text-lg">
                                <?= esc($post['title']); ?>
                            </h3>
                        </div>

                        <div class="flex gap-2">
                            <a href="/posts/edit/<?= $post['id']; ?>" 
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <a href="/posts/delete/<?= $post['id']; ?>" 
                               onclick="return confirm('Yakin hapus?')" 
                               class="btn btn-error btn-sm">
                                Delete
                            </a>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

</body>
</html>