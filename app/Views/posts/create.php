<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-base-200 min-h-screen flex items-center justify-center">

    <div class="card w-full max-w-lg bg-base-100 shadow-xl">
        <div class="card-body">

            <h2 class="text-2xl font-bold text-center mb-4">
                Tambah Artikel
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

            <form action="/posts/store" method="post" enctype="multipart/form-data" class="space-y-4 mt-2">

                <!-- Title -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Judul</span>
                    </label>
                    <input 
                        type="text" 
                        name="title" 
                        placeholder="Masukkan judul artikel"
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
                        placeholder="Tulis isi artikel..."
                        class="textarea textarea-bordered w-full"
                        rows="5"
                        required
                    ></textarea>
                </div>

                <!-- Image Upload -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Upload Gambar</span>
                    </label>
                    <input 
                        type="file" 
                        name="image" 
                        class="file-input file-input-bordered w-full"
                    >
                </div>

                <!-- Actions -->
                <div class="flex justify-between items-center">
                    <a href="/posts" class="btn btn-ghost">
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>

</body>
</html>