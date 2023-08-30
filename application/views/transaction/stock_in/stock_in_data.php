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
	<?php $this->view('message') ?>

	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Data Stock In</h3>
			<div class="pull-right">
				<a href="<?= site_url('stock/in/add') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Add Stock In</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th>#</th>
						<th>Barcode</th>
						<th>Product Item</th>
						<th>Quantity</th>
						<th>Date</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($row as $key => $data) { ?>
						<tr>
							<td style="width: 5%;"><?= $no++ ?>.</td>
							<td><?= $data->barcode ?></td>
							<td><?= $data->item_name ?></td>
							<td class="text-right"><?= $data->qty ?></td>
							<td class="text-center"><?= indo_date($data->date) ?></td>
							<td class="text-center" width="160px">
								<a href="" class="btn btn-primary btn-flat btn-xs" data-toggle="modal" id="set_dtl" data-target="#modal-detail" data-barcode="<?= $data->barcode ?>" data-itemname="<?= $data->item_name ?> " data-detail="<?= $data->detail ?> " data-suppliername="<?= $data->supplier_name ?>" data-qty="<?= $data->qty ?>" data-date="<?= $data->date ?>">
									<i class="fa fa-eye"></i> Detail</a>
								<a href="<?= site_url('stock/in/del/' . $data->stock_id . '/' . $data->item_id) ?>" onclick="return confirm('Yakin ?')" class="btn btn-danger btn-flat btn-xs"><i class="fa fa-trash"></i> Delete</a>
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
<div class="modal fade" id="modal-detail">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Stock In Detail</h4>
			</div>
			<div class="modal-body table-responsive">
				<table class="table table-bordered no-margin">
					<tbody>
						<tr>
							<th>Barcode</th>
							<td><span id="barcode"></span></td>
						</tr>
						<tr>
							<th>Item Name</th>
							<td><span id="item_name"></span></td>
						</tr>
						<tr>
							<th>Detail</th>
							<td><span id="detail"></span></td>
						</tr>
						<tr>
							<th>Supplier Name</th>
							<td><span id="supplier_name"></span></td>
						</tr>
						<tr>
							<th>Quantity</th>
							<td><span id="qty"></span></td>
						</tr>
						<tr>
							<th>Date</th>
							<td><span id="date"></span></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- end modal -->

<script>
	$(document).ready(function() {
		$(document).on('click', '#set_dtl', function() {
			let barcode = $(this).data('barcode');
			let itemname = $(this).data('itemname');
			let detail = $(this).data('detail');
			let suppliername = $(this).data('suppliername');
			let qty = $(this).data('qty');
			let date = $(this).data('date');
			$('#barcode').text(barcode);
			$('#item_name').text(itemname);
			$('#detail').text(detail);
			$('#supplier_name').text(suppliername);
			$('#qty').text(qty);
			$('#date').text(date);
			$('#modal-item').modal('hide');
		});
	});
</script>