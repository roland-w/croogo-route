<?php

/**
 * Document: RoutesActivation
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
class RoutesActivation{
/**
 * onActviate will be called if this return true
 * 
 * @param  object $controller Controller
 * @return boolean
 */
	public function beforeActivation(&$controller){
		$sql = file_get_contents(APP.'Plugin'.DS.'Routes'.DS.'Config'.DS.'Schema'.DS.'routes.sql');
		
		if(!empty($sql)){
			$db = $this->_connect();
			
			$prefix = $db->config['prefix'];
			
			$sql = str_replace('routes', $prefix.'routes' , $sql);
			$statements = explode(';', $sql);
			
			foreach ($statements as $statement) {
				if(trim($statement) != ''){
					$db->query($statement);
				}
			}
		}
		return true;
	}
/**
 * Called after activating the plugin
 * 
 * @param object $controller Controller
 * @return void
 */	
	public function onActivation(&$controller){
		$controller->Croogo->addAco('Routes/Routes/admin_index'); //RoutesController::admin_index
		$controller->Croogo->addAco('Routes/Routes/admin_add');
		$controller->Croogo->addAco('Routes/Routes/admin_edit');
		$controller->Croogo->addAco('Routes/Routes/admin_delete');

//		$controller->Setting->write('Route.tab_node', 1, array(
//			'title' => 'Route Tab active',
//			'description' => 'View Route Tab by Link add and edit',
//			'input_type' => 'checkbox',
//			'editable' => 1,
//			
//		));
		
//		App::uses('CroogoPlugin', 'Extensions.Lib');
//		$CroogoPlugin = new CroogoPlugin();
//		$CroogoPlugin->migrate('Routes');
	}
		
/**
 * onDeactivate will be called if this returns true
 *
 * @param  object $controller Controller
 * @return boolean
 */		
	public function beforeDeactivation($controller){
		$db = $this->_connect();
		$prefix = $db->config['prefix'];
		$db->query('DROP TABLE IF EXISTS '.$prefix.'routes');
		return true;
	}
		
/**
* Called after deactivating the plugin in ExtensionsPluginsController::admin_toggle()
 *
 * @param object $controller Controller
 * @return void
 */
	public function onDeactivation(&$controller) {
		$controller->Croogo->removeAco('Routes');
		#$controller->Setting->deleteKey('Route.tab_node');
	}
		
	private function _connect(){
		App::import('Core', 'File');
		App::import('Model', 'ConnectionManager');
		$db = ConnectionManager::getDataSource('default');
		
		return $db;
	}
}
?>
