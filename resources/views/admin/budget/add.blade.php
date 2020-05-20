@extends('layouts.main')

@section('content')

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Budget Request Create New</h1>
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
            <h1 class="card-title"><b>Budget Request New</b></h1>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <div class="card-body">
          <form name="qryform" id="qryform" method="post" action="{{url('admin/budget/save')}}"  novalidate="novalidate">
          {{ csrf_field() }}  
          <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label>Purpose</label>
                  <input type="text" class="form-control" name="bname" id="bname" autocomplete="off">
                  @if($errors->has('bname'))
                   <div class="" style="padding: 0 !important;">
                      <span class="" style="color: red;">{{$errors->first('bname')}}</span>
                   </div>
                  @endif
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                <label>Cost</label>
                  <input type="text" class="form-control" name="cost" id="cost" autocomplete="off">
                  @if($errors->has('cost'))
                   <div class="" style="padding: 0 !important;">
                      <span class="" style="color: red;">{{$errors->first('cost')}}</span>
                   </div>
                  @endif
                  </div>
                 </div>
             </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Department Name</label>
                  <select class="form-control" name="depname" id="depname">
                    <option  value="">Select The Department</option>
                  @foreach($depname AS $depname)
                    <option  value="{{$depname->id}}">{{$depname->department}}</option>
                  @endforeach
                  </select>
                  @if($errors->has('depname'))
                   <div class="" style="padding: 0 !important;">
                      <span class="" style="color: red;">{{$errors->first('depname')}}</span>
                   </div>
                  @endif
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                  <label>Employee Name</label>
                    <select class="form-control" name="empname" id="empname">
                    <option  value="">Select The Employee</option>
                      @foreach($emply AS $emply)
                      <option  value="{{$emply->id}}">{{$emply->first_name}}</option>
                      @endforeach
                    </select>
                    @if($errors->has('empname'))
                   <div class="" style="padding: 0 !important;">
                      <span class="" style="color: red;">{{$errors->first('empname')}}</span>
                   </div>
                  @endif
                  </div>
                 </div>
             </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label>Project Description</label>
                  <textarea class="form-control" rows="4" cols="50" name="descrit" id="descrit"></textarea>
                  @if($errors->has('descrit'))
                   <div class="" style="padding: 0 !important;">
                      <span class="" style="color: red;">{{$errors->first('descrit')}}</span>
                   </div>
                  @endif 
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                  </div>
                 </div>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-info">Clear</button>
                <a type="button" class="btn btn-danger" href="{{url('/admin/budget')}}">Close</a>
             </form>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @stop