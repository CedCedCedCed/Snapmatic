<!-- Page Content -->
<div class="container">
  <div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-3">
          <img src="<?= base_url().'assets/'.$this->session->profile_picture?>" alt="Profile Picture" class="profile-picture">
          <?php

          $name =  $this->session->fullname;
          $username = strtolower(str_replace(' ', '.', $name));

          ?>
        </div>
        <div class="col-md-8">
          <br><br><a href="<?= base_url().'user/edit/'.$username ."/profile"?>"><button class="edit-profile btn btn-primary">Edit Profile</button></a>
          <a href="<?= base_url().'user/edit/'.$username ."/profile"?>"><i class="fa fa-gear" style="font-size:36px;"></i></a><br>
          <a href="<?= base_url().'user/follower'?>"><button class="edit-profile btn btn-primary">Followers</button></a>
           <a href="<?= base_url().'user/following'?>"><button class="edit-profile btn btn-primary">Following</button></a>
        </div>
       
      </div>
    </div>
   

    <h1 class="my-8"><?= $this->session->fullname?></h1>
    <div class="row">
      <!-- Blog Post -->
      <div class="col-md-4">
        <?php 
         if ($photos == null){
              echo '<br><div class="alert alert-warning alert-dismissible">No photos';
              echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>';
            
            }else

        foreach($photos as $row):?>
        <img class="card-img-top" src="<?= base_url().'uploads/'.$row->image?>" alt="Card image cap">
        <div class="card-body">
          <p class="card-text"><?= $row->image_description?></p>
          <a href="#" class="btn btn-primary">Read More &rarr;</a>
        </div>
        <div class="card-footer text-muted">
          Posted on <?= date("F j, Y",strtotime($row->image_added));?>
        </div>
        <?php endforeach;?>
      </div>

    </div>


    <!-- Pagination -->
    <ul class="pagination justify-content-center mb-4">
      <li class="page-item">
        <a class="page-link" href="#">&larr; Older</a>
      </li>
      <li class="page-item disabled">
        <a class="page-link" href="#">Newer &rarr;</a>
      </li>
    </ul>

  </div>


</div>
<!-- /.row -->

</div>
<!-- /.container