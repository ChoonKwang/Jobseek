<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tempo extends CI_Controller {

	public $data = array();
	public $error = 0;

    function __construct(){
        parent::__construct();
        $this->load->model('Payment_model');
        $this->load->model('Profile_model');
    }

    public function profile()
    {
    	// Check session to allow re-entry of data in case of network error
    	($this->session->userdata('profile_id') ? $this->error=999 : $this->error=0);
    	// create simple profile
		$pa_name = ($this->input->get_post('pa_name') ? $this->input->get_post('pa_name', TRUE) : $this->error=1 );
		$pa_telegram_id = ($this->input->get_post('pa_telegram_id') ? $this->input->get_post('pa_telegram_id', TRUE) : NULL );
		$pa_type = 999;
		$pa_json_info = array (
			'contact_no' => ($this->input->get_post('contact_no') ? $this->input->get_post('contact_no', TRUE) : NULL ),
			'company_name' => ($this->input->get_post('company_name') ? $this->input->get_post('company_name', TRUE) : $this->error=1 ),
			'email' => ($this->input->get_post('email') ? $this->input->get_post('email', TRUE) : NULL )
		);
		switch($this->error) {
			case 0:
				$data = array (
					'pa_name' => $pa_name,
					'pa_telegram_id' => $pa_telegram_id,
					'pa_type'=> $pa_type,
					'pa_json_info' => json_encode($pa_json_info)
				);
				$profile_id = $this->Profile_model->insert_profile_advert($data);
				($profile_id ? print '1': exit("Fail to create profile"));
				break;
			case 999: //bypass case
				break;
			default:
				exit('Please fill in all the necessary fields');
				break;
		}
    	// create link payment subscription
		$sessiondata = array(
		        'profile_id'  => $profile_id,
		);
		$cookie= array(
		   'name'   => 'peter',
		   'value'  => $this->encrypt->encode($profile_id),
		   'expire' => '3600',
		);
		$this->input->set_cookie($cookie);
		$cookie= array(
		   'name'   => 'bravo',
		   'value'  => $this->encrypt->encode($pa_name),
		   'expire' => '3600',
		);
		$this->input->set_cookie($cookie);
		$this->session->set_userdata($sessiondata);
    	redirect('/Home/subscription/');
    }

}
