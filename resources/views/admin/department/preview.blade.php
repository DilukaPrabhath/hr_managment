@extends('layouts.main')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Department Preview</h1>
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
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h1 class="card-title"><b>Preview Department</b></h1>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Department Name</label>
                  <input type="text" class="form-control" value="{{$depData[0]->department}}" readonly>
                  </div>
                </div>
               <div class="col-md-6">
                <div class="form-group">
                <label>status</label>
                    @if($depData[0]->status==1)<input type="text" class="form-control" value="Active" readonly>
                      @else<input type="text" class="form-control" value="Inactive" readonly>
                      @endif
                  </div>
                 </div>
             </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Created date</label>
                  <input type="text" class="form-control" value="{{$depData[0]->date}}" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                  <label>Created By</label>
                  <input type="text" class="form-control" value="{{$depData[0]->cfnam}} {{$depData[0]->clnam}}" readonly>
                  </div>
                </div>
              </div>

              <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  
                  </div>
                </div>
                <div class="col-md-6">

                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <a type="button" class="btn btn-danger" href="{{url('/department')}}">Close</a>
                </div>
              </div>
            </div>
            </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
           <a href="https://select2.github.io/"></a>
          </div>
        </div>
      </div>
    </section>
  </div>

  @stop


