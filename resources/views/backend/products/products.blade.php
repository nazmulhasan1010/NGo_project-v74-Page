@extends('layouts.backend')
@section('title','Product')

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
    </style>
@endpush
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi, Welcome back!</h4>
                        <span>Products</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Products</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Products</h4>
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
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($products as $key=>$item)
                                        <tr>
                                            <td>{{ $key+1}}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $item->image) }}"
                                                     width="100px"
                                                     height="60px">
                                            </td>
                                            <td>{{ $item->category }}</td>
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
                                                          action="{{ route('products.destroy',$item->id) }}"
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
                            <form action="{{ route('products.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title">Add New Product</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body ">
                                    <div class="inputs">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="productTitle">Product Title<span class="req">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="productTitle"
                                                           name="productTitle" placeholder="Title">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="productDes">Description<span class="req">*</span>
                                                    </label>
                                                    <textarea class="form-control" id="productDes" name="productDes"
                                                              placeholder="Description"></textarea>
                                                </div>
                                            </div>
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
                                                               name="productImage" hidden>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="category" class="col-form-label">Category <span
                                                            class="red">*</span></label>
                                                    <select name="productCategory" id="category"
                                                            class="form-control"
                                                            required>
                                                        <option value="">Select</option>
                                                        <option value="food">Food</option>
                                                        <option value="fashion">Fashion</option>
                                                        <option value="agricultural">Agricultural</option>
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
                                                           name="productOtC" placeholder="Type category name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="inputs">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="ownerName">Owner Name<span class="req">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="ownerName"
                                                           name="ownerName" placeholder="Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="ownerMail">Owner Email<span class="req">*</span>
                                                    </label>
                                                    <input type="email" class="form-control" id="ownerMail"
                                                           name="ownerMail" placeholder="example@example.com">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="ownerContact">Owner Contact<span class="req">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="ownerContact"
                                                           name="ownerContact" placeholder="Contact Number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="ownerAddress">Owner Address<span class="req">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="ownerAddress"
                                                           name="ownerAddress" placeholder="Address">
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
                            <form action="{{ route('products.update','1')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Album</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="inputs">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <input type="text" id="row_id" name="old_id" hidden>
                                                    <label for="editProductTitle">Title <span
                                                            class="req">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="editProductTitle"
                                                           name="editProductTitle"
                                                           value=""
                                                           placeholder="Title">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="editProductDes">Description<span class="req">*</span>
                                                    </label>
                                                    <textarea class="form-control" id="editProductDes"
                                                              name="editProductDes"
                                                              placeholder="Description"></textarea>
                                                    <input type="hidden" id="oldDes" name="oldDes" value="oldDes">
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
                                                               name="editProductImage"
                                                               hidden>
                                                        <input type="hidden" id="old_image" name="old_image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="editCategory" class="col-form-label">Category <span
                                                            class="red">*</span></label>
                                                    <select name="productEditCategory" id="editCategory"
                                                            class="form-control"
                                                            required>
                                                        <option value="">Select</option>
                                                        <option
                                                            value="food" {{old('category')=='food' ? 'selected' : ''}}>
                                                            Food
                                                        </option>
                                                        <option
                                                            value="fashion" {{old('category')=='fashion' ? 'selected' : ''}}>
                                                            Fashion {{old('category')}}</option>
                                                        <option
                                                            value="agricultural" {{old('category')=='agricultural' ? 'selected' : ''}}>
                                                            Agricultural
                                                        </option>
                                                        <option value="others">Others</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row category-modal" id="categoryModalEdit">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="productEditOtC">Category<span
                                                            class="req"></span>
                                                    </label>
                                                    <input type="text" class="form-control" id="productEditOtC"
                                                           name="productEditOtC" placeholder="Type category name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="inputs">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="editOwnerName">Owner Name<span class="req">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="editOwnerName"
                                                           name="editOwnerName" placeholder="Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="editOwnerMail">Owner Email<span class="req">*</span>
                                                    </label>
                                                    <input type="email" class="form-control" id="editOwnerMail"
                                                           name="editOwnerMail" placeholder="example@example.com">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="editOwnerContact">Owner Contact<span class="req">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="editOwnerContact"
                                                           name="editOwnerContact" placeholder="Contact Number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="editOwnerAddress">Owner Address<span class="req">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="editOwnerAddress"
                                                           name="editOwnerAddress" placeholder="Address">
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
                url: "{{ url('admin/products') }}/" + row_id + "/edit",
                dataType: "json",
                success: function (response) {
                    var r_val = response.row_data;
                    console.log(r_val);
                    $('#row_id').val(r_val.id);
                    $('#editProductTitle').val(r_val.title);
                    $('#oldDes').val(r_val.description);
                    $('#editCategory').val(r_val.category);
                    $('#editOwnerName').val(r_val.owner_name);
                    $('#editOwnerMail').val(r_val.owner_email);
                    $('#editOwnerContact').val(r_val.owner_contact);
                    $('#editOwnerAddress').val(r_val.owner_address);

                    $('#row_status').val(r_val.status);
                    $('.imagePreViewEdit').attr('src', window.location.origin + "/storage/" + r_val.image);
                    $('#restoreImage').attr('data-id', r_val.image);
                    $('#old_image').val(r_val.image);
                },
                error: function (response) {
                    alert("Error")
                }
            });
            e.preventDefault();
        });
        CKEDITOR.replace('editProductDes');
        CKEDITOR.replace('productDes');
    </script>
@endpush
