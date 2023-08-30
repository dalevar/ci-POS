<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Users
		<small>Pengguna</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
		<li class="active">Users</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Edit Users</h3>
			<div class="pull-right">
				<a href="<?= site_url('user') ?>" class="btn btn-warning btn-flat"><i class="fa fa-arrow-left"></i> Back</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<form action="" method="post">
						<div class="form-group <?= form_error('fullname') ? 'has-error' : null ?>">
							<label for="fullname">Name *</label>
							<input type="hidden" name="user_id" value="<?= $row->user_id ?>">
							<input type="text" name="fullname" class="form-control" value="<?= $this->input->post('fullname') ?? $row->name ?>">
							<span class="help-block"><?= form_error('fullname') ?></span>
						</div>
						<div class=" form-group <?= form_error('username') ? 'has-error' : null ?>">
							<label for="username">Username *</label>
							<input type="text" name="username" class="form-control" value="<?= $this->input->post('username') ?? $row->username ?>">
							<span class="help-block"><?= form_error('username') ?></span>
						</div>
						<div class=" form-group <?= form_error('password') ? 'has-error' : null ?>">
							<label for="password">Password </label><small>(Biarkan Kosong jika tidak diganti)</small>
							<input type="password" name="password" class="form-control" value="<?= $this->input->post('password') ?>">
							<span class="help-block"><?= form_error('password') ?></span>
						</div>
						<div class="form-group <?= form_error('passwordconf') ? 'has-error' : null ?>">
							<label for="passwordconf">Password Confirmation</label>
							<input type="password" name="passwordconf" class="form-control" <?= $this->input->post('passwordconf') ?>">
							<span class="help-block"><?= form_error('passwordconf') ?></span>
						</div>
						<div class="form-group">
							<label for="address">address *</label>
							<textarea name="address" class="form-control"><?= $this->input->post('address') ?? $row->address ?></textarea>
						</div>
						<div class="form-group <?= form_error('level') ? 'has-error' : null ?>">
							<label for="level">level*</label>
							<select name="level" class="form-control">
								<?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level ?>
								<option value="1">Admin</option>
								<option value="2" <?= $level == 2 ? 'selected' : null ?>>Kasir</option>
							</select>
							<span class="help-block"><?= form_error('level')  ?></span>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Save</button>
							<button type="reset" class="btn btn-flat">Reset</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /.content -->