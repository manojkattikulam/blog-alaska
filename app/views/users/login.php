<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class=" mt-5">
        <?php flash('register_success'); ?>
        
        <h2><i class="fa fa-lock"></i>&nbsp;Se connecter</h2>
       
        <form action="<?php echo URLROOT; ?>/users/login" method="post">
          <div class="form-group">
            <label class="email" for="email"><i class="fa fa-envelope icon">&nbsp;Email: </i> <sup>*</sup></label>
            
            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="password"><i class="fa fa-key icon">&nbsp;Password:</i> <sup>*</sup></label>
            
            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
          </div>
          <div class="row">
            <div class="col">
              <input type="submit" value="Login" class="btn btn-success btn-block">
            </div>
            
          </div>
        </form>
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>