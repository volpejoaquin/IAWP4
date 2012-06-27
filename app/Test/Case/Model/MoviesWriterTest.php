<?php
App::uses('MoviesWriter', 'Model');

/**
 * MoviesWriter Test Case
 *
 */
class MoviesWriterTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.movies_writer', 'app.movie', 'app.actor', 'app.movies_actor', 'app.director', 'app.movies_director', 'app.genre', 'app.movies_genre', 'app.writer', 'app.movies_movie');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MoviesWriter = ClassRegistry::init('MoviesWriter');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MoviesWriter);

		parent::tearDown();
	}

}
