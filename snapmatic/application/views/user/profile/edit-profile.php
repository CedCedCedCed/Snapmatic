<!-- Page Content -->
<div class="container">
  <div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-12">
        <div class="row">
          <div class="col-md-8">
            <img src="<?= base_url().'assets/'.$this->session->profile_picture?>" alt="Profile Picture" class="profile-picture">
            <?php

            $name =  $this->session->fullname;
            $username = strtolower(str_replace(' ', '.', $name));

            ?>

            
            </div>
          </div>
        </div>
        
        
      <h1 class="my-8"><?= $this->session->fullname?></h1>
      <div class="row">
        <!-- Blog Post -->
        <div class="col-md-6">

          <div class="card-body">
            <h2 class="card-title">Personal Information</h2>
            <div id="success-message-edit-profile"></div>
            <form id="edit-profile">
            <input type="hidden" name="type" value="edit_profile">
            <input type="hidden" name="id" value="<?= secret_url('encrypt',$account->id);?>">
            <div class="alert-danger text-center" id="first_name_error"></div>
            <div class="alert-danger text-center" id="last_name_error"></div>
            <div class="alert-danger text-center" id="username_error"></div>
            <div class="alert-danger text-center" id="email_error"></div>
            <div class="alert-danger text-center" id="password_error"></div>
            <div id="success-message-edit-profile"></div>
            <div class="form-group">
               <label>First Name</label>
               <input type="text" class="form-control" name="first_name" id="first_name" value="<?= $account->first_name?>">
            </div> 
            <div class="form-group">
               <label>Last Name</label>
               <input type="text" class="form-control" name="last_name" id="last_name" value="<?= $account->last_name?>">
            </div> 
            <div class="form-group">
               <label>Username</label>
               <input type="text" class="form-control" name="username" id="username" value="<?= $account->username?>">
            </div> 
            <div class="form-group">
               <label>Email</label>
               <input type="text" class="form-control" name="email" id="email" value="<?= $account->email?>">
            </div>
            <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
            </form>
            
          
          </div>
          
        </div>
        <div class="col-md-6">

          <div class="card-body">
            <h2 class="card-title">Change Password</h2>
            <form id="edit-password">
            <input type="hidden" name="type" value="edit_password">
            <input type="hidden" name="id" value="<?= secret_url('encrypt',$account->id);?>">
            <div class="alert-danger text-center" id="old_password_error"></div>
            <div class="alert-danger text-center" id="new_password_error"></div>
            <div class="alert-danger text-center" id="confirm_password_error"></div>
            <div id="success-message-edit-password"></div>
            <div id="old-password-message"></div>
            <div id="new-confirm-message"></div>
            <div class="form-group">
               <label>Old Password</label>
               <input type="password" class="form-control" name="old_password" id="old_password">
            </div> 
            <div class="form-group">
               <label>New Password</label>
               <input type="password" class="form-control" name="new_password" id="new_password">
            </div> 
            <div class="form-group">
               <label>Confirm Password</label>
               <input type="password" class="form-control" name="confirm_password" id="confirm_password">
            </div> 
             <button type="submit" class="btn btn-info btn-fill btn-wd">Update Password</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.row -->
</div>
<!-- /.container