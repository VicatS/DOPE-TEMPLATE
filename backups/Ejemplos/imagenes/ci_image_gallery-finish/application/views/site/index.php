<?php $this->load->view("header"); ?>
<div class="row">

  <?php if ($query->num_rows()): ?>
    <?php foreach ($query->result() as $row): ?>

    <div class="col-lg-3 col-md-4 col-sm-6">
      <div class="thumbnail">
        <a href="<?php echo site_url("site/detail/" . $row->id) ?>">
          <?php $thumbnail = empty($row->thumbnail) ? $row->filename : $row->thumbnail; ?>
          <img src="<?php echo base_url(); ?>assets/uploads/<?php echo $thumbnail; ?>" alt="<?php echo $row->title; ?>"></a>
        <div class="thumbnail-caption">
          <h4><a href="<?php echo site_url("site/detail/" . $row->id) ?>"><?php echo $row->title; ?></a></h4>
        </div>
      </div>
    </div><!-- /.col-lg-3.col-md-4.col-sm-6 -->

    <?php endforeach; ?>
  <?php endif; ?>
  

</div><!-- ./row -->

<nav class='text-center'>
	<?php echo $links; ?>
</nav>

<?php $this->load->view("footer"); ?>