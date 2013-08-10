<?php
App::uses('RoutesAppController', 'Routes.Controller');
/**
 * Document: RoutesController
 * 
 * 
 * @author Roland W. <roland.wassinger@gmail.com>
 * 
 * @version 1.0.0  09.08.2013 - 09:34:04  
 * UTF-8
 * 
 * @package Croogo.Routes
 * @project 
 */
/*
 * Copyright (C) 2013 Roland Wassinger <roland.wassinger@gmail.com>
 *
 * @license http://www.opensoure.org/licenses/mit-license.php The MIT License
 */
/**
 * Routes Controller
 *
 */
class RoutesController extends RoutesAppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'Routes';

/**
 * Models used by the Controller
 *
 * @var array
 * @access public
 */
//	public $uses = array(
//		'Route.routes',
//	);
/**
 * afterConstruct
 */
	public function afterConstruct() {
		parent::afterConstruct();
		$this->_setupAclComponent();
	}

/**
 * beforeFilter
 *
 * @return void
 * @access public
 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Security->unlockedActions[] = 'admin_toggle';
	}

	public function admin_index(){
		$this->set('title_for_layout', __d('croogo','Routes'));
		
		$this->Route->recursive = 0;
		$this->set('routes', $this->paginate());
	}
/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->set('title_for_layout', __d('croogo', 'Add Routes'));
		
		if ($this->request->is('post')) {
			$this->Route->create();
			if ($this->Route->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The Route has been saved'), 'default', array('class' => 'success'));
				if (isset($this->request->data['apply'])) {
					$this->redirect(array('action' => 'edit', $this->Route->id));
				} else {
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__d('croogo', 'The Route could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
	}
	
	/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->set('title_for_layout', __d('croogo', 'Edit Route'));
		
		if (!$this->Route->exists($id)) {
			throw new NotFoundException(__('Invalid route'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Route->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The Route has been saved'), 'default', array('class' => 'success'));
				if (isset($this->request->data['apply'])) {
					$this->redirect(array('action' => 'edit', $this->Route->id));
				} else {
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__d('croogo', 'Invalid Route'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Route.' . $this->Route->primaryKey => $id));
			$this->request->data = $this->Route->find('first', $options);
		}
	}
	
	/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Route->id = $id;
		if (!$this->Route->exists()) {
			throw new NotFoundException(__('Invalid route'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Route->delete()) {
			$this->Session->setFlash(__d('croogo', 'Setting deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Invalid id for Route'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}
