<?php include('header.php'); ?>
<div class="container">
  <?php echo form_open('Admin/index'); ?>
    <fieldset>
      <legend>Admin login</legend>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label for="username">User Name</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter user name" value="<?php set_value('username'); ?>">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
        </div>
        <div class="col-lg-6" style="margin-top:40px;">
          <?php echo form_error('username'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          </div>
        </div>
        <div class="col-lg-6" style="margin-top:40px;">
          <?php echo form_error('password'); ?>
        </div>
      </div>
      <?php if($error = $this->session->flashdata('login_faild')): ?>
      <div class="row">
        <div class="col-lg-6 alert alert-danger" style="margin-top:40px;">
          <?php echo $error; ?>
        </div>
      </div>
      <?php endif; ?>
      <button type="submit" class="btn btn-primary">Login</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
      <?php echo anchor('Admin/register','Sign Up','class="btn btn-primary"') ?>
    </fieldset>
</div>

<?php include('footer.php'); ?>
