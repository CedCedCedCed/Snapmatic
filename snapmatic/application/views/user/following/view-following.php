<!-- Page Content -->
<div class="container">
  <div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-12">
      <div class="row">
      </div>
    </div>

    <div class="row">
      <!-- Blog Post -->
      <div class="col-md-6">
        
      </div>

      <div class="col-md-5">
        <br>
         <?php foreach ($following as $row):
          $first_last_name = $row->first_name . " " . $row->last_name;
          $fullname = strtolower(str_replace(' ', '.', $first_last_name));

         ?>
        <img class="profile-picture" src="<?= base_url().'assets/'.$row->profile_picture?>" alt="Card image cap" style="width:200px">
        
        <div class="card-body">
         
            <label><?= $first_last_name?></label>
            <a href="<?= base_url().'user/'.$fullname?>" ><button class="btn btn-primary">View Profile</button>
          
          <?php endforeach;?>

        </div>
        <div class="card-footer text-muted">
          Posted on January 1, 2017 by
          <a href="#">Start Bootstrap</a>
        </div>
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