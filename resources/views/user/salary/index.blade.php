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

    

    <!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
     <div class="col-12">
  <!-- //////////////////////////////////////custome view////////////////////////////////////////// -->



          <div class="card">
            <div class="card-header">
               <a href="request" class="col-md-2 btn btn-block btn-primary float-right">Request Advance</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th></th>
                  <th>Amount</th>
                  <th>Date</th>
                  <th>Deduction Months</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($usersal as $show)
                  <tr>
                    <td></td>
                    <td>{{$show->amount}}</td>
                    <td>{{$show->created_at}}</td>
                    <td>{{$show->months}}</td>
                    <td>
                      @if ($show->approve2 == 3)
                      <span class="badge badge-success">Approved</span>
                      @elseif ($show->approve3 == 2 || $show->approve2 == 2 || $show->approve1 == 2)
                      <span class="badge badge-danger">Reject</span>
                      @else 
                      <span class="badge badge-info">Pending</span>
                      @endif
                    </td>
                    <td class="project-actions">
                          <a class="btn btn-primary btn-sm" href="view/{{$show->id}}">
                              <i class="fa fa-eye">
                              </i>
                          </a>
                           <a class="btn btn-default btn-sm"  title="comments"  href="comment/{{$show->id}}">
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