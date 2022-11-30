@extends('layouts.backend')
@section('title','Product')

@push('vendor-css')
    <!-- Datatable -->
    <link href="{{ asset('assets/backend/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
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

        .previewInCanvas .preview-2 {
            width: 100%;
            left: 15px;
        }

        .previewInCanvas .image-counter {
            left: 70px;
        }

        .allImageSize {
            width: 100%;
            text-align: center;
        }

        .productImageCanvas {
            height: 100px;
            width: 120px;
            margin: 5px;
            border-radius: 5px;
        }

        #productImages {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
        }

        .imageProduct {
            position: relative;
        }

        .productImageDelete {
            position: absolute;
            bottom: 10px;
            right: 10px;
            font-size: 18px;
        }

        .productImageDelete:hover {
            color: red;
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
                                            @php
                                                $image = getProductImage($item->product_id);
                                            @endphp
                                            @if(count($image)>0)
                                                <td class="productImageShow" style="position: relative;"
                                                    data-toggle="modal"
                                                    data-target="#imageModal"
                                                    data-id="{{$item->product_id}}">
                                                    <img src="{{ asset('storage/' . $image[0]->image) }}"
                                                         width="100px"
                                                         height="60px" style="border-radius: 5px; opacity: .7">
                                                    <div class="imageCounter"
                                                         style="position: absolute; top:30px; left:40px;background-color: rgba(51,51,51,0.90); padding: 2px 7px; border-radius: 2px; color: #fff">
                                                        +{{count($image)}}</div>
                                                </td>
                                            @else
                                                <td class="productImageShow " style="position: relative; "
                                                    data-toggle="modal"
                                                    data-target="#imageModal"
                                                    data-id="{{$item->product_id}}">
                                                    <button class="btn btn-primary">Add Images</button>
                                                </td>
                                            @endif
                                            @php
                                                $category = getCategories($item->category,'spe');
                                            @endphp
                                            <td>{{ $category[0]->title }}</td>
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
                {{-- image modal--}}
                <div class="modal fade" id="imageModal">
                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                            <form action="{{ route('productImageAdd')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title">Product Image modal</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-9">
                                        <div id="productImages"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="preview-img previewInCanvas" style="width: 100%">
                                                <img src="{{asset('assets/backend/images/avatar/upload.png')}}"
                                                     class="imagePreView imagePreViewSelect imagePreViewEmpty" alt=""
                                                     style="width: 100%; left: 0; ">
                                            </div>
                                            <div class="allImageSize"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <input type="hidden" name="product_id" id="product_id">
                                                    <div class="choseEditImage">
                                                        <label for="uploadImageAdd" class="editImageUp btn">Add a
                                                            image </label>
                                                        <input type="file" class="form-control" id="uploadImageAdd"
                                                               name="productImageAdd[]" hidden multiple>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Close
                                    </button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
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
                                                    <label for="productTitle_bn">Product Title (BN)<span
                                                            class="req">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="productTitle_bn"
                                                           name="productTitle_bn" placeholder="Title (BN)">
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
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="productDes_bn">Description(BN)<span class="req">*</span>
                                                    </label>
                                                    <textarea class="form-control" id="productDes_bn"
                                                              name="productDes_bn"
                                                              placeholder="Description"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        @php
                                            $categories = getCategories('','all');
                                        @endphp
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="category" class="col-form-label">Category <span
                                                            class="red">*</span></label>
                                                    <select name="productCategory" id="category"
                                                            class="form-control"
                                                            required>
                                                        <option value="">Select</option>
                                                        @foreach($categories as $category)
                                                            <option
                                                                value="{{$category->id}}">{{$category->title}}</option>
                                                        @endforeach
                                                        {{--                                                        <option value="others">Others</option>--}}
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
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="stock">Stock<span class="req">*</span>
                                                    </label>
                                                    <input type="number" class="form-control" id="stock"
                                                           name="stock" placeholder="Stock (Pieces)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="returnDays">Return Days<span class="req"></span>
                                                    </label>
                                                    <input type="number" class="form-control" id="returnDays"
                                                           name="returnDays" placeholder="Return (Days)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="warranty">Warranty<span class="req"></span>
                                                    </label>
                                                    <input type="number" class="form-control" id="warranty"
                                                           name="warranty" placeholder="Warranty (Days)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="additionalInfo">Additional Info<span
                                                            class="req">*</span>
                                                    </label>
                                                    <textarea class="form-control" id="additionalInfo"
                                                              name="additionalInfo"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="inputs">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="ownerCompany">Owner Company<span class="req"></span>
                                                    </label>
                                                    <input type="text" class="form-control" id="ownerCompany"
                                                           name="ownerCompany" placeholder="Owner Company">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="ownerName">Owner Name<span class="req"></span>
                                                    </label>
                                                    <input type="text" class="form-control" id="ownerName"
                                                           name="ownerName" placeholder="Owner Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="ownerCompanyLogo">Owner Company Logo<span
                                                            class="req"></span>
                                                    </label>
                                                    <input type="file" class="form-control" id="ownerCompanyLogo"
                                                           name="ownerCompanyLogo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="ownerMail">Owner Email<span class="req"></span>
                                                    </label>
                                                    <input type="email" class="form-control" id="ownerMail"
                                                           name="ownerMail" placeholder="example@example.com">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="ownerContact">Owner Contact<span class="req"></span>
                                                    </label>
                                                    <input type="text" class="form-control" id="ownerContact"
                                                           name="ownerContact" placeholder="Contact Number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="ownerAddress">Owner Address<span class="req"></span>
                                                    </label>
                                                    <input type="text" class="form-control" id="ownerAddress"
                                                           name="ownerAddress" placeholder="Address">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="productPrice">Price<span class="req">*</span>
                                                    </label>
                                                    <input type="number" class="form-control" id="productPrice"
                                                           name="productPrice" placeholder="Price (BDT)">
                                                </div>
                                            </div>
                                        </div>
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
                                                        <label for="uploadImage" class="editImageUp btn">Chose
                                                            images</label>
                                                        <input type="file" class="form-control" id="uploadImage"
                                                               name="productImage[]" hidden multiple>
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
                                                    <input type="hidden" id="row_id" name="row_id">
                                                    <label for="editProductTitle">Product Title<span
                                                            class="req">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="editProductTitle"
                                                           name="editProductTitle" placeholder="Title">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="editProductTitle_bn">Product Title (BN)<span
                                                            class="req">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="editProductTitle_bn"
                                                           name="editProductTitle_bn" placeholder="Title (BN)">
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
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="editProductDes_bn">Description(BN)<span
                                                            class="req">*</span>
                                                    </label>
                                                    <textarea class="form-control" id="editProductDes_bn"
                                                              name="editProductDes_bn"
                                                              placeholder="Description"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        @php
                                            $categories = getCategories('','all');
                                        @endphp
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="editProductCategory" class="col-form-label">Category
                                                        <span
                                                            class="red">*</span></label>
                                                    <select name="editProductCategory" id="editProductCategory"
                                                            class="form-control"
                                                            required>
                                                        <option value="">Select</option>
                                                        @foreach($categories as $category)
                                                            <option
                                                                value="{{$category->id}}">{{$category->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="editStock">Stock<span class="req">*</span>
                                                    </label>
                                                    <input type="number" class="form-control" id="editStock"
                                                           name="editStock" placeholder="Stock (Pieces)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="editReturnDays">Return Days<span class="req"></span>
                                                    </label>
                                                    <input type="number" class="form-control" id="editReturnDays"
                                                           name="editReturnDays" placeholder="Return (Days)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="editWarranty">Warranty<span class="req"></span>
                                                    </label>
                                                    <input type="number" class="form-control" id="editWarranty"
                                                           name="editWarranty" placeholder="Warranty (Days)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="editAdditionalInfo">Additional Info<span
                                                            class="req">*</span>
                                                    </label>
                                                    <textarea class="form-control" id="editAdditionalInfo"
                                                              name="editAdditionalInfo"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="inputs">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="editOwnerCompany">Owner Company<span class="req"></span>
                                                    </label>
                                                    <input type="text" class="form-control" id="editOwnerCompany"
                                                           name="editOwnerCompany" placeholder="Owner Company">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="editOwnerName">Owner Name<span class="req"></span>
                                                    </label>
                                                    <input type="text" class="form-control" id="editOwnerName"
                                                           name="editOwnerName" placeholder="Owner Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="editOwnerCompanyLogo">Owner Company Logo<span
                                                            class="req"></span>
                                                    </label>
                                                    <input type="file" class="form-control" id="editOwnerCompanyLogo"
                                                           name="editOwnerCompanyLogo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="editOwnerMail">Owner Email<span class="req"></span>
                                                    </label>
                                                    <input type="email" class="form-control" id="editOwnerMail"
                                                           name="editOwnerMail" placeholder="example@example.com">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="editOwnerContact">Owner Contact<span class="req"></span>
                                                    </label>
                                                    <input type="text" class="form-control" id="editOwnerContact"
                                                           name="editOwnerContact" placeholder="Contact Number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="editOwnerAddress">Owner Address<span class="req"></span>
                                                    </label>
                                                    <input type="text" class="form-control" id="editOwnerAddress"
                                                           name="editOwnerAddress" placeholder="Address">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="editProductPrice">Price<span class="req">*</span>
                                                    </label>
                                                    <input type="number" class="form-control" id="editProductPrice"
                                                           name="editProductPrice" placeholder="Price (BDT)">
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
    <script src="{{ asset('assets/backend/js/summernote-lite.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/javascript/axios.min.js')}}"></script>
@endpush
@push('onpage-js')
    <script>
        @if ($errors->any())
        $('#addNewModal').modal('show');
        @endif

        $('.productImageShow').click(function () {
            let product_id = $(this).data('id');
            $('#product_id').val(product_id);
            axios.post('productImageGet', {
                'product_id': product_id
            }).then(function (response) {
                let productImages = response.data;
                productImageShow(productImages);
                $('.productImageDelete').click(function () {
                    let id = $(this).data('id');
                    axios.post('deleteProductImage', {
                        'image_id': id
                    }).then(function (response) {
                        if (response.data === 1) {
                            axios.post('productImageGet', {
                                'product_id': product_id
                            }).then(function (response) {
                                productImageShow(response.data);
                            }).catch(function (error) {

                            });
                        }
                    }).catch(function (error) {

                    })
                });
            }).catch(function (error) {

            })
        });

        function productImageShow(data) {
            $('#productImages').empty();
            $.each(data, function (key, item) {
                $('#productImages').append('' +
                    '<div class="imageProduct">' +
                    '<img class="productImageCanvas" src="{{asset('storage')}}/' + item.image + '">' +
                    '<i class="fa-solid fa-trash-can productImageDelete" data-id="' + item.id + '">' +
                    '<input type="hidden" value="' + item.product_id + '">' +
                    '</i>' +
                    '</div>'
                )
            });
            $('.productImageDelete').click(function () {
                let id = $(this).data('id'),
                    product_id = $(this).children('input').val();
                axios.post('deleteProductImage', {
                    'image_id': id
                }).then(function (response) {
                    if (response.data === 1) {
                        axios.post('productImageGet', {
                            'product_id': product_id
                        }).then(function (response) {
                            productImageShow(response.data);
                        }).catch(function (error) {

                        });
                    }
                }).catch(function (error) {

                })
            });
        }

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
                    $('#row_id').val(r_val.id);
                    $('#editProductTitle').val(r_val.title);
                    $('#editProductTitle_bn').val(r_val.title_bn);
                    $('#editProductDes').html(r_val.description);
                    $('#editProductDes_bn').html(r_val.description_bn);
                    $('#editProductCategory').val(r_val.category);
                    $('#editStock').val(r_val.stock);
                    $('#editReturnDays').val(r_val.return);
                    $('#editWarranty').val(r_val.warranty);
                    $("#editAdditionalInfo").summernote("code", r_val.additional_info);
                    $('#editOwnerCompany').val(r_val.owner_company);
                    $('#editOwnerName').val(r_val.owner_name);
                    $('#editOwnerMail').val(r_val.owner_email);
                    $('#editOwnerContact').val(r_val.owner_contact);
                    $('#editOwnerAddress').val(r_val.owner_address);
                    $('#editProductPrice').val(r_val.price);
                    $('#row_status').val(r_val.status);
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
        $('#uploadImageAdd').change(function () {
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
        // summer note
        $('#additionalInfo').summernote({
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        $('#editAdditionalInfo').summernote({
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        // CKEDITOR.replace('editProductDes');
        // CKEDITOR.replace('editProductDes_bn');
        // CKEDITOR.replace('productDes_bn');
        // CKEDITOR.replace('productDes');
    </script>
@endpush
