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
                  <th></th>
                  <th>EMP</th>
                  <th>Date</th>
                  <th>Department</th>
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
                       @if ($show->approve2 == 1 && $show->approve3 == 0)
                      <span class="badge badge-info">Pending</span>
                    @elseif ($show->approve3 == 1 && $show->approve2 == 3)
                      <span class="badge badge-success">Approved</span>
                    @elseif ($show->approve3 == 2)
                      <span class="badge badge-danger">Reject</span>
                      @elseif ($show->approve3 == 0)
                      <span class="badge badge-info">Pending</span>
                    @elseif ($show->approve3 == 1 && $show->approve2 == 1)
                      <span class="badge badge-warning">Pending relese</span>
                      @elseif ($show->approve3 == 6 && $show->approve2 == 6)
                      <span class="badge badge-danger" style="background-color: purple;">Reversed</span>
                      @elseif ($show->approve3 == 6 && $show->approve2 == 1)
                      <span class="badge badge-danger" style="background-color: purple;">Changed</span>
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