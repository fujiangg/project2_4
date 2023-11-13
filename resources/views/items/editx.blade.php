@extends('items.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div>
                <h2>Edit Item</h2>
            </div>
            <div>
                <a class="btn btn-primary" href="{{ route('items.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
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
  
    <form action="{{ route('items.update',$item->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Item:</strong>
                    <input type="text" name="item" value="{{ $item->item }}" class="form-control" placeholder="Item">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Manufacturer:</strong>
                    <input class="form-control" name="manufacturer" placeholder="Manufacturer" value="{{ $item->manufacturer }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>serial_number:</strong>
                    <input class="form-control" name="serial_number" placeholder="serial_number" value="{{ $item->serial_number }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>configuration_status:</strong>
                    <input class="form-control" name="configuration_status" placeholder="configuration_status" value="{{ $item->configuration_status }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>location:</strong>
                    <input class="form-control" name="location" placeholder="location" value="{{ $item->location }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>description:</strong>
                    <input class="form-control" name="description" placeholder="description" value="{{ $item->description }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>created_date:</strong>
                    <input type="datetime" class="form-control" name="created_date" placeholder="created_date" value="{{ $item->created_date }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
   
    </form>
@endsection