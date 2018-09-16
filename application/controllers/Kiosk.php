<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kiosk extends CI_Controller {

	public $data = array();
	public $error = 0;

    function __construct(){
        parent::__construct();
        $this->load->model('Kiosk_model');
    }

    // Developer troubleshoot panel, Please hide when deployed.
    public function index () {
    	$this->load->view('Kiosk/create');
    	$this->load->view('Kiosk/update');
    	$this->load->view('Kiosk/delete');
    	echo site_url('Kiosk/read' . '?type=1');
    }

	public function create()
	{
		$kiosk_name = ($this->input->get_post('kiosk_name') ? $this->input->get_post('kiosk_name', TRUE) : $this->error=1 );
		$kiosk_location = ($this->input->get_post('kiosk_location') ? $this->input->get_post('kiosk_location', TRUE) : NULL );
		$kiosk_remark = ($this->input->get_post('kiosk_remark') ? $this->input->get_post('kiosk_remark', TRUE) : NULL );
		$kiosk_ip = ($this->input->get_post('kiosk_ip') ? $this->input->get_post('kiosk_ip', TRUE) : $this->error=1 );
		$kiosk_mode = ($this->input->get_post('kiosk_mode') ? $this->input->get_post('kiosk_mode', TRUE) : 1 );
		$kiosk_status = ($this->input->get_post('kiosk_status') ? $this->input->get_post('kiosk_status', TRUE) : 1 );
		switch($this->error) {
			case 0:
				$data = array (
					'kiosk_name' => $kiosk_name,
					'kiosk_location' => $kiosk_location,
					'kiosk_remark'=> $kiosk_remark,
					'kiosk_ip' => $kiosk_ip,
					'kiosk_mode'=> $kiosk_mode,
					'kiosk_status'=> $kiosk_status,
				);

				($this->Kiosk_model->insert_entry($data) ? print '1': print '0');
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
				var_dump($this->Kiosk_model->get_all_entry());
				break;
			default:
				echo '0';
				break;
		}
	}

	public function update()
	{
		$kiosk_id = ($this->input->get_post('kiosk_id') ? $this->input->get_post('kiosk_id', TRUE) : $this->error=1 );
		$kiosk_name = ($this->input->get_post('kiosk_name') ? $this->input->get_post('kiosk_name', TRUE) : $this->error=1 );
		$kiosk_location = ($this->input->get_post('kiosk_location') ? $this->input->get_post('kiosk_location', TRUE) : NULL );
		$kiosk_remark = ($this->input->get_post('kiosk_remark') ? $this->input->get_post('kiosk_remark', TRUE) : NULL );
		$kiosk_ip = ($this->input->get_post('kiosk_ip') ? $this->input->get_post('kiosk_ip', TRUE) : $this->error=1 );
		$kiosk_mode = ($this->input->get_post('kiosk_mode') ? $this->input->get_post('kiosk_mode', TRUE) : 1 );
		$kiosk_status = ($this->input->get_post('kiosk_status') ? $this->input->get_post('kiosk_status', TRUE) : 1 );
		switch($this->error) {
			case 0:
				$data = array (
					'kiosk_name' => $kiosk_name,
					'kiosk_location' => $kiosk_location,
					'kiosk_remark'=> $kiosk_remark,
					'kiosk_ip' => $kiosk_ip,
					'kiosk_mode'=> $kiosk_mode,
					'kiosk_status'=> $kiosk_status,
				);

				($this->Kiosk_model->update_entry($data,$kiosk_id) ? print '1': print '0');
				break;
			default:
				print '0';
				break;
		}
	}

	public function delete()
	{
		$kiosk_id = ($this->input->get_post('kiosk_id') ? $this->input->get_post('kiosk_id', TRUE) : $this->error=1 );
		switch($this->error) {
			case 0:
				($this->Kiosk_model->delete_entry($kiosk_id) ? print '1': print '0');
				break;
			default:
				print '0';
				break;
		}
	}

}
