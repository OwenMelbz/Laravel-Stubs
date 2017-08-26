<?php

namespace OwenMelbz\LaravelStubs;

use Illuminate\Console\Command;

class StubsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:template {type} {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new singular file based off a stub template';

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
        $stubManager = new StubManager();

        try {
            $stubManager->convertStubs(
                $this->argument->type,
                $this->argument->name
            );

            return $this->info($stubManager->lastConversion());
        } catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }
}
