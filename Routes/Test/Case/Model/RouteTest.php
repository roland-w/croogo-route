<?php
App::uses('Route', 'Routes.Model');

/**
 * Route Test Case
 *
 */
class RouteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.routes.route'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Route = ClassRegistry::init('Routes.Route');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Route);

		parent::tearDown();
	}

}
