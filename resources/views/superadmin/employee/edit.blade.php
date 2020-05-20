@extends('layouts.superAdminMain')

@section('content')

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Employee</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Employee/list</a></li>
              <li class="breadcrumb-item active"></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
          <div class="card-header">
            <h1 class="card-title"><b>Employee Edit</b></h1>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <div class="card-body">
          <form name="qryform" id="qryform" method="post" action="{{ url('superadmin/employee/save') }}">
          {{ csrf_field() }}
          <input type="hidden" class="form-control" value="{{$empData[0]->id}}" name="id" id="id">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" class="form-control" value="{{$empData[0]->first_name}}"  name="fname" id="fname" autocomplete="off">
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
                  <input type="text" class="form-control" value="{{$empData[0]->last_name}}" name="lname" id="lname" autocomplete="off">
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
                  <input type="date" class="form-control" value="{{$empData[0]->start_date}}" name="stdate" id="stdate" autocomplete="off">
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
                  <input type="text" class="form-control" value="{{$empData[0]->position}}" name="position" id="position" autocomplete="off">
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
                    <option  value="{{$usertypeData->id}}" {{$usertypeData->id==$empData[0]->usertype_id ?'selected':''}}>{{$usertypeData->user_type}}</option>
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
                    <option value="1" {{$empData[0]->gender=='1' ?'selected':''}}>Male</option>
                    <option value="2" {{$empData[0]->gender=='2' ?'selected':''}}>Female</option>
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
                  <input type="date" class="form-control" value="{{$empData[0]->date_of_birth}}" name="dobr" id="dobr" autocomplete="off">
                  @if($errors->has('dobr'))
                   <div class="" style="padding: 0 !important;">
                      <span class="" style="color: red;">{{$errors->first('dobr')}}</span>
                   </div>
                  @endif
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                  <label>ID Number</label>
                  <input type="text" class="form-control" value="{{$empData[0]->nic}}" name="nic" id="nic" autocomplete="off">
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
                  <input type="text" class="form-control" value="{{$empData[0]->address}}" name="addrs" id="addrs" autocomplete="off">
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
                  <input type="text" class="form-control" value="{{$empData[0]->email}}" name="email" id="email" autocomplete="off">
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
                <label>Mobile</label>
                  <input type="text" class="form-control" value="{{$empData[0]->mobile}}" name="moble" id="moble" autocomplete="off">
                  @if($errors->has('moble'))
                   <div class="" style="padding: 0 !important;">
                      <span class="" style="color: red;">{{$errors->first('moble')}}</span>
                   </div>
                  @endif
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                  <label>Home Phone</label>
                  <input type="text" class="form-control" value="{{$empData[0]->telephone}}" name="telph" id="telph" autocomplete="off">
                  @if($errors->has('telph'))
                   <div class="" style="padding: 0 !important;">
                      <span class="" style="color: red;">{{$errors->first('telph')}}</span>
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
                    <option  value="{{$depData->id}}" {{$depData->id==$empData[0]->department_id ?'selected':''}}>{{$depData->department}}</option>
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
                <label>Employee No</label>
                  <input type="text" class="form-control" value="{{$empData[0]->reg_no}}"  name="empno" id="empno" readonly>
                  @if($errors->has('empno'))
                   <div class="" style="padding: 0 !important;">
                      <span class="" style="color: red;">{{$errors->first('empno')}}</span>
                   </div>
                  @endif
                  </div>
                 </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label style="color:red">Password Reset</label>
                  <input type="password" class="form-control" placeholder="****************"  name="passed" id="passed" autocomplete="off" readonly>
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                  <label style="color:red">Conform Password</label>
                  <input type="password" class="form-control" placeholder="****************"  name="comfrm" id="comfrm" autocomplete="off" readonly>
                  @if($errors->has('comfrm'))
                   <div class="" style="padding: 0 !important;">
                      <span class="" style="color: red;">{{$errors->first('comfrm')}}</span>
                   </div>
                  @endif
                </div>
              </div>
            </div>
            
             <div class="card-header">
            <h2 class="card-title"><b>Bank Details</b></h2>
          </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Bank Name</label>
                  <input type="text" class="form-control" value="{{$empData[0]->bank_name}}" name="bnknm" id="bnknm" autocomplete="off"> 
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
                  <input type="text" class="form-control" value="{{$empData[0]->branch}}" name="branch" id="branch" autocomplete="off">
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
                  <input type="text" class="form-control" value="{{$empData[0]->account_number}}" name="acno" id="acno" autocomplete="off">
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
                  <input type="text" class="form-control" value="{{$empData[0]->bank_name}}" name="acname" id="acname" autocomplete="off">
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
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>
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

