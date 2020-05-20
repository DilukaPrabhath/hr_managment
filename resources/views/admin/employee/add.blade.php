@extends('layouts.main')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Employee</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h1 class="card-title"><b>Employee Details Forms</b></h1>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <form name="qryform" id="qryform" method="post" action="{{ url('admin/employee/save') }}">
          {{ csrf_field() }}
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" class="form-control" name="fname" id="fname" autocomplete="off">
                   @if($errors->has('fname'))
                   <div class="" style="padding: 0 !important;">
                      <span class="" style="color: red;">{{$errors->first('fname')}}</span>
                   </div>
                  @endif
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" class="form-control" name="lname" id="lname" autocomplete="off">
                  @if($errors->has('lname'))
                   <div class="" style="padding: 0 !important;">
                      <span class="" style="color: red;">{{$errors->first('lname')}}</span>
                   </div>
                  @endif
                  </div>
                 </div>
             </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Start Date</label>
                  <input type="date" class="form-control" name="stdate" id="stdate" autocomplete="off"> 
                   @if($errors->has('stdate'))
                   <div class="" style="padding: 0 !important;">
                      <span class="" style="color: red;">{{$errors->first('stdate')}}</span>
                   </div>
                  @endif
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                  <label>Position Title</label>
                  <input type="text" class="form-control" name="position" id="position" autocomplete="off"> 
                  @if($errors->has('position'))
                   <div class="" style="padding: 0 !important;">
                      <span class="" style="color: red;">{{$errors->first('position')}}</span>
                   </div>
                  @endif
                  </div>
                 </div>
             </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label>User Types</label>
                  <select class="form-control" name="usrty" id="usrty">
                    <option  value="">select user type</option>
                    @foreach($usertypeData AS $usertypeData)
                    <option  value="{{$usertypeData->id}}">{{$usertypeData->user_type}}</option>
                    @endforeach
                  </select>
                  @if($errors->has('usrty'))
                   <div class="" style="padding: 0 !important;">
                      <span class="" style="color: red;">{{$errors->first('usrty')}}</span>
                   </div>
                  @endif
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                  <label>Gender</label>
                  <select class="form-control select2" style="width: 100%;" name="gndr" id="gndr">
                    <option value="">Select Gender</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>

                  </select>
                 @if($errors->has('gndr'))
                   <div class="" style="padding: 0 !important;">
                      <span class="" style="color: red;">{{$errors->first('gndr')}}</span>
                   </div>
                  @endif
                  </div>
                 </div>
             </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Date Of Birth</label>
                  <input type="date" class="form-control" name="dobr" id="dobr" autocomplete="off">
                   @if($errors->has('dobr'))
                   <div class="" style="padding: 0 !important;">
                      <span class="" style="color: red;">{{$errors->first('dobr')}}</span>
                   </div>
                  @endif
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                  <label>NIC No</label>
                  <input type="text" class="form-control" name="nic" id="nic" autocomplete="off">
                   @if($errors->has('nic'))
                   <div class="" style="padding: 0 !important;">
                      <span class="" style="color: red;">{{$errors->first('nic')}}</span>
                   </div>
                  @endif
                  </div>
                 </div>
             </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" class="form-control" name="addrs" id="addrs" autocomplete="off">
                   @if($errors->has('addrs'))
                   <div class="" style="padding: 0 !important;">
                      <span class="" style="color: red;">{{$errors->first('addrs')}}</span>
                   </div>
                  @endif
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                  <label>Email Address</label>
                  <input type="text" class="form-control" name="email" id="email" autocomplete="off">
                  @if($errors->has('email'))
                   <div class="" style="padding: 0 !important;">
                      <span class="" style="color: red;">{{$errors->first('email')}}</span>
                   </div>
                  @endif
                  </div>
                 </div>
             </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Home Phone</label>
                  <input type="text" class="form-control" name="telph" id="telph" autocomplete="off">
                  @if($errors->has('telph'))
                   <div class="" style="padding: 0 !important;">
                      <span class="" style="color: red;">{{$errors->first('telph')}}</span>
                   </div>
                  @endif
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                  <label>Mobile</label>
                  <input type="text" class="form-control" name="moble" id="moble" autocomplete="off">
                  @if($errors->has('moble'))
                   <div class="" style="padding: 0 !important;">
                      <span class="" style="color: red;">{{$errors->first('moble')}}</span>
                   </div>
                  @endif
                  </div>
                 </div>
             </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Department</label>
                  <select class="form-control" name="depart" id="depart">
                    <option  value="">select Department</option>
                    @foreach($depData AS $depData)
                    <option  value="{{$depData->id}}">{{$depData->department}}</option>
                    @endforeach
                  </select>
                  @if($errors->has('telph'))
                   <div class="" style="padding: 0 !important;">
                      <span class="" style="color: red;">{{$errors->first('telph')}}</span>
                   </div>
                  @endif
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                  <label>Password</label>
                  <input type="Password" class="form-control" name="pass" id="pass" autocomplete="off">
                  @if($errors->has('pass'))
                   <div class="" style="padding: 0 !important;">
                      <span class="" style="color: red;">{{$errors->first('pass')}}</span>
                   </div>
                  @endif
                  </div>
                 </div>
             </div>
             <hr>
             <div class="card-header">
            <h2 class="card-title"><b>Bank Details</b></h2>
          </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Bank Name</label>
                  <input type="text" class="form-control" autocomplete="off" name="bnknm" id="bnknm">
                   @if($errors->has('bnknm'))
                   <div class="" style="padding: 0 !important;">
                      <span class="" style="color: red;">{{$errors->first('bnknm')}}</span>
                   </div>
                  @endif
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                  <label>Branch</label>
                  <input type="text" class="form-control" autocomplete="off" name="branch" id="branch">
                   @if($errors->has('branch'))
                   <div class="" style="padding: 0 !important;">
                      <span class="" style="color: red;">{{$errors->first('branch')}}</span>
                   </div>
                  @endif
                  </div>
                 </div>
             </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Account Number</label>
                  <input type="text" class="form-control" autocomplete="off" name="acno" id="acno">
                   @if($errors->has('acno'))
                   <div class="" style="padding: 0 !important;">
                      <span class="" style="color: red;">{{$errors->first('acno')}}</span>
                   </div>
                  @endif
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                <label>Account Name</label>
                  <input type="text" class="form-control" name="acname" id="acname">
                  @if($errors->has('acname'))
                   <div class="" style="padding: 0 !important;">
                      <span class="" style="color: red;">{{$errors->first('acname')}}</span>
                   </div>
                  @endif
                  </div>
                 </div>
             </div>
             <div class="row">
              <div class="col-md-6">
                <div class="form-group">

                  </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                 <!-- <label>Remark</label>
                  <input type="text" class="form-control">
                                    @if($errors->has('acname'))
                   <div class="" style="padding: 0 !important;">
                      <span class="" style="color: red;">{{$errors->first('acname')}}</span>
                   </div>
                  @endif
                  -->
                  </div>
                 </div>
             </div>
              <button type="submit" class="btn btn-success">Submit</button>
              <button type="reset" class="btn btn-info">Clear</button>
              <a  class="btn btn-danger" href="{{url('/admin/employee')}}">Close</a>
             </form>
            </div>
            </div>
          </div>
          <div class="card-footer">
            <a href="https://select2.github.io/"></a>
          </div>
        </div>
      </div>
    </section>
  </div>

  @stop

