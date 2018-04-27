<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">
<div class="container">

<?php echo $flashPartialView;?>

  <?php
  $attributes = array('id' => 'formLogin', 'class' => 'form-signin');
  echo form_open('connection/login', $attributes); ?>

  <h1 style="text-align: center; color: white; font-family: verdana;"><b>Welcome to Room Booking Page</b></h1>
  <div class="card card-container">
    <img src="<?php echo base_url(); ?>assets/images/logo.png" />
    <p id="profile-name" class="profile-name-card"></p>
      <div class="form-group" id="email">
        <span id="reauth-email" class="reauth-email"></span>
        <input type="text" id="inputEmail" name="login" class="form-control" placeholder="Email address" required autofocus>
      </div>
      <div class="form-group" id="password">
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
      </div>
      <button class="btn btn-lg btn-primary btn-block btn-signin"  type="submit">Login Now</button>
    <a href="<?php base_url(); ?>reset_pwd" class="forgot-password">
      Forgot password?
    </a>
    <br>
    <a href="<?php base_url(); ?>register" class="forgot-password">
      <b>Register Now!</b>
    </a>
  </div>
    <?php echo validation_errors() ?></form>

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
