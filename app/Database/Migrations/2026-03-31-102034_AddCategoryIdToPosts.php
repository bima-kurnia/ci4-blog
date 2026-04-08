<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCategoryIdToPosts extends Migration
{
    public function up()
    {
        // $this->forge->addColumn('posts', [
        //     'category_id' => [
        //         'type' => 'INT',
        //         'null' => true
        //     ]
        // ]);
    }

    public function down()
    {
        //
    }
}
