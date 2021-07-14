<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	public function index()
	{
		
		$this->load->model('users');
		$this->load->model('services');
		$this->load->helper('date');
		$this->load->helper('url');
		$data['users'] = $this->users->get_user();
		$this->load->view('welcome_message', $data);
	}

	public function postUserService(){
		$this->load->model('users');
		$this->load->model('services');
		$this->load->helper('date');
		$this->load->helper('url');
		$id = $this->input->post('postService');
		$data['users'] = $this->users->get_user_one($id);
        $this->load->view('welcome_message', $data);
	}

	public function deleteUserService($id){
		$this->load->model('users');
		$id = $this->uri->segment('3');
		$data['users'] = $this->users->delete_user_one($id);
        $this->load->view('delete_message', $data);
	}

	public function insertUserServiceView(){
		$this->load->model('users');
		$this->load->model('services');
		$this->load->helper('form');
		$this->load->helper('url');
		$data['users'] = $this->users->get_user();
		$data['services'] = $this->services->get_service_user();
		$this->load->view('insert_message',$data);
	}

	public function addUser(){
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		
		$this->form_validation->set_rules('firstname', 'Firstname', 'required');
		$this->form_validation->set_rules('lastname', 'Lastname', 'required');
		$this->form_validation->set_rules('dob', 'Birthday', 'required');
		$this->form_validation->set_rules('adress', 'Adress', 'required');
		$this->form_validation->set_rules('postalcode', 'Postalcode', 'required');
		$this->form_validation->set_rules('phonenumber', 'Phonenumber', 'required');
		$this->form_validation->set_rules('id_service', 'Id_service', 'required');

		if ($this->form_validation->run() == FALSE)
                {
					$this->load->model('users');
		$this->load->model('services');
					$data['users'] = $this->users->get_user();
		$data['services'] = $this->services->get_service_user();
                    $this->load->view('insert_message',$data);
                }
                else
                {
					$firstname = $this->input->post('firstname', TRUE);
					$lastname = $this->input->post('lastname', TRUE);
					$birthday = $this->input->post('dob', TRUE);
					$adress = $this->input->post('adress', TRUE);
					$postalcode = $this->input->post('postalcode', TRUE);
					$phonenumber = $this->input->post('phonenumber', TRUE);
					$id_service = $this->input->post('id_service', TRUE);
					$dataForm = array(
						'firstname' => $firstname,
						'lastname'  => $lastname,
						'birthday'  => $birthday,
						'adress'  => $adress,
						'postalcode'  => $postalcode,
						'phonenumber'  => $phonenumber,
						'id_service'  => $id_service,
					);
					
					$this->users->add_user($dataForm);
					$this->load->view('success_message');
                }
					
                
		
	}
}
