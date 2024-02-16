<?php

namespace Database\Seeders;

use App\Models\AppUser;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder.
 */
class DatabaseSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Seed the application's database.
     */
    public function run()
    {
        Model::unguard();

        $this->truncateMultiple([
            'activity_log',
            'failed_jobs',
        ]);

        $this->call(AuthSeeder::class);
        $this->call(AnnouncementSeeder::class);

        AppUser::create([
            'userID' => '1',
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => 'johndoooje@gmail.com',
            'phone' => 12345,
            'nrc' => '234/324(n)2342342334',
            'currentAddress' => 'ajsldjfi',
            'permanentAddress' => 'ajsldjfi',
            'date_of_birth' => '1.01.1999',
            'age' => 23,
            'bankName' => 'abc',
            'bankAcc' => '234252756787684534',
            'seller_buyer_status' => 0,

        ]);

        AppUser::create([
            'userID' => '2',
            'firstName' => 'Jo3hn',
            'lastName' => 'Dodsfe',
            'email' => 'johnddsdoe@gmail.com',
            'phone' => 12345,
            'nrc' => '234/324(n)234232342334',
            'currentAddress' => 'ajsldjfi',
            'permanentAddress' => 'ajsldjfi',
            'date_of_birth' => '1.01.1999',
            'age' => 23,
            'bankName' => 'abc',
            'bankAcc' => '345636456456456',
            'seller_buyer_status' => 0,

        ]);

        AppUser::create([
            'userID' => '6',
            'firstName' => 'Joghn',
            'lastName' => 'Dofe',
            'email' => 'johndoljioe@gmail.com',
            'phone' => 12345,
            'nrc' => '234/324(n)234234jkl2334',
            'currentAddress' => 'ajsldjfi',
            'permanentAddress' => 'ajsldjfi',
            'date_of_birth' => '1.01.1999',
            'age' => 23,
            'bankName' => 'abc',
            'bankAcc' => '2342528789756787684534',
            'seller_buyer_status' => 0,

        ]);

        Model::reguard();
    }
}
