@extends('layouts.backend')
@section('title','Component')

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
                        <span>Event</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Event</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Event</h4>
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
                                    @foreach ($event as $key=>$item)
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
                                                          action="{{ route('event.destroy',$item->id) }}"
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
                            <form action="{{ route('event.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title">Add New Event</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="eventTitle">Event Title<span class="req">*</span>
                                                </label>
                                                <input type="text" class="form-control" id="eventTitle"
                                                       name="eventTitle" placeholder="Event Title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="eventDescription">Event Description<span
                                                        class="req">*</span>
                                                </label>
                                                <textarea class="form-control" id="eventDescription"
                                                          name="eventDescription" placeholder="Event Description">
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group d-flex justify-content-between">
                                                <div class="col-md-6">
                                                    <label for="eventStart">Event Start<span class="req">*</span>
                                                    </label>
                                                    <input type="text" class="form-control eventDate" id="eventStart"
                                                           name="eventStart" placeholder="Event Start">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="eventEnd">Event End<span class="req">*</span>
                                                    </label>
                                                    <input type="text" class="form-control eventDate" id="eventEnd"
                                                           name="eventEnd" placeholder="Event End">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="eventPlace">Place<span class="req"></span>
                                                </label>
                                                <input type="text" class="form-control" id="eventPlace"
                                                       name="eventPlace" placeholder="Eg: Mohammadpur Dhaka">
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
                                                           name="eventImage" hidden>
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
                            <form action="{{ route('event.update','1')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Event</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <input type="text" id="row_id" name="old_id" hidden>
                                                <label for="editEventTitle">Event Title <span
                                                        class="req">*</span>
                                                </label>
                                                <input type="text" class="form-control" id="editEventTitle"
                                                       name="editEventTitle"
                                                       value="{{old('title', empty($errors->title) ? '' : $errors->title)}}"
                                                       placeholder="Event Title">
                                                @if ($errors->has('title'))
                                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="editEventDescription">Event Description<span
                                                        class="req">*</span>
                                                </label>
                                                <textarea class="form-control" id="editEventDescription"
                                                          name="editEventDescription" placeholder="Event Description">
                                                </textarea>
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
                                                @if ($errors->has('status'))
                                                    <span class="text-danger">{{ $errors->first('status') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group d-flex justify-content-between">
                                                <div class="col-md-6">
                                                    <label for="eventStart">Event Start<span class="req">*</span>
                                                    </label>
                                                    <input type="text" class="form-control eventDate"
                                                           id="editEventStart"
                                                           name="editEventStart" placeholder="Event Start">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="eventEnd">Event End<span class="req">*</span>
                                                    </label>
                                                    <input type="text" class="form-control eventDate" id="editEventEnd"
                                                           name="editEventEnd" placeholder="Event End">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="editEventPlace">Place<span class="req"></span>
                                                </label>
                                                <input type="text" class="form-control" id="editEventPlace"
                                                       name="editEventPlace" placeholder="Eg: Mohammadpur Dhaka">
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
                                                           name="editEventImage"
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
                url: "{{ url('admin/event') }}/" + row_id + "/edit",
                dataType: "json",
                success: function (response) {
                    var r_val = response.row_data;
                    console.log(r_val);
                    $('#row_id').val(r_val.id);
                    $('#editEventTitle').val(r_val.title);
                    $('#editEventDescription').val(r_val.description);
                    $('#row_status').val(r_val.status);
                    $('#editEventStart').val(r_val.start);
                    $('#editEventEnd').val(r_val.end);
                    $('#editEventPlace').val(r_val.place);
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
    </script>
@endpush
