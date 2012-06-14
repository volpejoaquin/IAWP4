<?php
App::uses('GenresController', 'Controller');

/**
 * TestGenresController *
 */
class TestGenresController extends GenresController {
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
 * GenresController Test Case
 *
 */
class GenresControllerTestCase extends CakeTestCase {
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
		$this->Genres = new TestGenresController();
		$this->Genres->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Genres);

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
