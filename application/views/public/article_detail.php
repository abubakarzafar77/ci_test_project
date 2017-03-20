<?php  include('public_header.php');?>

<div class="container">
	<h1><?php echo $art->title;?> <small><?= date('d M y H:i:s', strtotime($art->created_at));?></small></h1>
	<p><?php echo $art->body;?></p>

	<?php if($art->image_path):?>
		<img src="<?= $art->image_path ?>" alt="">
	<?php else:?>
		<h3>No image</h3>
	<?php endif;?>
</div>

<?php  include('public_footer.php');?>