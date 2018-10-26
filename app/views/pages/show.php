<?php require APPROOT . '/views/inc/header.php';?>

  <div class="jumbotron jumbotron-flud text-center">
    <h1 class="display-3"><?php echo $data['title']; ?></h1>
    <p class="lead"><?php echo $data['description']; ?></p>

  </div>


  <div class="container">

<?php flash('post_message');?>

  <a href="<?php echo URLROOT; ?>/pages" class="btn btn-light"><i class="fa fa-backward"></i>&nbsp;Retour</a>
  <br><br>


  <div class="card card-body mb-3">
      <h2 class="text-success"><?php echo $data['titre']; ?></h2>
      <small class="mb-3 text-primary"><?php echo $data['date']; ?></small>
      <p><?php echo $data['contenu']; ?></p>

  </div>

  <h4 class="mt-5">Ajouter une Commentaire</h4>

  <div class="container  mb-5">

    <div class="mt-5">



        <form action="<?php echo URLROOT; ?>/pages/show/<?php echo $data['id']; ?>" method="post">

          <input type="hidden" name="article_id" value="<?php echo $data['id']; ?>">
          <br>

        <div class="form-group">
          <label for="pseudo">Pseudo: <sup>*</sup></label>
          <input type="text" name="pseudo" class="form-control form-control-lg <?php echo (!empty($data['pseudo_err'])) ? 'is-invalid' : ''; ?>" value="<?php if (isset($data['pseudo'])) {echo $data['pseudo'];} else {echo '';}?>">
            <span class="invalid-feedback"><?php echo $data['pseudo_err']; ?></span>
        </div>



         <div class="form-group">
            <label for="email">Email: <sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php if (isset($data['email'])) {echo $data['email'];} else {echo '';}?>">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>


          <div class="form-group">
            <label for="commentaire">Commentaire: <sup>*</sup></label>
            <textarea name="commentaire"  class="form-control form-control-lg <?php echo (!empty($data['commentaire_err'])) ? 'is-invalid' : ''; ?>"><?php if (isset($data['commentaire'])) {echo $data['commentaire'];} else {echo '';}?></textarea>
            <span class="invalid-feedback"><?php echo $data['commentaire_err']; ?></span>
        </div>


          <input type="checkbox" name="priority" value="Priorité"> Signaler comme prioritaire<br>
          <br><br>


          <div class="row">
          <div class="col-md-4">
            <input type="submit" name="submit" id= "submit" value="Ajouter" class="btn btn-success btn-block">
          </div>
        </div>
        </form>

      </div>

  </div>


<div class="col ml-5">


<?php foreach ($data['comments'] as $post): ?>

        <div class="card-body mt-3">
        <div class="bg-light border border-success p-3">
          <h5 class="card-title text-success">Pseudo: <?php echo $post->comment_author; ?></h5>
          <small ><?php echo $post->comment_date_fr; ?></small>&nbsp;&nbsp;
          <small class="text-primary font-italic"><?php echo $post->comment_email; ?></small>
          <p class="card-text mt-2"><span class="font-weight-bold ">Commentaires:</span>&nbsp; <?php echo $post->comment_text; ?></p>

        </div>

        </div>

  <?php endforeach;?>


</div>


</div>





<?php require APPROOT . '/views/inc/footer.php';?>
