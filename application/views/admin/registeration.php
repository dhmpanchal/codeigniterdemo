<?php include('header.php'); ?>
<div class="container">
  <?php echo form_open('Admin/send'); ?>
    <fieldset>
      <legend>Registration</legend>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First name">
          </div>
        </div>
        <div class="col-lg-6" style="margin-top:40px;">
          <?php echo form_error('first_name'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label for="firstname">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last name">
          </div>
        </div>
        <div class="col-lg-6" style="margin-top:40px;">
          <?php echo form_error('last_name'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label for="firstname">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
          </div>
        </div>
        <div class="col-lg-6" style="margin-top:40px;">
          <?php echo form_error('email'); ?>
        </div>
      </div>
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
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php set_value('password'); ?>">
          </div>
        </div>
        <div class="col-lg-6" style="margin-top:40px;">
          <?php echo form_error('password'); ?>
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
      <button type="submit" class="btn btn-primary">Submit</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
      <a href="<?= base_url(); ?>/Admin/signup">Go to Login</a>
    </fieldset>
</div>

<?php include('footer.php'); ?>
