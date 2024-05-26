<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	

	public function create()
	{

		
		$this->load->model('model_music');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nom', 'Nom', 'required');
		$this->form_validation->set_rules('prenom', 'Prénom', 'required');
		$this->form_validation->set_rules('pseudo', 'Pseudo', 'required');
		$this->form_validation->set_rules('email', 'Adresse mail', 'valid_email');
		$this->form_validation->set_rules('password', 'current password', 'min_length[5]|required');
		$this->form_validation->set_rules('cpassword', 'confirm password', 'required|matches[password]');


		if ($this->form_validation->run() === FALSE){
			$this->load->view('layout/header');
			$this->load->view('create_user_form');
			$this->load->view('layout/footer');
		}else{
			$nom = $this->input->post('nom');
			$prenom = $this->input->post('prenom');
			$email = $this->input->post('email');
			$mdp = $this->input->post('password');
			$pseudo = $this->input->post('pseudo');
			$hash = password_hash($mdp, PASSWORD_DEFAULT);

			$user = array(
				"nom" => $nom,
				"prenom" => $prenom,
				"email" => $email,
				"pseudo" => $pseudo,
				"password_hash" => $hash
			);
			
			$this->model_music->addAccount($user);
			redirect('user/auth');
			
		}
	}


	public function auth()
	{
		$this->load->model('model_music');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'current password', 'required');
		$this->form_validation->set_rules('email', 'valid_email', 'required');
		

		if ($this->form_validation->run() === FALSE){
			$this->load->view('layout/header');
			$this->load->view('login');
			$this->load->view('layout/footer');

		}else{
			
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$user = $this->model_music->getAttribute($email);

			if($user && password_verify($password, $user->password_hash)){
				$donneeUser = array(
					'user_id' => $user->user_id,
					'nom' => $user->nom,
					'email' => $user->email,
					'pseudo' => $user->pseudo,
					'logged_in' => TRUE
				);
				$this->session->set_userdata($donneeUser);
				redirect('albums');
			}else{
				redirect('user/create');
			}
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('user/auth');
	}
}
