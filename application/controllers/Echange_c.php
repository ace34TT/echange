<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once("DB_Controller.php");

class Echange_c extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Echange');
        $this->load->model('User');
        $this->load->model('Objet');
    }
    public function index()
	{
	}  
    public function with_my_objet()
    {   
        $id_objet_other = $this->input->post("id_objet_other");
		$my_objet = $this->input->post("my_objet");
        $this->Echange->insert($id_objet_other,$my_objet);
        redirect('user_c/index');
    } 
    public function with_my_objet_prix($id_objet_other,$my_objet)
    {   
        $this->Echange->insert($id_objet_other,$my_objet);
        redirect('user_c/index');
    } 
    public function confirmer()
    {   
        $id_u1 = $this->input->post("id_u1");
        $id_u2 = $this->input->post("id_u2");
        $id_objet_1 = $this->input->post("id_objet_1");
        $id_objet_2 = $this->input->post("id_objet_2");
        $this->Echange->echanger($id_objet_1,$this->session->userdata('id'),$id_objet_2,$id_u1,$id_u2);
        redirect('user_c/index');
    }
    public function refuser($id_objet1,$id_objet2)
    {   
         $this->Echange->delete_echange($id_objet1,$id_objet2);
        redirect('user_c/index');
    } 
    public function les_10($prix,$id)
	{
        $data = array();
        $data['user'] = $this->User->with_mail( $this->session->userdata('mail'));
        $data['objets']=$this->Echange->estimation($prix);
        $data['content'] = 'page_echange/my_echange_2';
        $data['mine'] = $id;
        $this->load($data);
    }
    public function les_20($prix,$idh)
	{
        $data = array();
        $data['user'] = $this->User->with_mail( $this->session->userdata('mail'));
        $data['objets']=$this->Echange->estimation20($prix);
        $data['content'] = 'page_echange/my_echange_2';
        $data['mine'] = $idh;
        $this->load($data);
        // $dota['user']= $this->session->userdata('user');
		// $dota['categories']=$this->Objet->get_liste_categorie();
        // $this->load->view('template/page_echange/header',$dota);

		// $this->load->view('template/body',$data);
		// $this->load->view('template/page_echange/footer');
	}
    public function my_echange()
    {   
        $data = array();
        $data['user'] = $this->User->with_mail( $this->session->userdata('mail'));
        $data['objets']=$this->Echange->get_my_echange( $data['user']['id']);
        if(count($data['objets'])==0) redirect('user_c/index');
        // echo $this->session->userdata('mail');
        // echo count($data['objets']);
        $data['content'] = 'page_echange/my_echange';
        $this->load($data);
    } 
    public function redir()
    {
        $mot_cle = $this->input->get("mot_cle");
		$categorie = $this->input->get("categorie");
        redirect('echange_c/search?mot_cle='.$mot_cle.'&categorie='.$categorie);
    }
    
    public function search()
    {   
        // $mot_cle = $this->input->post("mot_cle");
		// $categorie = $this->input->post("categorie");
        // $data=array();
        // $data['objets'] = $this->Echange->recherche($mot_cle,$categorie);
		// $data['my_objets'] = $this->Objet->get_liste($this->session->userdata('id'),'true');
		// $data['content'] = 'page_echange/content';
        // redirect(base_url('user_c/load/'.$data));
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
    public function load($data)
	{
        $dota['user']= $this->session->userdata('user');
		$dota['categories']=$this->Objet->get_liste_categorie();
		$this->load->view('template/page_echange/header',$dota);
		// $this->load->view('template/page_echange/header');
		$this->load->view('template/body',$data);
		$this->load->view('template/page_echange/footer');
	}
}