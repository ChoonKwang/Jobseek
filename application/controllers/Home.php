<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public $data = array();
	public $error = 0;

    function __construct(){
        parent::__construct();
    }

    public function index () {
    	$this->load->view('Tempo/create_profile');
    }

    public function signup () {
    	$this->load->view('Tempo/create_profile');
    }

    public function subscription () {
    	$this->load->view('Tempo/create_payment');
    }

    public function payment () {
    	$this->load->view('payment/success');
    }
}
