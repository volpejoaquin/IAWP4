<?php
App::uses('Director', 'Model');

/**
 * Director Test Case
 *
 */
class DirectorTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.director', 'app.movie', 'app.movies_director');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Director = ClassRegistry::init('Director');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Director);

		parent::tearDown();
	}

}
