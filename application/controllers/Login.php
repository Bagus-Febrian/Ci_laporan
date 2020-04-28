<?php
class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->load->view('view_login');
	}
	function autentikasi_user(){
		$username = htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
		$password = htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

		echo $username."<br>";
		$password = md5($password);
		echo $password;


		$cek_user = $this->model_masyarakat->cari_user($username, $password);

		if ($cek_user->num_rows() > 0){
			$data = $cek_user->row_array();
			$this->session->set_userdata('masuk', TRUE);
			if ($data['level'] == 'masyarakat'){
				$this->session->set_userdata('level','masyarakat');
				$this->session->set_userdata('ses_username',$data['username']);
				$this->session->set_userdata('ses_password', $data['password']);
				redirect('main/dashboard');
			}elseif ($data['level'] == 'admin') {
				$this->session->set_userdata('level','masyarakat');
				$this->session->set_userdata('ses_username',$data['username']);
				$this->session->set_userdata('ses_password', $data['password']);
				redirect('panel');
			}elseif ($data['level'] == 'petugas') {
				$this->session->set_userdata('level','masyarakat');
				$this->session->set_userdata('ses_username',$data['username']);
				$this->session->set_userdata('ses_password', $data['password']);
				redirect('panel');
			}
		}else{
			redirect('login');
		}

	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
  	}

	public function register(){
		$this->load->view('view_register.php');
	}
}
