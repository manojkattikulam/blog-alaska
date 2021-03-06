<?php require APPROOT . '/views/inc/header.php';?>

  <div class="container-fluid">
<div class="container">
  
    <div class="row">

    <?php require APPROOT . '/views/admins/admins_inc/admins_nav.php';?>


  <div class="col-md-8">

  <div class="mt-5 p-5">

<h1>Ajouter l'article</h1>
<?php echo flash('post_message'); ?>

  <form action="<?php echo URLROOT; ?>/admins/add" method="post">

    <div class="form-group">
      <label for="text">Titre: <sup>*</sup></label>
      <input type="text" name="titre" class="form-control form-control-lg <?php echo (!empty($data['titre_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['titre']; ?>">
      <span class="invalid-feedback"><?php echo $data['titre_err']; ?></span>
    </div>

    <div class="form-group">
        <label for="contenu">Contenu: <sup>*</sup></label>
        <textarea name="contenu" id="editor" class="form-control form-control-lg <?php echo (!empty($data['contenu_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['contenu']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['contenu_err']; ?></span>
    </div>

    <div class="row">
      <div class="col-md-4">
        <input type="submit" name="submit" value="Ajouter" class="btn btn-success btn-block">
      </div>
    </div>

  </form>

</div>
    

  </div>




  </div>


</div>
  </div>
  



<?php require APPROOT . '/views/inc/footer.php';?>
