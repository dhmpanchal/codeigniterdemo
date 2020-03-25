<?php include('header.php'); ?>
<div class="container">
  <?php //echo form_open_multipart('Admin/create_article'); ?>
  <form action="<?=base_url('Admin/create_article'); ?>" method="post" enctype="multipart/form-data">
    <fieldset>
      <legend>Add Articles</legend>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label for="username">Article Title</label>
            <input type="text" class="form-control" id="article_title" name="article_title" placeholder="Enter article title" value="<?php set_value('article_title'); ?>">
          </div>
        </div>
        <div class="col-lg-6" style="margin-top:40px;">
          <?php echo form_error('article_title'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label for="password">Article Body</label>
            <textarea id="article_body" name="article_body" rows="10" cols="75" placeholder="Type Here..."></textarea>
          </div>
        </div>
        <div class="col-lg-6" style="margin-top:40px;">
          <?php echo form_error('article_body'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label for="img">Select Image</label>
            <?php //echo form_upload(['name'=>'img','class'=>'form-control']); ?>
            <input type="file" id="img" name="img" class="form-control">
          </div>
        </div>
        <div class="col-lg-6" style="margin-top:40px;">
          <?php if (isset($error_upload)) {
            echo $error_upload;
          } ?>
        </div>
      </div>
      <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('id'); ?>">
      <button type="submit" class="btn btn-primary">Submit</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
    </fieldset>
    </form>
    <?php //echo form_close(); ?>
</div>

<?php include('footer.php'); ?>
