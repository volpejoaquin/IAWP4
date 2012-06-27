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

		$this->set(compact('actors', 'directors', 'genres', 'writers'));
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

		$this->set(compact('actors', 'directors', 'genres', 'writers'));
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
			
			//Peliculas
			$this->Movie->recursive = 0;

			$data = $this->request->data['Movie']['search'];
			
			$movies = $this->paginate('Movie', array('Movie.name LIKE' => '%'.$data.'%','Movie.tags LIKE' => '%'.$data.'%'));
			var_dump($movies);
			echo "VER TAGSSS";
			//Actores
			$this->Actor->recursive = 0;

			$actors = $this->paginate('Actor', array('Actor.name LIKE' => '%'.$data.'%'));
			
			//Directores
			$this->Director->recursive = 0;

			$directors = $this->paginate('Director', array('Director.name LIKE' => '%'.$data.'%'));
			
			//Escritores
			$this->Writer->recursive = 0;

			$writers = $this->paginate('Writer', array('Writer.name LIKE' => '%'.$data.'%'));
			
			//Generos
			$this->Genres->recursive = 0;

			$genres = $this->paginate('Genre', array('Genre.name LIKE' => '%'.$data.'%'));
			
			
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
