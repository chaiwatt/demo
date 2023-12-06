@extends('layouts.dashboard')

@section('content')
@include('layouts.partial.dashboard-aside', ['groupUrl' => $groupUrl])
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">นักเรียนทุน</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">นักเรียนทุน</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            @if ($permission->create)
            <a class="btn btn-primary mb-2" href="{{route('groups.officer-system.budget.allowance.create')}}">
                <i class="fas fa-plus mr-1">
                </i>
                เพิ่มนักเรียนทุน
            </a>
            @endif
            @if ($permission->show)
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">นักเรียนทุน</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">

                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0" id="table_container">
                            <table class="table table-striped text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ชื่อ-สกุล</th>
                                        <th>ระดับ</th>
                                        <th>สถาบัน</th>
                                        <th>สถานะ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($scholarshipStudents as $key => $scholarshipStudent)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$scholarshipStudent->user->prefix->name}}
                                            {{$scholarshipStudent->user->name}} {{$scholarshipStudent->user->lastname}}
                                        </td>
                                        <td>{{$scholarshipStudent->user->educationFloor->name}}</td>
                                        <td>{{$scholarshipStudent->school->name}}</td>
                                        <td>{{$scholarshipStudent->status}}</td>
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