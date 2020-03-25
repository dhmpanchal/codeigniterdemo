<?php include('header.php'); ?>
<div class="container">
  <?php foreach ($article as $value):?>
  <?php echo form_open("Admin/edit_article/{$value->ID}"); ?>
    <fieldset>
      <legend>Edit Article</legend>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label for="username">Article Title</label>
            <input type="text" class="form-control" id="article_title" name="article_title" placeholder="Enter article title" value="<?=set_value('article_title',$value->article_title); ?>">
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
            <textarea id="article_body" name="article_body" rows="10" cols="75" placeholder="Type Here..." ><?=set_value('article_body',$value->article_body); ?></textarea>
          </div>
        </div>
        <div class="col-lg-6" style="margin-top:40px;">
          <?php echo form_error('article_body'); ?>
        </div>
      </div>
      <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('id'); ?>">
      <button type="submit" class="btn btn-primary">Update</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
    </fieldset>
    <?php endforeach; ?>
</div>

<?php include('footer.php'); ?>
