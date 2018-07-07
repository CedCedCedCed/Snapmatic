<!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <!-- Blog Post -->

          <?php 
          if ($newsfeed == null){
              echo '<br><div class="alert alert-warning alert-dismissible">No photos';
              echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>';
            
            }else


          foreach($newsfeed as $row):?>
          <label><?= $row->first_name . " ". $row->last_name?></label>
          <div class="card mb-4">
            <br>
            <img class="card-img-top" src="<?= base_url().'uploads/'.$row->image?>" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">Post Title</h2>
              <p class="card-text"><?= $row->image_description?></p>
              <a href="#" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on <?= date("F j, Y",strtotime($row->image_added));?>
            </div>
          </div>
          <?php endforeach;?>


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
        <div class="col-md-4">
          <div class="card mb-4">
            <br><br><br>
            <div class="card-body">
               <div id="success-message-new-content"></div>
               <form id="new-content">
                  <input type="hidden" name="type" value="newsfeed">
                  <div class="form-group">
                    <label>Description</label>
                    <textarea rows="4" cols="50"  name="image_description" id="image_description" class="form-control" placeholder="Some text"></textarea>
                    <div class="text-danger" id="image_description_error"></div>
                  </div>
                  <label>Description</label>
                  <div class="form-group">
                    <label>File</label>
                    <input type="file" name="image" id="image">
                    <div class="text-danger" id="content_image_error"></div><br>
                  </div>
                  
                  <input type="submit" class="btn btn-success " value="Continue" align="center" ">     
               </form>
            </div>
         
          </div>
        </div>


      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->