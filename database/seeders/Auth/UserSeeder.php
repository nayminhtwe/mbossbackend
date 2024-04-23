<?php

namespace Database\Seeders\Auth;

use App\Domains\Auth\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class UserTableSeeder.
 */
class UserSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Add the master administrator, user id of 1
        User::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'Chit Su Han Soe',
            'email' => 'chitsu@mboss.finance',
            'password' => 'Tf4F5HT6',
            'email_verified_at' => now(),
            'active' => true,
        ]);

        User::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'Zaw Linn Htet',
            'email' => 'zawlinnhtet@mboss.finance',
            'password' => 'XfajS8Gv',
            'email_verified_at' => now(),
            'active' => true,
        ]);

        // if (app()->environment(['local', 'testing'])) {
        //     User::create([
        //         'type' => User::TYPE_USER,
        //         'name' => 'Test User',
        //         'email' => 'user@user.com',
        //         'password' => 'secret',
        //         'email_verified_at' => now(),
        //         'active' => true,
        //     ]);
        // }

        $this->enableForeignKeys();
    }
}
