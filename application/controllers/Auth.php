<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function login()
	{
		//jika sudah login maka dapat mengaksses dashboard dan tidak bisa kembali ke halaman login
		check_already_login();
		$this->load->view('auth/login');
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			//load model 
			$this->load->model('user_m');
			$query = $this->user_m->login($post);
?>

			<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2/cdn.jsdelivr.net_npm_sweetalert2@11_dist_sweetalert2.min.css">
			<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2/cdn.jsdelivr.net_npm_animate.css@4.0.0_animate.min.css">

			<script src="<?= base_url() ?>assets/plugins/sweetalert2/cdn.jsdelivr.net_npm_sweetalert2@11_dist_sweetalert2.min.js"></script>
			<style>
				body {
					font-family: "helvetica Neue", Helvetice, Arial, sans-serif;
					font-size: 1.124em;
					font-weight: normal;
				}
			</style>

			<body></body>
			<?php
			if ($query->num_rows() > 0) { // jika hasil lebih dari 0
				$row = $query->row(); //jika sesuai
				$params = array( //masuk kedalam session 
					'userid' => $row->user_id,
					'level' => $row->level
				);
				$this->session->set_userdata($params); //disimpan disession
				//jika berhasil
			?>
				<script>
					Swal.fire({
						icon: 'success',
						title: 'Success',
						text: 'Login Berhasil',
						showClass: {
							popup: 'animate__animated animate__heartBeat'
						},
					}).then((result) => {
						if (result.isConfirmed) {
							window.location = '<?= site_url('dashboard') ?>';
						}
					})
				</script>
			<?php
			} else { //jika gagal
			?>
				<script>
					Swal.fire({
						icon: 'error',
						title: 'Failure',
						text: 'Login Gagal, username/password salah!',
						showClass: {
							popup: 'animate__animated animate__fadeInDown'
						},
					}).then((result) => {
						if (result.isConfirmed) {
							window.location = '<?= site_url('dashboard') ?>';
						}
					})
				</script>
<?php
			}
		}
	}

	public function logout()
	{
		$params = array(
			'userid', 'level'
		);
		$this->session->unset_userdata($params);
		redirect('auth/login');
	}
}
