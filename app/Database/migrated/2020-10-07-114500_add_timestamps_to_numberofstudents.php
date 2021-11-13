<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTimestampsToNumberOfStudents extends Migration
{
    public function up()
	{
        $this->forge->addColumn('numberOfStudents', [
            'created_at' => [
                'type'     => 'DATETIME',
                'null'     => true,
                'default'  => null
            ],
            'updated_at' => [
                'type'     => 'DATETIME',
                'null'     => true,
                'default'  => null
            ]
        ]);
    }

    public function down()
	{
        $this->forge->dropColumn('numberOfStudents', 'updated_at');
        $this->forge->dropColumn('numberOfStudents', 'created_at');
    }
}
