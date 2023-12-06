@extends('layouts.dashboard')

@section('content')
@include('layouts.partial.dashboard-aside', ['groupUrl' => $groupUrl])
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">รายการรอโอน</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">รายการรอโอน</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            @if ($permission->show)
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">ค้นหา</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select name="scholarshipCategory"
                                                class="form-control select2 @error('scholarshipCategory') is-invalid @enderror"
                                                style="width: 100%;">
                                                <option value="">==เลือกรายการ==</option>
                                                @foreach ($scholarshipCategories as $scholarshipCategory)
                                                <option value="{{ $scholarshipCategory->id }}">
                                                    {{ $scholarshipCategory->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h3 class="card-title">รายการรอโอน</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm">
                                    <a class="btn btn-success" href="">
                                        ส่งออกไฟล์
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" id="table_container">
                            <table class="table table-striped text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Transaction id</th>
                                        <th>เดือน</th>
                                        <th>ชื่อ-สกุล</th>
                                        <th>ระดับ</th>
                                        <th>ค่าใช้จาย</th>
                                        <th class="text-center">ขอเบิก</th>
                                        <th class="text-center">จ่ายจริง</th>
                                        <th class="text-center">คงเหลือ</th>
                                        <th class="text-center">สถานะ</th>
                                        <th class="text-right">รายละเอียด</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($scholarshipPaymentTransactions as $key => $scholarshipPaymentTransaction)
                                    <tr>
                                        <td>{{ str_pad($scholarshipPaymentTransaction->id, 5, '0', STR_PAD_LEFT) }}</td>
                                        <td>{{$scholarshipPaymentTransaction->month->name}}</td>
                                        <td>{{$scholarshipPaymentTransaction->user->prefix->name}}
                                            {{$scholarshipPaymentTransaction->user->name}}
                                            {{$scholarshipPaymentTransaction->user->lastname}}
                                        </td>
                                        <td>{{$scholarshipPaymentTransaction->user->educationFloor->name}}</td>
                                        <td>{{$scholarshipPaymentTransaction->scholarshipCategory->name}}</td>
                                        <td class="text-center">{{number_format($scholarshipPaymentTransaction->cost,
                                            2)}}</td>
                                        <td class="text-center">
                                            {{number_format($scholarshipPaymentTransaction->payment_cost,
                                            2)}}</td>
                                        <td class="text-center">
                                            {{number_format($scholarshipPaymentTransaction->scholarshipCategory
                                            ->educationFloorCost($scholarshipPaymentTransaction->user->educationFloor->id)-$scholarshipPaymentTransaction->payment_cost,
                                            2)}}
                                        </td>
                                        <td class="text-center">
                                            @if ($scholarshipPaymentTransaction->status == 1)
                                            <span class="badge bg-primary" style="font-weight: normal;">รออนุมัติ</span>
                                            @elseif ($scholarshipPaymentTransaction->status == 2)
                                            <span class="badge bg-success"
                                                style="font-weight: normal;">อนุมัติแล้ว</span>
                                            @elseif ($scholarshipPaymentTransaction->status == 3)
                                            <span class="badge bg-secondary"
                                                style="font-weight: normal;">เบิกจ่ายแล้ว</span>
                                            @elseif ($scholarshipPaymentTransaction->status == 4)
                                            <span class="badge bg-danger" style="font-weight: normal;">ให้แก้ไข</span>
                                            @endif
                                        </td>
                                        <td class="text-right"><a class="btn btn-info btn-sm"
                                                href="{{route('groups.officer-system.management.transaction.view',['id' => $scholarshipPaymentTransaction->id])}}">
                                                <i class="fas fa-eye">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{$scholarshipPaymentTransactions->links()}}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection