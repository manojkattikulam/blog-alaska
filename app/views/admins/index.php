<?php require APPROOT . '/views/inc/header.php';?>

  <div class="container-fluid">
    <div class="container">

<div class="row mb-5 ">



        <div class="col-md-3 mt-5">

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
      <th class="text-center align-top" scope="col">Commentaires</th>
      <th class="text-center align-top" scope="col">Commentaires publiers</th>
      <th class="text-center align-top" scope="col">Commentaires dépubliers</th>
      <th class="text-center align-top" scope="col">Commentaires prioritaires en attente</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="display-1 text-center text-dark"><?php echo $data['num_posts']; ?></td>
      <td class="display-1 text-center text-primary"><?php echo $data['num_com']; ?></td>
      <td class="display-1 text-center text-success"><?php echo $data['num_com_publier']; ?></td>
      <td class="display-1 text-center text-warning"><?php echo $data['num_com_depublier']; ?></td>
      <td class="display-1 text-center text-danger"><?php echo $data['num_com_priority']; ?></td>
    </tr>

  </tbody>
</table>



</div>



</div>
</div>
</div>


    <?php require APPROOT . '/views/inc/footer.php';?>