<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::transaction(function() {
            factory(App\Address::class, 1)->create([
                'address' => 'Ninh Bình',
            ])->each(function($u) {
                $u->users()->save(factory(App\User::class)->make([
                    'name' => 'Hà Văn Quang',
                    'email' => 'quanghavan96@gmail.com',
                    'phone' => '01638161533',
                    'level' => 1,                    
                ]));
            }        
        });
    }
}
