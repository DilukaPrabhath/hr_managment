@extends('layouts.usermain')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Note</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
        
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    

    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-secondary">
          <div class="card-header">
            <h1 class="card-title"><b>Note Request Forms</b></h1>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

            <div class="row">
              <div class="col-md-6">
                <form action="savenote" method="post">
                    {{csrf_field()}}
                <div class="form-group">
                  <label>Department</label>
                  <select class="form-control" style="width: 100%" name="department" disabled>
                    <option>Select Department</option>
                     @foreach($department as $value)
                       <option  value="{{$value->id}}" {{$value->id==$note1[0]->department_id?'selected':''}}>{{$value->department}}</option>
                     @endforeach  
            </select>
                  </div>
                  
                 </div>

             </div>

              <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Note</label>
                  <textarea class="form-control" name="note">{{$note1[0]->note}}</textarea>
                   
                  <!-- <input type="text" class="form-control"> -->
                  </div>
                </div>
             </div>

             <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Added Date</label>
                  <input type="text" class="form-control" name="" value="{{$note1[0]->date}}">
                  <!-- <textarea class="form-control" name="note">{{$note1[0]->reg_no}}</textarea> -->
                   
                  <!-- <input type="text" class="form-control"> -->
                  </div>
                </div>
             </div>

             <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Status</label>
                  <label></label>
                  @if ($note1[0]->approve2 == 3)
                      <span class="badge badge-success">Approved</span>
                      @elseif ($note1[0]->approve3 == 2 || $note1[0]->approve2 == 2 || $note1[0]->approve1 == 2)
                      <span class="badge badge-danger">Reject</span>
                      @else 
                      <span class="badge badge-info">Pending</span>
                  @endif
                  </div>
                </div>
               
             </div>

             <div class="row">
              <div class="col-md-6">
               
                </div>
                <div class="col-md-6">
               
               <a class="btn btn-default float-right" style="margin:  5px;" title="comments"  href="{{url('/usernote')}}">
                             
                              Back
                          </a>
                </div>
               
          </div>
        </form>
            </div>
            <!-- /.row -->

            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        
        </div>
        <!-- /.card -->

        <!-- SELECT2 EXAMPLE -->
        <!-- /.card -->
        <!-- /.card -->


        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- //////////////////////////////////////end custome view////////////////////////////////////////// -->
    <!-- /.content -->
  </div>

  @stop