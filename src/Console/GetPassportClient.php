<?php

namespace Passport\Console;

use Illuminate\Console\Command;
use Laravel\Passport\ClientRepository;

class GetPassportClient extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'passport:get {client?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Passport Client Credentials';

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
    public function handle(ClientRepository $clients)
    {

        $userId = $this->argument('client') ? $this->argument('client') : $this->ask(
            'Which Passport Client ID you need credentials?'
        );

        $client = $clients->findActive($userId);

        $this->line('<comment>Client ID:</comment> ' . $client->client_id);
        $this->line('<comment>Client secret:</comment> ' . $client->secret);

    }
}
