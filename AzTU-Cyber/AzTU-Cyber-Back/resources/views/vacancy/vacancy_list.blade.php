@extends('layouts.master')
@section('title','Admin Panel | Vakansiyalar | Siyahı')
@section('content')
    <!-- Main Container -->
    <main id="main-container">

        <!-- breadcrumb -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Siyahı</h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Vakansiyalar</li>
                            <li class="breadcrumb-item active" aria-current="page">Siyahı</li>
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
            <div class="block block-rounded">
                <div class="block-content">
                    <!-- News list -->
                    <h2 class="content-heading pt-0">
                        <i class="fa fa-book-open text-muted mr-1"></i> Siyahı
                    </h2>
                    <div class="row push">
                        <div class="col-lg-12">
                            <!-- Dynamic Table Full Pagination -->
                            <div class="block block-rounded">
                                <div class="block-content block-content-full">
                                    <table data-order='[0, "desc"]'
                                           class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                                        <thead>
                                        <tr>
                                            <th class="text-center">S/N</th>
                                            <th class="text-center">Yazar</th>
                                            <th class="text-center">Başlıq</th>
                                            <th class="text-center">Məzmun</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Əməliyyat</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($vacancys) == 0)
                                            <tr>
                                                <td colspan="4" class="text-center">Vakansiya yoxdur</td>
                                            </tr>
                                        @else
                                            @foreach($vacancys as $vacancy)
                                                <tr>
                                                    <td class="text-center">{{$vacancy->id}}</td>
                                                    <td class="text-center">
                                                        @foreach($users as $user)
                                                            @if($vacancy->user_id == $user->id)
                                                                {{$user->name}}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="text-center"> {{$vacancy->title}}</td>
                                                    <td class="text-center"> {{strip_tags(mb_substr($vacancy->content,0,47).'...') }}</td>

                                                    <td class="text-center">
                                                            <select class="form-control" id="status-{{$vacancy->id}}" onchange="Status({{$vacancy->id}},this.value)">
                                                                <option value="0" {{ $vacancy->status=='0' ? 'selected="selected"' : '' }}>Deaktiv</option>
                                                                <option value="1" {{ $vacancy->status=='1' ? 'selected="selected"' : '' }}>Aktiv</option>
                                                            </select>
                                                            @if($vacancy->status == '0')
                                                                <span class="badge badge-danger"> Aktiv Deyil</span>
                                                            @elseif($vacancy->status == '1')
                                                                <span class="badge badge-success"> Aktivdir</span>
                                                            @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" title="Göstər"
                                                                onclick="Show('{{$vacancy->id}}')"
                                                                class="btn btn-warning mr-1 mb-3" data-toggle="modal"
                                                                data-target="#edit">
                                                            <i class="fa fa-fw fa-eye"></i>
                                                        </button>
                                                        <a href="{{route('vacancy_edit',$vacancy->id)}}" title="Redaktə et"
                                                           class="btn btn-dark mr-1 mb-3">
                                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                                        </a>
                                                        <button type="button" title="Sil" onclick="Delete({{$vacancy->id}})"
                                                                class="btn btn-danger mr-1 mb-3">
                                                            <i class="fa fa-fw fa-trash-alt"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END Dynamic Table Full Pagination -->
                        </div>
                    </div>
                    <!-- END News list -->
                </div>
            </div>
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->

    <!-- Modal -->
    <div class="modal fade" id="edit" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content"></div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css')}}">
@endsection
@section('js')
    <script src="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/datatables/buttons/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/vacancy.js')}}"></script>
@endsection
