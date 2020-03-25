<?php include('header.php'); ?>
<div class="container" style="margin-top:50px;">
  <div class="row">
    <div class="col-lg-6">
      <a href="<?= base_url('admin/addUser') ?>" class="btn btn-primary">Add Article</a>
    </div>
  </div>
  <?php if($msg = $this->session->flashdata('add_art_sucess')): ?>
  <div class="row">
    <div class="col-lg-6 alert alert-success" style="margin-top:40px;">
      <?php echo $msg; ?>
    </div>
  </div>
 <?php elseif($msg = $this->session->flashdata('add_art_error')): ?>
    <div class="row">
      <div class="col-lg-6 alert alert-danger" style="margin-top:40px;">
        <?php echo $msg; ?>
      </div>
    </div>
  <?php endif; ?>
  <div class="table" style="margin-top:20px;">
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Article Title</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php if(count($articles)): ?>
          <?php $c = $this->uri->segment(3); ?>
          <?php foreach ($articles as $art): ?>
            <tr>
              <td><?= ++$c; ?></td>
              <td><?php echo $art->article_title; ?></td>
              <td><a href="<?= base_url(); ?>/Admin/update_article/<?=$art->ID ?>" class="btn btn-primary">Edit</a></td>
              <td><a href="<?= base_url(); ?>/Admin/delete_article/<?=$art->ID ?>" class="btn btn-danger">Delete</a></td>
            </tr>
          <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="3">No data available.</td>
            </tr>
        <?php endif; ?>
      </tbody>
    </table>

    <?php echo $this->pagination->create_links(); ?>
  </div>
</div>
<?php include('footer.php'); ?>
