<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('user_m');
		$this->load->library('form_validation');
	}


	public function index()
	{
		$data['row'] = $this->user_m->get();
		$this->template->load('template', 'user/user_data', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('fullname', 'Nama', 'required|min_length[3]');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules(
			'passwordconf',
			'Password Confirmation',
			'required|matches[password]',
			array('matches' => 'Konfirmasi password tidak sama %s')
		);
		$this->form_validation->set_rules('level', 'Level', 'required');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '{field} Terpakai, Silahkan ganti');

		// $this->form_validation->set_error_delimiters('<span class="help-block ', '</span>');


		if ($this->form_validation->run() == false) {
			$this->template->load('template', 'user/user_add');
		} else {
			$post = $this->input->post(null, TRUE);
			$this->user_m->add($post);
			if ($this->db->affected_rows() > 0) {
				echo "<script>
					alert('Data Berhasil Disimpan');
				</script>";
			}
			echo "<script>
			window.location= '" . site_url('user') . "';
		</script>";
		}
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('fullname', 'Nama', 'required|min_length[3]');
		$this->form_validation->set_rules('username', 'Username', 'required|callback_username_check');

		if ($this->input->post('password')) {
			$this->form_validation->set_rules('password', 'Password', 'min_length[5]');
			$this->form_validation->set_rules(
				'passwordconf',
				'Password Confirmation',
				'required|matches[password]',
				array('matches' => 'Konfirmasi password tidak sama %s')
			);
		}

		if ($this->input->post('passwordconf')) {
			$this->form_validation->set_rules(
				'passwordconf',
				'Password Confirmation',
				'matches[password]',
				array('matches' => 'Konfirmasi password tidak sama %s')
			);
		}

		$this->form_validation->set_rules('level', 'Level', 'required');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '{field} Terpakai, Silahkan ganti');

		// $this->form_validation->set_error_delimiters('<span class="help-block ', '</span>');

		if ($this->form_validation->run() == false) {
			$query = $this->user_m->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('template', 'user/user_edit', $data);
			} else {
				echo "<script>
					alert('Data Tidak ditemukan');
				";
				echo "
			window.location= '" . site_url('user') . "';
		</script>";
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->user_m->edit($post);
			if ($this->db->affected_rows() > 0) {
				echo "<script>
					alert('Data Berhasil Disimpan');
				</script>";
			}
			echo "<script>
			window.location= '" . site_url('user') . "';
		</script>";
		}
	}
	//nama callback
	function username_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('username_check', '{field} Ini sudah dipakai, silahkan ganti');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function remove()
	{
		$id = $this->input->post('user_id');
		$this->user_m->remove($id);

		if ($this->db->affected_rows() > 0) {
			echo "<script>
				alert('Data Berhasil Dihapus');
			</script>";
		}
		echo "<script>
		window.location= '" . site_url('user') . "';
	</script>";
	}
}
