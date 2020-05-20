@extends('layouts.main')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Department</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
          <div class="card-header">
            <h1 class="card-title"><b>Create New Department</b></h1>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <div class="card-body">
          <form name="qryform" id="qryform" method="post" action="{{url('department/save')}}" novalidate="novalidate">
          {{ csrf_field() }}
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Department</label>
                  <input type="text" class="form-control" name="dname" id="dname" autocomplete="off">
                  @if($errors->has('dname'))
                   <div class="" style="padding: 0 !important;">
                      <span class="" style="color: red;">{{$errors->first('dname')}}</span>
                   </div>
                  @endif
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                 
                 
                  </div>
                 </div>
             </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">

                  </div>
                </div>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-info">Clear</button>
                <a type="button" class="btn btn-danger" href="{{url('/department')}}">Close</a>
            </div>
            </form>
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


