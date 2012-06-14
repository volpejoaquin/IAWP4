<?php
App::uses('AppModel', 'Model');
/**
 * Genre Model
 *
 * @property Movie $Movie
 */
class Genre extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Movie' => array(
			'className' => 'Movie',
			'joinTable' => 'movies_genres',
			'foreignKey' => 'genre_id',
			'associationForeignKey' => 'movie_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
