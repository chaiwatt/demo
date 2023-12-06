@extends('layouts.dashboard')

@section('content')
@include('layouts.partial.dashboard-aside', ['groupUrl' => $groupUrl])
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">เพิ่มการจัดสรร</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a
                                href="{{route('groups.officer-system.budget.allowance.allocation',['id' => $yearlyBudgetScholarshipCategoryAllocation->yearlyBudget->id])}}">การจัดสรร</a>
                        </li>
                        <li class="breadcrumb-item active">เพิ่มการจัดสรร</li>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">รายละเอียด</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>ค่าใช้จ่าย<span class="small text-danger">*</span></label>
                                                <input type="text" name="cost"
                                                    value="{{$yearlyBudgetScholarshipCategoryAllocation->scholarshipCategory->name}}"
                                                    class="form-control @error('cost') is-invalid @enderror">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>งบประมาณจัดสรร<span class="small text-danger">*</span></label>
                                            <input type="text" name="cost"
                                                value="{{$yearlyBudgetScholarshipCategoryAllocation->cost}}"
                                                class="form-control @error('cost') is-invalid @enderror">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">รอบการจ่าย</label>
                                        <table class="table table-striped text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>เดือน</th>
                                                    <th class="text-center">เริ่มวันที่</th>
                                                    <th class="text-center">ถึงวันที่</th>
                                                    <th class="text-center">จำนวนครั้งที่เบิกได้</th>
                                                    <th>สถานะ</th>
                                                    <th class="text-right">เพิ่มเติม</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($scholarshipPaymentDurations as $key =>
                                                $scholarshipPaymentDuration)
                                                <tr>
                                                    <td>{{$scholarshipPaymentDuration->month->name}}</td>
                                                    <td class="text-center">{{$scholarshipPaymentDuration->from_date}}
                                                    </td>
                                                    <td class="text-center">{{$scholarshipPaymentDuration->to_date}}
                                                    </td>
                                                    <td class="text-center">{{$scholarshipPaymentDuration->frequency}}
                                                    </td>
                                                    <td>{{$scholarshipPaymentDuration->status}}</td>
                                                    <td class="text-right">
                                                        <a class="btn btn-info btn-sm" href="">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                        </a>
                                                    </td>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit"
                                            class="btn bg-gradient-success btn-flat float-right">บันทึก</button>
                                    </div>
                                </div>
                            </form>
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