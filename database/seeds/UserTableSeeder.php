<?php

use Illuminate\Database\Seeder;


class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('users')->insert(array (
			'name'	=>'soiracis',
			'email'	=>'activo@activo.me',
			'password'	=>\Hash::make('secret')
		));

		\DB::table('users')->insert(array (
			'name'	=>'soiracis2',
			'email'	=>'activo2@activo.me',
			'password'	=>\Hash::make('secret2')
		));
	}

}
