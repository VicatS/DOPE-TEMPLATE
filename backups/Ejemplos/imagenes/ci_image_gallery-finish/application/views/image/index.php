<?php $this->view("header"); ?>

<div class="page-header clearfix">
	<div class="pull-left">
		<h1>List Image</h1>
	</div>
	<div class="pull-right" style="line-height:70px;">
		<a href="<?php echo site_url("image/create") ?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Add New</a>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<?php 
			$message = $this->session->flashdata("message"); 
			if (! empty($message)) :
		?>
		<div class="alert alert-success">
			<?php echo $message; ?>	
		</div>
		<?php endif; ?>

		<table class="table table-bordered">
			<thead>
				<tr>
					<th width="10">No</th>
					<th width="200">Thumbnail</th>
					<th>Title</th>
					<th width="50">Visibility</th>
					<th width="120">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = $this->uri->segment(3, 0) + 1 ?>
				<?php foreach ($query->result() as $row): ?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td>
							<div class="thumbnail">
								<?php $thumbnail = empty($row->thumbnail) ? $row->filename : $row->thumbnail; ?>
								<img width="200" src="<?php echo base_url(); ?>assets/uploads/<?php echo $thumbnail; ?>" alt="Image 1">
							</div>
						</td>
						<td><?php echo $row->title; ?></td>
						<td>
							<?php if ($row->visible == 1): ?>
								<span class="label label-success">Visible</span>
							<?php else: ?>	
								<span class="label label-default">Invisible</span>
							<?php endif; ?>
						</td>
						<td>
							<a href="<?php echo site_url("image/update/" . $row->id) ?>" class="btn btn-xs btn-default">Edit</a>
							<a href="<?php echo site_url("image/delete/" . $row->id) ?>" onclick="javascript:return confirm('Are you sure ?')" class="btn btn-xs btn-danger">Delete</a>
						</td>
					</tr>
				<?php endforeach; ?>
				
			</tbody>
		</table>

		<nav class='text-center'>
			<?php echo $links; ?>
		</nav>			
		
	</div>
</div>

<?php $this->view("footer"); ?>