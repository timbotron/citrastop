<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Install extends CI_Controller {

	/**
	 * Index Page for this controller.
	 * Standard install, it sets up all the tables, etc via forge
	 * 
	 */
	public function index()
	{
		$this->load->view('install_complete');
	}
}

/* End of file install.php */
/* Location: ./application/controllers/install.php */