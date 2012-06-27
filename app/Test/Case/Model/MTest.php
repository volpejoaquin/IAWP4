<?php
App::uses('M', 'Model');

/**
 * M Test Case
 *
 */
class MTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.m');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->M = ClassRegistry::init('M');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->M);

		parent::tearDown();
	}

}
