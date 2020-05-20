@extends('layouts.supermain')

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
            
            <!-- /.card-header -->
            <div class="card-body">

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th id="appadd">Note</th>
                  <th>Date</th>
                  <th>User</th>
                  <th>Dipartment</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($table_data as $show)
                  <tr>
                    <td></td>

       
                    <td  style="width:400px"><?php echo substr("{$show->note}",0,30);?></td>
                    <td>{{$show->date}}</td>
                    <td>{{$show->reg_no}}</td>
                    <td>{{$show->department}}</td>
                    <td>
                    @if ($show->approve2 == 1 && $show->approve3 == 0)
                      <span class="badge badge-info">Pending</span>
                    @elseif ($show->approve3 == 1 && $show->approve2 == 3)
                      <span class="badge badge-success">Approved</span>
                    @elseif ($show->approve3 == 2)
                      <span class="badge badge-danger">Reject</span>
                    @elseif ($show->approve3 == 0)
                      <span class="badge badge-info">Pending</span>
                    @elseif ($show->approve3 == 1 && $show->approve2 == 1)
                      <span class="badge badge-success">Pending Relese</span>
                    @elseif ($show->approve3 == 6 && $show->approve2 == 6)
                      <span class="badge badge-danger" style="background-color: purple;">Reversed</span>
                    @endif
                    </td>
                    <td class="project-actions">
                          <a class="btn btn-primary btn-sm" href="superadmin/view/{{$show->id}}">
                              <i class="fa fa-eye">
                              </i>
                          </a>
                          
                        <!--   <a class="btn btn-warning btn-sm" href="superadmin/approve/{{$show->id}}">
                              <i class="fas fa-thumbs-up"  style="color: white;"></i>
                          </a> -->
                      
                          <!-- <a class="btn btn-danger btn-sm" href="superadmin/reject/{{$show->id}}">
                              <i class="fas fa-thumbs-down" style="color: white;"></i>
                          </a> -->
                 
                           <a class="btn btn-default btn-sm"  title="comments"  href="superadmin/comment/{{$show->id}}">
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