<?php
App::uses('AppModel', 'Model');
/**
 * Movie Model
 *
 * @property Actor $Actor
 * @property Director $Director
 * @property Genre $Genre
 * @property Writer $Writer
 */
class Movie extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Actor' => array(
			'className' => 'Actor',
			'joinTable' => 'movies_actors',
			'foreignKey' => 'movie_id',
			'associationForeignKey' => 'actor_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Director' => array(
			'className' => 'Director',
			'joinTable' => 'movies_directors',
			'foreignKey' => 'movie_id',
			'associationForeignKey' => 'director_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Genre' => array(
			'className' => 'Genre',
			'joinTable' => 'movies_genres',
			'foreignKey' => 'movie_id',
			'associationForeignKey' => 'genre_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Writer' => array(
			'className' => 'Writer',
			'joinTable' => 'movies_writers',
			'foreignKey' => 'movie_id',
			'associationForeignKey' => 'writer_id',
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
