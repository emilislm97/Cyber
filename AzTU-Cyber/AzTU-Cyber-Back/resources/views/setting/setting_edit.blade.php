@extends('layouts.master')
@section('title','Admin Panel | Nizamlamalar | Redaktə et')
@section('content')
    <!-- Main Container -->
    <main id="main-container">

        <!-- breadcrumb -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Redaktə et</h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Nizamlamalar</li>
                            <li class="breadcrumb-item active" aria-current="page">Redaktə et</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- END breadcrumb -->

        <div class="content content-full content-boxed">
            @if(session('success'))
                <div class="alert alert-success alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="alert-heading font-size-h4 my-2">Uğurlu</h3>
                    <p class="mb-0">- {{session('success')}}</p>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="alert-heading font-size-h4 my-2">Xəta</h3>
                    <p class="mb-0">- {{session('error')}}</p>
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="alert-heading font-size-h4 my-2">Xəta</h3>
                    @foreach($errors->all() as $error)
                        <p class="mb-0">* {{$error}}</p>
                    @endforeach
                </div>
            @endif
            <div class="block block-rounded">
                <div class="block-content">
                    <form id="form-add" method="POST" action="{{route('setting_edit_post')}}" enctype="multipart/form-data">
                    @csrf
                    <!-- News add -->
                        <h2 class="content-heading pt-0">
                            <i class="fa fa-book-open text-muted mr-1"></i> Redaktə et
                        </h2>
                        <div class="row push">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="current_image">Cari Logo</label>
                                    <div>
                                        <img src="{{asset('assets/media/setting/'.$setting->logo)}}" class="img-fluid mb-4"
                                             style="max-width: 250px" alt="Logo">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="image">Yeni Logo</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" data-toggle="custom-file-input"
                                               id="image" name="image">
                                        <label class="custom-file-label" for="image">Yeni şəkil
                                            seçin ( Şəkil jpg, jpeg, png və jfif formatinda olmalıdır )</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="content">Məzmun</label>
                                    <textarea class="form-control"
                                              style="height: 100px"
                                              name="content"> {{$setting->content}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="content">Xəritə</label>
                                    <textarea class="form-control" rows="4" cols="4" name="map"> {{$setting->map}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="number">Telefon</label>
                                    <input type="text" class="form-control" id="number" name="number" value="{{$setting->number}}">
                                </div>
                                <div class="form-group">
                                    <label for="fax">Faks</label>
                                    <input type="text" class="form-control" id="fax" name="fax" value="{{$setting->fax}}">
                                </div>
                                <div class="form-group">
                                    <label for="instagram">İnstagram</label>
                                    <input type="text" class="form-control" id="instagram" name="instagram" value="{{$setting->instagram}}">

                                </div>
                                <div class="form-group">
                                    <label for="instagram">Facebook</label>
                                    <input type="text" class="form-control" id="facebook" name="facebook" value="{{$setting->instagram}}">
                                </div>
                                <div class="form-group">
                                    <label for="twitter">Twitter</label>
                                    <input type="text" class="form-control" id="twitter" name="twitter" value="{{$setting->twitter}}">
                                </div>
                                <div class="form-group">
                                    <label for="telegram">Telegram</label>
                                    <input type="text" class="form-control" id="telegram" name="telegram" value="{{$setting->telegram}}">
                                </div>
                            </div>
                        </div>
                        <!-- END News add -->

                        <!-- Submit -->
                        <div class="row push">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-alt-primary submit">
                                        <i class="fa fa-check-circle mr-1"></i> Redaktə et
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- END Submit -->
                    </form>
                </div>
            </div>
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/loading.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('assets/js/plugins/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css')}}">
    <style>
        .bootstrap-tagsinput{
            width: 100%;
        }
        .label-info{
            background-color: #17a2b8;

        }
        .label {
            display: inline-block;
            padding: .25em .4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,
            border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
        #lists {
            display: none;
        }
    </style>
@endsection
@section('js')
    <script src="{{asset('assets/js/plugins/loading.js')}}"></script>
    <script src="{{asset('assets/js/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.js')}}"></script>


    <script>jQuery(function () {
            Admin.helpers(['summernote']);
        });</script>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                height: 400,
            });
        });
        $("#form-add").on("keypress", function (event) {
            var keyPressed = event.keyCode || event.which;
            if (keyPressed === 13) {
                event.preventDefault();
                return false;
            }
        });
    </script>
@endsection
