@extends('layouts.superAdminMain')

@section('content')

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Settelement Preview</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Budget/list</a></li>
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
            <h1 class="card-title"><b>Budget Settelement</b></h1>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
            
              <div class="col-md-6">
                <table class="table table-striped">
                  <tr><td><b>Budget Name :</b></td><td>{{$budgetData['budget'][0]->name}}</td></tr>
                  <tr><td><b>Department :</b></td><td>{{$budgetData['budget'][0]->department}}</td></tr>
                  <tr><td><b>Employee :</b></td><td>{{$budgetData['budget'][0]->empname}}</td></tr>
                  <tr><td><b>Cost :</b></td><td>{{$budgetData['budget'][0]->costt}}</td></tr>
                </table>
               </div>
               <div class="col-md-6">
               <table class="table table-striped">
                  <tr><td><b>Checked Date :</b></td><td>{{$budgetData['budget'][0]->adm_date}}</td></tr>
                  <tr><td><b>Checked By :</b></td><td>{{$budgetData['budget'][0]->admname}}</td></tr>
                  <tr><td><b>Approved By :</b></td><td>{{$budgetData['budget'][0]->supname}}</td></tr>
                  <tr>
                  <td><b>Approved Date :</b></td><td>{{$budgetData['budget'][0]->superadm_date}}</td>
                  </tr>
                </table>
               </div>
             </div>
            <hr>
            <form name="qryform" id="qryform" method="post" action="/settelement/save"  novalidate="novalidate">
          {{ csrf_field() }}  
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
              <label>Remark</label>
                <input type="text" class="form-control" readonly value="{{$settlmnt[0]->comment}}">
              </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
              <label>Status</label><br>
                @if($budgetData['budget'][0]->settlement==0)<span class="badge badge-info">Not Create</span>
                @elseif($budgetData['budget'][0]->settlement==1)<span class="badge badge-info">Created</span>
                @elseif($budgetData['budget'][0]->settlement==22)<span class="badge badge-warning">pending</span>
                @elseif($budgetData['budget'][0]->settlement==2)<span class="badge badge-success">Approved</span>
                @endif
              </div>
              </div>
            </div>
            <div class="row">
            <div class="col-md-6">
              <div class="form-group">
              <label>Created By</label>
                <input type="text" class="form-control" readonly value="{{$settlmnt[0]->fcredby}} {{$settlmnt[0]->lcredby}}">
              </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
              <label>Creaeted Date</label>
                <input type="text" class="form-control" readonly value="{{$settlmnt[0]->cdate}}">
              </div>
              </div>
            </div>
            <div class="row">
            <div class="col-md-6">
              <div class="form-group">
              <label>Approved By</label>
                <input type="text" class="form-control" readonly value="{{$settlmnt[0]->afcredby}} {{$settlmnt[0]->alcredby}}">
              </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
              <label>Approved Date</label>
                <input type="text" class="form-control" readonly value="{{$settlmnt[0]->adate}}">
              </div>
              </div>
            </div>
            <input type="hidden" class="form-control" name="bgid" id="bgid" autocomplete="off" value="{{$budgetData['budget'][0]->id}}">
            <div class="row">
              <div class="col-md-12">
                <table class="table">
                  <thead>
                    <tr>
                      <td><b>invoice No</b></td>
                      <td><b>Dipcription</b></td>
                      <td><b>Amount</b></td>
                    </tr>
                    @php
                      $am_total = 0;
                    @endphp
                    @foreach($settlmntitm as $key => $value)
                    <tr>
                      <td>{{ $value->invoice_num }}</td>
                      <td>{{ $value->dipcription }}</td>
                      <td>{{'Rs. '. number_format($value->costt , 2) }}</td>
                    </tr>
                    @php
                      $am_total += doubleval($value->costt);
                    @endphp
                  @endforeach
                    <tr>
                      <td colspan="2"><b>Total Amount</b></td>
                      <td><b>{{'Rs. '. number_format($am_total, 2) }}</b></td>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <a type="button" class="btn btn-danger" href="{{url('/superadmin/settelement')}}">Close</a>
              </div>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>

  @stop