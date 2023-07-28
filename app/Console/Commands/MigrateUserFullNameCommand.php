<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MigrateUserFullNameCommand extends Command
{
    protected $signature = 'migrate:user-full-name';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        User::chunk(10, function ($users) {
            foreach($users as $user) {
                $user->full_name = $user->first_name . ' ' . $user->last_name;

                $user->save();
            }
        });

        // $this->info('User full names are successfully updated!');
    }
}
