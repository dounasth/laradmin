<?php

class GroupsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('groups')->delete();
        
		\DB::table('groups')->insert(array (
			0 => 
			array (
				'id' => '1',
				'name' => 'Administrator',
				'permissions' => '{"user.view":1,"user.create":1,"user.delete":1,"user.update":1}',
				'created_at' => '2015-02-22 19:48:56',
				'updated_at' => '2015-02-22 19:48:56',
			),
			1 => 
			array (
				'id' => '2',
				'name' => 'User',
				'permissions' => '{"user_can_register_for":1}',
				'created_at' => '2015-02-22 19:50:28',
				'updated_at' => '2015-02-22 19:50:28',
			),
		));
	}

}
