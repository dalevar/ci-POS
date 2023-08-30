<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		customers
		<small>Pemasok Barang</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
		<li class="active">customers</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><?= ucfirst($page) ?> Customers</h3>
			<div class="pull-right">
				<a href="<?= site_url('customer') ?>" class="btn btn-warning btn-flat"><i class="fa fa-arrow-left"></i> Back</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<!-- <?php //validation_errors() 
							?> -->
					<form action="<?= site_url('customer/process') ?>" method="post">
						<div class="form-group">
							<label for="customer_name">customer Name *</label>
							<input type="hidden" name="id" value="<?= $row->customer_id ?>">
							<input type="text" name="customer_name" class="form-control" value="<?= $row->name ?>" required>
						</div>
						<div class="form-group">
							<label for="gender">Gender *</label>
							<select name="gender" id="gender" class="form-control" required>
								<option value="">- Pilih -</option>
								<option value="L" <?= $row->gender == 'L' ? 'selected' : '' ?>>Laki-Laki</option>
								<option value="P" <?= $row->gender == 'P' ? 'selected' : '' ?>>Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label for="phone">Phone *</label>
							<input type="number" name="phone" class="form-control" value="<?= $row->phone ?>" required>
						</div>
						<div class="form-group">
							<label for="address">Address *</label>
							<textarea type="text" name="address" class="form-control" value="<?= $row->address ?>" required></textarea>
						</div>


						<div class="form-group">
							<button type="submit" class="btn btn-success btn-flat" name="<?= $page ?>"><i class="fa fa-paper-plane"></i> Save</button>
							<button type="reset" class="btn btn-flat">Reset</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /.content -->