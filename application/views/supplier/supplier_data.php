<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Suppliers
		<small>Pemasok Barang</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
		<li class="active">Suppliers</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Data Supplies</h3>
			<div class="pull-right">
				<a href="<?= site_url('supplier/add') ?>" class="btn btn-primary btn-flat"><i class="fa fa-user-plus"></i> Create</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Phone</th>
						<th>Address</th>
						<th>Description</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($row->result() as $key => $data) { ?>
						<tr>
							<td style="width: 5%;"><?= $no++ ?>.</td>
							<td><?= $data->name ?></td>
							<td><?= $data->phone ?></td>
							<td><?= $data->address ?></td>
							<td><?= $data->description ?></td>
							<td class="text-center" width="160px">
								<a href="<?= site_url('supplier/edit/' . $data->supplier_id) ?>" class="btn btn-primary btn-flat btn-xs"><i class="fa fa-pencil"></i> Edit</a>
								<!-- <a href="<?= site_url('supplier/delete/' . $data->supplier_id) ?>" onclick="return confirm('Yakin ?')" class="btn btn-danger btn-flat btn-xs"><i class="fa fa-trash"></i> Delete</a> -->
								<a href="#modalDelete" onclick="$('#modalDelete #formDelete').attr('action', '<?= site_url('supplier/delete/' . $data->supplier_id) ?>')" class="btn btn-danger btn-flat btn-xs" data-toggle="modal"><i class="fa fa-trash"></i> Delete</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>
<!-- /.content -->


<!-- MODAL -->
<div class="modal fade" id="modalDelete">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Yakin akan mengahpus data?</h4>
			</div>
			<div class="modal-body">
				<form action="" method="post" id="formDelete">
					<button type="submit" class="btn btn-danger">Hapus</button>
					<button class="btn btn-default" data-dismiss="modal">Tidak</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- end modal -->
