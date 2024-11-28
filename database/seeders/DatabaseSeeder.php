<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Noticia;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        User::factory()->create([
            'name' => 'Marcos',
            'email' => 'marcos@marcos.com',
            'cargo' => '1',
            'password' => Hash::make('123'),
        ]);

        Noticia::factory()->create([
            'Titulo' => 'UM SITE MUITO BACANA',
            'resumo' => 'E isso é tudo pessoal',
            'conteudo' => 'Seila oque botar aqui',
            'capa' => 'https://sm.ign.com/t/ign_br/screenshot/default/elden-ring-imagem-principal-sajscyx_gz35.960.jpg',
        ]);
        
        User::factory(5)->create();
        Noticia::factory(10)->create();


    }
}
