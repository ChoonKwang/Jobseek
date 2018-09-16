<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gantry extends CI_Controller {

	public $data = array();
	public $error = 0;

    function __construct(){
        parent::__construct();
        $this->load->model('Gantry_model');
    }

    // Developer troubleshoot panel, Please hide when deployed.
    public function index () {
    	$this->load->view('gantry/create');
    	$this->load->view('gantry/update');
    	$this->load->view('gantry/delete');
    	echo site_url('gantry/read' . '?type=1');
    }

	public function create()
	{
		$gate_name = ($this->input->get_post('gate_name') ? $this->input->get_post('gate_name', TRUE) : $this->error=1 );
		$gate_location = ($this->input->get_post('gate_location') ? $this->input->get_post('gate_location', TRUE) : NULL );
		$gate_remark = ($this->input->get_post('gate_remark') ? $this->input->get_post('gate_remark', TRUE) : NULL );
		$gate_relay_id = ($this->input->get_post('gate_relay_id') ? $this->input->get_post('gate_relay_id', TRUE) : $this->error=1 );
		$gate_relay_no = ($this->input->get_post('gate_relay_no') ? $this->input->get_post('gate_relay_no', TRUE) : $this->error=1 );
		$gate_ip = ($this->input->get_post('gate_ip') ? $this->input->get_post('gate_ip', TRUE) : $this->error=1 );
		$gate_mode = ($this->input->get_post('gate_mode') ? $this->input->get_post('gate_mode', TRUE) : 1 );
		$gate_status = ($this->input->get_post('gate_status') ? $this->input->get_post('gate_status', TRUE) : 1 );
		switch($this->error) {
			case 0:
				$data = array (
					'gate_name' => $gate_name,
					'gate_location' => $gate_location,
					'gate_remark'=> $gate_remark,
					'gate_relay_id'=> $gate_relay_id,
					'gate_relay_no' => $gate_relay_no,
					'gate_ip' => $gate_ip,
					'gate_mode'=> $gate_mode,
					'gate_status'=> $gate_status,
				);

				($this->Gantry_model->insert_entry($data) ? print '1': print '0');
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
				var_dump($this->Gantry_model->get_all_entry());
				break;
			default:
				echo '0';
				break;
		}
	}

	public function update()
	{
		$gate_id = ($this->input->get_post('gate_id') ? $this->input->get_post('gate_id', TRUE) : $this->error=1 );
		$gate_name = ($this->input->get_post('gate_name') ? $this->input->get_post('gate_name', TRUE) : $this->error=1 );
		$gate_location = ($this->input->get_post('gate_location') ? $this->input->get_post('gate_location', TRUE) : NULL );
		$gate_remark = ($this->input->get_post('gate_remark') ? $this->input->get_post('gate_remark', TRUE) : NULL );
		$gate_relay_id = ($this->input->get_post('gate_relay_id') ? $this->input->get_post('gate_relay_id', TRUE) : $this->error=1 );
		$gate_relay_no = ($this->input->get_post('gate_relay_no') ? $this->input->get_post('gate_relay_no', TRUE) : $this->error=1 );
		$gate_ip = ($this->input->get_post('gate_ip') ? $this->input->get_post('gate_ip', TRUE) : $this->error=1 );
		$gate_mode = ($this->input->get_post('gate_mode') ? $this->input->get_post('gate_mode', TRUE) : 1 );
		$gate_status = ($this->input->get_post('gate_status') ? $this->input->get_post('gate_status', TRUE) : 1 );
		switch($this->error) {
			case 0:
				$data = array (
					'gate_name' => $gate_name,
					'gate_location' => $gate_location,
					'gate_remark'=> $gate_remark,
					'gate_relay_id'=> $gate_relay_id,
					'gate_relay_no' => $gate_relay_no,
					'gate_ip' => $gate_ip,
					'gate_mode'=> $gate_mode,
					'gate_status'=> $gate_status,
				);

				($this->Gantry_model->update_entry($data,$gate_id) ? print '1': print '0');
				break;
			default:
				print '0';
				break;
		}
	}

	public function delete()
	{
		$gate_id = ($this->input->get_post('gate_id') ? $this->input->get_post('gate_id', TRUE) : $this->error=1 );
		switch($this->error) {
			case 0:
				($this->Gantry_model->delete_entry($gate_id) ? print '1': print '0');
				break;
			default:
				print '0';
				break;
		}
	}

}
