<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relay extends CI_Controller {

	public $data = array();
	public $error = 0;

    function __construct(){
        parent::__construct();
        $this->load->model('Relay_model');
    }

    // Developer troubleshoot panel, Please hide when deployed.
    public function index () {
    	$this->load->view('Relay/create');
    	$this->load->view('Relay/update');
    	$this->load->view('Relay/delete');
    	echo site_url('Relay/read' . '?type=1');
    }

	public function create()
	{
		$relay_hostname = ($this->input->get_post('relay_hostname') ? $this->input->get_post('relay_hostname', TRUE) : $this->error=1 );
		$relay_username = ($this->input->get_post('relay_username') ? $this->input->get_post('relay_username', TRUE) : NULL );
		$relay_password = ($this->input->get_post('relay_password') ? $this->input->get_post('relay_password', TRUE) : NULL );
		switch($this->error) {
			case 0:
				$data = array (
					'relay_hostname' => $relay_hostname,
					'relay_username' => $relay_username,
					'relay_password'=> $relay_password
				);

				($this->Relay_model->insert_entry($data) ? print '1': print '0');
				break;
			default:
				print '0';
				break;
		}
	}

	public function read()
	{
		$type = ($this->input->get_post('type') ? $this->input->get_post('type', TRUE) : $this->error=1 );
		switch ($type) {
			case 1:
				var_dump($this->Relay_model->get_all_entry());
				break;
			default:
				echo '0';
				break;
		}
	}

	public function update()
	{
		$relay_id = ($this->input->get_post('relay_id') ? $this->input->get_post('relay_id', TRUE) : $this->error=1 );
		$relay_hostname = ($this->input->get_post('relay_hostname') ? $this->input->get_post('relay_hostname', TRUE) : $this->error=1 );
		$relay_username = ($this->input->get_post('relay_username') ? $this->input->get_post('relay_username', TRUE) : NULL );
		$relay_password = ($this->input->get_post('relay_password') ? $this->input->get_post('relay_password', TRUE) : NULL );
		switch($this->error) {
			case 0:
				$data = array (
					'relay_hostname' => $relay_hostname,
					'relay_username' => $relay_username,
					'relay_password'=> $relay_password
				);

				($this->Relay_model->update_entry($data,$relay_id) ? print '1': print '0');
				break;
			default:
				print '0';
				break;
		}
	}

	public function delete()
	{
		$relay_id = ($this->input->get_post('relay_id') ? $this->input->get_post('relay_id', TRUE) : $this->error=1 );
		switch($this->error) {
			case 0:
				($this->Relay_model->delete_entry($relay_id) ? print '1': print '0');
				break;
			default:
				print '0';
				break;
		}
	}

}
