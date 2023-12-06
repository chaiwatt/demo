@extends('layouts.dashboard')

@section('content')
@include('layouts.partial.dashboard-aside', ['groupUrl' => $groupUrl])
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">รายการแก้ไข</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">รายการแก้ไข</li>
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
                        href="{{route('groups.officer-system.management.transaction.revise.create',['id' => $scholarshipPaymentTransaction->id])}}">
                        <i class="fas fa-plus mr-1">
                        </i>
                        เพิ่มรายการแก้ไข
                    </a>
                    @endif
                    <div class="card">
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
                                    @foreach ($scholarshipPaymentTransactionRevises->reverse() as $key =>
                                    $scholarshipPaymentTransactionRevise)
                                    <tr>
                                        <td>{{
                                            \Carbon\Carbon::parse($scholarshipPaymentTransactionRevise->created_at)->format('d/m/Y')
                                            }}</td>
                                        <td>{{$scholarshipPaymentTransactionRevise->message}}</td>
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