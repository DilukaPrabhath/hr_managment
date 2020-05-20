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
        <div class="card card-default">
          <div class="card-header">
            <h1 class="card-title"><b>Edit Department</b></h1>
          </div>
          <div class="card-body">
          <form name="qryform" id="qryform" method="post" action="{{url('/department/update')}}"  novalidate="novalidate">
          {{ csrf_field() }}
          <input type="hidden" value="{{$depData[0]->id}}" name="id" id="id">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Department</label>
                  <input type="text" class="form-control" value="{{$depData[0]->department}}" name="dname" id="dname" readonly>
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
                  <label>Status</label>
                    <select class="form-control select" name="stts" id="stts">
                      <option value="1" {{$depData[0]->status=='1'?'selected':''}}>Active</option>
                      <option value="0" {{$depData[0]->status=='0'?'selected':''}}>Inactive</option>
                    </select>
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
                <a class="btn btn-danger" href="{{url('/department')}}">Close</a>
              </form>
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


