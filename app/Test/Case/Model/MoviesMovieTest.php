<?php
App::uses('MoviesMovie', 'Model');

/**
 * MoviesMovie Test Case
 *
 */
class MoviesMovieTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.movies_movie', 'app.movie', 'app.actor', 'app.movies_actor', 'app.director', 'app.movies_director', 'app.genre', 'app.movies_genre', 'app.writer', 'app.movies_writer', 'app.rmovie');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MoviesMovie = ClassRegistry::init('MoviesMovie');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MoviesMovie);

		parent::tearDown();
	}

}
