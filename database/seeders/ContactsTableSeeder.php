<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Cria uma instância do Faker
        $faker = Faker::create();

        // Popula a tabela contacts com dados de exemplo
        foreach (range(1, 10) as $index) { // Neste exemplo, estou inserindo 10 registros
            DB::table('contacts')->insert([
                'cep' => $faker->postcode,
                'estado' => $faker->stateAbbr,
                'cidade' => $faker->city,
                'bairro' => $faker->streetName,
                'endereco' => $faker->address,
                'numero' => $faker->buildingNumber,
                'nome_de_contato' => $faker->name,
                'email_de_contato' => $faker->email,
                'telefone_de_contato' => $faker->phoneNumber,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
