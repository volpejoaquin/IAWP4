<?php
App::uses('Genre', 'Model');

/**
 * Genre Test Case
 *
 */
class GenreTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.genre', 'app.movie', 'app.movies_genre');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Genre = ClassRegistry::init('Genre');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Genre);

		parent::tearDown();
	}

}
