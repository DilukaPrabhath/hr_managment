@extends('layouts.main')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Department</h1>
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
               <a href="{{ url('department/new')}}" class="col-md-1 btn btn-block btn-primary float-right">new</a>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Created date</th>
                  <th>Status</th>
                  <th>Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach($depData as $key => $value)
                    <tr>
                      <td></td>
                      <td>{{ $value->department }}</td>
                      <td>{{ $value->date }}</td>
                      <td>
                      @if($value->status==1)<span class="badge badge-success">Active</span>
                      @else($value->status==0)<span class="badge badge-danger">Inactive</span>
                      @endif
                      </td>
                      <td width='10%'>
                          <a class="btn btn-info btn-sm" href="{{ url('department/preview').'/'.$value->id }}" title="Preview">
                              <i class="fa fa-eye"> </i>
                          </a>
                          <a class="btn btn-warning btn-sm" title="Edit" href="{{ url('department/edit').'/'.$value->id }}">
                              <i class="fas fa-edit"></i>
                          </a>
                      </td>
                    </tr>
                  @endforeach   
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