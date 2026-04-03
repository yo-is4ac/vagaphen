<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCandidatesTable extends Migration
{
    public function up()
    {
      $this->forge->addField([
        'id' => [
          'type' => 'CHAR',
          'constraint' => 36,
          'null'=> false,
        ],
        'vacancies_id' => [
          'type' => 'CHAR',
          'constraint' => 36,
          'null' => false
        ],
        'curriculum_path' => [
          'type' => 'CHAR',
          'constraint' => 255,
          'null' => false
        ],
        'status' => [
          'type'       => 'ENUM',
          'constraint' => ['pending', 'approved', 'declined'],
          'default'    => 'pending',
        ],
        'created_at' => [
          'type' => 'datetime',
          'null' => false,
        ],
        'updated_at' => [
          'type' => 'datetime',
          'null' => true,
        ],
      ]);
      $this->forge->addPrimaryKey('id');
      $this->forge->addForeignKey('vacancies_id', 'vacancies', 'id', 'CASCADE', 'CASCADE');
      $this->forge->createTable('candidates');
    }

    public function down()
    {
      $this->forge->dropTable('candidates');
    }
}
