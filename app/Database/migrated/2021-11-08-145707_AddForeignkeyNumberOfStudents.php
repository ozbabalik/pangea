<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddForeignkeyNumberOfStudents extends Migration
{
    public function up()
    {
      $sql = "ALTER TABLE task
                  ADD CONSTRAINT task_user_id_fk
          FOREIGN KEY (user_id) REFERENCES user(id)
          ON DELETE CASCADE ON UPDATE CASCADE";

      $this->db->simpleQuery($sql);

    }

    public function down()
    {
      $this->forge->dropForeignKey('task', 'task_user_id_fk');
      $this->forge->dropColumn('task', 'user_id');
    }
}
