@extends('layouts.dashboard')

@section('content')
@include('layouts.partial.dashboard-aside', ['groupUrl' => $groupUrl])
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">จัดสรรงบประมาณ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">จัดสรรงบประมาณ</li>
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
                เพิ่มจัดสรรงบประมาณ
            </a>
            @endif
            @if ($permission->show)
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">จัดสรรงบประมาณ</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">

                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0" id="table_container">
                            <table class="table table-striped text-nowrap">
                                <thead>
                                    <tr>
                                        <th>สถาบัน</th>
                                        <th>ค่าใช้จ่าย</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($schools as $key => $school)
                                    <tr>
                                        <td>{{$school->name}}</td>
                                        {{-- <td>{{number_format($yearlyBudget->budget, 2)}}</td> --}}
                                        <td>
                                            <ul>
                                                @foreach ($school->schoolAllocations as $schoolAllocation)

                                                <li>
                                                    {{$schoolAllocation->scholarshipCategory->name}} <div
                                                        class="form-group">
                                                        <input type="text" name="budget"
                                                            value="{{$schoolAllocation->cost}}"
                                                            class="form-control @error('budget') is-invalid @enderror">
                                                    </div>

                                                </li>
                                                @endforeach
                                            </ul>

                                        </td>

                                        {{-- <td class="text-right">

                                            @if ($permission->update)
                                            <a class="btn btn-primary btn-sm"
                                                href="{{route('groups.officer-system.budget.allowance.allocation',['id' => $yearlyBudget->id])}}">
                                                <i class="fas fa-link">
                                                </i>
                                            </a>

                                            <a class="btn btn-info btn-sm" href="">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            @endif


                                            @if ($permission->delete == true)
                                            <a class="btn btn-danger btn-sm"
                                                data-confirm='ลบปีงบประมาณ "{{$yearlyBudget->name}}" หรือไม่?' href="#"
                                                data-id="{{$yearlyBudget->id}}" data-delete-route=""
                                                data-message="ปีงบประมาณ">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            @endif
                                        </td> --}}
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