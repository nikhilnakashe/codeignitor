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

	//function __construct() {
	//	parent::__construct();
	//	$this->load->model('insert_model');
	//}

	public function index()
	{
		$this->load->view('tasks');

		/*if(empty($_POST['sid']) && empty($_POST['sname']) && empty($_POST['sclass']))
		{
			$this->load->database();

			$this->load->model('select');

			$data['h']=$this->select->select();

			$this->load->view('welcome_message', $data);
		}
		else
		{
			$data=array(
				'sid'=>$this->input->post('sid'),
				'sname'=>$this->input->post('sname'),
				'class'=>$this->input->post('sclass')
			);

			$this->load->model('insert_model');
			$this->insert_model->form_insert($data);

			$this->load->database();

			$this->load->model('select');

			$data['h']=$this->select->select();

			$this->load->view('welcome_message', $data);
			$data['message'] = 'Data Inserted Successfully';

			//View Data


		}*/

	}

	public function delete($row)
	{
		$this->load->database();
		$this->db->where('sid', $row);
		$this->db->delete('DEMOPROJECT');

		$this->load->model('select');

		$data['h']=$this->select->select();

		$this->load->view('welcome_message', $data);
	}

}
