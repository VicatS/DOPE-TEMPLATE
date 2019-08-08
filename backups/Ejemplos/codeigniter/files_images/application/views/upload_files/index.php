<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
ul.gallery {
    clear: both;
    float: left;
    width: 100%;
    margin-bottom: -10px;
    padding-left: 3px;
}
ul.gallery li.item {
    width: 25%;
    height: 215px;
    display: block;
    float: left;
    margin: 0px 20px 20px 0px;
    font-size: 12px;
    font-weight: normal;
    background-color: #d3d3d3;
    padding: 10px;
    box-shadow: 10px 10px 5px #888888;
}

.item img{width: 100%; height: 184px;}

.item p {
    color: #6c6c6c;
    letter-spacing: 1px;
    text-align: center;
    position: relative;
    margin: 5px 0px 0px 0px;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-12">
                <!-- display status message -->
                <p><?php echo $this->session->flashdata('statusMsg'); ?></p>
            </div>
            <!-- file upload form -->
            <form method="post" action="" enctype="multipart/form-data">
            <div class="col-lg-12">
                <div class="col-lg-6">
                     <div class="form-group">
                    <label>Choose Files</label>
                        <input type="file" class="form-control" name="files[]" multiple/>
                        <input type="text" name="descripcion[]" multiple>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Choose Files</label>
                        <input type="file" class="form-control" name="files[]" multiple/>
                        <input type="text" name="descripcion[]" multiple>
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-control" type="submit" name="fileSubmit" value="UPLOAD"/>
                </div>
            </div>
            </form>
        </div>
        
        <!-- display uploaded images -->
        <div class="col-lg-12">
            <div class="row">
                <ul class="gallery">
                    <?php if(!empty($files)){ foreach($files as $file){ ?>
                    <li class="item">
                        <img src="<?php echo base_url('uploads/files/'.$file['file_name']); ?>" >
                        <p>Uploaded On <?php echo date("j M Y",strtotime($file['uploaded_on'])); ?></p>
                    </li>
                    <?php } }else{ ?>
                    <p>Image(s) not found.....</p>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>