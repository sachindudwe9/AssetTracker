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
              <h3 class="card-title">Update  Assets Type Record</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
                <form action="{{route('asset-type.update',['asset_type'=>$item])}}" method="POST">
                    @method("put")
                 
                        @csrf
                          <div class="form-group">
                            <label for="at_name">Assets Type Name</label>
                            <input type="text" class="form-control" id="at_name" name="asset_type_name" placeholder="Enter Assets Type Name" value="{{$item->asset_type_name}}">
                            @error('asset_type_name')
                              <p class="small text-danger">{{$message}}</p>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="description">Description</label>
                            <textarea rows="5" class="form-control" name="asset_type_description" id="description" placeholder="description">{{$item->asset_type_description}}</textarea>
                            @error('asset_type_description')
                              <p class="small text-danger">{{$message}}</p>
                            @enderror
                          </div>
                        </div>
                        <!-- /.card-body -->
          
                        <div class="card-footer">   
                    <input type="submit" value="Update" class="btn btn-success">
                        </div>
                </form>
            </div>
          </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

</div>

@endsection