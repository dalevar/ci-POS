<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Sales
		<small>Penjualan</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
		<li>Transaction</li>
		<li class="active">Sales</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-lg-4">
			<div class="box box-widget">
				<div class="box-body">
					<table width="100%">
						<tr>
							<td style="vertical-align: top;">
								<label for="date">Date</label>
							</td>
							<td>
								<div class="form-group">
									<input type="date" id="date" value="<?= date('Y-m-d') ?>" class="form-control">
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align: top; width:30%">
								<label for="kasir">Kasir</label>
							</td>
							<td>
								<div class="form-group">
									<input type="text" id="user" value="<?= $this->fungsi->user_Login()->name ?>" class="form-control" readonly>
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align: top;">
								<label for="customer">Customer</label>
							</td>
							<td>
								<div>
									<select id="customer" class="form-control">
										<option value="">Umum</option>
										<?php foreach ($customer as $cust => $value) {
											echo '<option value="' . $value->customer_id . '">' . $value->name . '</option>';
										} ?>
									</select>
								</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>

		<div class="col-lg-4">
			<div class="box box-widget">
				<div class="box-body">
					<table width="100%">
						<tr>
							<td style="vertical-align: top; width:30%">
								<label for="barcode">Barcode</label>
							</td>
							<td>
								<div class="form-group">
									<input type="hidden" id="item_id">
									<input type="hidden" id="price">
									<input type="hidden" id="stock">
									<input type="text" id="barcode" class="form-control" autofocus>
									<span class="input-group-btn">
										<button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
											<i class="fa fa-search"></i>
										</button>
									</span>
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align: top;">
								<label for="qty">Qty</label>
							</td>
							<td>
								<div class="form-group">
									<input type="number" id="qty" value="1" min="1" class="forn-control">
								</div>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<div>
									<button type="button" id="add_cart" class="btn btn-primary">
										<i class="fa fa-cart-plus"></i> Add
									</button>
								</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>

		<div class="col-lg-4">
			<div class="box box-widget">
				<div class="box-body">
					<div align="right">
						<h4>Invoice <b><span id="invoice"><?= $invoice ?></span></b></h4>
						<h1><b><span id="grand_total12" style="font-size:50pt;">0</span></b></h1>
					</div>
				</div>
			</div>

		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="box box-widget">
					<div class="box-body table-responsive">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Barcode</th>
									<th>Product Item</th>
									<th>Price</th>
									<th>Qty</th>
									<th width="10%">Discord Item</th>
									<th width="15%">Total</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody id="cart_table">
								<tr>
									<td colspan="9" class="text-center">Tidak ada item</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-3">
				<div class="box box-widget">
					<div class="box-body">
						<table width="100%">
							<tr>
								<td style="vertical-align: top; width:30%">
									<label for="sub_total">Sub Total</label>
								</td>
								<td>
									<div class="form-group">
										<input type="number" id="sub_total" value="" class="form-control" readonly>
									</div>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;">
									<label for="sub_total">Discount</label>
								</td>
								<td>
									<div class="form-group">
										<input type="number" id="discount" value="" min="0" class="form-control">
									</div>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;">
									<label for="sub_total">Grand Total</label>
								</td>
								<td>
									<div class="form-group">
										<input type="number" id="grand_total" value="" min="0" class="form-control" readonly>
									</div>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>

			<div class="col-lg-3">
				<div class="box box-widget">
					<div class="box-body">
						<table width="100%">
							<tr>
								<td style="vertical-align: top; width:30%">
									<label for="cash">Cash</label>
								</td>
								<td>
									<div class="form-group">
										<input type="number" id="cash" value="" min="0" class="form-control">
									</div>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;">
									<label for="change">Change</label>
								</td>
								<td>
									<div class="form-group">
										<input type="number" id="change" class="form-control" readonly>
									</div>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>

			<div class="col-lg-3">
				<div class="box box-widget">
					<div class="box-body">
						<table width="100%">
							<tr>
								<td style="vertical-align: top; width:30%">
									<label for="note">Note</label>
								</td>
								<td>
									<div>
										<textarea type="number" id="note" rows="3" class="form-control"></textarea>
									</div>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>

			<div class="col-lg-3">
				<div class="box-body">
					<button id="cancel_paymeny" class="btn btn-flat btn-warning">
						<i class="fa fa-refresh"></i> Cancel
					</button><br><br>
					<button id="process_payment" class="btn btn-flat btn-lg btn-success">
						<i class="fa fa-paper-plane-o"></i> Process Paymeny
					</button>
				</div>
			</div>
		</div>
	</div>



	</div>
</section>
<!-- /.content -->
