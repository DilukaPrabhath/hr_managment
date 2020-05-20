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
    <div class="row">
     <div class="col-12">
          <div class="card">
            <div class="card-header">
               <a href="{{url('/admin/employee/new')}}" class="col-md-1 btn btn-block btn-primary float-right">New</a>
            </div>
            <div class="card-body">
             <table id="example1" class="table table-bordered table-striped">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>emp no</th>
                  <th>Name</th>
                  <th>gender</th>
                  <th>mobile</th>
                  <th>email</th>
                  <th>Status</th>
                  <th>Option</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                  @foreach($empData as $key => $value)
                    <tr>
                      <td>{{ $value->reg_no }}</td>
                      <td>{{ $value->first_name}}</td>
                      <td>@if($value->gender==1) Male @else Female @endif</td>
                      <td>{{ $value->mobile}}</td>
                      <td>{{ $value->email}}</td>
                      <td>
                      @if($value->status==1)<span class="badge badge-success">Active</span>
                      @else($value->status==0)<span class="badge badge-danger">Inactive</span>
                      @endif
                      </td>
                      <td class="project-actions">
                          <a class="btn btn-info btn-sm" href="{{ url('admin/employee/preview').'/'.$value->id }}" title="Preview">
                              <i class="fa fa-eye"> </i>
                          </a>
                          
                          <a class="btn btn-warning btn-sm" href="{{ url('admin/employee/edit').'/'.$value->id }}" title="Edit">
                              <i class="fas fa-edit"></i>
                          </a>
                      </td>
                    </tr>
                  @endforeach
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

  @stop

