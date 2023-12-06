@extends('layouts.dashboard')

@section('content')
@include('layouts.partial.dashboard-aside', ['groupUrl' => $groupUrl])
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        {{$scholarshipPaymentTransactionDetail->scholarshipPaymentTransaction->user->prefix->name}}
                        {{$scholarshipPaymentTransactionDetail->scholarshipPaymentTransaction->user->name}}
                        {{$scholarshipPaymentTransactionDetail->scholarshipPaymentTransaction->user->lastname}}
                        @if ($scholarshipPaymentTransaction->status == 1)
                        <span class="badge bg-info" style="font-weight: normal;">รออนุมัติ</span>
                        @elseif ($scholarshipPaymentTransaction->status == 2)
                        <span class="badge bg-success" style="font-weight: normal;">อนุมัติแล้ว</span>
                        @elseif ($scholarshipPaymentTransaction->status == 3)
                        <span class="badge bg-secondary" style="font-weight: normal;">เบิกจ่ายแล้ว</span>
                        @elseif ($scholarshipPaymentTransaction->status == 4)
                        <span class="badge bg-danger" style="font-weight: normal;">ให้แก้ไข</span>
                        @endif

                    </h1>
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
            @if ($permission->show)
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">รายละเอียด</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm">

                                </div>
                            </div>
                        </div>
                        <div class="card-body" id="table_container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>รายละเอียด</label>
                                        <input type="text" name="description"
                                            value="{{$scholarshipPaymentTransactionDetail->description}}"
                                            class="form-control" @if ($scholarshipPaymentTransaction->status ===
                                        "3") readonly
                                        @endif>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tracking Number</label>
                                        <input type="text" name="tracking_number"
                                            value="{{$scholarshipPaymentTransactionDetail->tracking_number}}"
                                            class="form-control @error('tracking_number') is-invalid @enderror"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label>ขอเบิกจ่าย</label>
                                        <input type="text" name="description"
                                            value="{{$scholarshipPaymentTransaction->cost}}"
                                            class="form-control @error('description') is-invalid @enderror" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>เบิกจ่ายจริง</label>
                                        <input type="text" name="tracking_number"
                                            value="{{$scholarshipPaymentTransaction->payment_cost}}"
                                            class="form-control" @if ($scholarshipPaymentTransaction->status ===
                                        "3") readonly
                                        @endif

                                        >
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">เอกสารแนบการเบิกจ่าย</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">

                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0" id="table_container">
                            <table class="table table-striped text-nowrap">
                                <thead>
                                    <tr>
                                        <th>เอกสารแนบ</th>
                                        <th class="text-right">เดือน</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($scholarshipPaymentTransaction->scholarshipPaymentTransactionAttachments
                                    as $key => $scholarshipPaymentTransactionAttachment)
                                    <tr>
                                        <td>{{$scholarshipPaymentTransactionAttachment->scholarshipAttachment->name}}
                                        </td>
                                        <td class="text-right"><a class="btn btn-info btn-sm" href="">
                                                <i class="fas fa-download">
                                                </i>
                                                ดาวน์โหลด
                                            </a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card card-danger card-outline">
                        <div class="card-header">
                            <h3 class="card-title">รายการแก้ไข</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">

                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0" id="table_container">
                            <table class="table table-striped text-nowrap">
                                <thead>
                                    <tr>
                                        <th>วันที่</th>
                                        <th>รายละเอียด</th>
                                        <th>ให้แก้ไขโดย</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($scholarshipPaymentTransactionRevises as $key =>
                                    $scholarshipPaymentTransactionRevise)
                                    <tr>
                                        <td>{{
                                            \Carbon\Carbon::parse($scholarshipPaymentTransactionRevise->created_at)->format('d/m/Y')
                                            }}</td>
                                        <td>{{$scholarshipPaymentTransactionRevise->message}}
                                        <td>{{$scholarshipPaymentTransactionRevise->user->name}}
                                            {{$scholarshipPaymentTransactionRevise->user->lastname}}</td>
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