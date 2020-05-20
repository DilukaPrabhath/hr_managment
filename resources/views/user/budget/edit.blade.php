@extends('layouts.usermain')

@section('content')

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Budget Request Edit</h1>
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
          </div>
          <div class="card-body">
          <form name="qryform" id="qryform" method="post" action="{{url('hod/budget/edit/save')}}"  novalidate="novalidate">
          {{ csrf_field() }}  
          <input type="hidden" value="{{$budgetData['budget'][0]->id}}" name="id" id="id">
          <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label>Name</label>
                  <input type="text" class="form-control" name="bname" id="bname" value="{{$budgetData['budget'][0]->name}}">
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                <label>Cost</label>
                  <input type="text" class="form-control" name="cost" id="cost" value="{{$budgetData['budget'][0]->cost}}">
                  </div>
                 </div>
             </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label>Department Name</label>
                    <select class="form-control" name="depname" id="depname">
                    @foreach($depname AS $depname)
                      <option  value="{{$depname->id}}" {{$depname->id==$budgetData['budget'][0]->department_id?'selected':''}}>{{$depname->department}}</option>
                    @endforeach
                    </select>
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                <label>Employee Name</label>
                    <select class="form-control" name="empname" id="empname">
                      @foreach($emply AS $emply)
                      <option  value="{{$emply->id}}"{{$emply->id==$budgetData['budget'][0]->user_id?'selected':''}} >{{$emply->first_name}}</option>
                      @endforeach
                    </select>
                  </div>
                 </div>
             </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label>Project Description</label>
                  <textarea class="form-control" rows="4" cols="50" name="descrit" id="descrit">{{$budgetData['budget'][0]->discription}}</textarea> 
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                  </div>
                 </div>
             </div>
              <button type="submit" class="btn btn-success">Submit</button>
              <a type="button" class="btn btn-danger" href="{{url('user/budget')}}">Close</a>
             </form>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  @stop