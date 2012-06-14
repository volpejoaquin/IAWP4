<?php
App::uses('Writer', 'Model');

/**
 * Writer Test Case
 *
 */
class WriterTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.writer', 'app.movie', 'app.actor', 'app.movies_actor', 'app.director', 'app.movies_director', 'app.genre', 'app.movies_genre', 'app.movies_writer');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Writer = ClassRegistry::init('Writer');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Writer);

		parent::tearDown();
	}

}
