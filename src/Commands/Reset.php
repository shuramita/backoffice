<?php

namespace Shura\BackOffice\Commands;

use Illuminate\Console\Command;

class Reset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bo:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command install backoffice module';

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
        $this->call("bo:uninstall");
        $this->call("bo:install");
    }
}
