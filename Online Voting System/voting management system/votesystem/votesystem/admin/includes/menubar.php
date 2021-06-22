<aside class="main-sidebar "style="background-color: #BAB9B9 ">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar" style="background-color: #BAB9B9">
    <!-- Sidebar user panel -->
    <div class="user-panel" style = "height: 60px">
    
      <div class="pull-left image ">
        <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-square" alt="User Image" >
      </div>
      <div class="pull-left info "  >
        <p style="color:white ; font-size: 15px; font-family:Times"><?php echo $user['firstname'].' '.$user['lastname']; ?></p>
        <a><i class="fa fa-circle text-success "></i>  <b style=" color:white ; font-size: 15px; font-family:Times"> Online </b></a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree" style="background-color: #786974 ; color:white ; font-size: 15px; font-family:Times  " >
      <li class="header" style="background-color: #28272D ;color:white ; font-size: 12px; font-family:Times  ">REPORTS</li>
      <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li class=""><a href="votes.php"><span class="glyphicon glyphicon-lock"></span> <span>Votes</span></a></li>
      <li class="header" style="background-color: #28272D ;color:white ; font-size: 12px; font-family:Times ">MANAGE</li>
      <li class=""><a href="voters.php"><i class="fa fa-users"></i> <span>Voters</span></a></li>
      <li class=""><a href="positions.php"><i class="fa fa-tasks"></i> <span>Positions</span></a></li>
      <li class=""><a href="candidates.php"><i class="fa fa-black-tie"></i> <span>Candidates</span></a></li>
      <li class="header" style="background-color:#28272D ;color:white ; font-size: 12px; font-family:Times">SETTINGS</li>
      <li class=""><a href="ballot.php"><i class="fa fa-file-text"></i> <span>Ballot Position</span></a></li>
      <li class=""><a href="#config" data-toggle="modal"><i class="fa fa-cogs"></i> <span>Election Title</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
<?php include 'config_modal.php'; ?>