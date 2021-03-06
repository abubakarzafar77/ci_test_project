<?php include('public_header.php'); ?>

<div class="container">
	<table class="table">
		<thead>
			<tr>
				<th>Sr. No:</th>
				<th>Title</th>
				<th>Published on</th>
			</tr>
		</thead>
		<tbody>
			<?php if(count($articles)):?>
				<?php $count = $this->uri->segment(3,0);?>
				<?php foreach($articles as $article):?>
					<tr>
						<td> <?= ++$count;?></td>
						<td> <?= anchor("user/article/$article->id", $article->title);?></td>
						<!-- <td> <?= $article->title;?></td> -->
						<td> <?= date('d M y H:i:s', strtotime($article->created_at));?></td>
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

	<?= $this->pagination->create_links();?>
</div>
<?php include('public_footer.php'); ?>