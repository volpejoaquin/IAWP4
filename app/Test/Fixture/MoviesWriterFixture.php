<?php
/**
 * MoviesWriterFixture
 *
 */
class MoviesWriterFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'length' => 11, 'key' => 'primary'),
		'movie_id' => array('type' => 'integer', 'null' => false),
		'writer_id' => array('type' => 'integer', 'null' => false),
		'indexes' => array(),
		'tableParameters' => array()
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'movie_id' => 1,
			'writer_id' => 1
		),
	);
}
