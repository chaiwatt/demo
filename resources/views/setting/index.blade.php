@extends('layouts.setting-dashboard')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">แดชบอร์ด</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">แดชบอร์ด</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach ($roles as $role)
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon {{$role->color}}"><i class="fas fa-hand-holding-usd"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">{{$role->name}}</span>
                            <span class="info-box-number">{{$role->users->count()}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">บทบาทและการมอบหมาย</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>บทบาท</th>
                                                <th>กลุ่มทำงาน</th>
                                                <th class="text-center">จำนวนมอบหมาย</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($roles as $role)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $role->name }}</td>
                                                <td>
                                                    <ul>
                                                        @foreach ($role->role_group_jsons as $item)
                                                        <li style="padding: 5px;">{{$item->group->name}}</li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td class="text-center">{{ $role->users->count() }}</td>
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
        </div>
    </div>
</div>
@push('scripts')


@endpush
@endsection