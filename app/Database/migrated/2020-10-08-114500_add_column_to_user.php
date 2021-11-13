<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTimestampsToTask extends Migration
{
    public function up()
	{
        $this->forge->addColumn('user', [
          'lastname' => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '20',
                ],
          'salutation' => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '20',
                ],
          'title' => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '20',
                ],
          'teacher_phone' => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '20',
                ],
          'school_phone' => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '20',
                ],
          'school_code' => [
                    'type'           => 'INT',
                    'constraint'     => '8',
                ],
          'school_type' => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '50',
                ],
          'school_street' => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '50',
                ],
          'school_house_nr' => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '20',
                ],
          'school_zip' => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '8',
                ],
          'school_city' => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '20',
                ],
          'school_state' => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '20',
                ],
          'teacher_id' => [
                    'type'           => 'INT',
                    'constraint'     => '8',
                ],
        ]);
    }

    public function down()
	{
        $this->forge->dropColumn('user', 'lastname');
        $this->forge->dropColumn('user', 'salutation');
        $this->forge->dropColumn('user', 'title');
        $this->forge->dropColumn('user', 'teacher_phone');
        $this->forge->dropColumn('user', 'school_phone');
        $this->forge->dropColumn('user', 'school_code');
        $this->forge->dropColumn('user', 'school_type');
        $this->forge->dropColumn('user', 'school_street');
        $this->forge->dropColumn('user', 'school_house_nr');
        $this->forge->dropColumn('user', 'school_zip');
        $this->forge->dropColumn('user', 'school_city');
        $this->forge->dropColumn('user', 'school_state');
        $this->forge->dropColumn('user', 'teacher_id');
    }
}
