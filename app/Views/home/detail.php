<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title><?= esc($post['title']); ?></title>
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

<!-- Content -->
<div class="max-w-3xl mx-auto p-6">

    <div class="card bg-base-100 shadow-xl">
        <?php if($post['image']): ?>
            <figure>
                <img src="<?= base_url('uploads/' . $post['image']) ?>" 
                     alt="thumbnail" 
                     class="w-full h-64 object-cover">
            </figure>
        <?php endif; ?>

        <div class="card-body">
            <h1 class="card-title text-3xl">
                <?= esc($post['title']); ?>
            </h1>

            <p class="leading-relaxed text-base-content/80">
                <?= esc($post['content']); ?>
            </p>

            <div class="card-actions justify-end mt-4">
                <a href="/" class="btn btn-outline">← Back to Home</a>
            </div>
        </div>
    </div>

</div>

</body>
</html>