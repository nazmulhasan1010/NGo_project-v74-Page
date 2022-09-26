@extends('layouts.backend')
@section('title','Messages')

@push('vendor-css')
    <!-- Datatable -->
    <link href="{{ asset('assets/backend/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
@endpush
@push('onpage-css')
    <link rel="stylesheet" href="{{asset('assets/backend/scss/backendMain.css')}}">
@endpush
@section('content')
    @php
        $start = 0;
        $pages = 5;
        $clickPage = 0;
        $messages = getMessage($start, $pages, 'all');
        $item = count($messages);
        $page = ceil($item/5);
        if (isset($_GET['page'])){
            $clickPage = $_GET['page'];
            $start = ($clickPage-1)*$pages;
        }
        $messages = getMessage($start, $pages, 'spe');
    @endphp
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi, Welcome back!</h4>
                        <span>Messages</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Messages</a></li>
                    </ol>
                </div>
            </div>
            @if($messages)
                <!-- row -->
                <div class="row messages">
                    <div class="col-6 message">
                        @foreach($messages as $key=>$message)
                            <div class="card messageCard">
                                <input type="hidden" class="messageId" value="{{$message->id}}">
                                <h2>{{$message->name}}</h2>
                                @php
                                    if (strlen($message->message)>100){
                                      $message_ = substr($message->message,0,100).'...';
                                   }else{
                                      $message_ = $message->message ;
                                   }
                                @endphp
                                <p>{{$message_}}</p>
                                <span
                                    class="time">{{date("d", strtotime($message->updated_at)).' '.substr(date("F", strtotime($message->updated_at)),0,3).'  '.date("Y", strtotime($message->updated_at)) }}</span>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-6 message">
                        <div class="card">
                            <table id="messageTable">
                                <tr>
                                    <th>Name</th>
                                    <td>{{$messages[0]->name}}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{$messages[0]->email}}</td>
                                </tr>
                                @if($messages[0]->contact!== null)
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{$messages[0]->contact}}</td>
                                    </tr>
                                @endif

                                <tr>
                                    <th>Message</th>
                                    <td>{{$messages[0]->message}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
            @if($item>5)
                <nav aria-label="Page navigation example ">
                    <ul class="pagination pagination-lg ">
                        <li class="page-item {{$start===0?'disabled':''}}">
                            <a class="page-link" href="?page={{$clickPage-1}}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only"></span>
                            </a>
                        </li>
                        @for($i= 1; $i <= $page; $i++)
                            <li class="page-item {{$clickPage == $i?'active-pagi':''}}"><a class="page-link" href="?page={{$i}}">{{$i}}</a></li>
                        @endfor
                        <li class="page-item {{$start>$item-6?'disabled':''}}">
                            <a class="page-link" href="?page={{$clickPage+1}}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only"></span>
                            </a>
                        </li>
                    </ul>
                </nav>
            @endif
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
        $('.messageCard').click(function () {
            $('.messageCard').css('transform' , 'scale(1.0)');
            $(this).css('transform' , 'scale(1.05)');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "get",
                url: "{{ url('admin/clientMessages') }}/" + $(this).children('.messageId').val() + "/edit",
                dataType: "json",
                success: function (response) {
                    var r_val = response.row_data;
                    if (r_val.contact !== null) {
                        var msgCon = "<tr>" +
                            " <th>Phone</th>" +
                            "<td>" + r_val.contact + "</td>" +
                            "</tr>"
                    } else {
                        var msgCon = '';
                    }
                    $('#messageTable').html("" +
                        " <tr>" +
                        "<th>Name</th>" +
                        "<td>" + r_val.name + "</td>" +
                        "</tr>" +
                        " <tr>" +
                        " <th>Email</th>" +
                        "<td>" + r_val.email + "</td>" +
                        "</tr>" +
                        msgCon +
                        "<tr>" +
                        "<th>Message</th>" +
                        " <td>" + r_val.message + "</td>" +
                        "</tr>"
                    );
                },
                error: function (response) {
                    alert("Error")
                }
            });
        });
    </script>
@endpush
