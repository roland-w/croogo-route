<?php
/**
 * Document: Route
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
App::uses('RoutesAppModel', 'Routes.Model');
/**
 * Route Model
 *
 */
class Route extends RoutesAppModel {
/**
 * Model name
 *
 * @var string
 * @access public
 */
	public $name = 'Route';
/**
 * Display Field
 * 
 * @var string
 * @access public
 */	
	public $displayField = 'route';
/**
 * Behaviors used by the Model
 *
 * @var array
 * @access public
 */
	public $actsAs = array(
		'Croogo.Encoder');

	public function test(){
		
	}
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'route' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'status' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
