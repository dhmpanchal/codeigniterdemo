<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Administration</title>
    <?= link_tag("Assets/css/bootstrap.min.css") ?>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="#">Admin panel</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <?php if($this->session->userdata('id')): ?>
            <li>
              <a class="nav-link" href="<?= base_url('admin/logout') ?>">Logout</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </nav>
    <script type="text/javascript" src="<?= base_url('Assets/js/jquery.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('Assets/js/bootstrap.min.js') ?>"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
  </body>
</html>
