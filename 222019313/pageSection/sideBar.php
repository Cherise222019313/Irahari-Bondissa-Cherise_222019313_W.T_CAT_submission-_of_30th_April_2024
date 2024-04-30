<div class="sidebar">
        <div class="side-header">
            <h3>hostel system</h3>
        </div>
        
        <div class="side-content">
            <div class="profile">
                <div class="profile-img bg-img" style="background-image: url(<?php echo $_SESSION['image']; ?>)"></div>
                <h4><?php //echo $_SESSION['name']; ?></h4>
                <small><?php echo $_SESSION['full_name']; ?></small>
            </div>

            <div class="side-menu">
                <ul>
                    <li>
                       <a href="./" class="active">
                            <span class="las la-home"></span>
                            <small>Dashboard</small>
                        </a>
                    </li>
                 <?php if($_SESSION['role']=='admin'){ ?>   <li>
                       <a href="./?page=students">
                            <span class="las la-user-alt"></span>
                            <small>Students</small>
                        </a>
                    </li>
                    <?php } ?>
                    <li>
                       <a href="./?page=hostels">
                            <span class="las la-envelope"></span>
                            <small>Hostels</small>
                        </a>
                    </li>
                    <li>
                       <a href="./?page=orders">
                            <span class="las la-clipboard-list"></span>
                            <small>Orders
                            </small>
                        </a>
                    </li>
                    
                    <?php if($_SESSION['role']=='admin'){ ?>         <li>
                       <a href="./?page=employees">
                            <span class="las la-tasks"></span>
                            <small>Employees</small>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if($_SESSION['role']=='admin'){ ?>    <li>
                       <a href="./?page=payments">
                            <span class="las la-tasks"></span>
                            <small>payments</small>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    