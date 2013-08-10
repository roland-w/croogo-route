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
 */
/*
 * Copyright (C) 2013 Roland Wassinger <roland.wassinger@gmail.com>
 *
 * @license http://www.opensoure.org/licenses/mit-license.php The MIT License
 */
/**
 * Routes
 *
 * example_routes.php will be loaded in main app/config/routes.php file.
 */
Croogo::hookRoutes('Routes');

/**
 * Behavior
 *
 * This plugin's Example behavior will be attached whenever Node model is loaded.
 */
#Croogo::hookBehavior('Node', 'Example.Example', array());

/**
 * Component
 *
 * This plugin's Example component will be loaded in ALL controllers.
 */
#Croogo::hookComponent('*', 'Example.Example');

/**
 * Helper
 *
 * This plugin's Example helper will be loaded via NodesController.
 */
#Croogo::hookHelper('Nodes', 'Example.Example');

/**
 * Admin menu (navigation)
 */
CroogoNav::add('extensions.children.routes', array(
	'title' => 'Routes',
	'url' => '#',
	'children' => array(
			'index' => array(
				'title' => __d('croogo','Index'),
				'url' => array(
					'plugin' => 'routes',
					'admin' => true,
					'controller' => 'routes',
					'action' => 'index',
				),
			),
			'add' => array(
				'title' => __d('croogo','Add new'),
				'url' => array(
					'plugin' => 'routes',
					'admin' => true,
					'controller' => 'routes',
					'action' => 'add',
				),
			),
		)
));
//CroogoNav::add('settings.children.Route', array(
//	'title' => 'Route',
//	'url' => array(
//				'admin' => true,
//				'plugin' => 'settings',
//				'controller' => 'settings',
//				'action' => 'prefix',
//				'Route'
//			),
//		)
//	);

/**
 * Admin tab
 *
 * When adding/editing Content (Nodes),
 * an extra tab with title 'Example' will be shown with markup generated from the plugin's admin_tab_node element.
 *
 * Useful for adding form extra form fields if necessary.
 */
//if(Configure::read('Route.tab_node')){
//	Croogo::hookAdminTab('Links/admin_add', 'Route', 'routes.admin_tab_link');
//	Croogo::hookAdminTab('Link/admin_edit', 'Route', 'routes.admin_tab_link');
//}
