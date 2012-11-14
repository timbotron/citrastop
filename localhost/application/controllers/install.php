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
        $this->load->dbforge();

        $data['error_array'] = array();

        // Creating systems table
        $fields = array(
            'system_id' => array(
                                'type' => 'INT',
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
        if(!$this->dbforge->create_table('systems',TRUE)) array_push($data['error_array'], "Count not create systems table.");

        // Creating users table
        $fields = array(
            'user_id' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                            ),  
            'email' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 149
                            ),                      
            'used_systems' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 49
                            )
                );
        
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('user_id', TRUE);
        
        if(!$this->dbforge->create_table('users',TRUE)) array_push($data['error_array'], "Count not create users table.");

         // Creating users_choice table
        $fields = array(
            'users_choice_id' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                            ),  
            'user_id' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE
                            ),                      
            'system_id' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE
                            ), 
            'stop_id' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE
                            ),
            'label' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 199
                            ),  
            'going_thereyn' => array(
                                'type' => 'BOOLEAN'
                            )
                );
        
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('users_choice_id', TRUE);
        
        if(!$this->dbforge->create_table('users_choice',TRUE)) array_push($data['error_array'], "Count not create users table.");

        //TODO add foreign keys manually. :/ http://codeigniter.com/forums/viewreply/978554/


        if (count($data['error_array'])>0)
        {
            $this->dbforge->drop_table('systems');
            $this->dbforge->drop_table('users');
            $this->dbforge->drop_table('users_choice');
            $this->load->view('install_errors',$data);
        }
        else
        {
            $this->load->view('install_complete');           
        }


	}
}

/* End of file install.php */
/* Location: ./application/controllers/install.php */