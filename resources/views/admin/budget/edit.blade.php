@extends('layouts.main')

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
          <form name="qryform" id="qryform" method="post" action="{{url('admin/budget/editsave')}}"  novalidate="novalidate">
          {{ csrf_field() }}  
          <input type="hidden" value="{{$budgetData['budget'][0]->id}}" name="id" id="id">
          <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label>Purpose</label>
                  <input type="text" class="form-control" name="bname" id="bname" value="{{$budgetData['budget'][0]->name}}">
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
                  <input type="text" class="form-control" name="cost" id="cost" value="{{$budgetData['budget'][0]->cost}}">
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
                    @foreach($depname AS $depname)
                      <option  value="{{$depname->id}}" {{$depname->id==$budgetData['budget'][0]->department_id ?'selected':''}}>{{$depname->department}}</option>
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
                      @foreach($emply AS $emply)
                      <option  value="{{$emply->id}}" {{$emply->id==$budgetData['budget'][0]->user_id ?'selected':''}}>{{$emply->first_name}}</option>
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
                  <textarea class="form-control" rows="4" cols="50" name="descrit" id="descrit">{{$budgetData['budget'][0]->discription}}</textarea> 
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