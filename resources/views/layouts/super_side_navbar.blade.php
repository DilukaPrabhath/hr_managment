<?php
use Illuminate\Support\Facades\Auth;
$first = Auth::user()->first_name;
?>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link" style="width: 100%;">
      <div class="row">
        <div class="col-md-12">
          <img src="{{asset('logo2s.png')}}" alt="Company Logo" class="brand-image" style="width: 90%; min-height: 60px;">
          <span class="brand-text font-weight-light"></span>
        </div>
      </div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('superadmin.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{$first}}</a>
          <h6 style="color:white">( Super Admin )</h6>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{url('/')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class=""></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/superadmin')}}" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Note Approval
                <span class=""></span>
              </p>
            </a>
          </li>
            <!-- /.settelement-->
          <li class="nav-item">
            <a href="{{url('/superadmin/salary/')}}" class="nav-link">
              <i class="nav-icon fas fa-comments-dollar"></i>
              <p>
                Salary Advance
                <span class=""></span>
              </p>
            </a>
          </li>
           <!--.budget-->
          <li class="nav-item">
            <a href="{{url('/superadmin/budget')}}" class="nav-link">
              <i class="nav-icon fas fa-pencil-alt"></i>
              <p>
                Budget
                <i class=""></i>
              </p>
            </a>
          </li>
        <!-- /.budget-->
        <!--.settelement-->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-sync"></i>
              <p>
               Settelment
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">  
              <li class="nav-item">
                <a href="{{url('/superadmin/settelement')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>
            </ul>
          </li>
      
         <!-- /.My profile-->
        <li class="nav-item">
            <a href="{{url('/superadmin/profile')}}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                My profile
                <span class=""></span>
              </p>
            </a>
          </li>
        <!-- /.My profile-->

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>