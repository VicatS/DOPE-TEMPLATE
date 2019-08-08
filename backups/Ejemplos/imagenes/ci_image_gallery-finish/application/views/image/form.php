<?php $this->view("header"); ?>

<div class="page-header clearfix">
	<div class="pull-left">
		<h1>Add Image</h1>
	</div>
	<div class="pull-right" style="line-height:70px;">
		<a href="<?php echo site_url("image") ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
	</div>
</div>

<div class="row">
	<div class="col-md-8">
		<?php echo form_open_multipart("", array("class" => "form-horizontal")) ?>
			<?php $error = form_error("title", '<p class="text-error">', "</p>"); ?>
			<div class="form-group <?php echo $error ? 'has-error' : '' ?>">
				<label for="title" class="col-md-3">Title</label>
				<div class="col-md-9">
					<input type="text" name="title" id="title" value="<?php echo isset($row->title) ? $row->title : '' ?>" class="form-control">
					<?php echo $error; ?>
				</div>
			</div>
			<div class="form-group">
				<label for="title" class="col-md-3">Image</label>
				<div class="col-md-9">
					<div class="fileinput fileinput-new" data-provides="fileinput">
					  <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
					    <img src="<?php echo base_url(); ?>assets/uploads/<?php echo isset($row->thumbnail) ? $row->thumbnail : 'default.jpg' ?>" alt="Image 1">
					  </div>
					  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
					  <div>
					    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="filename"></span>
					    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
					  </div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="title" class="col-md-3">Visibility</label>
				<div class="col-md-2">
					<?php echo form_dropdown("visible", array(1 => "Yes", 0 => "No"), isset($row->visible) ? $row->visible : '', 'class="form-control"'); ?>
					
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-offset-3 col-md-4">
					<input type="submit" value="Save" class="btn btn-primary">
				</div>
			</div>
		</form>
	</div>
</div>

<?php $this->view("footer"); ?>