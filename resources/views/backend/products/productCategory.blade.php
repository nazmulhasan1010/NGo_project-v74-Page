@extends('layouts.backend')
@section('title','Product Category')

@push('vendor-css')
    <!-- Datatable -->
    <link href="{{ asset('assets/backend/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
@endpush
@push('onpage-css')
    <style>
        .category-modal {
            display: none;
        }

        .modal-body {
            display: flex;
        }

        .modal-body .inputs {
            width: 50%;
        }

        .modal-body .inputs:nth-child(2) {
            margin-left: 20px;
        }

        .modal-content {
            width: 100%;
        }

        .modal-dialog {
            width: 800px;
        }

        .preview-img {
            position: relative;
            height: 250px;
            width: 280px;
        }

        .imagePreView {
            height: 180px;
            width: 250px;
            position: absolute;
            top: 0;
            left: 60px;
            z-index: 3;
            border-radius: 10px;
        }

        .preview-2 {
            height: 180px;
            width: 250px;
            position: absolute;
            top: 15px;
            left: 75px;
            border-radius: 10px;
            background-color: rgba(51, 51, 51, 0.41);
        }

        .image-counter {
            position: absolute;
            top: 75px;
            left: 180px;
            z-index: 9;
            background-color: rgba(255, 255, 255, 0.70);
            font-size: 22px;
            padding: 2px 10px;
            border-radius: 3px;
            color: rgba(51, 51, 51, 0.70);
            font-weight: bold;
        }
        .allImageSize{
            width: 100%;
            text-align: center;
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
                        <span>Products Category</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Products Category</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Products Category</h4>
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
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($category as $key=>$item)
                                        <tr>
                                            <td>{{ $key+1}}</td>
                                            <td>{{ $item->title }}</td>
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
                                                          action="{{ route('products_category.destroy',$item->id) }}"
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
                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document" style="width:800px">
                        <div class="modal-content">
                            <form action="{{ route('products_category.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title">Add New Product Category</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body ">
                                    <div class="inputs">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="categoryTitle">Category Title<span class="req">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="categoryTitle"
                                                           name="categoryTitle" placeholder="Category Title">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="categoryTitle_bn">Category Title (BN)<span class="req">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="categoryTitle_bn"
                                                           name="categoryTitle_bn" placeholder="Category Title (BN)">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="inputs">
                                        <div class="row">
                                            <div class="preview-img">
                                                <img src="{{asset('assets/backend/images/avatar/upload.png')}}"
                                                     class="imagePreView imagePreViewSelect imagePreViewEmpty" alt="">
                                            </div>
                                            <div class="allImageSize"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <div class="choseEditImage">
                                                        <label for="uploadImage" class="editImageUp btn">Chose a
                                                            image </label>
                                                        <input type="file" class="form-control" id="uploadImage"
                                                               name="productCategoryImage" hidden >
                                                    </div>
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
                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                            <form action="{{ route('products_category.update','1')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Product Category</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="inputs">
                                        <input type="hidden" name="old_id" id="editId">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="categoryTitleEdit">Category Title<span class="req">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="categoryTitleEdit"
                                                           name="categoryTitleEdit" placeholder="Category Title">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="categoryTitle_bnEdit">Category Title (BN)<span class="req">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="categoryTitle_bnEdit"
                                                           name="categoryTitle_bnEdit" placeholder="Category Title (BN)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="row_status" class="col-form-label">Status <span
                                                            class="red">*</span></label>
                                                    <select name="row_status" id="row_status" class="form-control"
                                                            required>
                                                        <option value="1" {{old('status')===1 ? 'selected' : ''}}>
                                                            Active
                                                        </option>
                                                        <option value="0" {{old('status')===0 ? 'selected' : ''}}>
                                                            Inactive
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="inputs">
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
                                                        <button type="button" class="edit-image" id="restoreImage">
                                                            Restore
                                                        </button>
                                                        <label for="editImage" class="editImageUp btn">Chose a new
                                                            image </label>
                                                        <input type="file" class="form-control" id="editImage"
                                                               name="editCategoryImage"
                                                               hidden>
                                                        <input type="hidden" id="old_image" name="old_image">
                                                    </div>
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
                url: "{{ url('admin/products_category') }}/" + row_id + "/edit",
                dataType: "json",
                success: function (response) {
                    var r_val = response.row_data;
                    $('#editId').val(r_val.id);
                    $('#categoryTitleEdit').val(r_val.title);
                    $('#categoryTitle_bnEdit').val(r_val.title_bn);

                    $('#row_status').val(r_val.status);
                    $('.imagePreViewEdit').attr('src', "{{asset('storage')}}" + "/" + r_val.image);
                    $('#restoreImage').attr('data-id', r_val.image);
                    $('#old_image').val(r_val.image);
                },
                error: function (response) {
                    alert("Error")
                }
            });
            e.preventDefault();
        });

        // image preview
        $('#uploadImage').change(function () {
            var file = $(this).prop('files')[0],
                files = $(this).prop('files'),
                reader = new FileReader(),
                len = files.length - 1;
            if (files.length > 1) {
                $('.preview-img').append('' +
                    '<div class="preview-2"></div>' +
                    ' <div class="image-counter">+' + len + '</div>'
                )
            }
            for (var i = 0, j = 0; i < files.length; i++) {
                j = files[i].size + j;
                if (i === len) {
                    let size = (j / (1024 * 1024)).toFixed(2);
                    $('.allImageSize').html('<p>Total: ' + size + ' mb</p>')
                    break
                }
            }
        })
        CKEDITOR.replace('editProductDes');
        CKEDITOR.replace('productDes_bn');
        CKEDITOR.replace('productDes');
    </script>
@endpush
