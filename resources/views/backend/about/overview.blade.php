@extends('layouts.backend')
@section('title','Overview')

@push('vendor-css')
    <!-- Datatable -->
    <link href="{{ asset('assets/backend/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
@endpush
@push('onpage-css')

@endpush
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi, Welcome back!</h4>
                        <span>Project Overview</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Overview</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Project Overview</h4>
                            <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                                    data-target="#addNewModal">Add New
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display" style="min-width: 845px">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Overview</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($about as $key=>$item)
                                        @php
                                            if (strlen($item->project_overview)>100){
                                               $overview_ = substr($item->project_overview,0,100);
                                            }else{
                                                 $overview_ = $item->project_overview ;
                                            }
                                        @endphp
                                        <tr>
                                            <td>{{ $key+1}}</td>
                                            <td>{{ $item->project_overview }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $item->image) }}"
                                                     width="100px"
                                                     height="60px">
                                            </td>
                                            <td>
                                                {{ $item->status ==  1 ? 'Active' : 'Inactive'}}
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <a href="javascript:void(0)"
                                                       class="btn btn-primary shadow btn-sm sharp mr-1 edit_row"
                                                       data-toggle="modal" data-target="#editModal"
                                                       data-id="{{$item->id}}">
                                                        <i class="fa fa-pencil"
                                                           style="color: #fff;font-size: 14px; "></i>
                                                    </a>

                                                    <a onclick="deleteItem({{$item->id}})"
                                                       class="btn btn-danger shadow btn-sm sharp">
                                                        <i class="fas fa-trash"
                                                           style="color: #fff;font-size: 14px; "></i>
                                                    </a>

                                                    <form id="delete-form-{{$item->id}}"
                                                          action="{{ route('about.destroy',$item->id.".Project Overview")}}"
                                                          method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Add New Modal -->
                <div class="modal fade" id="addNewModal">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form action="{{ route('about.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title">Add New Overview</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <input type="hidden" value="project_overview.Project overview" name="hint">
                                        <label for="overview">Overview <span class="req">*</span> </label>
                                        <textarea class="form-control" id="overview" name="overview"
                                                  placeholder="Overview">
                                        </textarea>
                                        @if ($errors->has('project_overview'))
                                            <span class="text-danger">{{ $errors->first('project_overview') }}</span>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="preview-img">
                                            <img src="{{asset('assets/backend/images/avatar/upload.png')}}"
                                                 class="imagePreView imagePreViewSelect imagePreViewEmpty">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <div class="choseEditImage">
                                                    <label for="uploadImage" class="editImageUp btn">Chose a
                                                        image </label>
                                                    <input type="file" class="form-control" id="uploadImage"
                                                           name="summaryImage" hidden>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Close
                                    </button>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!--Edit Modal -->
                <div class="modal fade" id="editModal">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form action="{{ route('about.update','project_overview.Project overview')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Overview</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <input type="text" id="row_id" name="old_id" hidden>
                                        <label for="edit_category_name">Overview <span class="req">*</span>
                                        </label>
                                        <textarea type="text" class="form-control" id="edit_category_name"
                                                  name="category_name"
                                                  value="{{old('project_overview', empty($errors->project_overview) ? '' : $errors->project_overview)}}"
                                                  placeholder="Overview">
                                        </textarea>
                                        @if ($errors->has('project_overview'))
                                            <span class="text-danger">{{ $errors->first('project_overview') }}</span>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="row_status" class="col-form-label">Status <span class="red">*</span></label>
                                                <select name="row_status" id="row_status" class="form-control" required>
                                                    <option value="1" {{old('status')==1 ? 'selected' : ''}}>
                                                        Active
                                                    </option>
                                                    <option value="0" {{old('status')==0 ? 'selected' : ''}}>
                                                        Inactive
                                                    </option>
                                                </select>
                                                @if ($errors->has('status'))
                                                    <span class="text-danger">{{ $errors->first('status') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="preview-img">
                                            <img src="" id="imagePreView"
                                                 class="imagePreView imagePreViewEdit imagePreViewModal">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <div class="choseEditImage">
                                                    <button type="button" class="edit-image" id="restoreImage">Restore
                                                    </button>
                                                    <label for="editImage" class="editImageUp btn">Chose a new
                                                        image </label>
                                                    <input type="file" class="form-control" id="editImage"
                                                           name="editSummaryImage"
                                                           hidden>
                                                    <input type="hidden" id="old_image" name="old_image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Close
                                    </button>
                                    <button type="submit" class="btn btn-primary">Update Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('vendor-js')
    <!-- Datatable -->
    <script src="{{ asset('assets/backend/vendor/datatables/js/jquery.dataTables.min.js')}} "></script>
    <script src="{{ asset('assets/backend/js/plugins-init/datatables.init.js')}}"></script>
@endpush
@push('onpage-js')
    <script>

        @if ($errors->any())
        $('#addNewModal').modal('show');
        @endif

        // edit
        $(document).on('click', '.edit_row', function (e) {
            var row_id = $(this).data('id');
            // alert(row_id);
            $('#editModal').modal('show');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "get",
                url: "{{ url('admin/about') }}/" + row_id + "/edit",
                dataType: "json",
                success: function (response) {

                    $('#row_id').val(response.row_data.id);
                    $('#edit_category_name').val(response.row_data.project_overview);
                    $('#row_status').val(response.row_data.status);
                    $('.imagePreViewEdit').attr('src', window.location.origin + "/storage/" + response.row_data.image);
                    $('#restoreImage').attr('data-id', response.row_data.image);
                    $('#old_image').val(response.row_data.image);
                },
                error: function (response) {
                    alert("Error")
                }
            });
            e.preventDefault();
        });

    </script>
@endpush
