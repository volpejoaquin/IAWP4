<?php
App::uses('ActorsController', 'Controller');

/**
 * TestActorsController *
 */
class TestActorsController extends ActorsController {
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
 * ActorsController Test Case
 *
 */
class ActorsControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.actor', 'app.movie', 'app.movies_actor');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Actors = new TestActorsController();
		$this->Actors->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Actors);

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
