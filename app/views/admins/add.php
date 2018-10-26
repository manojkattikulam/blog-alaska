<?php require APPROOT . '/views/inc/header.php';?>

  <div class="container-fluid">
<div class="container">
  
    <div class="row">
        <div class="col-md-3  mt-5 ">
        <div >
          <ul class="nav flex-column border border-secondary">
            <h4 class="bg-secondary p-3"><a class="text-white " href="<?php echo URLROOT; ?>/admins/index">ADMIN</a></h4>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>/admins/add">Ajouter(<span class="numCount"><?php echo $data['num_posts']; ?></span>)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>/admins/edit">Modifier</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/admins/comments">Commentaires(<span class="numCount"><?php echo $data['num_com']; ?></span>)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
            </li>
          </ul>
        </div>
      </div>


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
