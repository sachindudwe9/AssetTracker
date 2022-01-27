@extends('layouts.base')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Asset Types</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Asset Type</li> --}}
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
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Asset Type Name</th>
                    <th>Asset Type Description</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($assetTypes as $item)
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$item->asset_type_name}}</td>
                              <td>{{$item->asset_type_description}}</td>
                              <td>{{date("d-M-Y h:i:s A",strtotime($item->created_at))}}</td>
                              <td>{{date("d-M-Y h:i:s A",strtotime($item->updated_at))}}</td>
                              <td>
                                    <button type="button" data-bs-target="#data{{$item->id}}" data-bs-toggle="modal" class="btn btn-danger btn-sm">Delete</button>
                                    {{-- modal for delete --}}

                                    <div class="modal fade" id="data{{$item->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header text-start">
                                                    <h6>Area you sure you want to Delete <span class="fw-bold">{{$item->asset_type_name}}'s</span> Records</h6>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{route('asset-type.destroy',['asset_type'=>$item])}}" method="POST">
                                                        @method("delete")
                                                        @csrf
                                                        <input type="submit" value="Yes Delete It" class="btn btn-danger">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    &nbsp;&nbsp;
                                    <a href="{{route('asset-type.edit',['asset_type'=>$item])}}" class="btn btn-info">Edit</a>
                              </td>
                          </tr>


                      @endforeach
                  
                </table>

                <div class="card">
                  <div class="card-body">
                    <div class="content-justify-center">
                      {{ $assetTypes->links() }}
                    </div>
                  </div>
                </div>

              </div>
              <!-- /.card-body -->
            </div>
      
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection