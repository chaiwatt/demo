@extends('layouts.dashboard')

@section('content')
@include('layouts.partial.dashboard-aside', ['groupUrl' => $groupUrl])
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">รายการกิจกรรม: {{$user->prefix->name}}{{$user->name}}
                        {{$user->lastname}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">รายการกิจกรรม</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            @if ($permission->show)
            <div class="row">
                <div class="col-12">
                    @if ($permission->create)
                    <a class="btn btn-primary mb-2"
                        href="{{route('groups.student-system.management.activity.create')}}">
                        <i class="fas fa-plus mr-1">
                        </i>
                        เพิ่มกิจกรรม
                    </a>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">รายการกิจกรรม</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">

                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0" id="table_container">
                            <table class="table table-striped text-nowrap">
                                <thead>
                                    <tr>
                                        <th>กิจกรรม</th>
                                        <th class="text-center">สถานะ</th>
                                        <th class="text-right">เพิ่มเติม</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activiyUsers as $key => $activiyUser)
                                    <tr>
                                        <td>{{$activiyUser->activity->name}}</td>
                                        <td class="text-center">@if ($activiyUser->status == 1)
                                            <span class="badge bg-info" style="font-weight: normal;">รอตรวจสอบ</span>
                                            @elseif ($activiyUser->status == 2)
                                            <span class="badge bg-success" style="font-weight: normal;">เสร็จสิ้น</span>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            @if ($permission->update)
                                            <a class="btn btn-info btn-sm"
                                                href="{{route('groups.officer-system.activity.activity.view',['id' => $activiyUser->id])}}">
                                                <i class="fas fa-eye">
                                                </i>
                                            </a>
                                            @endif

                                            @if ($permission->delete == true)
                                            <a class="btn btn-danger btn-sm"
                                                data-confirm='ลบรายการกิจกรรม "{{$activiyUser->name}}" หรือไม่?'
                                                href="#" data-id="{{$activiyUser->id}}" data-delete-route=""
                                                data-message="รายการกิจกรรม">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            @endif
                                        </td>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>
@push('scripts')

@endpush
@endsection