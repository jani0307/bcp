  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="https://www.blackcrescentpartners.in/" class="brand-link">
      <img src="dist/img/fav.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">BlackCresent Partners</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a class="d-block"><?php echo $_SESSION['name'];  ?></a>
        </div>
      </div>   

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        
        
       
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
             <?php
        if($_SESSION['position'] == 'super_admin')
        {
           ?> 
         
          <li class="nav-item">
            <a href="update.php" class="nav-link">
              <i class="nav-icon fas fa-pen-nib"></i>
              <p>
             Update
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="withdraw-request.php" class="nav-link">
              <i class="nav-icon fas fa-scroll"></i>
              <p>
             Withdraw Request
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="client-register.php" class="nav-link">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>
                Client Register
              </p>
            </a>
          </li>
         
           <li class="nav-item">
            <a href="all-client.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
              All Clients
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="career-application.php" class="nav-link">
              <i class="nav-icon fas fa-book-reader"></i>
              <p>
              Career
              </p>
            </a>
          </li>
    <?php    }
        
          ?>
     <li class="nav-item">
            <a href="add-research-report.php" class="nav-link">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
             Add Research Report
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="all-research-report.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
            All Research Report
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="add-blog.php" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Add Blog
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="uploaded-blogs.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
              Uploaded Blogs
              </p>
            </a>
          </li>
            
          <li class="nav-item">
            <a href="subscribers.php" class="nav-link">
              <i class="nav-icon fas fa-envelope-open-text"></i>
              <p>
              Subscribers
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>