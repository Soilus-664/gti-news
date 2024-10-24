<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstalaXamppCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'instala:xampp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verifica a instalação do XAMPP e abre o painel de controle do XAMPP.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Caminho do diretório do XAMPP
        $xamppDir = 'C:\\xampp';
        
        // Verificar se o XAMPP está instalado
        if (!is_dir($xamppDir)) {
            $this->info('XAMPP não encontrado. Iniciando a instalação...');
            
            // URL do instalador do XAMPP (atualize para a versão desejada)
            $xamppInstallerUrl = 'https://downloadsapachefriends.global.ssl.fastly.net/xampp/7.4.22/xampp-windows-x64-7.4.22-0-VC15-installer.exe'; 
            
            // Caminho para salvar o instalador
            $installerPath = 'C:\\xampp-installer.exe';
            
            // Baixar o instalador do XAMPP
            file_put_contents($installerPath, fopen($xamppInstallerUrl, 'r'));
            
            // Executar o instalador
            $this->info('Instalando o XAMPP...');
            exec("start /wait \"$installerPath\"");

            // Aguardar um minuto após a instalação
            $this->info('Aguardando 1 minuto para garantir que o XAMPP esteja pronto...');
            sleep(60);
        } else {
            $this->info('XAMPP já está instalado.');
        }

        // Abrir o painel de controle do XAMPP
        $this->info('Abrindo o painel de controle do XAMPP...');
        pclose(popen("start \"XAMPP Control Panel\" \"$xamppDir\\xampp-control.exe\"", 'r'));

        $this->newLine();
        $this->alert('XAMPP iniciado! Você pode acessar o phpMyAdmin em http://localhost/phpmyadmin');
    }
}
