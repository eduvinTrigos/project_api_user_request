<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTicketsData extends Migration
{
    public function up()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 100; $i++) {
            $data = [
                'usuario' => $faker->name(),
                'fecha_creacion' => date('Y-m-d H:i:s'),
                'fechaActualizacion' => date('Y-m-d H:i:s'),
                'status' => rand(0, 1)
            ];
            $this->db->table('tickets')->insert($data);
        }
    }

    public function down()
    {
        //
    }
}
