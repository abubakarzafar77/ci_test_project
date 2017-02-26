<?php include_once('admin_header.php');?>

<!-- <h1>
	Welcome to <?php echo $_SESSION['user_name'];?>
	<?php echo br(); ?>
	Welcome to Dashboard / Admin Panel !
</h1> -->
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-6">
			<?= anchor('admin/add_article','Add Article' ,['class'=>'btn btn-lg pull-right btn-primary']);?>
		</div>
	</div>
	<?php if($feedback = $this->session->userdata('feedback')):?>
		<?php $feedback_class = $this->session->userdata('feedback_class');?>
		<div class="row">
			<div class="col-md-6">
				<div class="alert alert-dismissible <?= $feedback_class ;?>">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?= $feedback ;?>
				</div>
			</div>
		</div>
	<?php endif ;?>
</div>
<div class="container">
	<table class="table">
		<thead>
			<tr>
				<th>Sr:No</th>			
				<th>Title</th>			
				<th>Body</th>			
				<th>Action</th>			
			</tr>
		</thead>
		<tbody>
			<?php if(count($article_list)):?>
				<?php foreach($article_list as $article):?>	
				<tr>
					<td>1</td>
					<td><?= $article->title; ?></td>
					<td><?= $article->body; ?></td>
					<td>
						<a class="btn btn-primary">Edit</a>
						<a class="btn btn-danger">Delete</a>
					</td>
				</tr>
				<?php endforeach; ?>
			<?php else:?>
				<tr>
					<td colspan="4">No result found !!</td>
				</tr>
			<?php endif;?>
		</tbody>
	</table>
</div>

<?php include_once('admin_footer.php');?>
