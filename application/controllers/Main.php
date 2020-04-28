<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	
	public function index(){
		$this->load->view('view_halamanawal.php');
	}

	public function dashboard(){
		$this->load->view("dashboard.php");
	}
	public function table(){
		$this->load->view("view_tablelaporan.php");
	}
	public function input(){
		$this->load->view("view_inputpengaduan.php");
	}
}
