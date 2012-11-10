<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Install extends CI_Controller {

	/**
	 * Index Page for this controller.
	 * Standard install, it sets up all the tables, etc via forge
	 * 
	 */
	public function index()
	{
		$this->load->database();
		// Going to attempt to use forge to create a table!
		$this->load->dbforge();
		$fields = array(
            'system_id' => array(
                                'type' => 'INT',
                                'constraint' => 8,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                            ),  
            'system_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 199
                            ),                      
			'system_public_uri' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 299
                            ), 
			'system_xml' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 90 //set to 'none' if using DB instead
                            ),
			'system_feed1' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 299 
                            )

                );
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('system_id', TRUE);
		$this->dbforge->create_table('systems',TRUE);

		$this->load->view('install_complete');
	}
}

/* End of file install.php */
/* Location: ./application/controllers/install.php */