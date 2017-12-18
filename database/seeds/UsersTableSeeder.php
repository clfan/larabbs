<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Faker\Generator::class);

        $avatars=[
            'http://larabbs.dev/uploads/images/avatars/201712/11//1_1513064582_mYE3ykUof7.png'
        ];

        $users = factory(User::class)
                        ->times(10)
                        ->make()
                        ->each(function($user, $index)
                            use($faker, $avatars) {
                                $user->avatar = $faker->randomElement($avatars);
                            });

        $user_array = $users->makeVisible(['password', 'remember_token'])->toArray();

        User::insert($user_array);

        $user = User::find(1);

        $user->name = 'Test Faker';
        $user->email = 'test@test.com';
        $user->avatar = 'http://larabbs.dev/uploads/images/avatars/201712/11//1_1513064582_mYE3ykUof7.png';
        $user->save();

        $user->assignRole('Founder');

        $user = User::find(2);
        $user->assignRole('Maintainer');
    }
}
