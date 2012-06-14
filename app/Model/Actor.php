<?php
App::uses('AppModel', 'Model');
/**
 * Actor Model
 *
 * @property Movie $Movie
 */
class Actor extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Movie' => array(
			'className' => 'Movie',
			'joinTable' => 'movies_actors',
			'foreignKey' => 'actor_id',
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
