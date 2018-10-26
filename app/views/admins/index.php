<?php require APPROOT . '/views/inc/header.php';?>

  <div class="container-fluid">
    <div class="container">

<div class="row mb-5 ">


<?php require APPROOT . '/views/admins/admins_inc/admins_nav.php';?>



<div class="col-md-8 mt-5 ">
            <div>
                <h1>
                    <?php echo $data['title']; ?><br/> <span class="text-success"><?php echo $_SESSION['name']; ?> </span>
                </h1>
                <p>
                    <?php echo $data['description']; ?>
                </p>
            </div>

            <table class="table table-bordered">
  <thead>
    <tr>
      <th class="text-center align-top" scope="col">Articles</th>
      <th class="text-center align-top" scope="col">Commentaires publiers</th>
      <th class="text-center align-top" scope="col">Commentaires en attente</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="display-1 text-center text-dark"><?php echo $data['num_posts']; ?></td>
      
      <td class="display-1 text-center text-success"><?php echo $data['num_com_publier']; ?></td>
      <td class="display-1 text-center text-primary"><?php echo $data['num_com']; ?></td>
      
    </tr>

  </tbody>
</table>



</div>



</div>
</div>
</div>


    <?php require APPROOT . '/views/inc/footer.php';?>