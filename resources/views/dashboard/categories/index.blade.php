@extends('layouts.admin')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">{{__('admin/setting.ِmaincategories')}}</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{route('admin.dashboard')}}">{{__('admin/setting.home')}}</a></li>
                                <li class="breadcrumb-item active">{{__('admin/setting.ِmaincategories')}}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Base style - compact table -->
                <section id="compact-style">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{__('admin/setting.ِallmaincategories')}}</h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                @include('dashboard.includes.alerts.success')
                                @include('dashboard.includes.alerts.errors')
                                <div class="card-content collapse show">
                                    <div class="justify-content-center d-flex">
                                        {!! $categories->links() !!}
                                    </div>
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered compact">
                                                <thead>
                                                <tr>
                                                    <th>{{__('admin/setting.name')}}</th>
                                                    <th>{{__('admin/setting.linkname')}}</th>
                                                    <th>{{__('admin/setting.status')}}</th>
                                                    <th>{{__('admin/setting.picture')}}</th>
                                                    <th>{{__('admin/setting.measures')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @isset($categories)
                                                    @foreach($categories as $category)
                                                        <tr>
                                                            <td>{{$category -> name}}</td>
                                                            {{--                                                        <td>{{$category -> _parent->name ?? ''}}</td>--}}
                                                            <td>{{$category -> slug}}</td>
                                                            <td>{{$category -> getActive()}}</td>
                                                            <td><img style="width: 150px; height: 100px;"
                                                                     src=""></td>
                                                            <td>
                                                                <div class="btn-group" role="group"
                                                                     aria-label="Basic example">
                                                                    <a href="{{route('admin.maincategories.edit',$category -> id)}}"
                                                                       class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">
                                                                        {{__('admin/setting.edit')}}</a>
                                                                    <a href="{{route('admin.maincategories.delete',$category -> id)}}"
                                                                       class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">
                                                                        {{__('admin/setting.delete')}}</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endisset
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>{{__('admin/setting.name')}}</th>
                                                    <th>{{__('admin/setting.linkname')}}</th>
                                                    <th>{{__('admin/setting.status')}}</th>
                                                    <th>{{__('admin/setting.picture')}}</th>
                                                    <th>{{__('admin/setting.measures')}}</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Base style - compact table -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
