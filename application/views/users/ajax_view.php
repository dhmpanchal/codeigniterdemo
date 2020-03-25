<?php include('header.php'); ?>
<div class="container">
  <h1>Dependent Dynamic Selection using Ajax</h1>
  <div class="form-group">
    <select class="form-control input-lg" name="country" id="country">
      <option value="">Select Country</option>
      <?php foreach ($country as $row) {
        echo "<option value='".$row->ID."'>".$row->country_name."</option>";
      } ?>
    </select>
  </div>
  <div class="form-group">
    <select class="form-control input-lg" name="state" id="state">
      <option value="">Select State</option>
    </select>
  </div>
  <div class="form-group">
    <select class="form-control input-lg" name="city" id="city">
      <option value="">Select City</option>
    </select>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#country').change(function(){
      var country_id = $('#country').val();
      if (country_id != '') {
        $.ajax({
          url:"<?php echo base_url(); ?>Users/fatch_states",
          method:'POST',
          data:{country_id:country_id},
          success:function(data)
          {
            $('#state').html(data);
            $('#city').html('<option value="">Select City</option>');
          }
        });
      }
      else {
        $('#state').html('<option value="">Select State</option>');
        $('#city').html('<option value="">Select City</option>');
      }
    });
    $('#state').change(function(){
      var state_id = $('#state').val();
      if (state_id != '') {
        $.ajax({
          url:"<?php echo base_url(); ?>Users/fatch_city",
          method:'POST',
          data:{state_id:state_id},
          success:function(data)
          {
            $('#city').html(data);
          }
        });
      }
      else {
        $('#city').html('<option value="">Select City</option>');
      }
    });
  });
</script>
<?php include('footer.php'); ?>
