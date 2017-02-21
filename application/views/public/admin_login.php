<?php include('public_header.php'); ?>
<div class="container">
	<?php  
		$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
		echo form_open('login/admin_login',$attributes);
	?>
		<fieldset>
			<legend>Legend</legend>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="inputEmail" class="col-lg-2 control-label">Email</label>
						<div class="col-lg-10">
							<?php echo form_input(['name'=>'username','class'=>'form-control','placeholder'=>'Username','value'=>set_value("username")]); ?>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<?php echo form_error('username','<span class="text-danger">','</span>');?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="inputPassword" class="col-lg-2 control-label">Password</label>
						<div class="col-lg-10">
							<?php echo form_password(['value'=>set_value('password'),'name'=>'password','class'=>'form-control','placeholder'=>'Password']); ?>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
				<?php echo form_error('password','<span class="text-danger">','</span>')?>
				</div>
			</div>	
			<div class="form-group">
				<div class="col-lg-10 col-lg-offset-2">
					<?php echo form_reset(['name'=>'reset','class'=>'btn btn-default','value'=>'Reset']); ?>
					<?php echo form_submit(['name'=>'submit','class'=>'btn btn-primary','value'=>'Login']); ?>
				</div>
			</div>
		</fieldset>
	</form>
</div>
<?php include('public_footer.php'); ?>