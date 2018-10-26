<div class="col-md-3 mt-5">

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