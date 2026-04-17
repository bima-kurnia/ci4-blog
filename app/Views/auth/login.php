<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Blog CI4</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-base-200 min-h-screen flex items-center justify-center">

    <div class="card w-full max-w-sm bg-base-100 shadow-xl">
        <div class="card-body">
            
            <h2 class="text-2xl font-bold text-center mb-4">Login</h2>

            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-error text-sm">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <form action="/process-login" method="post" class="space-y-4 mt-2">
                
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input 
                        type="email" 
                        name="email" 
                        placeholder="you@example.com"
                        class="input input-bordered w-full" 
                        required
                    >
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Password</span>
                    </label>
                    <input 
                        type="password" 
                        name="password" 
                        placeholder="••••••••"
                        class="input input-bordered w-full" 
                        required
                    >
                </div>

                <button type="submit" class="btn btn-primary w-full">
                    Login
                </button>

            </form>
        </div>
    </div>

</body>
</html>