@extends('configurationStatus-names.head')

@extends('configurationStatus-names.mainsidebar')

@extends('configurationStatus-names.navbar')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>
    <!-- /.Content Header (Page header) -->

    <!-- Error Message -->
    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
      </div>
    @endif
    <!-- /.Error Message --> 

    <form action="{{ route('configurationStatus-names.update',$configurationStatusName->id) }}" method="POST">
      @csrf
      @method('PUT')

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">

              <!-- Card -->
              <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">Edit Configuration Status</h3>
                </div>

                <!-- Card Body -->
                <div class="card-body">

                  <div class="form-group">
                      <label>Configuration Status Option</label>
                      <input type="text" name="name" value="{{ $configurationStatusName->name }}" class="form-control">
                  </div>
                  
                  <!-- Button Cancel & Save -->
                  <div class="row">
                    <div class="col-12">
                      <a href="{{ route('item-names.index') }}" class="btn btn-outline-dark">Cancel</a>
                      <input type="submit" value="Save" class="btn btn-outline-dark">
                    </div>
                  </div>
                  <!-- /.Button Cancel & Save -->

                </div>
                <!-- /.card-body -->

              </div>
              <!-- /.card -->

            </div>
          </div>
        </div>
      </section>
      <!-- /.Main content -->

    </form>

  </div>
  <!-- /.Content Wrapper. Contains page content -->

  <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
        Anything you want
        </div>
      <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
  <!-- /. Main Footer -->

@endsection