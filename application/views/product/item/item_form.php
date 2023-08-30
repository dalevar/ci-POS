<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Items
		<small>Data Barang</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
		<li class="active">Items</li>
	</ol>
</section>
</section>

<!-- Main content -->
<section class="content">
	<?php $this->view('message') ?>

	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><?= ucfirst($page) ?> Items</h3>
			<div class="pull-right">
				<a href="<?= site_url('item') ?>" class="btn btn-warning btn-flat"><i class="fa fa-arrow-left"></i> Back</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<!-- <?php //validation_errors() 
							?> -->
					<?php echo form_open_multipart('item/process') ?>
					<div class="form-group">
						<label for="barcode">Barcode *</label>
						<input type="hidden" name="id" value="<?= $row->item_id ?>">
						<input type="text" name="barcode" class="form-control" value="<?= $row->barcode ?>" required>
					</div>
					<div class="form-group">
						<label for="product_name">Product Name *</label>
						<input type="text" name="product_name" class="form-control" value="<?= $row->name ?>" required>
					</div>
					<div class="form-group">
						<label>Category *</label>
						<select name="category" id="" class="form-control" required>
							<option value="">- Pilih -</option>
							<?php foreach ($category->result() as $key => $data) { ?>
								<option value="<?= $data->category_id ?>" <?= $data->category_id == $row->category_id ? "selected" : null ?>>
									<?= $data->name ?>
								</option>

							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label>Unit *</label>
						<?php echo form_dropdown(
							'unit',
							$unit,
							$selectedunit,
							['class' => 'form-control', 'required' => 'required']
						) ?>
					</div>
					<div class="form-group">
						<label for="price">Price *</label>
						<input type="number" name="price" class="form-control" value="<?= $row->price ?>" required>
					</div>
					<div class="form-group">
						<label for="image">Image</label>
						<?php if ($page == 'edit') {
							if ($row->image != null) { ?>
								<div style="margin-bottom: 5px;">
									<img src="<?= base_url('uploads/product/' . $row->image)  ?>" style="80px">
								</div>
						<?php }
						} ?>
						<input type="file" name="image" class="form-control">
						<small>(biarkan kosong jika tidak  <?= $page == 'edit' ? 'diganti' : 'ada' ?>)</small>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success btn-flat" name="<?= $page ?>"><i class="fa fa-paper-plane"></i> Save</button>
						<button type="reset" class="btn btn-flat">Reset</button>
					</div>
					<?php echo form_close() ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /.content -->
