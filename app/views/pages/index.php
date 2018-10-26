<?php require APPROOT . '/views/inc/header.php';?>

  <div class="container-fluid">

  <div class="jumbotron jumbotron-flud text-center">
    <h1 class="display-3"><?php echo $data['title']; ?></h1>
    <p class="lead"><?php echo $data['description']; ?></p>
  </div>

    <div class="container">


<h2>Les articles</h2>

<div class="row mx-auto">


      <?php foreach ($data['posts'] as $post): ?>



          <div class="card mr-5 " style="width: 20rem; ">
            <div class="card-body">
              <h5 class="card-title bg-success text-white p-3"><?php echo $post->titre; ?></h5>
              <small class="text-danger mt-5"><?php echo $post->date_creation_fr; ?></small>
              <p class="card-text mt-3"><?php echo substr($post->contenu, 0, 150) . '...'; ?></p>
              <p class="float-right"><a href="<?php echo URLROOT; ?>/pages/show/<?php echo $post->posts_id; ?>" class="btn btn-outline-success">Lire plus</a></p>

            </div>
        </div>

    <?php endforeach;?>



</div>


</div>

</div>

<?php require APPROOT . '/views/inc/footer.php';?>