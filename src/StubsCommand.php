<?php

namespace OwenMelbz\LaravelStubs;

use Exception;
use Illuminate\Console\Command;

class StubsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:a
        { type : what type of file do you want? }
        { name : component name? }
        { --f|force : Overwrite existing files without confirmation }
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new singular file based off a stub template';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $manager = new StubsManager();

        try {
            $path = $manager
                ->setType($this->argument('type'))
                ->setName($this->argument('name'))
                ->convertStubs($this->option('force'));

            return $this->info('File created at ' . $path);
        } catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }
}
