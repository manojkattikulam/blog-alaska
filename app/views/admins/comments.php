<?php require APPROOT . '/views/inc/header.php';?>

  <div class="container-fluid">
<div class="container">

    <div class="row">
        <div class="col-md-3  mt-5 ">
        <div >
          <ul class="nav flex-column border border-secondary">
            <h4 class="bg-secondary p-3"><a class="text-white " href="<?php echo URLROOT; ?>/admins/index">ADMIN</a></h4>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>/admins/add">Ajouter</a>
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


  <div class="col-md-9">

  <div class=" mt-5">
    <h1>Grée vos Commentaires</h1>
    <?php echo flash('post_message'); ?>
  </div>
<table class="table table-bordered">
  <thead>
    <tr>

      <th scope="col">Pseudo</th>
      <th scope="col">Email</th>
      <th scope="col">Commentaires</th>
      <th scope="col">Date</th>
      <th scope="col">Statut</th>
      <th scope="col">Priority</th>
      <th scope="col">Publier</th>
      
      <th scope="col">Supprimer</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($data['admin_cposts'] as $com): ?>
    <tr>
      <td><?php echo $com->comment_author; ?></td>
      <td><?php echo $com->comment_email; ?></td>
      <td><?php echo $com->comment_text; ?></td>
      <td><?php echo $com->comment_date_fr; ?></td>

      <?php if ($com->comment_status == 'Publié') {?>
            <td class="text-success"><?php echo $com->comment_status; ?></td>
      <?php } else if ($com->comment_status == 'Non Publié') {?>
            <td class="text-danger"><?php echo $com->comment_status; ?></td>
      <?php }?>

      <td class="text-primary"><?php echo $com->comment_priority; ?></td>

      <td>
        <form action="<?php echo URLROOT; ?>/admins/publierComments/<?php echo $com->comment_id; ?>" method="post">
          <input type="submit" value="Publier" class="btn btn-success">
        </form>
      </td>
      <td>
        <form action="<?php echo URLROOT; ?>/admins/deleteComments/<?php echo $com->comment_id; ?>" method="post">
          <input type="submit" value="Supprimer" class="btn btn-danger">
        </form>
      </td>


    </tr>
    <?php endforeach;?>
  </tbody>
</table>


  </div>
</div>
</div>
</div>
  <?php require APPROOT . '/views/inc/footer.php';?>