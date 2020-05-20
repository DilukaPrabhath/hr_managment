@extends('layouts.main')

@section('content')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Budget Request</h1>
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
               <a href="{{url('/admin/budget/new')}}" class="col-md-1 btn btn-block btn-primary float-right">new</a>
            </div>
            <div class="card-body">

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Department</th>
                  <th>Date</th>
                  <th>Cost</th>
                  <th>Status</th>
                  <th>Option</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($budgetData as $key => $value)
                    <tr>
                      <td></td>
                      <td>{{ $value->name }}</td>
                      <td>{{ $value->department }}</td>
                      <td>{{ $value->date}}</td>
                      <td style="text-align:right">{{ $value->costt}}</td>
                      <td>
                      @if($value->status==1)<span class="badge badge-warning">Pending</span>
                      @elseif($value->status==11)<span class="badge badge-danger">Removed by DH</span>
                      @elseif($value->status==2)<span class="badge badge-info">Checked</span>
                      @elseif($value->status==22)<span class="badge badge-danger">Reject by Admin</span>
                      @elseif($value->status==3)<span class="badge badge-success">Approved</span>
                      @else($value->status==33)<span class="badge badge-danger">Reject by SA</span>
                      @endif 
                      </td>
                      <td width="14%">
                          <a class="btn btn-info btn-sm" href="{{ url('/admin/budget/preview').'/'.$value->id }}" title="Preview">
                              <i class="fa fa-eye"> </i>
                          </a>
                          @if($value->status==1)
                          <a class="btn btn-warning btn-sm" href="{{ url('/admin/budget/edit').'/'.$value->id }}" title="Edit">
                              <i class="fas fa-edit"></i>
                          </a>
                          @endif 
                          @if($value->status==1)
                          <a class="btn btn-success btn-sm" href="{{ url('/admin/budget/check').'/'.$value->id }}" title="check">
                              <i class="fas fa-check">
                              </i>
                          </a>
                          @endif 
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