@extends('layouts.usermain')

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
            	 <form action="savesalary" method="post" >
                    {{csrf_field()}}
             </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Amount</label>
                  <input type="number" name="amount" class="form-control" value="{{$sal->amount}}">
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                  <label>Deduction Months</label>
                  <input type="number" name="months" class="form-control" value="{{$sal->months}}">
                  </div>
                 </div>
             </div>

        <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Date</label>
                  <input type="text" name="" class="form-control" value="{{$sal->adddate}}">
                  </div>
                </div>
               
             </div>


              <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Purpose</label>
                  <textarea class="form-control" name="perpose">{{$sal->perpose}}</textarea>
                  <!-- <input type="text" class="form-control"> -->
                  </div>
                </div>
               
             </div>


             <div class="row">
              <div class="col-md-6">
               
                </div>
                <div class="col-md-6">
               
               <a class="btn btn-default float-right" style="margin:  5px;" title="comments"  href="{{url('user/salary/advance')}}">
                             
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