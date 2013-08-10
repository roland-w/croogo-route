<?php
/**
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
App::uses('AppController', 'Controller');

class RoutesAppController extends AppController {
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Security->requirePost('admin_delete', 'admin_toggle', 'admin_activate');
	}
	

}
