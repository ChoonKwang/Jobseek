<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relation extends CI_Controller {

	public $data = array();
	public $error = 0;

    function __construct(){
        parent::__construct();
        $this->load->model('Relation_model');
    }

    // Developer troubleshoot panel, Please hide when deployed.
    public function index () {
    	$this->load->view('Relation/create');
    	$this->load->view('Relation/update');
    	$this->load->view('Relation/delete');
    	echo site_url('Relation/read' . '?type=1');
    }

	public function create()
	{
		$mr_msg_id = ($this->input->get_post('mr_msg_id') ? $this->input->get_post('mr_msg_id', TRUE) : $this->error=1 );
		$mr_trigger_group = ($this->input->get_post('mr_trigger_group') ? $this->input->get_post('mr_trigger_group', TRUE) : $this->error=1 );
		$mr_type = ($this->input->get_post('mr_type') ? $this->input->get_post('mr_type', TRUE) : $this->error=1 );
		switch($this->error) {
			case 0:
				$data = array (
					'mr_msg_id' => $mr_msg_id,
					'mr_trigger_group' => $mr_trigger_group,
					'mr_type'=> $mr_type
				);

				($this->Relation_model->insert_entry($data) ? print '1': print '0');
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
				var_dump($this->Relation_model->get_all_entry());
				break;
			default:
				echo '0';
				break;
		}
	}

	public function update()
	{
		$mr_id = ($this->input->get_post('mr_id') ? $this->input->get_post('mr_id', TRUE) : $this->error=1 );
		$mr_msg_id = ($this->input->get_post('mr_msg_id') ? $this->input->get_post('mr_msg_id', TRUE) : $this->error=1 );
		$mr_trigger_group = ($this->input->get_post('mr_trigger_group') ? $this->input->get_post('mr_trigger_group', TRUE) : $this->error=1 );
		$mr_type = ($this->input->get_post('mr_type') ? $this->input->get_post('mr_type', TRUE) : $this->error=1 );
		switch($this->error) {
			case 0:
				$data = array (
					'mr_msg_id' => $mr_msg_id,
					'mr_trigger_group' => $mr_trigger_group,
					'mr_type'=> $mr_type
				);

				($this->Relation_model->update_entry($data,$mr_id) ? print '1': print '0');
				break;
			default:
				print '0';
				break;
		}
	}

	public function delete()
	{
		$mr_id = ($this->input->get_post('mr_id') ? $this->input->get_post('mr_id', TRUE) : $this->error=1 );
		switch($this->error) {
			case 0:
				($this->Relation_model->delete_entry($mr_id) ? print '1': print '0');
				break;
			default:
				print '0';
				break;
		}
	}

}
