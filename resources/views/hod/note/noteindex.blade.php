@extends('layouts.hodmain')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Note Approval</h1>
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
    <!-- Small boxes (Stat box) -->
    <div class="row">
     <div class="col-12">
  <!-- //////////////////////////////////////custome view////////////////////////////////////////// -->



          <div class="card">
            <div class="card-header">
               <a href="{{url('hodnote/create')}}" class="col-md-2 btn btn-block btn-primary float-right">Request Note</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th id="appadd">Note</th>
                  <th>Date</th>
                  <th>User</th>
                  <th>Department</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($table_data as $show)
                  <tr>
                    <td></td>
                    <td style="width: 250px;overflow:hidden;">{{$show->note}}</td>
                    <td>{{$show->date}}</td>
                    <td>{{$show->reg_no}}</td>
                    <td>{{$show->department}}</td>
                    <td>
                    @if ($show->approve1 == 0)
                      <span class="badge badge-info">Pending</span>
                    @elseif ($show->approve1 == 1 && $show->approve2 == null || $show->approve2 == 1)
                      <span class="badge badge-success">Send to Approvel</span>
                    @elseif ($show->approve1 == 2 || $show->approve2 == 2 || $show->approve1 == 2)
                      <span class="badge badge-danger">Reject</span>
                    @elseif ($show->approve1 == 5 && $show->approve2 == 5)
                      <span class="badge badge-danger" style="background-color: purple;">Reversed</span>
                      @elseif ($show->approve2 == 6 && $show->approve3 == 6)
                      <span class="badge badge-danger" style="background-color: purple;">Reversed</span>
                    @elseif ($show->approve1 == 1 && $show->approve2 == 1 && $show->approve3 == 1)
                      <span class="badge badge-default">Approved</span>
                    @endif
                     </td>
                      <!-- if ($show->approve1 == 1) return 'Accept';
                      if ($show->approve1 == 2) return 'Reject'; -->
                    
                    <td class="project-actions">
                          <a class="btn btn-primary btn-sm" href="hodnote/view/{{$show->id}}">
                              <i class="fa fa-eye">
                              </i>
                          </a>

                          @if ($show->approve1 !== 1)
                          <a class="btn btn-success btn-sm" href="hodnote/edit/{{$show->id}}">
                              <i class="fas fa-edit"  style="color: white;"></i>
                          </a>
                          @endif
                        
                        <a class="btn btn-default btn-sm"  title="comments"  href="hodnote/comment/{{$show->id}}">
                              <i class="fa fa-comments">
                              </i>
                          </a>
                      </td>
                  </tr>
                  @endforeach
                
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
</div>
</div>
</div>
</section>
    <!-- //////////////////////////////////////end custome view////////////////////////////////////////// -->
    <!-- /.content -->
  </div>

  @stop