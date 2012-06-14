<?php
App::uses('Movie', 'Model');

/**
 * Movie Test Case
 *
 */
class MovieTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.movie', 'app.actor', 'app.movies_actor', 'app.director', 'app.movies_director', 'app.genre', 'app.movies_genre', 'app.writer', 'app.movies_writer');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Movie = ClassRegistry::init('Movie');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Movie);

		parent::tearDown();
	}

}
