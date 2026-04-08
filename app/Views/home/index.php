<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog CI4</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-base-200 min-h-screen">

    <!-- Navbar -->
    <div class="navbar bg-base-100 shadow-md px-6">
        <div class="flex-1">
            <a class="text-xl font-bold">Blog CI4</a>
        </div>
        <div class="flex-none">
            <form action="/search" method="get" class="flex gap-2">
                <input type="text" name="q" placeholder="Search articles..."
                    class="input input-bordered input-sm w-40 md:w-64" />
                <button type="submit" class="btn btn-primary btn-sm">Search</button>
            </form>
        </div>
    </div>

    <!-- Container -->
    <div class="max-w-5xl mx-auto p-6">

        <!-- Title -->
        <h1 class="text-3xl font-bold mb-6">Latest Posts</h1>

        <!-- Posts Grid -->
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            <?php foreach($posts as $post): ?>
                <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition">
                    <div class="card-body">
                        <h2 class="card-title">
                            <?= esc($post['title']); ?>
                        </h2>
                        <p class="text-sm opacity-70">
                            Click below to read more...
                        </p>
                        <div class="card-actions justify-end">
                            <a href="/post/<?= $post['slug']; ?>" 
                               class="btn btn-primary btn-sm">
                               Read More
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

    </div>

</body>
</html>