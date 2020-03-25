<?php include('header.php'); ?>
<div class="container">
  <h1><?=$title; ?></h1>
  <div class="row">
    <div class="col-lg-12">
      <form action="<?=base_url(); ?>Users/createCSV" method="post">
        <button type="submit" class="btn btn-success">Export</button>
      </form>
    </div>
  </div>
  <div class="table" style="margin-top:20px;">
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Email</th>
          <th>Feedback</th>
        </tr>
      </thead>
      <tbody>
          <?php $c = 0; ?>
          <?php foreach($feedbackInfo as $value):?>
            <?php ++$c; ?>
            <tr>
              <td><?php echo $c; ?></td>
              <td><?php echo $value->name; ?></td>
              <td><?php echo $value->email; ?></td>
              <td><?php echo $value->feedbak; ?></td>
            </tr>
          <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?php include('footer.php'); ?>
