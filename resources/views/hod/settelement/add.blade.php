@extends('layouts.hodmain')

@section('content')

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Settelement Create New</h1>
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
                  <tr><td><b>Name :</b></td><td>{{$budgetData['budget'][0]->name}}</td></tr>
                  <tr><td><b>Department :</b></td><td>{{$budgetData['budget'][0]->department}}</td></tr>
                  <tr><td><b>Employee :</b></td><td>{{$budgetData['budget'][0]->empname}}</td></tr>
                  <tr><td><b>Cost :</b></td><td>{{$budgetData['budget'][0]->costt}}</td></tr>
                </table>
               </div>
               <div class="col-md-6">
               <table class="table table-striped">
                  <tr><td><b>Checked Date :</b></td><td>{{$budgetData['budget'][0]->adm_date}}</td></tr>
                  <tr><td><b>Checked By  :</b></td><td>{{$budgetData['budget'][0]->admname}}</td></tr>
                  <tr><td><b>Approved By :</b></td><td>{{$budgetData['budget'][0]->supname}}</td></tr>
                  <tr>
                  <td><b>Approved Date :</b></td><td>{{$budgetData['budget'][0]->superadm_date}}</td>
                  </tr>
                </table>
               </div>
             </div>
            <hr>
            <form name="qryform" id="qryform" method="post" 
            action="{{url('hod/settelement/save')}}"  novalidate="novalidate">
          {{ csrf_field() }}  
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
              <label>Remark</label>
                <input type="text" class="form-control" id="cmnt" name="cmnt" autocomplete="off">
              </div>
              </div>
            </div>
            <input type="hidden" class="form-control" name="bgid" id="bgid" autocomplete="off" value="{{$budgetData['budget'][0]->id}}">
            <div class="row">
              <div class="col-md-12">
                <table class="table">
                  <thead>
                    <tr><td><b>Invoice No</b></td>
                    <td><b>Description</b>
                    <td><b>Amount</b></td>
                    <td></td>
                    </tr>
                    <tr>
                      <td><input type="text" class="form-control" id="invsno"></td>
                      <td><input type="text" class="form-control" id="dscrp"></td>

                      <td><input type="text" class="form-control" id="amount"></td>
                      <td>
                        <button type="button" class="btn btn-danger btn-sm" id="sttlplus">
                          <i class="fas fa-plus"></i>
                        </button>
                      </td>
                    </tr>
                  </thead>
                  <tbody id="stlmdata">
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                  
                                @if($budgetData['budget'][0]->settlement != 1)<button type="submit" class="btn btn-success">Submit</button>@endif 
                  
                <button type="clear" class="btn btn-info">Clear</button>
                <a type="button" class="btn btn-danger" href="{{url('/hod/settelement')}}">Close</a>
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