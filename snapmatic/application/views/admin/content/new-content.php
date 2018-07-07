<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?= base_url().'administrator/dashboard'?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?= base_url().'administrator/content'?>">Manage Content</a>
        </li>
        <li class="breadcrumb-item active">New Content</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-md-6">
          <ol class="breadcrumb">
            <div id="success-message-new-content"></div>
          <form id="new-content">
            <input type="hidden" name="type" value="new_content">
            <label>File</label>
              <input type="file" name="image" id="image">
               <div class="text-danger" id="content_image_error"></div>
                
          
            <input type="submit" class="btn btn-success " value="Continue" align="center" ">
               
          </form>
            
          </ol>
        </div>
 


     
    
     
      
      </div>

    </div>
    <!-- /.container-fluid-->
    
    <!-- /.content-wrapper-->
     <!-- Logout Modal-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url(). 'administrator/logout'?>">Logout</a>
              </div>
            </div>
          </div>
        </div>
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>