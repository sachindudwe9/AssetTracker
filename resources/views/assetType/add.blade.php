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
              <h3 class="card-title">Create Assets Type Record</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('asset-type.store')}}" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="at_name">Assets Type Name<span class="error">*</span></label>
                  <input type="text" class="form-control" id="at_name" name="asset_type_name" placeholder="Enter Assets Type Name" value="{{old('asset_type_name')}}">
                  @error('asset_type_name')
                    <p class="small text-danger">{{$message}}</p>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="description">Description<span class="error">*</span></label>
                  <textarea rows="5" class="form-control" name="asset_type_description" id="description" placeholder="description">{{old('asset_type_description')}}</textarea>
                  @error('asset_type_description')
                    <p class="small text-danger">{{$message}}</p>
                  @enderror
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary" style="width:100px;">Add</button>
              </div>
            </form>
          </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

</div>

@endsection