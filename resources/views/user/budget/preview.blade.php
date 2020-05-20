@extends('layouts.usermain')

@section('content')

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Budget Request Preview</h1>
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
            <h1 class="card-title"><b>Budget Details Forms</b></h1>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Name</label>
                    <input type="text" class="form-control" readonly value="{{$budgetData['budget'][0]->name}}">
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                <label>Department Name</label>
                    <input type="text" class="form-control" readonly value="{{$budgetData['budget'][0]->department}}">
                  </div>
                 </div>
             </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label>Employee Name</label>
                    <input type="text" class="form-control" readonly value="{{$budgetData['budget'][0]->empname}}">
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                  <label>Cost</label>
                  <input type="text" class="form-control" readonly value="{{$budgetData['budget'][0]->costt}}">
                  </div>
                 </div>
             </div>
             <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Project Description</label>
                  <textarea class="form-control" rows="3" cols="50" readonly>{{$budgetData['budget'][0]->discription}}</textarea> 
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                  <label>Status</label><br>
                  @if($budgetData['budget'][0]->status==1)<span class="badge badge-warning">Pending</span>
                      @elseif($budgetData['budget'][0]->status==11)<span class="badge badge-danger">Removed by Department Head</span>
                      @elseif($budgetData['budget'][0]->status==2)<span class="badge badge-info">Checked</span>
                      @elseif($budgetData['budget'][0]->status==22)<span class="badge badge-danger">Reject by Admin</span>
                      @elseif($budgetData['budget'][0]->status==3)<span class="badge badge-success">Approved</span>
                      @else($budgetData['budget'][0]->status==33)<span class="badge badge-danger">Reject by Super Admin</span>
                    @endif 
                  </div>
                 </div>
             </div>
             <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Created Date</label>
                    <input type="text" class="form-control" readonly value="{{$budgetData['budget'][0]->dep_head_date}}">
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                  <label>Created by</label>
                    <input type="text" class="form-control" readonly value="{{$budgetData['budget'][0]->dephname}}">
                  </div>
                 </div>
             </div>
             <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Approved By</label>
                    <input type="text" class="form-control" readonly value="{{$budgetData['budget'][0]->adm_date}}">
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                  <label>Approved Date</label>
                    <input type="text" class="form-control" readonly value="{{$budgetData['budget'][0]->admname}}">
                  </div>
                 </div>
             </div>
             <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Final Approved By</label>
                  <input type="text" class="form-control" readonly value="{{$budgetData['budget'][0]->supname}}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Final Approved Date</label>
                  <input type="text" class="form-control" readonly value="{{$budgetData['budget'][0]->superadm_date}}">
                </div>
              </div>
             </div>
             <div class="row">
              <div class="col-md-12">
                <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Comment</th>
                    <th>Comment By</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Special Comment</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($budgetData["comment"] as $key => $value)
                    <tr>
                      <th>{{ $value->comment }}</th>
                      <th>{{ $value->first_name }} {{ $value->last_name }}</th>
                      <th>
                      @if($value->status==1)<span class="badge badge-warning">Pending</span>
                      @elseif($value->status==11)<span class="badge badge-danger">Removed by Department Head</span>
                      @elseif($value->status==2)<span class="badge badge-info">Checked</span>
                      @elseif($value->status==22)<span class="badge badge-danger">Reject by Admin</span>
                      @elseif($value->status==3)<span class="badge badge-success">Approved</span>
                      @else($value->status==33)<span class="badge badge-danger">Reject by Super Admin</span>
                       @endif 
                      </th>
                      <th>{{ $value->date }}</th>
                      <th>{{ $value->specomment }}</th>
                    </tr>
                    @endforeach
                  </tbody>
                </table> 
                <a type="button" class="btn btn-danger" href="{{url('user/budget')}}">Close</a>
              </div>  
            </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  @stop