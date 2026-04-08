<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title>Kategori <?= $category['name'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-base-200">

<!-- Navbar -->
<div class="navbar bg-base-100 shadow-md px-6">
    <div class="flex-1">
        <a href="/" class="text-xl font-bold">Blog CI4</a>
    </div>
</div>

<div class="max-w-5xl mx-auto p-6">

    <h1 class="text-3xl font-bold mb-6">
        📂 Kategori: <?= esc($category['name']) ?>
    </h1>

    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        <?php foreach($posts as $post): ?>
            <div class="card bg-base-100 shadow-md hover:shadow-xl transition">
                <div class="card-body">
                    <h2 class="card-title">
                        <?= esc($post['title']) ?>
                    </h2>

                    <div class="card-actions justify-end">
                        <a href="/post/<?= $post['slug'] ?>" 
                           class="btn btn-primary btn-sm">
                           Read
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center mt-10">
        <div class="join">
            <?= $pager->links('default', 'daisyui') ?>
        </div>
    </div>

    <div class="mt-10">
        <a href="/" class="btn btn-outline">← Back to Home</a>
    </div>

</div>

</body>
</html>