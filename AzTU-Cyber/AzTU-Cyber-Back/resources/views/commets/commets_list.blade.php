@extends('layouts.master')
@section('title','Admin Panel | Şərhlər | Siyahı')
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
                            <li class="breadcrumb-item">Şərhlər</li>
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
                                            <th class="text-center">Sual</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Əməliyyat</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($commets) == 0)
                                            <tr>
                                                <td colspan="4" class="text-center">Sual yoxdur</td>
                                            </tr>
                                        @else
                                            <input type="hidden" value="{{$i=0}}"  />
                                            @foreach($commets as $commet)
                                                <tr>
                                                    <td class="text-center">{{$i+1}}</td>
                                                    <td class="text-center"> {{mb_substr($commet->comment,0,47).'...'}}</td>
                                                    <td class="text-center">
                                                        <select class="form-control" id="status-{{$commet->id}}" onchange="Status({{$commet->id}},this.value)">
                                                            <option value="0" {{ $commet->status=='0' ? 'selected="selected"' : '' }}>Deaktiv</option>
                                                            <option value="1" {{ $commet->status=='1' ? 'selected="selected"' : '' }}>Aktiv</option>
                                                            <option value="2" {{ $commet->status=='2' ? 'selected="selected"' : '' }}>Gözləmə</option>
                                                        </select>
                                                        @if($commet->status == '0')
                                                            <span class="badge badge-danger"> Aktiv Deyil</span>
                                                        @elseif($commet->status == '1')
                                                            <span class="badge badge-success"> Aktivdir</span>
                                                        @elseif($commet->status == '2')
                                                            <span class="badge badge-warning"> Gözləmədə</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" title="Göstər"
                                                                onclick="Show('{{$commet->id}}')"
                                                                class="btn btn-warning mr-1 mb-3" data-toggle="modal"
                                                                data-target="#edit">
                                                            <i class="fa fa-fw fa-eye"></i>
                                                        </button>
                                                        <button type="button" title="Sil" onclick="Delete({{$commet->id}})"
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
    <script src="{{asset('assets/js/pages/commet.js')}}"></script>
@endsection
