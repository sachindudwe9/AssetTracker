@extends('layouts.base')


@section('content')
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6 mx-auto">
          <!-- general form elements -->
          <div class="card card-primary mt-4">
            <div class="card-header">
              <h3 class="card-title">Create Asset Data</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('asset.store')}}" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="a_name">Assets Name<span class="error">*</span></label>
                  <input type="text" class="form-control" id="a_name" name="asset_name" placeholder="Enter Assets Name" value="{{old('asset_name')}}">
                  @error('asset_name')
                    <p class="small text-danger">{{$message}}</p>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="at_name">Assets Type<span class="error">*</span></label>
                  <select class="form-select" id="at_name" name="asset_types_id">
                    <option value="">Select Assets Type</option>
                    @foreach ($assetType as $at)
                        <option value="{{$at->id}}">{{$at->asset_type_name}}</option>
                    @endforeach
                    </select>
                    <a href="{{route('asset-type.create')}}" class="nav-link m-0 p-0 small text-info">Add Assets Type Here</a>
                  @error('asset_types_id')
                    <p class="small text-danger">{{$message}}</p>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="a_code">Asset Code</label>
                  @php $num_str = sprintf("%16d", mt_rand(1, 9999999999999999)); @endphp
                  <input type="text" class="form-control" id="a_code" name="asset_code" placeholder="Enter Assets Name" value="{{$num_str}}" readonly>
                  <span class="feedback small text-muted">Asset Code Will Generated Automatically</span>
                  @error('asset_code')
                    <p class="small text-danger">{{$message}}</p>
                  @enderror
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="float-end btn btn-success" style="width: 100px;">Add</button>
              </div>
            </form>
          </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

</div>

@endsection