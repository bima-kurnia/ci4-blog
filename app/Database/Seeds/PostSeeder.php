<?php

namespace App\Database\Seeds;

use App\Models\PostModel;
use CodeIgniter\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        $postModel = new PostModel();

        for($i = 1; $i <= 10; $i++) {
            $postModel->save([
                'title' => "Artikel Dummy $i",
                'slug' => "artikel-dummy-$i",
                'content' => "Ini isi artikel dummy ke-$i",
                'user_id' => 1
            ]);
        }
    }
}
