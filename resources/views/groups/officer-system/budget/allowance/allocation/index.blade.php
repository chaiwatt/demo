@extends('layouts.dashboard')

@section('content')
@include('layouts.partial.dashboard-aside', ['groupUrl' => $groupUrl])
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">การจัดสรร</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a
                                href="{{route('groups.officer-system.budget.allowance')}}">งบประมาณ</a></li>
                        <li class="breadcrumb-item active">การจัดสรร</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            @if ($permission->create)
            <a class="btn btn-primary mb-2"
                href="{{route('groups.officer-system.budget.allowance.allocation.create',['id' => $yearlyBudget->id])}}">
                <i class="fas fa-plus mr-1">
                </i>
                เพิ่มการจัดสรร
            </a>
            @endif
            @if ($permission->show)
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">งบประมาณ</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">

                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0" id="table_container">
                            <table class="table table-striped text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ปีงบประมาณ</th>
                                        <th>งบประมาณ (บาท)</th>
                                        <th class="text-right">เพิ่มเติม</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($yearlyBudgetScholarshipCategoryAllocations as $key =>
                                    $yearlyBudgetScholarshipCategoryAllocation)
                                    <tr>
                                        <td>{{$yearlyBudgetScholarshipCategoryAllocation->scholarshipCategory->name}}
                                        </td>
                                        <td>{{number_format($yearlyBudgetScholarshipCategoryAllocation->cost, 2)}}</td>

                                        <td class="text-right">
                                            @if ($permission->update)
                                            <a class="btn btn-info btn-sm"
                                                href="{{route('groups.officer-system.budget.allowance.allocation.view',['id' => $yearlyBudgetScholarshipCategoryAllocation->id])}}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            @endif
                                            @if ($permission->delete == true)
                                            <a class="btn btn-danger btn-sm"
                                                data-confirm='ลบการจัดสรร "{{$yearlyBudgetScholarshipCategoryAllocation->name}}" หรือไม่?'
                                                href="#" data-id="{{$yearlyBudgetScholarshipCategoryAllocation->id}}"
                                                data-delete-route="" data-message="การจัดสรร">
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