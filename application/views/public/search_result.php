<?php include('public_header.php'); ?>

<div class="container">
	<table class="table">
		<thead>
			<tr>
				<th>Sr. No:</th>
				<th>Title</th>
				<th>Date</th>
			</tr>
		</thead>
		<tbody>
			<?php if(count($articles)):?>
				<?php $count = $this->uri->segment(4,0);?>
				<?php foreach($articles as $article):?>
					<tr>
						<td> <?= ++$count;?></td>
						<td> <?= $article->title;?></td>
						<td> <?= 'Date';?></td>
					</tr>
				<?php endforeach; ?>
			<?php else:?>
				<tr>
					<td>No Result Found !</td>
				</tr>
			<?php endif;?>
			<?php ?>
		</tbody>
	</table>
	<?php echo $this->pagination->create_links(); ?>
</div>
<?php include('public_footer.php'); ?>