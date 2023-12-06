@extends('layouts.dashboard')

@section('content')
@include('layouts.partial.dashboard-aside', ['groupUrl' => $groupUrl])
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">รายการประเมิน</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">งบปรรายการประเมินะมาณ</li>
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

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">รายการประเมิน</h3>
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
                                        <th>รายการประเมิน</th>
                                        <th class="text-center">จำนวนหัวข้อ</th>
                                        <th class="text-center">สถานะ</th>
                                        <th class="text-right">เพิ่มเติม</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assessmentAssignmentUsers as $key => $assessmentAssignmentUser)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$assessmentAssignmentUser->user->prefix->name}}{{$assessmentAssignmentUser->user->name}}
                                            {{$assessmentAssignmentUser->user->lastname}}</td>
                                        <td>{{$assessmentAssignmentUser->assessmentAssignment->assessment->name}}</td>
                                        <td class="text-center">
                                            {{$assessmentAssignmentUser->assessmentAssignment->assessment->assessmentAssignments->count()}}
                                        </td>
                                        <td class="text-center">
                                            @if ($assessmentAssignmentUser->status == 1)
                                            <span class="badge bg-info" style="font-weight: normal;">รอตรวจสอบ</span>
                                            @elseif ($assessmentAssignmentUser->status == 2)
                                            <span class="badge bg-success"
                                                style="font-weight: normal;">ประเมินเสร็จสิ้น</span>
                                            @endif


                                        </td>


                                        <td class="text-right">

                                            @if ($permission->update)
                                            <a class="btn btn-primary btn-sm"
                                                href="{{route('groups.officer-system.assessment.assessment.evaluate',['id' => $assessmentAssignmentUser->id])}}">
                                                <i class="fas fa-award">
                                                </i>
                                            </a>
                                            <a class="btn btn-info btn-sm" href="">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            @endif

                                            @if ($permission->delete == true)
                                            <a class="btn btn-danger btn-sm"
                                                data-confirm='ลบการประเมิน "{{$assessmentAssignmentUser->name}}" หรือไม่?'
                                                href="#" data-id="{{$assessmentAssignmentUser->id}}"
                                                data-delete-route="" data-message="การประเมิน">
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