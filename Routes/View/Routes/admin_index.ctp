<?php
/**
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
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Routes'), '/' . $this->request->url);

?>
<div class="row-fluid">
	<div class="span12">
		<table class="table table-striped">
			<?php
				$tableHeaders = $this->Html->tableHeaders(array(
					$this->Paginator->sort('id', __d('croogo', 'Id')),
					$this->Paginator->sort('route', __d('croogo', 'Route')),
					$this->Paginator->sort('link', __d('croogo', 'Link')),
					#$this->Paginator->sort('status', __d('croogo', 'Status')),
					__d('croogo', 'Actions'),
				));
			?>
			<thead>
				<?php echo $tableHeaders; ?>
			</thead>

			<?php
			$rows = array();
			foreach ($routes as $route):
				$actions = array();
				$actions[] = $this->Croogo->adminRowAction(
					'',
					array('controller' => 'routes', 'action' => 'edit', $route['Route']['id']),
					array('icon' => 'pencil', 'tooltip' => __d('croogo', 'Edit this item'))
				);
				$actions[] = $this->Croogo->adminRowAction(
					'',
					array('controller' => 'routes', 'action' => 'delete', $route['Route']['id']),
					array('icon' => 'trash', 'tooltip' => __d('croogo', 'Remove this item')),
					__d('croogo', 'Are you sure?')
				);
				$actions = $this->Html->div('item-actions', implode(' ', $actions));
				$rows[] = array(
					$route['Route']['id'],
					$route['Route']['route'],
					$route['Route']['link'],
					#$route['Route']['status'],
					$this->Html->div('item-actions', $actions),
				);
			endforeach;

			echo $this->Html->tableCells($rows);
			?>
		</table>
	</div>
</div>
