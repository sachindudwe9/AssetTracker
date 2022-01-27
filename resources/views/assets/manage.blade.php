@extends('layouts.base')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title;?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Assets</li> --}}
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
                    <th>Asset Name</th>
                    <th>Asset Type</th>
                    <th>Asset Code</th>
                  
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Click to change Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($assets as $item)
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$item->asset_name}}</td>
                              <td>{{$item->type->asset_type_name}}</td>
                              <td>{{$item->asset_code}}</td>
                              
                              <td>{{date("d-M-Y ",strtotime($item->created_at))}}</td>&nbsp;
                              <td>{{date("d-M-Y",strtotime($item->updated_at))}}</td>
                              <td class="text-center">
                                @php
                                if($item->is_active == false){
                               @endphp 

                               <a href="{{route('active',['id'=> $item->id])}}" class="badge text-white text-center bg-dark btn-sm">Inactive</a>
                               
                                 @php
                                     }else{
                                 @endphp
                                 
                                 <a href="{{route('in_active',['id'=> $item->id])}}" class="badge text-white bg-success btn-sm">Active</a>

                                 @php
                                   }  
                                 @endphp 
                              </td>
                              <td>
                                 
                                  <button type="button" data-bs-target="#data{{$item->id}}" data-bs-toggle="modal" class="btn btn-danger btn-sm">Delete</button>
                                    {{-- modal for delete --}}

                                    <div class="modal fade" id="data{{$item->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header text-start">
                                                    <h6>Area your Ready what to Delete <span class="fw-bold">{{$item->asset_name}}'s</span> Records</h6>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{route('asset.destroy',['asset'=>$item])}}" method="POST">
                                                        @method("delete")
                                                        @csrf
                                                        <input type="submit" value="Yes Delete It" class="btn btn-danger">

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#update{{$item->id}}" class="btn btn-info btn-sm">Edit</button>

                                    <div class="modal fade" id="update{{$item->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header text-start">
                                                    <h6>Update <span class="fw-bold">{{$item->asset_name}}'s</span> Records</h6>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('asset.update',['asset'=>$item])}}" method="POST">
                                                        @method("put")
                                                     
                                                            @csrf
                                                              <div class="form-group">
                                                                <label for="at_name">Assets Type Name</label>
                                                                <input type="text" class="form-control" id="at_name" name="asset_name" placeholder="Enter Assets Name" value="{{$item->asset_name}}">
                                                                @error('asset_name')
                                                                  <p class="small text-danger">{{$message}}</p>
                                                                @enderror
                                                              </div>
                                                              <div class="form-group">
                                                                <label for="at_name">Assets Type</label>
                                                                <select class="form-select" id="at_name" name="asset_types_id">
                                                                  <option value="{{$item->type->id}}">{{$item->type->asset_type_name}}</option>
                                                                    <option disabled>--------------------------</option>
                                                                  @foreach ($assetType as $at)
                                                                      <option value="{{$at->id}}">{{$at->asset_type_name}}</option>
                                                                  @endforeach
                                                                  </select>
                                                                @error('asset_types_id')
                                                                  <p class="small text-danger">{{$message}}</p>
                                                                @enderror
                                                              </div>
                                                            </div>
                                                            <!-- /.card-body -->
                                              
                                                            <div class="card-footer">
                                                        <input type="submit" value="Update" class="btn btn-success" style="width:100px;text-align:center;">
                                                            </div>
                                                      </form>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                              </td>
                          </tr>


                      @endforeach
                  
                </table>

                <div class="card">
                  <div class="card-body">
                    <div class="content-justify-center">
                      {{ $assets->links() }}
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