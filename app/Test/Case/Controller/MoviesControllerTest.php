<?php
App::uses('MoviesController', 'Controller');

/**
 * TestMoviesController *
 */
class TestMoviesController extends MoviesController {
/**
 * Auto render
 *
 * @var boolean
 */
	public $autoRender = false;

/**
 * Redirect action
 *
 * @param mixed $url
 * @param mixed $status
 * @param boolean $exit
 * @return void
 */
	public function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

/**
 * MoviesController Test Case
 *
 */
class MoviesControllerTestCase extends CakeTestCase {
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
		$this->Movies = new TestMoviesController();
		$this->Movies->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Movies);

		parent::tearDown();
	}

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {

	}
/**
 * testView method
 *
 * @return void
 */
	public function testView() {

	}
/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {

	}
/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {

	}
/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {

	}
}
