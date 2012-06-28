<?php
App::uses('AppController', 'Controller');
/**
 * Movies Controller
 *
 * @property Movie $Movie
 */
class MoviesController extends AppController {

var $components = array('RequestHandler'); 
var $helpers = array('Html','Form'); 
var $uses = array('Movie', 'Actor', 'Director', 'Writer', 'Genres');



/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Movie->recursive = 0;			

		$this->paginate = array(
			'limit' => 3,
			'page' => 1,
			'order' => array('avg_cant' => 'desc')
		);
		
		$movies = $this->paginate('Movie');
		$this->set(compact('movies'));
	}
	
/**
 * views method
 *
 * @return void
 */
	public function views() {
		$this->Movie->recursive = 0;
		
		$this->paginate = array(
			'limit' => 3,
			'page' => 1,
		);
		
		$movies = $this->paginate('Movie');
		$this->set(compact('movies'));
	}

	/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Movie->id = $id;
		if (!$this->Movie->exists()) {
			throw new NotFoundException(__('Pelicula no existente'));
		}
		
		//Calculo el rating
		$movie = $this->Movie->read(null, $id);
		$this->set('movie', $movie);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Movie->create();
			if ($this->Movie->save($this->request->data)) {
				$this->Session->setFlash(__('Se agregó la pelicula!'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No pudo agregarse la pelicula. Por favor intente nuevamente.'));
			}
		}
		$actors = $this->Movie->Actor->find('list');
		$directors = $this->Movie->Director->find('list');
		$genres = $this->Movie->Genre->find('list');
		$writers = $this->Movie->Writer->find('list');

		$rMovies = $this->Movie->RMovie->find('list');

		$this->set(compact('actors', 'directors', 'genres', 'writers','rMovies'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Movie->id = $id;
		if (!$this->Movie->exists()) {
			throw new NotFoundException(__('Pelicula invalida'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Movie->save($this->request->data)) {
				$this->Session->setFlash(__('Se guardaron los cambios!'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudieron guardar los cambios. Intente nuevamente.'));
			}
		} else {
			$this->request->data = $this->Movie->read(null, $id);
		}
		$actors = $this->Movie->Actor->find('list');
		$directors = $this->Movie->Director->find('list');
		$genres = $this->Movie->Genre->find('list');
		$writers = $this->Movie->Writer->find('list');
		$rMovies = $this->Movie->RMovie->find('list');

		$this->set(compact('actors', 'directors', 'genres', 'writers','rMovies'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Movie->id = $id;
		if (!$this->Movie->exists()) {
			throw new NotFoundException(__('Pelicula invalida!'));
		}
		if ($this->Movie->delete()) {
			$this->Session->setFlash(__('Pelicula eliminada'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('La pelicula no fue eliminada'));
		$this->redirect(array('action' => 'index'));
	}
	
	
	public function search() {
		if ($this->request->is('post')) {
			
			$this->Movie->recursive = 0;
			$this->Actor->recursive = 0;
			$this->Director->recursive = 0;
			$this->Writer->recursive = 0;
			$this->Genres->recursive = 0;
			
			$datas = explode(" ",$this->request->data['Movie']['search']);
			$conditionsMovies = array();
			$conditionsActors = array();
			$conditionsDirectors = array();
			$conditionsWriters = array();
			$conditionsGenres = array();
			
			foreach ($datas as $data) {
				array_push($conditionsMovies,array('Movie.name LIKE' => '%'.$data.'%'));
				array_push($conditionsMovies, array('Movie.tags LIKE' => '%'.$data.'%'));
				array_push($conditionsMovies, array('Movie.year LIKE' => '%'.$data.'%'));
				
				array_push($conditionsActors, array('Actor.name LIKE' => '%'.$data.'%'));
				array_push($conditionsDirectors, array('Director.name LIKE' => '%'.$data.'%'));
				array_push($conditionsWriters, array('Writer.name LIKE' => '%'.$data.'%'));
				array_push($conditionsGenres, array('Genre.name LIKE' => '%'.$data.'%'));
				
			}
			
			$movies = $this->paginate('Movie',array( "or" => $conditionsMovies));

			$actors = $this->paginate('Actor',array( "or" => $conditionsActors));
			
			$directors = $this->paginate('Director',array( "or" => $conditionsDirectors)); 
			
			$writers = $this->paginate('Writer',array( "or" => $conditionsWriters));

			$genres = $this->paginate('Genre',array( "or" => $conditionsGenres));
			
			$this->set(compact('movies','actors','directors','writers','genres'));
		}
	}
	
	public function rating($id = 0,$rat = 0) {
		$this->Movie->id = $id;

		$movie = $this->Movie->read(null, $id);
		
		$sumaRat = $movie['Movie']['avg_rating'];
		$cantVot = $movie['Movie']['avg_cant']+1;
		var_dump($sumaRat);
		echo "<br>";
		var_dump($cantVot);
		echo "<br>";
		$sumaRatNuevo= $rat+$sumaRat;
		
		$this->request->data['Movie']['avg_rating'] = $sumaRatNuevo;
		$this->request->data['Movie']['avg_cant'] = $cantVot;
		
		$this->Movie->save($this->request->data);
		
		$this->redirect(array('action' => 'view',$id));
	}
	
}
