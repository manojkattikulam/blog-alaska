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

  <div class="mt-5">
    <h1>Modifier ou Supprimer les articles</h1>
    <?php echo flash('post_message'); ?>
  </div>

<table class="table table-bordered">
  <thead>
    <tr>

      <th scope="col">Titre</th>
      <th scope="col">Modifier</th>
      <th scope="col">Supprimer</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($data['posts'] as $post): ?>
    <tr>
      <td><?php echo $post->titre; ?></td>
      <td> <a href="<?php echo URLROOT; ?>/admins/editArticle/<?php echo $post->posts_id; ?>" class="btn btn-success">Modifier</a></td>
      <td>
      <form action="<?php echo URLROOT; ?>/admins/delete/<?php echo $post->posts_id; ?>" method="post">
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