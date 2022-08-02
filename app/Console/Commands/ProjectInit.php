<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ProjectInit extends Command
{

    protected $signature = 'project:init';
    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        exec('php artisan serve && php artisan queue:work');
    }
}
