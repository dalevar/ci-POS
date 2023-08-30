<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('Supplier_m');
	}

	public function index()
	{
		$data['row'] = $this->Supplier_m->get();
		$this->template->load('template', 'Supplier/supplier_data', $data);
	}

	public function add()
	{
		$supplier = new stdClass();
		$supplier->supplier_id = null;
		$supplier->name = null;
		$supplier->phone = null;
		$supplier->address = null;
		$supplier->description = null;

		$data = array(
			'page' => 'add',
			'row' => $supplier
		);
		$this->template->load('template', 'Supplier/supplier_form', $data);
	}

	public function edit($id)
	{
		$query = $this->Supplier_m->get($id);
		if ($query->num_rows() > 0) {
			$supplier = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $supplier
			);
			$this->template->load('template', 'Supplier/supplier_form', $data);
		} else {
			echo "<script>
					alert('Data Tidak ditemukan');
				";
			echo "
			window.location= '" . site_url('supplier') . "';
		</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->Supplier_m->add($post);
		} else if (isset($_POST['edit'])) {
			$this->Supplier_m->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
			echo "<script>
				alert('Data Berhasil Disimpan');
			</script>";
		}
		echo "<script>
		window.location= '" . site_url('supplier') . "';
	</script>";
	}



	public function delete($id)
	{
		$this->Supplier_m->delete($id);
		$error = $this->db->error();
		if ($error['code'] != 0) {
			echo "<script>
				alert('Data tidak dapat dihapus sudah Ber relasi');
			</script>";
		}
		if ($this->db->affected_rows() > 0) {
			echo "<script>
				alert('Data Berhasil Dihapus');
			</script>";
		}
		echo "<script>
		window.location= '" . site_url('supplier') . "';
	</script>";
	}
}
