@extends('items.head')

@extends('items.mainsidebar')

@extends('items.navbar')

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

    <form action="{{ route('items.update',$item->id) }}" method="POST">
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
                  <h3 class="card-title">Edit Item</h3>
                </div>

                <!-- Card Body -->
                <div class="card-body">

                  <div class="form-group">
                      <label for="itemName_id">Item</label>
                      <select name="itemName_id" id="itemName_id" class="form-control">
                        @foreach ($item_names as $option)
                            <option value="{{ $option->id }}" {{ $item->itemName_id == $option->id ? 'selected' : '' }}>{{ $option->name }}</option>
                        @endforeach
                      </select>
                  </div>

                  <div class="form-group">
                      <label for="manufacturer">Manufacturer</label>
                      <select name="manufacturerName_id" id="manufacturerName_id" class="form-control">
                        @foreach ($manufacturer_names as $option)
                            <option value="{{ $option->id }}" {{ $item->manufacturerName_id == $option->id ? 'selected' : '' }}>{{ $option->name }}</option>
                        @endforeach
                      </select>
                  </div>

                  <div class="form-group">
                    <label>Serial Number</label>
                    <input class="form-control" name="serial_number" value="{{ $item->serial_number }}">
                  </div>

                  <div class="form-group">
                      <label>Configuration Status</label>
                      <select name="configurationStatusName_id" id="configurationStatusName_id" class="form-control">
                        @foreach ($configuration_status_names as $option)
                            <option value="{{ $option->id }}" {{ $item->configurationStatusName_id == $option->id ? 'selected' : '' }}>{{ $option->name }}</option>
                        @endforeach
                      </select>
                  </div>

                  <div class="form-group">
                    <label>Location :</label>
                    <input class="form-control" name="location" placeholder="location" value="{{ $item->location }}">
                  </div>

                  <div class="form-group">
                    <label>Description :</label>
                    <input class="form-control" name="description" placeholder="description" value="{{ $item->description }}">
                  </div>
                  
                  <!-- Button Cancel & Save -->
                  <div class="row">
                    <div class="col-12">
                      <a href="{{ route('items.index') }}" class="btn btn-outline-dark">Cancel</a>
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