<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNumberOfStudents extends Migration
{
    public function up()
    {
      $this->forge->addField([
        'user_id' => [
          'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'   => true
        ],
        'cl3' => [
          'type'           => 'INT',
          'constraint'     => '3',
        ],
        'cl4' => [
          'type'           => 'INT',
          'constraint'     => '3',
        ],
        'cl5' => [
          'type'           => 'INT',
          'constraint'     => '3',
        ],
        'cl6' => [
          'type'           => 'INT',
          'constraint'     => '3',
        ],
        'cl7' => [
          'type'           => 'INT',
          'constraint'     => '3',
        ],
        'cl8' => [
          'type'           => 'INT',
          'constraint'     => '3',
        ],
        'cl9' => [
          'type'           => 'INT',
          'constraint'     => '3',
        ],
        'cl10' => [
          'type'           => 'INT',
          'constraint'     => '3',
        ],
        'total' => [
          'type'           => 'INT',
          'constraint'     => '3',
        ],
        [
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
            ]
      ]);


      $this->forge->createTable('numberOfStudents');
      $sql = "ALTER TABLE numberOfStudents
                  ADD CONSTRAINT numberofstudents_user_id_fk
  				FOREIGN KEY (user_id) REFERENCES user(id)
  				ON DELETE CASCADE ON UPDATE CASCADE";

  		$this->db->simpleQuery($sql);
    }

    public function down()
    {
        $this->forge->dropForeignKey('users_id','numberofstudents_user_id_fk');
        $this->forge->dropColumn('numberOfStudents','user_id');

    }
}
