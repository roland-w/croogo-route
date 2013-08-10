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
?>
<?php

$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Routes'), array('plugin' => 'routes', 'controller' => 'routes', 'action' => 'index'));

if ($this->request->params['action'] == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['Route']['route'], '/' . $this->request->url);
}

if ($this->request->params['action'] == 'admin_add') {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

echo $this->Form->create('Route');

?>
<div class="row-fluid">
	<div class="span8">

		<ul class="nav nav-tabs">
		<?php
			echo $this->Croogo->adminTab(__d('croogo', 'Route'), '#route-basic');
			echo $this->Croogo->adminTab(__d('croogo', 'Misc.'), '#route-misc');
			echo $this->Croogo->adminTabs();
		?>
		</ul>

		<div class="tab-content">

			<div id="route-basic" class="tab-pane">
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array(
					'class' => 'span10',
				));
				echo $this->Form->input('route', array(
					'label' => __d('croogo', 'Route'),
				));
				echo $this->Form->input('link', array(
					'label' => __d('croogo', 'Link'),
				));
			?>
			</div>

			<div id="route-misc" class="tab-pane">
			<?php
				echo $this->Form->input('params', array(
					'label' => __d('croogo', 'Params'),
				));
			?>
			</div>

			<?php echo $this->Croogo->adminTabs(); ?>
		</div>
	</div>

	<div class="span4">
		<?php
		echo $this->Html->beginBox('Publishing') .
			$this->Form->button(__d('croogo', 'Apply'), array('name' => 'apply', 'button' => 'default')) .
			$this->Form->button(__d('croogo', 'Save'), array('button' => 'default')) .
			$this->Html->link(__d('croogo', 'Cancel'), array('action' => 'index'), array('button' => 'danger')) .
			$this->Form->input('status', array(
				'label' => __d('croogo', 'Status'),
				'class' => false,
			)).
			$this->Html->endBox();

		$this->Croogo->adminBoxes();
		?>
	</div>

</div>
<?php echo $this->Form->end(); ?>
