@extends('layouts.dashboard')

@section('content')
@include('layouts.partial.dashboard-aside', ['groupUrl' => $groupUrl])
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{$user->prefix->name}}{{$user->name}} {{$user->lastname}}</h1>
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
                    @if ($permission->create)
                    <a class="btn btn-primary mb-2"
                        href="{{route('groups.student-system.management.transaction.create')}}">
                        <i class="fas fa-plus mr-1">
                        </i>
                        ขอการเบิกจ่าย
                    </a>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">รายละเอียด</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">

                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0" id="table_container">
                            <table class="table table-striped text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Transaction id</th>
                                        <th>เดือน</th>
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
                                                href="{{route('groups.student-system.management.transaction.view',['id' => $scholarshipPaymentTransaction->id])}}">
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