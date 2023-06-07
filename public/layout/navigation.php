<nav class="navbar navbar-expand-lg navbar-light nav_top">
    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="navbar-btn">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <div class="text-white mt-2 ml-2">
            <h3 id="user_role"><?php //echo UCFIRST($_SESSION['role']); ?></h3>
        </div>

        <ul class="nav ml-auto">
            <li class="nav-item dropdown text-white pr-2">
                <a class="nav-link dropdown-toggle text-white pr-4" href="#" id="display_name" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php //echo $_SESSION['username']; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right logout_link" aria-labelledby="display_name">
                    <a id="logout" class="dropdown-item" href="index.php?logout='1'"><b>Logout</b></a>
                </div>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link text-white" href="#">Notification</a>
            </li> -->
        </ul>
            
    </div>
</nav>