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
                <form action="saveusernote" method="post">
                    {{csrf_field()}}
                <div class="form-group">
                  <label>Department</label>
                  <select class="form-control" style="width: 100%" name="department">
                    <option value="">Select Department</option>
                     @foreach($department as $value)
                       <option value="{{$value->id}}">{{$value->department}}</option>
                     @endforeach  
            </select>
            @if($errors->has('department'))
                 <div class="" style="padding: 0 !important;">
                    <span class="" style="color: red;">{{$errors->first('department')}}</span>
                  </div>
                  @endif
                  </div>
                  
                 </div>

             </div>

              <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Note</label>
                  <textarea class="form-control" name="note">{{Request::old('note')}}</textarea>
                   @if($errors->has('note'))
                                        <div class="" style="padding: 0 !important;">
                                            <span class="" style="color: red;">{{$errors->first('note')}}</span>
                                        </div>
                                    @endif
                  <!-- <input type="text" class="form-control"> -->
                  </div>
                </div>
               
             </div>

             <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Note Comments</label>
                  <textarea class="form-control" name="note_comments">{{Request::old('note_comments')}}</textarea>
                   @if($errors->has('note_comments'))
                                        <div class="" style="padding: 0 !important;">
                                            <span class="" style="color: red;">{{$errors->first('note_comments')}}</span>
                                        </div>
                                    @endif
                  <!-- <input type="text" class="form-control"> -->
                  </div>
                </div>
               
             </div>

             <div class="row">
              <div class="col-md-6">
               
                </div>
                <div class="col-md-6">
               <input type="submit" name="" class="btn btn-success float-right" style="margin:  5px;" value="Submit">
               <a class="btn btn-default float-right" style="margin:  5px;" title="comments"  href="{{url('/usernote')}}">Back</a>
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