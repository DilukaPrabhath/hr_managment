@extends('layouts.hodmain')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Salary Advance</h1>
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
            <h1 class="card-title"><b>Salary Advance Request Forms</b></h1>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

            <div class="row">
              <div class="col-md-6">
                <form action="savesalary" method="post" >
                    {{csrf_field()}}
               
                  
                 </div>

             </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Amount</label>
                  <input type="number" name="amount" class="form-control">
                  @if($errors->has('amount'))
                       <div class="" style="padding: 0 !important;">
                           <span class="" style="color: red;">{{$errors->first('amount')}}</span>
                       </div>
                   @endif
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                  <label>Deduction Months</label>
                  <input type="number" name="months" class="form-control">
                  @if($errors->has('months'))
                       <div class="" style="padding: 0 !important;">
                           <span class="" style="color: red;">{{$errors->first('months')}}</span>
                       </div>
                   @endif
                  </div>
                 </div>
             </div>


              <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Purpose</label>
                  <textarea class="form-control" name="perpose"></textarea>
                  @if($errors->has('perpose'))
                       <div class="" style="padding: 0 !important;">
                           <span class="" style="color: red;">{{$errors->first('perpose')}}</span>
                       </div>
                   @endif
                  <!-- <input type="text" class="form-control"> -->
                  </div>
                </div>
               
             </div>

             <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Add Comments</label>
                  <textarea class="form-control" name="salary_comments">{{Request::old('salary_comments')}}</textarea>
                   @if($errors->has('salary_comments'))
                                        <div class="" style="padding: 0 !important;">
                                            <span class="" style="color: red;">{{$errors->first('salary_comments')}}</span>
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
               <input class="btn btn-success float-right" style="margin:  5px;" type="submit" value="Submit" name="">
               <a class="btn btn-default float-right" style="margin:  5px;" title="comments"  href="{{url('hod/salary/advance')}}">
                              Back
                          </a>
                </div>
               
             </div>

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