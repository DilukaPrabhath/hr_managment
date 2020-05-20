@extends('layouts.main')

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
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
          <div class="card-header">
            <h1 class="card-title"><b>Employee Preview</b></h1>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" class="form-control" value="{{$empData[0]->first_name}}" readonly>
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" class="form-control" value="{{$empData[0]->last_name}}" readonly >
                  </div>
                 </div>
             </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Start Date</label>
                  <input type="text" class="form-control" value="{{$empData[0]->start_date}}" readonly>
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                  <label>Position Title</label>
                  <input type="text" class="form-control" value="{{$empData[0]->position}}"  readonly>
                  </div>
                 </div>
             </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>NIC No</label>
                  <input type="text" class="form-control" value="{{$empData[0]->nic}}" readonly >
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                  <label>Gender</label>
                    <input type="text" class="form-control" value="@if($empData[0]->gender==1) Male @else Female @endif" readonly>
                  </div>
                 </div>
             </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Date Of Birth</label>
                  <input type="text" class="form-control" value="{{$empData[0]->date_of_birth}}" readonly>
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                  <label>ID Number</label>
                  <input type="text" class="form-control" value="{{$empData[0]->nic}}" readonly>
                  </div>
                 </div>
             </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" class="form-control" value="{{$empData[0]->address}}" readonly>
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                  <label>States</label><br>
                    @if($empData[0]->status==1)<span class="badge badge-success">Active</span>
                    @else($empData[0]->status==0)<span class="badge badge-danger">Inactive</span>
                    @endif
                  </div>
                 </div>
             </div>
               <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Mobile</label>
                  <input type="text" class="form-control" value="{{$empData[0]->mobile}}" readonly>
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                  <label>Home Phone</label>
                  <input type="text" class="form-control" value="{{$empData[0]->telephone}}" readonly>
                  </div>
                 </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Email Address</label>
                  <input type="text" class="form-control" value="{{$empData[0]->email}}" readonly>
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">

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
                  <input type="text" class="form-control" value="{{$empData[0]->bank_name}}" readonly>
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                  <label>Branch</label>
                  <input type="text" class="form-control" value="{{$empData[0]->branch}}" readonly>
                  </div>
                 </div>
             </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Account Number</label>
                  <input type="text" class="form-control" value="{{$empData[0]->account_number}}" readonly>
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                  <label>Account Name</label>
                  <input type="text" class="form-control" value="{{$empData[0]->account_name}}" readonly>
                  </div>
                 </div>
             </div>
             <div class="row">
                <div class="col-md-6">
                  <a type="button" class="btn btn-danger" href="{{url('/admin/employee')}}">Close</a>
                </div>
              </div>
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

