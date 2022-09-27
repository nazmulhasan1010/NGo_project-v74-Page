@extends('layouts.backend')
@section('title','Knowledge')

@push('vendor-css')
    <!-- Datatable -->
    <link href="{{ asset('assets/backend/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
@endpush
@push('onpage-css')
    <style>
        .category-modal {
            display: none;
        }
    </style>
@endpush
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi, Welcome back!</h4>
                        <span>Knowledge</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Knowledge</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Knowledge</h4>
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
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($knowledge as $key=>$item)
                                        <tr>
                                            <td>{{ $key+1}}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{$item->category}}</td>
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
                                                          action="{{ route('knowledge.destroy',$item->id) }}"
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
                            <form action="{{ route('knowledge.store')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title">Add New Knowledge</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="knowledgeTitle">Title<span
                                                        class="req">*</span>
                                                </label>
                                                <input type="text" class="form-control" id="knowledgeTitle"
                                                       name="knowledgeTitle" placeholder="Title">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="knowledgeDes">Description<span
                                                        class="req"></span>
                                                </label>
                                                <textarea class="form-control"
                                                          id="knowledgeDes"
                                                          name="knowledgeDes">
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="knowledgeAttachment">Attachment<span
                                                        class="req">*</span>
                                                </label>
                                                <input type="file" class="form-control" id="knowledgeAttachment"
                                                       name="knowledgeAttachment">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="category" class="col-form-label">Category <span
                                                        class="red">*</span></label>
                                                <select name="knowledgeCategory" id="category"
                                                        class="form-control"
                                                        required>
                                                    <option value="">Select</option>
                                                    <option value="brochure">Brochure</option>
                                                    <option value="publication">Publication</option>
                                                    <option value="guideline">Policy Guideline</option>
                                                    <option value="others">Others</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row category-modal" id="categoryModal">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="otherC">Category<span
                                                        class="req"></span>
                                                </label>
                                                <input type="text" class="form-control" id="otherC"
                                                       name="knowledgeOtC" placeholder="Type category name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Close
                                        </button>
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!--Edit Modal -->
                <div class="modal fade" id="editModal">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form action="{{ route('knowledge.update','1')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Knowledge </h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <input type="hidden" id="row_id" name="old_id">
                                                <label for="knowledgeEditTitle">Title<span
                                                        class="req">*</span>
                                                </label>
                                                <input type="text" class="form-control" id="knowledgeEditTitle"
                                                       name="knowledgeEditTitle" placeholder="Title">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="knowledgeEditDes">Description<span
                                                        class="req">*</span>
                                                </label>
                                                <textarea class="form-control"
                                                          id="knowledgeEditDes"
                                                          name="knowledgeEditDes">
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <input type="hidden" id="old_file" name="old_file">
                                                <label for="fileEdit">Attachment
                                                </label>
                                                <input type="file" class="form-control" id="fileEdit"
                                                       name="editKnowAttachment" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" >
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="editCategory" class="col-form-label">Category <span
                                                        class="red">*</span></label>
                                                <select name="knowledgeEditCategory" id="editCategory"
                                                        class="form-control"
                                                        required>
                                                    <option value="">Select</option>
                                                    <option value="brochure" {{old('category')=='brochure' ? 'selected' : ''}}>Brochure</option>
                                                    <option value="publication" {{old('category')=='publication' ? 'selected' : ''}}>Publication {{old('category')}}</option>
                                                    <option value="guideline" {{old('category')=='guideline' ? 'selected' : ''}}>Policy Guideline</option>
                                                    <option value="others">Others</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row category-modal" id="categoryModalEdit">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="knowledgeEdidOtC">Category<span
                                                        class="req"></span>
                                                </label>
                                                <input type="text" class="form-control" id="knowledgeEdidOtC"
                                                       name="knowledgeEdidOtC" placeholder="Type category name">
                                            </div>
                                        </div>
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
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Close
                                        </button>
                                        <button type="submit" class="btn btn-primary">Update Changes</button>
                                    </div>
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
    <script
        src="{{ asset('assets/backend/vendor/datatables/js/jquery.dataTables.min.js')}}
                                                        "></script>
    <script
        src="{{ asset('assets/backend/js/plugins-init/datatables.init.js')}}
                                                        "></script>
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
                url: "{{ url('admin/knowledge') }}/" + row_id +
                    "/edit",
                dataType: "json",
                success: function (response) {
                    var r_val = response.row_data;
                    $('#row_id').val(r_val.id);
                    $('#knowledgeEditTitle').val(r_val.title);
                    $('#knowledgeEditDes').val(r_val.description);
                    $('#editCategory').val(r_val.category);
                    $('#old_file').val(r_val.attachment);
                    $('#row_status').val(r_val.status);
                },
                error: function (response) {
                    alert("Error")
                }
            });
            e.preventDefault();
        });
    </script>
@endpush
