@extends('layouts.main')

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
               <a href="{{url('note/create')}}" class="col-md-2 btn btn-block btn-primary float-right">Request Note</a>
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

       
                    <td  style="width:100px"><?php echo substr("{$show->note}",0,30);?></td>
                    <td>{{$show->date}}</td>
                    <td>{{$show->reg_no}}</td>
                    <td>{{$show->department}}</td>
                    <td>
                       @if ($show->approve2 == 0)
                      <span class="badge badge-info">Pending</span>
                    @elseif ($show->approve2 == 1 && $show->approve3 == 0)
                      <span class="badge badge-success">Send to Approve</span>
                      @elseif ($show->approve2 == 1 && $show->approve3 == 1)
                      <span class="badge badge-success">Super Admin Approved</span>
                    @elseif ($show->approve2 == 2)
                      <span class="badge badge-danger">Rejected</span>
                    @elseif ($show->approve2 == 2 && $show->approve3 == 2)
                      <span class="badge badge-danger">Admin Rejected</span>
                    @elseif ($show->approve1 == 5 && $show->approve2 == 5)
                      <span class="badge badge-danger" style="background-color: purple;">Reversed</span>
                      @elseif ($show->approve1 == 1 && $show->approve2 == 5 && $show->approve3 == 0)
                      <span class="badge badge-danger" style="background-color: #0500FF;">Changed Request</span>
                      @elseif ($show->approve1 == 1 && $show->approve2 == 6 && $show->approve3 == 6)
                      <span class="badge badge-danger" style="background-color: #616363;">Super Admin Reversed</span>
                      @elseif ($show->approve2 == 3)
                      <span class="badge badge-warning">Released</span>
                     @endif
                    </td>
                    <td class="project-actions">
                          <a class="btn btn-primary btn-sm" href="adminnote/view/{{$show->id}}">
                              <i class="fa fa-eye">
                              </i>
                          </a>
                          @if ($show->approve2 !== 1 && $show->approve3 !== 1)
                          <a class="btn btn-success btn-sm" href="adminnote/edit/{{$show->id}}">
                              <i class="fas fa-edit"  style="color: white;"></i>
                          </a>
                          @endif
                          
                          @if ($show->approve2 == 1 && $show->approve3 == 1)
                          <a class="btn btn-warning btn-sm" href="adminnote/approve/{{$show->id}}">
                              <i class="fas fa-thumbs-up"  style="color: white;"></i>
                          </a>
                          @endif

                          <!-- <a class="btn btn-danger btn-sm" href="adminnote/reject/{{$show->id}}">
                              <i class="fas fa-thumbs-down" style="color: white;"></i>
                          </a> -->

                           <a class="btn btn-default btn-sm"  title="comments"  href="adminnote/comment/{{$show->id}}">
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