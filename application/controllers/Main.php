<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('User');
		$this->load->model('Generalite');
    }
	public function index()
	{
		// $this->load->view('page/login2');
		$data['content']='form/login2';
		$this->form($data);
	}
	public function login()
	{
		$mail = $this->input->post("mail");
		$password = $this->input->post("password");
		$data=$this->User->log_correct($mail,$password);
		if($data['success'])
		{
			$this->session->set_userdata('mail', $mail);
			redirect('user_c/index');
		} elseif(!$data['success']) {

			if($this->Generalite->is_empty_tab($data)) redirect('Main/index');
			else { 
				$data['content']='form/login2';
				$this->form($data);
			}
		}
	}
	// public function upload()
    // {
    //   $files = $this->input->files("avatar");
    //   $data=$this->Model->check_upload($files);
    //   if($data['success'])
    //   {
    //     echo 'upload done !';
    //   } elseif(!$data['success']) {
    //       $data['content']='form/uploader';
    //       $this->form($data);
    //     }
    //   }
    // } 
	public function insert()
	{
		$mail = $this->input->post("mail");
		$name = $this->input->post("name");
		$password = $this->input->post("password");
		$password_again = $this->input->post("password_again");
		$date_naissance = $this->input->post("date_naissance");
		$data=$this->User->transact(true,null,$mail,$name,$password,$password_again,$date_naissance);
		if($data['success'])
		{
			$files = $_FILES["avatar"];
			$data=$this->User->check_upload($files,'assets/img/echanges/users/');
			if($data['success'])
			{
				$this->User->insert_new_photo($files['name']);
				redirect('Main/index');

			} elseif(!$data['success']) {
				$data['content']='form/sign_up2';
				$this->form($data);
				}
			
			// redirect('Main/index');
		} elseif(!$data['success']) {
			$data['content']='form/sign_up2';
			$this->form($data);
		}
	}
	public function form($data)
	{
		$this->load->view('template/form/header2');
		$this->load->view('template/body',$data);
		$this->load->view('template/form/footer2');
	}
	// public function form($data)
	// {
	// 	$this->load->view('template/page_echange/header');
	// 	$this->load->view('template/body',$data);
	// 	$this->load->view('template/page_echange/footer');
	// }
	public function sign_up()
	{
		$data['content']='form/sign_up2';
		$this->form($data);
	}
}
