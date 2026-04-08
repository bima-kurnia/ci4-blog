<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddImageToPosts extends Migration
{
    public function up()
    {
        // $this->forge->addColumn('posts', [
        //     'image' => [
        //         'type' => 'VARCHAR',
        //         'constraint' => 255,
        //         'null' => true
        //     ]
        // ]);
    }

    public function down()
    {
        //
    }
}
