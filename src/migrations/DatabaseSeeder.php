<?php
namespace Bonweb\Laradmin;

class DatabaseSeeder extends \Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call('UsersTableSeeder');
		$this->call('PhotosTableSeeder');
		$this->call('CommentsTableSeeder');
		$this->call('GroupsTableSeeder');
		$this->call('PermissionsTableSeeder');
		$this->call('ProfilesTableSeeder');
		$this->call('SettingsTableSeeder');
		$this->call('TaggingTaggedTableSeeder');
		$this->call('TaggingTagsTableSeeder');
		$this->call('ThrottleTableSeeder');
		$this->call('UsersGroupsTableSeeder');
	}

}

