    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"><?= $title?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <?php

            $name =  $this->session->fullname;
            $username = strtolower(str_replace(' ', '.', $name));

            ?>

            <?php $page = $this->uri->segment(2); if($page == ''): ?>
            <li class="nav-item">
             <a class="nav-link" href="<?= base_url().'user/explore'?>"><i class="fa fa-compass fa-lg" aria-hidden="true" ></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url().'user/'.$username?>"><?= $this->session->fullname ?></a>
            </li>
          
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li> 
          
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
        
          <?php elseif($page == $username):?>
          <li class="nav-item">
             <a class="nav-link" href="<?= base_url().'user/explore'?>"><i class="fa fa-compass fa-lg" aria-hidden="true" ></i></a>


          </li>
            <li class="nav-item active">
              <a class="nav-link" href="<?= base_url().'user/'.$username?>"><?= $this->session->fullname ?></a>
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url().'user/'?>">Home</a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="#">Settings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <?php elseif($page == 'explore'):?>
           <li class="nav-item active">
             <a class="nav-link" href="<?= base_url().'user/explore'?>"><i class="fa fa-compass fa-lg" aria-hidden="true" ></i></a>
            <span class="sr-only">(current)</span>

            </li>
          <li class="nav-item">
              <a class="nav-link" href="<?= base_url().'user/'.$username?>"><?= $this->session->fullname ?></a>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url().'user/'?>">Home</a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="#">Settings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <?php elseif($page == 'following'):?>
           <li class="nav-item active">
             <a class="nav-link" href="<?= base_url().'user/explore'?>"><i class="fa fa-compass fa-lg" aria-hidden="true" ></i></a>
            <span class="sr-only">(current)</span>

            </li>
          <li class="nav-item">
              <a class="nav-link" href="<?= base_url().'user/'.$username?>"><?= $this->session->fullname ?></a>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url().'user/'?>">Home</a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="#">Settings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <?php elseif($page == 'follower'):?>
           <li class="nav-item active">
             <a class="nav-link" href="<?= base_url().'user/explore'?>"><i class="fa fa-compass fa-lg" aria-hidden="true" ></i></a>
            <span class="sr-only">(current)</span>

            </li>
          <li class="nav-item">
              <a class="nav-link" href="<?= base_url().'user/'.$username?>"><?= $this->session->fullname ?></a>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url().'user/'?>">Home</a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="#">Settings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>



        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url().'login/logout'?>">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>