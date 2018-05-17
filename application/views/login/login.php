<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">
<div class="container">

<?php echo $flashPartialView;?>

  <?php
  $attributes = array('id' => 'formLogin', 'class' => 'form-signin');
  echo form_open('connection/login', $attributes); ?>
    <?php echo validation_errors() ?>
    <div class="card card-container">
      <img src="<?php echo base_url(); ?>assets/images/logo_login.png" />
      <p id="profile-name" class="profile-name-card"></p>
      <div class="form-group" id="email">
        <span id="reauth-email" class="reauth-email"></span>
        <input type="text" id="username" name="login" class="form-control" placeholder="Username" required autofocus>
      </div>
      <div class="form-group" id="password">
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
      </div>
      <button class="btn btn-lg btn-primary btn-block btn-signin"  type="submit">Login Now</button>
      <a href="#" class="forgot-password">
        Forgot password?
      </a>
      <br>

    </div>
  </form>

</div> <!-- /container -->

<script>
    $(function(){
      $('.form-control').keypress(function(event) {
          if (event.keyCode == 13 || event.which == 13) {
              $('#formLogin').submit();
          }
      });
    });
</script>
