<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class HelloWorldCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hello:world {argumento1 : Esto sera devuelto por pantalla} {--algo : No tiene uso aun.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este es nuestro Hola Mundo de artisan.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $valor = $this->argument('argumento1');

        $this->info("Me enviaste el argumento: $valor");
        
        if (false) {
            $this->error('Algo ha fallado');

            return 1;
        }
        


    }
}
