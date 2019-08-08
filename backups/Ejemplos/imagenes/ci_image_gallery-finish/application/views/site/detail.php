<?php $this->load->view("header"); ?>

<div class="page-header">
    		<h1><?php echo $row->title; ?></h1>
    	</div>

    	<div class="row">
    		<div class="col-md-8 col-xs-12">
    			<div class="thumbnail">
			      <img src="<?php echo base_url(); ?>assets/uploads/<?php echo $row->filename; ?>" alt="Image 1">			      
			    </div>
			    <div class="row">
			    	<div class="col-md-3">
			    		<div class="thumbnail">
			    			<?php $thumbnail = empty($left_image->thumbnail) ? $left_image->filename : $left_image->thumbnail; ?>
					      <a href="<?php echo site_url("site/detail/" . $left_image->id) ?>"><img src="<?php echo base_url(); ?>assets/uploads/<?php echo $thumbnail ?>" alt="Image 2"></a>
					    </div>
			    	</div>
			    	<div class="col-md-3 col-md-offset-6">
			    		<div class="thumbnail">
			    			<?php $thumbnail = empty($right_image->thumbnail) ? $right_image->filename : $right_image->thumbnail; ?>
					      <a href="<?php echo site_url("site/detail/" . $right_image->id) ?>"><img src="<?php echo base_url(); ?>assets/uploads/<?php echo $thumbnail; ?>" alt="Image 3"></a>
					    </div>
			    	</div>
			    </div>
    		</div>
    		<div class="col-md-4 col-xs-12">
    			<ul class="list-group">
				  <li class="list-group-item">
				    <i class="glyphicon glyphicon-eye-open"></i> <?php echo $row->view_count + 1 ?> View
				  </li>
				  <li class="list-group-item">
				    <i class="glyphicon glyphicon-download"></i> <?php echo $row->download_count ?> Download
				  </li>
				</ul>
				
				<?php echo form_open("site/download"); ?>
					<input type="hidden" name="image_id" id="image_id" value="<?php echo $row->id ?>">
					<button type="submit" class="btn btn-lg btn-block btn-primary">Download</button>
				<?php echo form_close(); ?>
    		</div>
    	</div>
<?php $this->load->view("footer"); ?>