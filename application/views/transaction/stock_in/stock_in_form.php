<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Stock In
		<small>Barang Masuk / Pembelian</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
		<li>Transaction</li>
		<li class="active">Stock In</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Add Stock In</h3>
			<div class="pull-right">
				<a href="<?= site_url('stock') ?>" class="btn btn-warning btn-flat"><i class="fa fa-arrow-left"></i> Back</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<!-- <?php //validation_errors() 
							?> -->
					<form action="<?= site_url('stock/process') ?>" method="post">
						<div class="form-group">
							<label for="date">Date *</label>
							<input type="date" name="date" class="form-control" value="<?= date('Y-m-d') ?>" required>
						</div>
						<div>
							<label for="barcode">Barcode *</label>
						</div>
						<div class="form-group input-group">
							<input type="hidden" name="item_id" id="item_id" required>
							<input type="text" name="barcode" id="barcode" class="form-control" required autofocus>
							<span class="input-group-btn">
								<button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item"><i class="fa fa-search"></i></button>
							</span>
						</div>
						<div class="form-group">
							<label for="item_name">Item Name *</label>
							<input type="text" name="name" id="item_name" class="form-control" readonly>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-8">
									<label for="unit_name">Item unit *</label>
									<input type="text" name="unit_name" id="unit_name" class="form-control" readonly>
								</div>
								<div class="col-md-4">
									<label for="stock">Initial Stock *</label>
									<input type="text" name="stock" id="stock" class="form-control" value="-" readonly>
								</div>
							</div>
							<div class="form-group">
								<label for="detail">Detail *</label>
								<input type="text" name="detail" class="form-control" placeholder="Kulakan / Tambahan / etc" required>
							</div>
							<div class="form-group">
								<label for="detail">Supplier *</label>
								<select name="supplier" id="supplier" class="form-control">
									<option value="">- Pilih -</option>
									<?php foreach ($supplier as $i => $data) {
										echo '<option value="' . $data->supplier_id . '">' . $data->name . '</option>';
									} ?>
								</select>
							</div>
							<div class="form-group">
								<label for="qty">Quantity *</label>
								<input type="number" name="qty" class="form-control" required>
							</div>


						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-flat" name="in_add"><i class="fa fa-paper-plane"></i> Save</button>
							<button type="reset" class="btn btn-flat">Reset</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /.content -->

<!-- MODAL -->
<div class="modal fade" id="modal-item">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Select Prodcut Item</h4>
			</div>
			<div class="modal-body table-responsive">
				<table class="table table-bordered table-striped" id="table1">
					<thead>
						<tr>
							<th>Barcode</th>
							<th>Name</th>
							<th>Unit</th>
							<th>Price</th>
							<th>Stock</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($item as $i => $data) { ?>
							<tr>
								<td><?= $data->barcode ?></td>
								<td><?= $data->name ?></td>
								<td><?= $data->unit_name ?></td>
								<td class="text-right"><?= indo_currency($data->price) ?></td>
								<td class="text-right"><?= $data->stock ?></td>
								<td>
									<button class="btn btn-xs btn-info btn-flat" id="select" data-id="<?= $data->item_id ?>" data-barcode="<?= $data->barcode ?>" data-name="<?= $data->name ?> " data-unit="<?= $data->unit_name ?>" data-stock="<?= $data->stock ?>">
										<i class="fa fa-check"></i>Select</button>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- end modal -->

<script>
	$(document).ready(function() {
		$(document).on('click', '#select', function() {
			let item_id = $(this).data('id');
			let barcode = $(this).data('barcode');
			let name = $(this).data('name');
			let unit_name = $(this).data('unit');
			let stock = $(this).data('stock');
			$('#item_id').val(item_id);
			$('#barcode').val(barcode);
			$('#item_name').val(name);
			$('#unit_name').val(unit_name);
			$('#stock').val(stock);
			$('#modal-item').modal('hide');
		});
	});
</script>