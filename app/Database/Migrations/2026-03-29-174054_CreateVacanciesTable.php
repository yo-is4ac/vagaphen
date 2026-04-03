<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateVacanciesTable extends Migration
{
    public function up()
    {
      $this->forge->addField([
        'id' => [
          'type' => 'CHAR',
          'constraint' => 36,
          'null'=> false,
        ],
        'code' => [
          'type' => 'CHAR',
          'constraint' => '4',
          'null' => true
        ],
        'role' => [
          'type' => 'VARCHAR',
          'constraint' => 255,
          'null' => false,
        ],
        'description' => [
          'type' => 'TEXT',
          'null' => false,
        ],
        'created_at' => [
          'type' => 'datetime',
          'null' => false,
        ],
        'updated_at' => [
          'type' => 'datetime',
          'null' => true,
        ],
        'expires_at' => [
          'type' => 'datetime',
          'null' => false
        ],
      ]);
      $this->forge->addPrimaryKey('id');
      $this->forge->createTable('vacancies');
    }

    public function down()
    {
      $this->forge->dropTable('vacancies');
    }
}
