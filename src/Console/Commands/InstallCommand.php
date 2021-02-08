<?php
/**
 * Author: codesinging <codesinging@gmail.com>
 * Github: https://github.com/codesinging
 */

namespace CodeSinging\PinAdmin\Console\Commands;

use CodeSinging\PinAdmin\Console\Command;
use CodeSinging\PinAdmin\Foundation\Admin;
use CodeSinging\PinAdmin\Foundation\AdminServiceProvider;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = Admin::NAME . ':install';

    /**
     * The console command description.
     *
     * @var string|null
     */
    protected $description = 'Install the PinAdmin application';

    /**
     * @var array
     */
    protected $publishProviders = [
        AdminServiceProvider::class,
    ];

    /**
     * @var array
     */
    protected $databaseSeeders = [

    ];

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->publishResources();
        $this->migrateDatabase();
        $this->seedDatabase();
    }

    /**
     * Publish resources.
     */
    protected function publishResources(): void
    {
        $this->title('Publishing resources...');

        foreach ($this->publishProviders as $provider) {
            $this->call('vendor:publish', ['--provider' => $provider, '--force' => true]);
        }
    }

    /**
     * Migrate database.
     */
    protected function migrateDatabase(): void
    {
        $this->title('Migrating database...');

        $this->call('migrate');
    }

    /**
     * Seed database.
     */
    protected function seedDatabase(): void
    {
        $this->title('Seeding database...');

        foreach ($this->databaseSeeders as $seeder) {
            $this->call('db:seed', ['--class' => $seeder]);
        }
    }
}