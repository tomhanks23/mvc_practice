<?php

/**
 * App Controller
 */
class AppController extends BaseController {

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();
		ob_start();
	}

	/**
	 * Set View
	 */
	protected function set_view() {
		$this->view = new View(ROOT . '/mvc_practice/app/views/main.php');
		$this->view->primary_header = new View(ROOT . '/mvc_practice/app/views/primary_header.php');
		$this->view->copyright = new View(ROOT . '/mvc_practice/app/views/copyright.php');
		$this->view->list_menu = new View(ROOT . '/mvc_practice/app/views/list_menu.php');

		// for the log in form
		$this->view->login = new View(ROOT . '/mvc_practice/app/views/login.php');
		// for the register form
		$this->view->register = new View(ROOT . '/mvc_practice/app/views/register.php');	

		// for the item detail page view
		$this->view->detail_page = new View(ROOT . '/mvc_practice/app/views/detail_page.php');

	}

	/**
	 * Render
	 */
	protected function render() {

		// Catch Output Buffer
		$this->view->main_content = trim(ob_get_contents());
		ob_end_clean();

		// Render View
		parent::render();
	}

}