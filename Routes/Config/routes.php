<?php

/**
 * Document: Route
 * 
 * 
 * @author Roland W. <roland.wassinger@gmail.com>
 * 
 * @version 1.0.0  09.08.2013 - 12:46:25  
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
	
	$params = array();
	$link  = array();
	
	App::import('Model', 'Route');
	App::import('Controller', 'RoutesController');
		$RouteModel = ClassRegistry::init('Route');
		
		$dynRoutes = $RouteModel->find('all', array('conditions' => array('status' => 1)));
		
		foreach($dynRoutes as $n => $route) {
			if (strstr($route['Route']['link'], 'controller:')) {
				$link = linkStringToArray($route['Route']['link']);
				
				if($route['Route']['params'] != null){
					$params = decodeData($route['Route']['params']);
				}
				
			//CroogoRouter::connect($route, $default, $params)
			CroogoRouter::connect(
						$route['Route']['route'], 
						$link,
						$params
					);
		}
		}
	
	/**
 * from Croogo.Menu.View.Helper.MenuHelper
 * 
 * Converts strings like controller:abc/action:xyz/ to arrays 
 *
 * @param string|array $link link
 * @return array
 */
	function linkStringToArray($link) {
		
		if (is_array($link)) {
			$link = key($link);
		}
		$link = explode('/', $link);
		$linkArr = array();
		foreach ($link as $linkElement) {
			if ($linkElement != null) {
				$linkElementE = explode(':', $linkElement);
				if (isset($linkElementE['1'])) {
					$linkArr[$linkElementE['0']] = $linkElementE['1'];
				} else {
					$linkArr[] = $linkElement;
				}
			}
		}
		if (!isset($linkArr['plugin'])) {
			$linkArr['plugin'] = false;
		}

		return $linkArr;
	}
/**
 * Decode data
 *
 * @param Model $model
 * @param string $data
 * @return array
 */
	function decodeData($data) {
		if ($data == '') {
			$output = '';
		} else {
			$output = json_decode($data, true);
		}

		return $output;
	}
?>