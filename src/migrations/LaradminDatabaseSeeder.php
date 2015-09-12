<?php
namespace Bonweb\Laradmin;

class LaradminDatabaseSeeder extends \Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call('LaradminUsersTableSeeder');
		$this->call('LaradminPhotosTableSeeder');
		$this->call('LaradminCommentsTableSeeder');
		$this->call('LaradminGroupsTableSeeder');
		$this->call('LaradminPermissionsTableSeeder');
		$this->call('LaradminProfilesTableSeeder');
		$this->call('LaradminSettingsTableSeeder');
		$this->call('LaradminTaggingTaggedTableSeeder');
		$this->call('LaradminTaggingTagsTableSeeder');
		$this->call('LaradminThrottleTableSeeder');
		$this->call('LaradminUsersGroupsTableSeeder');
	}

}

