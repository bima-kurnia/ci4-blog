<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-base-200 min-h-screen flex items-center justify-center">

    <div class="card w-full max-w-lg bg-base-100 shadow-xl">
        <div class="card-body">

            <h2 class="text-2xl font-bold text-center mb-4">
                Edit Artikel
            </h2>

            <?php if(session()->getFlashdata('errors')): ?>
                <div class="alert alert-error text-sm">
                    <ul class="list-disc ml-4">
                        <?php foreach(session()->getFlashdata('errors') as $err): ?>
                            <li><?= $err ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="/posts/update/<?= $post['id']; ?>" method="post" enctype="multipart/form-data" class="space-y-4">

                <!-- Title -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Judul</span>
                    </label>
                    <input 
                        type="text" 
                        name="title" 
                        value="<?= old('title', $post['title']); ?>"
                        class="input input-bordered w-full"
                        required
                    >
                </div>

                <!-- Content -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Isi Artikel</span>
                    </label>
                    <textarea 
                        name="content" 
                        class="textarea textarea-bordered w-full"
                        rows="5"
                        required
                    ><?= old('content', $post['content']); ?></textarea>
                </div>

                <!-- Current Image -->
                <?php if(!empty($post['image'])): ?>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Gambar Saat Ini</span>
                        </label>
                        <img 
                            src="/uploads/<?= $post['image']; ?>" 
                            class="rounded-lg max-h-48 object-cover"
                        >
                    </div>
                <?php endif; ?>

                <!-- Upload New Image -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Ganti Gambar (opsional)</span>
                    </label>
                    <input 
                        type="file" 
                        name="image" 
                        class="file-input file-input-bordered w-full"
                    >
                    <p class="text-xs opacity-70 mt-1">
                        Kosongkan jika tidak ingin mengganti gambar
                    </p>
                </div>

                <!-- Actions -->
                <div class="flex justify-between">
                    <a href="/posts" class="btn btn-ghost">
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>

            </form>

        </div>
    </div>

</body>
</html>