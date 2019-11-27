<?php

namespace Shura\BackOffice\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bo:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command install database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Run Migration for BackOffice Permissions');
        Artisan::call("db:seed",['--class'=>\Shura\BackOffice\Database\Seeds\PermissionsSeeder::class]);
    }
}
