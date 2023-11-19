<?php

namespace App\Console\Commands;

use App\Repositories\PerroRepository;
use Illuminate\Console\Command;

class CargarPerro extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cargarPerro';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'comando para cargar perro en la bd';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
        $repo= new PerroRepository();
        $repo->cargarPerro();
    }
}
