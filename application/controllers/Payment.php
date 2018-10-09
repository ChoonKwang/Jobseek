<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

	public $data = array();
	public $error = 0;

    function __construct(){
        parent::__construct();
        $this->load->model('Payment_model');
    }

    public function index ()
    {
    	$this->load->view('payment/success');
    }

    public function invoice()
    {
    	$profile_id = $this->input->get_post('id');
    	$result = $this->Payment_model->get_invoice($profile_id);
    	foreach ($result as $row) {
			$this->data['pin_id'] = $row->pin_id;
	    	$this->data['pin_paid'] = $row->pin_paid;
	    	$this->data['pin_total'] = $row->pin_total;
	    	$this->data['pin_date'] = date('d/m/Y', strtotime($row->pin_date));
	    	$this->data['pin_due_date'] = date('d/m/Y', strtotime($row->pin_due_date));
	    	$this->data['pin_description'] = $row->pin_description;
    	}
        error_reporting(0);
        ini_set('display_errors', 0);  
    	$this->data['bill_name'] = $this->encrypt->decode($this->input->cookie('bravo',true));
    	$this->load->view('payment/success', $this->data);
    }

    public function stripe()
    {
    	\Stripe\Stripe::setApiKey("sk_test_mbvEiF3Tmb7PiyPqvfxMHQjB");
    	switch ($this->input->get_post('type')) {
    		case '1':
    			$plan = 'plan_Df7gvSFxwB6saG';
    			$price = '50';
    			break;
    		case '2':
    			$plan = 'plan_Df7gvSFxwB6saG';
    			$price = '37';
    			break;
    		default:
    			echo 'You have bypassed the URI';
    			break;
    	}
		try
		{
			$customer = \Stripe\Customer::create(array(
				'email' => $_POST['stripeEmail'],
				'source'  => $_POST['stripeToken'],
			));

			$subscription = \Stripe\Subscription::create(array(
				'customer' => $customer->id,
				'items' => array(array('plan' => $plan)),
			));

			$cookie= array(
	           'name'   => 'hunter',
	           'value'  => $this->encrypt->encode($price),
	           'expire' => '3600',
			);

			$this->input->set_cookie($cookie);
			// pass customer ID
			$url = site_url('payment/create_subscription?ps_stripe_id=' . $customer->id);
			header('Location: ' . $url);
			exit;
		}
		catch(Exception $e)
		{
		  echo 'Payment did not go through';
		  error_log("unable to sign up customer:" . $_POST['stripeEmail'].
		    ", error:" . $e->getMessage());
		}
    }
	public function create_subscription()
	{
		$nextMonth= time() + (30 * 24 * 60 * 60);
		$pa_id = ($this->session->userdata('profile_id') ? $this->session->userdata('profile_id') : $this->encrypt->decode($this->input->cookie('peter',true)));
		$price = $this->encrypt->decode($this->input->cookie('hunter',true));
		$pi_id = 999;
		$ps_last_charged = date('Y-m-d');
		$ps_next_charged = date('Y-m-d', $nextMonth);
		$ps_fail_attempt = 0;
		$ps_status = 1;
		$ps_stripe_id = ($this->input->get_post('ps_stripe_id') ? $this->input->get_post('ps_stripe_id', TRUE) : $this->error=1 );
		switch($this->error) {
			case 0:
				$data_payment = array (
					'pa_id' => $pa_id,
					'pi_id' => $pi_id,
					'ps_last_charged'=> $ps_last_charged,
					'ps_next_charged' => $ps_next_charged,
					'ps_fail_attempt'=> $ps_fail_attempt,
					'ps_status'=> $ps_status,
					'ps_stripe_id'=> $ps_stripe_id,
				);
				$data_invoice = array (
					'pa_id' => $pa_id,
					'pin_paid' => $price,
					'pin_total'=> $price,
					'pin_date' => $ps_last_charged,
					'pin_due_date'=> $ps_last_charged,
					'pin_description'=> 'Unlimited Monthly Subscription',
				);
				$payment_model = $this->Payment_model->insert_payment_entry($data_payment, $data_invoice);
				($payment_model ? : exit("Fail to create entry"));
				$this->session->unset_userdata('profile_id');
				delete_cookie('hunter');
				$url = site_url('payment/invoice?id=' .$pa_id);
				header('Location: ' . $url);
				break;
			default:
				exit('Please fill in all the necessary fields');
				break;
		}
	}

}
