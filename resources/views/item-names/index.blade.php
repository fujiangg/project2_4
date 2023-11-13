@extends('item-names.head')

@extends('item-names.mainsidebar')

@extends('item-names.navbar')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Options</h1>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      {{-- ITEM OPTION --}}
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card">
              <div class="card-header">
                <div class="card-body">
                  <div>

                    <a class="btn btn-dark" href="{{ route('item-names.create') }}">Add New Item Options</a>
                  
                    @if ($message = Session::get('success'))
                      <div class="alert alert-success">
                          <p>{{ $message }}</p>
                      </div>
                    @endif

                    <table id="example1" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Item Options</th>
                          <th>Created Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($item_names as $option)
                          <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $option->name }}</td>
                            <td>{{ $option->created_at }}</td>
                            <td>
                              <form action="{{ route('item-names.destroy',$option->id) }}" method="POST">
                          
                                <a class="btn btn-block btn-outline-dark btn-sm" href="{{ route('item-names.edit',$option->id) }}">Edit</a>
              
                                @csrf
                                @method('DELETE')
                                
                                <button type="submit" class="btn btn-block btn-outline-dark btn-sm" onclick="return confirm('Are you sure you want to delete this option?')">Delete</button>

                              </form>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>

                    <div class="row text-center">
                        {!! $item_names->links() !!}
                    </div>
                    
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->


      {{-- MANUFACTURER OPTION --}}
     <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              <div class="card-body">
                <div>

                  <a class="btn btn-dark" href="{{ route('manufacturer-names.create') }}">Add New Manufacturer Options</a>
                
                  @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                  @endif

                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Manufacturer Options</th>
                        <th>Created Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($manufacturer_names as $option)
                        <tr>
                          <td>{{ ++$i }}</td>
                          <td>{{ $option->name }}</td>
                          <td>{{ $option->created_at }}</td>
                          <td>
                            <form action="{{ route('manufacturer-names.destroy',$option->id) }}" method="POST">
                      
                              <a class="btn btn-block btn-outline-dark btn-sm" href="{{ route('manufacturer-names.edit',$option->id) }}">Edit</a>
            
                              @csrf
                              @method('DELETE')
                              
                              <button type="submit" class="btn btn-block btn-outline-dark btn-sm" onclick="return confirm('Are you sure you want to delete this option?')">Delete</button>

                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                  <div class="row text-center">
                      {!! $manufacturer_names->links() !!}
                  </div>
                  
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->


    {{-- CONFIGURATION STATUS OPTION --}}
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              <div class="card-body">
                <div>

                  <a class="btn btn-dark" href="{{ route('configurationStatus-names.create') }}">Add New Configuration Status Options</a>
                
                  @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                  @endif

                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Configuration Status Options</th>
                        <th>Created Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($configuration_status_names as $option)
                        <tr>
                          <td>{{ ++$i }}</td>
                          <td>{{ $option->name }}</td>
                          <td>{{ $option->created_at }}</td>
                          <td>
                            <form action="{{ route('configurationStatus-names.destroy',$option->id) }}" method="POST">
                      
                              <a class="btn btn-block btn-outline-dark btn-sm" href="{{ route('configurationStatus-names.edit',$option->id) }}">Edit</a>
            
                              @csrf
                              @method('DELETE')
                              
                              <button type="submit" class="btn btn-block btn-outline-dark btn-sm" onclick="return confirm('Are you sure you want to delete this option?')">Delete</button>

                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                  <div class="row text-center">
                      {!! $configuration_status_names->links() !!}
                  </div>
                  
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->


    <!-- Main Footer -->
      <footer class="main-footer">
          <!-- To the right -->
          <div class="float-right d-none d-sm-inline">
          Anything you want
          </div>
          <!-- Default to the left -->
          <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
      </footer>

  </div>
  <!-- ./wrapper -->

@endsection

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('adminLTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
 
