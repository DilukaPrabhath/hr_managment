@extends('layouts.supermain')

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

    

    <!-- Main content -->
        <section class="content">
      <div class="container-fluid">
        <div class="card">
            <div class="card-header">
               
               <button type="button" class="col-md-2 btn btn-block btn-primary float-right" data-toggle="modal" data-target="#modal-lg">
                  Add Comment
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

        <!-- Timelime example  -->
        <div class="row">
          <div class="col-md-12">
            <!-- The time line -->
            <div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-red">Time Line</span> <span class="bg-blue">Requested Amount : {{$data[0]->requested_sal_advance}}</span> <span class="bg-blue">Approved Amount : {{$data[0]->approve_sal_advance}}</span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
               <!-- /.timeline-label -->
             @foreach($data as $show)
              <div>
                <i class="fas fa-comments bg-yellow"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> {{$show->created_at}}</span>
                  <h3 class="timeline-header"><a href="#">{{$show->reg_no}}</a> {{$show->user_type}}</h3>

                  <div class="timeline-body">
                    {{$show->comment}}
                  </div>
                  
                </div>
              </div>

               @endforeach
               <div>
                <i class="fas fa-clock bg-gray"></i>
              </div>
              <!-- END timeline item -->
              </div>
              <a class="btn btn-default float-right" style="margin:  5px;" title="comments"  href="{{url('/superadmin/salary')}}">Back</a>
            </div>
          </div>
          </div>

          </div>
          <!-- /.col -->
        </div>
      </div>
      <!-- /.timeline -->

    </section>




      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Comments</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="comment2/{{$show->salary_advance_id}}" method="post">
                    {{csrf_field()}}
            <div class="modal-body">
              <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                   <input type="hidden" name="id_comment" value="{{$show->salary_advance_id}}">
                  <label>Note Comments</label>
                  <textarea class="form-control" required="" name="salary_comments">{{Request::old('salary_comments')}}</textarea>
                   @if($errors->has('salary_comments'))
                                        <div class="alert alert-danger" style="padding: 0 !important;">
                                            <span class="alert-danger">{{$errors->first('salary_comments')}}</span>
                                        </div>
                                    @endif
                 <!--  <input type="text" class="form-control"> -->
                  </div>
                </div>
               
             </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->






    <!-- //////////////////////////////////////end custome view////////////////////////////////////////// -->
    <!-- /.content -->
  </div>

  @stop