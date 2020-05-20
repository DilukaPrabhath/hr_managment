@extends('layouts.main')

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
    <!-- Small boxes (Stat box) -->
    <div class="row">
     <div class="col-12">
  <!-- //////////////////////////////////////custome view////////////////////////////////////////// -->



          <div class="card">
            <div class="card-header">
               <a href="salary/create" class="col-md-2 btn btn-block btn-primary float-right">Request Advance</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th></th>
                  
                  <th>EMP</th>
                  <th>Date</th>
                  <th>Dipartment</th>
                  <th>Amount</th>
                  <th>Deduction Months</th>
                  
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               <!--  -->
                  @foreach($data as $show)
                  <tr>
                    <td></td>
                    <td>{{$show->reg_no}}</td>
                    <td>{{$show->created_at}}</td>
                    <td>{{$show->department}}</td>
                    <td>{{$show->amount}}</td>
                    <td>{{$show->months}}</td>
                    
                    <td>
                       @if ($show->approve2 == 0)
                      <span class="badge badge-info">Pending</span>
                    @elseif ($show->approve2 == 1 && $show->approve3 == 0)
                      <span class="badge badge-success">Send for Approve</span>
                      @elseif ($show->approve2 == 1 && $show->approve3 == 1)
                      <span class="badge badge-success">Super admin Approved</span>
                    @elseif ($show->approve2 == 2)
                      <span class="badge badge-danger">Rejected</span>
                      @elseif ($show->approve2 == 1 && $show->approve3 == 2)
                      <span class="badge badge-danger">Super Admin Rejected</span>
                      @elseif ($show->approve2 == 5 && $show->approve1 == 5)
                      <span class="badge badge-danger" style="background-color: purple;">Reversed</span>
                      @elseif ($show->approve2 == 5 && $show->approve1 == 1)
                      <span class="badge badge-danger" style="background-color: purple;">Changed Request</span>
                      @elseif ($show->approve2 == 6 && $show->approve3 == 6)
                      <span class="badge badge-danger" style="background-color: purple;">Super Admin Reversed</span>
                      @elseif ($show->approve2 == 1 && $show->approve3 == 6)
                      <span class="badge badge-success">Send for Approve</span>
                      @elseif ($show->approve2 == 3)
                      <span class="badge badge-warning">Released</span>
                     @endif
                    </td>
                    <td class="project-actions">
                          <a class="btn btn-primary btn-sm" href="salary/view/{{$show->id}}">
                              <i class="fa fa-eye">
                              </i>
                          </a>
                           <a class="btn btn-default btn-sm"  title="comments"  href="salary/comment/{{$show->id}}">
                              <i class="fa fa-comments">
                              </i>
                          </a>
                         
                          @if ($show->approve2 == 1 && $show->approve3 == 1)
                          <a class="btn btn-warning btn-sm" href="adminsalary/approve/{{$show->id}}">
                              <i class="fas fa-thumbs-up"  style="color: white;"></i>
                          </a>
                          @endif
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