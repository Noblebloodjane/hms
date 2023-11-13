<?php

if (!defined('BASEPATH'))

	exit('No direct script access allowed');



/*	

 *	@author : Joyonto Roy

 *	date	: 1 August, 2013

 *	University Of Dhaka, Bangladesh

 *	Hospital Management system

 *	http://codecanyon.net/user/joyontaroy

 */



class Patient extends CI_Controller

{

	

	

	function __construct()

	{

		parent::__construct();

		$this->load->database();

		/*cache control*/

		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');

		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');

		$this->output->set_header('Pragma: no-cache');

		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

	}

	

	/***Default function, redirects to login page if no admin logged in yet***/

	public function index()

	{

		if ($this->session->userdata('patient_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

		if ($this->session->userdata('patient_login') == 1)

			redirect(base_url() . 'index.php?patient/dashboard', 'refresh');

	}

	

	/***patient DASHBOARD***/

	function dashboard()

	{

		if ($this->session->userdata('patient_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

			

		$page_data['page_name']  = 'dashboard';

		$page_data['page_title'] = get_phrase('patient_dashboard');

		$this->load->view('index', $page_data);

	}

	

	/***VIEW APPOINTMENTS******/

	function view_appointment($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('patient_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

		

		$page_data['page_name']    = 'view_appointment';

		$page_data['page_title']   = get_phrase('view_appointment');

		$page_data['appointments'] = $this->db->get_where('appointment', array(

			'patient_id' => $this->session->userdata('patient_id')

		))->result_array();

		$this->load->view('index', $page_data);

	}

	
	function request_appointment() {
		// Check if the patient is logged in
		if ($this->session->userdata('patient_login') != 1) {
			// Redirect or handle the case where the patient is not logged in
			// You can add your own logic here based on your requirements
			// For example: redirect('login');
		}
	
		if ($this->input->post('reason_submitted')) {
			// Form submission, process the request
	
			// Assuming you have loaded the database library in your CodeIgniter configuration
	
			// Remove date slashes from the timestamp
			$appointment_timestamp = str_replace('/', '', $this->input->post('appointment_timestamp'));
	
			$data = array(
				'patient_id' => $this->session->userdata('patient_id'),
				'Reason' => $this->input->post('reason_text'),
				'appointment_timestamp' => $appointment_timestamp,
			);
	
			// Insert data into the 'request_appointment' table
			$this->db->insert('request_app', $data);
	

		}
		// Set page data
		$page_data['page_name']    = 'view_appointment';

		$page_data['page_title']   = get_phrase('view_appointment');

		$page_data['appointments'] = $this->db->get_where('appointment', array(

			'patient_id' => $this->session->userdata('patient_id')

		))->result_array();

		$this->load->view('index', $page_data);


	}
	
	
	

	/***MANAGE PRESCRIPTIONS******/

	function view_prescription($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('patient_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

		

		if ($param1 == 'edit') {

			$page_data['edit_profile'] = $this->db->get_where('prescription', array(

				'prescription_id' => $param2

			))->result_array();

		}

		$page_data['page_name']     = 'view_prescription';

		$page_data['page_title']    = get_phrase('view_prescription');

		$page_data['prescriptions'] = $this->db->get_where('prescription', array(

			'patient_id' => $this->session->userdata('patient_id')

		))->result_array();

		$this->load->view('index', $page_data);

	}

	

	/******VIEW DOCTOR LIST*****/

	function view_doctor($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('patient_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

		

		$page_data['page_name']  = 'view_doctor';

		$page_data['page_title'] = get_phrase('view_doctor');

		$page_data['doctors']    = $this->db->get('doctor')->result_array();

		

		$this->load->view('index', $page_data);

	}

	

	/******VIEW ADMIT HISTORY*****/

	function view_admit_history($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('patient_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

		

		$page_data['page_name']      = 'view_admit_history';

		$page_data['page_title']     = get_phrase('view_admit_history');

		$page_data['bed_allotments'] = $this->db->get_where('bed_allotment', array(

			'patient_id' => $this->session->userdata('patient_id')

		))->result_array();

		$this->load->view('index', $page_data);

	}

	

	/******VIEW BLOOD BANK*****/

	function view_blood_bank($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('patient_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

		

		$page_data['page_name']    = 'view_blood_bank';

		$page_data['page_title']   = get_phrase('view_blood_bank');

		$page_data['blood_donors'] = $this->db->get('blood_donor')->result_array();

		$page_data['blood_bank']   = $this->db->get('blood_bank')->result_array();

		$this->load->view('index', $page_data);

	}

	

	/******MANAGE BILLING/ MAKE PAYMENT*****/

	function view_invoice($param1 = '', $param2 = '', $param3 = '')

	{

		//if($this->session->userdata('patient_login')!=1)redirect(base_url().'index.php?login' , 'refresh');
		

		$page_data['page_name']  = 'view_invoice';

		$page_data['page_title'] = get_phrase('view_invoice');

		$page_data['invoices']   = $this->db->get_where('invoice', array(

			'patient_id' => $this->session->userdata('patient_id')

		))->result_array();

		$this->load->view('index', $page_data);

	}

	public function make_payment()
{
    $invoice_id = $this->input->post('invoice_id');

    $this->db->where('invoice_id', $invoice_id);
    $data['status'] = 'paid';
    $this->db->update('invoice', $data);


    // Respond with a success message if needed
    echo 'Payment status updated successfully!';
}



	/******VIEW COMPLETED PAYMENT HISTORY*****/

	function payment_history($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('patient_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

		

		$page_data['page_name']  = 'payment_history';

		$page_data['page_title'] = get_phrase('payment_history');

		$page_data['payments']   = $this->db->get_where('payment', array(

			'patient_id' => $this->session->userdata('patient_id')

		))->result_array();

		$this->load->view('index', $page_data);

	}

	
	/******make COMPLAINT FORM*****/
	function make_complaints($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('patient_login') != 1) {
			redirect(base_url() . 'index.php?login', 'refresh');
		}
	
		$page_data['page_name'] = 'make_complaints';
		$page_data['page_title'] = get_phrase('make_complaints');
	
		if ($this->input->post('complaint_submitted') == 1) {
			// Form has been submitted, so insert the complaint and set the flash message
	
			// Fetch the submitted data from the form
			$staff_name = $this->input->post('staff_name');
			$profession = $this->input->post('staff_profession');
			$staff_id = $this->input->post('staff_id');
			$complaint_text = $this->input->post('complaint_text');
	
			// You can also fetch the patient's name here if needed
			$patient_id = $this->session->userdata('patient_id');
			$patient_data = $this->db->get_where('patient', array('patient_id' => $patient_id))->row();
	
			// Create an array with the complaint data
			$data = array(
				'name' => $patient_data->name, // Assuming you need the patient's name
				'staff_reported' => $staff_name,
				'staff_profession' => $profession,
				'staff_id' => $staff_id,
				'complaint' => $complaint_text,
				'date_of_complaint' => date('Y-m-d H:i:s'), // Current date and time
			);
	
			// Insert the data into the complaints table
			$this->db->insert('complaints', $data);
		}
	
		// Load the view on the same page
		$this->load->view('index', $page_data);
	}
	
	

	/******VIEW OPERATION HISTORY*****/

	function view_operation_history($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('patient_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

		

		$page_data['page_name']  = 'view_operation_history';

		$page_data['page_title'] = get_phrase('view_operation_history');

		$page_data['reports']    = $this->db->get_where('report', array(

			'patient_id' => $this->session->userdata('patient_id'),

			'type' => 'operation'

		))->result_array();

		$this->load->view('index', $page_data);

	}

	

	

	/******MANAGE OWN PROFILE AND CHANGE PASSWORD***/

	function manage_profile($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('patient_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

		if ($param1 == 'update_profile_info') {

			$data['name']        = $this->input->post('name');

			$data['email']       = $this->input->post('email');

			$data['address']     = $this->input->post('address');

			$data['phone']       = $this->input->post('phone');

			$data['sex']         = $this->input->post('sex');

			$data['birth_date']  = $this->input->post('birth_date');

			$data['age']         = $this->input->post('age');

			$data['blood_group'] = $this->input->post('blood_group');

			

			$this->db->where('patient_id', $this->session->userdata('patient_id'));

			$this->db->update('patient', $data);

			$this->session->set_flashdata('flash_message', get_phrase('profile_updated'));

			redirect(base_url() . 'index.php?patient/manage_profile/', 'refresh');

		}

		if ($param1 == 'change_password') {

			$data['password']             = $this->input->post('password');

			$data['new_password']         = $this->input->post('new_password');

			$data['confirm_new_password'] = $this->input->post('confirm_new_password');

			

			$current_password = $this->db->get_where('patient', array(

				'patient_id' => $this->session->userdata('patient_id')

			))->row()->password;

			if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {

				$this->db->where('patient_id', $this->session->userdata('patient_id'));

				$this->db->update('patient', array(

					'password' => $data['new_password']

				));

				$this->session->set_flashdata('flash_message', get_phrase('password_updated'));

			} else {

				$this->session->set_flashdata('flash_message', get_phrase('password_mismatch'));

			}

			redirect(base_url() . 'index.php?patient/manage_profile/', 'refresh');

		}

		$page_data['page_name']    = 'manage_profile';

		$page_data['page_title']   = get_phrase('manage_profile');

		$page_data['edit_profile'] = $this->db->get_where('patient', array(

			'patient_id' => $this->session->userdata('patient_id')

		))->result_array();

		$this->load->view('index', $page_data);

	}

}