@extends('backend.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Статьи')
{{-- vendor style --}}
@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/tables/datatable/datatables.min.css">
@endsection
{{-- page style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('/adm/app-assets/css/pages/app-invoice.css')}}">
@endsection

@section('content')

    {{--    <div class="container">--}}
    {{--        <div class="row justify-content-between">--}}
    {{--            <div class="col-4">--}}
    {{--                <div class="invoice-create-btn mb-1">--}}
    {{--                    <a href="/admin/user/create" class="btn btn-primary glow invoice-create" role="button"--}}
    {{--                       aria-pressed="true">--}}
    {{--                        Создать пользователя</a>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}


    <!-- Zero configuration table -->
    <section id="basic-datatable">
        @if(session('success'))
            <div class="alert bg-rgba-success alert-dismissible mb-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="d-flex align-items-center">
                    <i class="bx bx-like"></i>
                    <span>  {{session('success')}}  </span>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Пользователи</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>ID</th>

                                        <th>Email</th>
                                        <th>Имя</th>
                                        <th>Дата регистрации</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach ($users as $user)
                                        <tr class="">
                                            <td>{{$user->id }}</td>
                                            <td>
                                                <i class="bx bxs-circle {{($user->email_verified_at)?'success':'danger'}}  font-small-1 mr-50"></i>
                                                <a href="{{route('user.edit',$user->id)}}">{{$user->email}}</a>
                                            </td>
                                            <td>
                                                {{$user->name }}
                                            </td>
                                            <td>
                                                <small>{{$user->created_at->format('d.m.Y')}}</small>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Zero configuration table -->

@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
    <script src="/adm/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>

@endsection
{{-- page scripts --}}
@section('page-scripts')
    <script src="/adm/app-assets/js/scripts/datatables/datatable.js"></script>

@endsection
