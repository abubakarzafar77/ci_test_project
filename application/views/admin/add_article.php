<?php include_once('admin_header.php'); ?>

<div class="container">
	<?php 
	$form_attributes = array('class'=>'form-horizontal','id'=> 'add_form');
	echo form_open_multipart('admin/store_article', $form_attributes); 
	echo form_hidden('user_id', $this->session->userdata('user_id'));
	echo form_hidden('created_at', date('Y-m-d H:i:s'));
	?>
	<fieldset>
		<legend>Add Article</legend>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="title" class="control-label col-md-4">Article Title</label>
					<div class="col-md-8">
						<?php echo form_input(['name'=>'title','value'=>set_value('title'), 'placeholder'=>'Article Title', 'class'=>'form-control','id'=>'title']) ?>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<?php echo form_error('title','<span class="text-danger">','</span>');?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="body" class="control-label col-md-4">Article Body</label>
					<div class="col-md-8">
						<?php echo form_textarea(['name'=>'body','value'=>set_value('body'), 'placeholder'=>'Article Body', 'class'=>'form-control','id'=>'body']) ?>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<?php echo form_error('body','<span class="text-danger">','</span>');?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="body" class="control-label col-md-4">Upload Image</label>
					<div class="col-md-8">
						<?php echo form_upload(['name'=>'file']) ?>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<?php if(isset($upload_error)){echo $upload_error;}?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<div class="col-md-8 col-md-offset-4">
						<?php echo form_reset(['name'=>'reset','class'=>'btn btn-default','value'=>'Reset']); ?>
						<?php echo form_submit(['name'=>'submit','class'=>'btn btn-primary','value'=>'Add Article']); ?>
					</div>
				</div>
			</div>
		</div>
	</fieldset>
	
	<?php echo form_close();?>
</div>

<?php include_once('admin_footer.php'); ?>