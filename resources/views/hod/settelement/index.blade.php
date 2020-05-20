@extends('layouts.hodmain')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Settelment</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Settelment/list</a></li>
            <li class="breadcrumb-item active"></li>
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
                  <th>Settlement</th>
                  <th width="13%">Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach($budgetData as $key => $value)
                    <tr>
                    <td></td>
                      <td>{{ $value->name }}</td>
                      <td>{{ $value->department }}</td>
                      <td>{{ $value->date}}</td>
                      <td style="text-align:right">{{ 'Rs. '.$value->costt}}</td>
                      <td>
                      @if($value->status==1)<span class="badge badge-warning">Pending</span>
                      @elseif($value->status==11)<span class="badge badge-danger">Removed by DH</span>
                      @elseif($value->status==2)<span class="badge badge-info">Checked</span>
                      @elseif($value->status==22)<span class="badge badge-danger">Reject by Admin</span>
                      @elseif($value->status==3)<span class="badge badge-success">Approved</span>
                      @else($value->status==33)<span class="badge badge-danger">Reject by SA</span>
                      @endif 
                      </td>
                      <td>
                      @if($value->settlement==0)<span class="badge badge-info">Not Create</span>
                      @elseif($value->settlement==1)<span class="badge badge-info">Created</span>
                      @elseif($value->settlement==22)<span class="badge badge-warning">pending</span>
                      @elseif($value->settlement==2)<span class="badge badge-success">Approved</span>
                      @endif 
                      </td>
                      <td class="project-actions">
                        @if($value->settlement==0)
                          <a class="btn btn-success btn-sm" href="{{ url('hod/settelement/new').'/'.$value->id }}" title="New">
                              <i class="fas fa-plus"></i>
                          </a>
                        @endif 
                        @if($value->settlement!=0)
                          <a class="btn btn-success btn-sm" href="{{ url('hod/settelement/preview').'/'.$value->id }}" title="Preview">
                              <i class="fa fa-search"> </i>
                          </a>
                          @endif 
                          <!--  @if($value->status==22) -->
                         <!--  @endif -->
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