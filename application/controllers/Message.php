<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

	public $data = array();
	public $error = 0;

    function __construct(){
        parent::__construct();
        $this->load->model('Message_model');
        $this->load->model('Relation_model');
    }

    // Developer troubleshoot panel, Please hide when deployed.
    public function index () {
    	$this->load->view('Message/create');
    	$this->load->view('Message/update');
    	$this->load->view('Message/delete');
    	echo site_url('Message/read' . '?type=1');
    }

	public function create()
	{
		$gm_name = ($this->input->get_post('gm_name') ? $this->input->get_post('gm_name', TRUE) : $this->error=1 );
		$gm_message = ($this->input->get_post('gm_message') ? $this->input->get_post('gm_message', TRUE) : $this->error=1 );
		$gm_remark = ($this->input->get_post('gm_remark') ? $this->input->get_post('gm_remark', TRUE) : NULL );
		switch($this->error) {
			case 0:
				$data = array (
					'gm_name' => $gm_name,
					'gm_message' => $gm_message,
					'gm_remark'=> $gm_remark
				);

				($this->Message_model->insert_entry($data) ? print '1': print '0');
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
				var_dump($this->Message_model->get_all_entry());
				break;
			default:
				echo '0';
				break;
		}
	}

	public function update()
	{
		$gm_id = ($this->input->get_post('gm_id') ? $this->input->get_post('gm_id', TRUE) : $this->error=1 );
		$gm_name = ($this->input->get_post('gm_name') ? $this->input->get_post('gm_name', TRUE) : $this->error=1 );
		$gm_message = ($this->input->get_post('gm_message') ? $this->input->get_post('gm_message', TRUE) : $this->error=1 );
		$gm_remark = ($this->input->get_post('gm_remark') ? $this->input->get_post('gm_remark', TRUE) : NULL );
		switch($this->error) {
			case 0:
				$data = array (
					'gm_name' => $gm_name,
					'gm_message' => $gm_message,
					'gm_remark'=> $gm_remark
				);

				($this->Message_model->update_entry($data,$gm_id) ? print '1': print '0');
				break;
			default:
				print '0';
				break;
		}
	}

	public function delete()
	{
		$gm_id = ($this->input->get_post('gm_id') ? $this->input->get_post('gm_id', TRUE) : $this->error=1 );
		switch($this->error) {
			case 0:
				if ($this->Message_model->delete_entry($gm_id)) {
					($this->Relation_model->delete_entry_msg_id($gm_id) ? print '1': print '0');
				} else { print '0';}
				break;
			default:
				print '0';
				break;
		}
	}

}
