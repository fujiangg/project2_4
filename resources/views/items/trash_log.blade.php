@extends('items.head')

@extends('items.mainsidebar')

@extends('items.navbar')

@section('content')

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Activity Log
                </div>
                <div class="card-body">
                    <div class="accordion" id="accordionExample">
                        @forelse ($logs as $key => $log)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button {{ $key != 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $key }}" aria-expanded="true" aria-controls="collapse-{{ $key }}">
                                <span>{{ $log->description }}</span> <small class="text-muted ms-2 pb-1">({{ $log->created_at->diffForHumans() }})</small>
                                </button>
                            </h2>
                            <div id="collapse-{{ $key }}" class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    @if ($log->event == 'updated')
                                    <ul class="list-group">
                                        <li class="list-group-item bg-secondary text-white">Old Data</li>
                                        <li class="list-group-item"><strong>Item:</strong> {{ $log['properties']['old']['item'] }}</li>
                                        <li class="list-group-item"><strong>Manufacturer:</strong> {{ $log['properties']['old']['manufacturer'] }}</li>
                                        <li class="list-group-item"><strong>Serial Number:</strong> {{ $log['properties']['old']['serial_number'] }}</li>
                                        <li class="list-group-item"><strong>Configuration Status:</strong> {{ $log['properties']['old']['configuration_status'] }}</li>
                                        <li class="list-group-item"><strong>Location:</strong> {{ $log['properties']['old']['location'] }}</li>
                                        <li class="list-group-item"><strong>Description:</strong> {{ $log['properties']['old']['description'] }}</li>
                                        <li class="list-group-item"><strong>Created Date:</strong> {{ $log['properties']['old']['created_date'] }}</li>
                                        <li class="list-group-item bg-secondary text-white">New Data</li>
                                        <li class="list-group-item"><strong>Item:</strong> {{ $log['properties']['attributes']['item'] }}</li>
                                        <li class="list-group-item"><strong>Manufacturer:</strong> {{ $log['properties']['attributes']['manufacturer'] }}</li>
                                        <li class="list-group-item"><strong>Serial Number:</strong> {{ $log['properties']['attributes']['serial_number'] }}</li>
                                        <li class="list-group-item"><strong>Configuration Status:</strong> {{ $log['properties']['attributes']['configuration_status'] }}</li>
                                        <li class="list-group-item"><strong>Location:</strong> {{ $log['properties']['attributes']['location'] }}</li>
                                        <li class="list-group-item"><strong>Description:</strong> {{ $log['properties']['attributes']['description'] }}</li>
                                        <li class="list-group-item"><strong>Created Date:</strong> {{ $log['properties']['attributes']['created_date'] }}</li>
                                    </ul>
                                    @elseif ($log->event == 'created')
                                    <ul class="list-group">
                                        <li class="list-group-item bg-secondary text-white"> Data</li>
                                        <li class="list-group-item"><strong>Item:</strong> {{ $log['item'] }}</li>
                                        <li class="list-group-item"><strong>Manufacturer:</strong> {{ $log['manufacturer'] }}</li>
                                        <li class="list-group-item"><strong>Serial Number:</strong> {{ $log['serial_number'] }}</li>
                                        <li class="list-group-item"><strong>Configuration Status:</strong> {{ $log['configuration_status'] }}</li>
                                        <li class="list-group-item"><strong>Location:</strong> {{ $log['location'] }}</li>
                                        <li class="list-group-item"><strong>Description:</strong> {{ $log['description'] }}</li>
                                        <li class="list-group-item"><strong>Created Date:</strong> {{ $log['created_date'] }}</li>
                                    </ul>
                                    @else
                                    {{ $log->description }}
                                    @endif
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-" aria-expanded="true" aria-controls="collapse-">
                                No activity found. find more deleted data on 
                                <a href="{{ route('items.trash') }}">trash table</a>
                                </button>
                            </h2>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div> --}}



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Activity Log</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Activity Log</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                    @forelse ($logs as $key => $log)
                    <button class="accordion-button {{ $key != 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $key }}" aria-expanded="true" aria-controls="collapse-{{ $key }}">
                        <span>{{ $log->description }}</span> <small class="text-muted ms-2 pb-1">({{ $log->created_at->diffForHumans() }})</small>
                    </button>
                    <div id="collapse-{{ $key }}" class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}" data-bs-parent="#accordionExample">
                        <div class="accordion-body">

                          @if ($log->event == 'updated')

                            <h5>Old Data</h5>
                            <thead>
                            <tr>
                                    <th>Item</th>
                                    <th>Manufacturer</th>
                                    <th>Serial Number</th>
                                    <th>Configuration Status</th>
                                    <th>Location</th>
                                    <th>Description</th>
                                    <th>Created Date</th>
                                    <th>Updated Date</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $log['properties']['old']['item'] }}</td>
                                    <td>{{ $log['properties']['old']['manufacturer'] }}</td>             
                                    <td>{{ $log['properties']['old']['serial_number'] }}</td>
                                    <td>{{ $log['properties']['old']['configuration_status'] }}</td>
                                    <td>{{ $log['properties']['old']['location'] }}</td>
                                    <td>{{ $log['properties']['old']['description'] }}</td>
                                    <td>{{ $log['properties']['old']['created_date'] }}</td>
                                    <td>{{ $log['properties']['old']['updated_date'] }}</td>
                                </tr>
                            </tbody>

                            <h5>New Data</h5>
                            <thead>
                            <tr>
                                    <th>Item</th>
                                    <th>Manufacturer</th>
                                    <th>Serial Number</th>
                                    <th>Configuration Status</th>
                                    <th>Location</th>
                                    <th>Description</th>
                                    <th>Created Date</th>
                                    <th>Updated Date</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $log['properties']['attributes']['item'] }}</td>
                                    <td>{{ $log['properties']['attributes']['manufacturer'] }}</td>             
                                    <td>{{ $log['properties']['attributes']['serial_number'] }}</td>
                                    <td>{{ $log['properties']['attributes']['configuration_status'] }}</td>
                                    <td>{{ $log['properties']['attributes']['location'] }}</td>
                                    <td>{{ $log['properties']['attributes']['description'] }}</td>
                                    <td>{{ $log['properties']['attributes']['created_date'] }}</td>
                                    <td>{{ $log['properties']['attributes']['updated_date'] }}</td>
                                </tr>
                            </tbody>

                          @elseif ($log->event == 'created')
                            <h5>Data</h5>
                            <thead>
                            <tr>
                                    <th>Item</th>
                                    <th>Manufacturer</th>
                                    <th>Serial Number</th>
                                    <th>Configuration Status</th>
                                    <th>Location</th>
                                    <th>Description</th>
                                    <th>Created Date</th>
                                    <th>Updated Date</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $log['properties']['attributes']['item'] }}</td>
                                    <td>{{ $log['properties']['attributes']['manufacturer'] }}</td>             
                                    <td>{{ $log['properties']['attributes']['serial_number'] }}</td>
                                    <td>{{ $log['properties']['attributes']['configuration_status'] }}</td>
                                    <td>{{ $log['properties']['attributes']['location'] }}</td>
                                    <td>{{ $log['properties']['attributes']['description'] }}</td>
                                    <td>{{ $log['properties']['attributes']['created_date'] }}</td>
                                    <td>{{ $log['properties']['attributes']['updated_date'] }}</td>
                                </tr>
                            </tbody>

                          @else
                            {{ $log->description }}
                          @endif

                        @empty
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-" aria-expanded="true" aria-controls="collapse-">
                                    No activity found. find more deleted data on 
                                    <a href="{{ route('items.trash') }}">trash table</a>
                                    </button>
                                </h2>
                            </div>
                    @endforelse

                  </tbody>
                </table>
                <div class="row text-center">
                    {{-- {!! $logactivities->links() !!} --}}
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col-md-6 -->
          
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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

@endsection

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('adminLTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('adminLTE/dist/js/adminlte.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('adminLTE/dist/js/demo.js') }}"></script> --}}

</body>
</html>
{{-- 
</div>
@endsection --}}
 
