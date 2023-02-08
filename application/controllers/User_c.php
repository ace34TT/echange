<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
include_once("DB_Controller.php");
if(!defined('BASEPATH')) exit('No direct script access allowed');

class User_c extends DB_Controller 
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('User');
		$this->load->model('Objet');
		$this->load->model('Echange');
	}
	
    public function index()
	{
		$data = array();
		$data['user'] = $this->User->with_mail( $this->session->userdata('mail'));
		$this->session->set_userdata('id', $data['user']['id']);
		// echo $data['user']['name'];
		$data['objets'] = $this->Objet->get_liste($data['user']['id'],'false');
		if( $this->input->get("mot_cle")!=null && $this->input->get("categorie")!=null)
		{
			$mot_cle = $this->input->get("mot_cle");
			$categorie = $this->input->get("categorie");
			$data['objets'] = $this->Echange->recherche($mot_cle,$categorie);;	
		}
		$categorie = $this->input->get("categorie");
		$data['my_objets'] = $this->Objet->get_liste($data['user']['id'],'true');
		$img=$this->User->photo_of_id($this->session->userdata('id'));
		$this->session->set_userdata('user', $img);	
        $data['content'] = 'page_echange/content';
		$this->load($data);
	}
	public function my_objet()
	{
		$data = array();
		$data['user'] = $this->User->with_mail( $this->session->userdata('mail'));
		$this->session->set_userdata('id', $data['user']['id']);
		// echo $data['user']['name'];
		$data['objets'] = $this->Objet->get_liste($data['user']['id'],'true');
		$data['my_objets'] = $this->Objet->get_liste($data['user']['id'],'true');
        $data['content'] = 'page_echange/content_mine';
		$this->load($data);
	}
	public function rechercher()
    {   
        $mot_cle = $this->input->get("mot_cle");
		$categorie = $this->input->get("categorie");
		echo $mot_cle;
		echo $categorie;
		$data=array();
		$data['objets']=array();
        $data['objets'] = $this->Echange->recherche($mot_cle,$categorie);
		$data['my_objets'] = $this->Objet->get_liste($this->session->userdata('id'),'true');
		$data['content'] = 'page_echange/content';
		// redirect('user_c/load/'.$data);
		
		$dota['user']=$data['my_objets'][0]['photo_user'];
		$dota['categories']=$this->Objet->get_liste_categorie();
		$this->load->view('template/page_echange/header',$dota);

		$this->load->view('template/page_echange/banner');
		if( $this->User->is_admin($this->session->userdata('id'))) {
			$dataa=array();
			$this->load->model('Echange');
			$dataa['utilisateur_inscrit']=$this->Echange->inscription(); 
			$dataa['echange_effectue']=$this->Echange->echange_effectue(); 
			$data_histo['objets']=$this->Echange->get_my_echange(null);
			$this->load->view('template/page_echange/admin',$dataa);
			$this->load->view('template/page_echange/historique',$data_histo);
		}
		$this->load->view('template/body',$data);
		$this->load->view('template/page_echange/footer');
    } 
	// public function resultat($dota)
	// {
	// 	$data = array();
	// 	$data['objets'] = $dota;
	// 	$data['my_objets'] = $this->Objet->get_liste($this->session->userdata('id'),'true');
	// 	$data['content'] = 'page_echange/content';
	// 	$this->load($data);
	// }
	public function load($data)
	{
		$dota['user']=$this->session->userdata('user');
		$dota['categories']=$this->Objet->get_liste_categorie();
		$this->load->view('template/page_echange/header',$dota);
		$this->load->view('template/page_echange/banner');
		if( $this->User->is_admin($this->session->userdata('id'))) {
			$dataa=array();
			$this->load->model('Echange');
			$dataa['utilisateur_inscrit']=$this->Echange->inscription(); 
			$dataa['echange_effectue']=$this->Echange->echange_effectue(); 
			$data_histo['objets']=$this->Echange->get_my_echange(null);
			$this->load->view('template/page_echange/admin',$dataa);
			$this->load->view('template/page_echange/historique',$data_histo);
		}
		// zzzzecho var_dump( $data['objets']);
        // $this->load->model('Echange');
		// echo var_dump( $this->Echange->recherche('casquette','1'));
		$this->load->view('template/body',$data);
		$this->load->view('template/page_echange/footer');
	}
	
	public function deconexion()
	{
		$this->session->sess_destroy();
		redirect('main/index');
	}
    
}