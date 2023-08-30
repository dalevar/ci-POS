<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function index()
	{
		//jika tidak login maka tidak bisa mengakses halaman dashboard
		check_not_login();
		$this->template->load('template', 'dashboard');
	}
}
