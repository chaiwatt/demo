@extends('layouts.dashboard')

@section('content')
@include('layouts.partial.dashboard-aside', ['groupUrl' => $groupUrl])
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ขอเบิกจ่าย</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a
                                href="{{route('groups.officer-system.budget.allowance')}}">รายการค่าใช้จ่าย</a></li>
                        <li class="breadcrumb-item active">ขอเบิกจ่าย</li>
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
                                            <label>เดือน<span class="small text-danger">*</span></label>
                                            <select name="month"
                                                class="form-control select2 @error('month') is-invalid @enderror"
                                                style="width: 100%;">
                                                <option value="">==เลือกเดือน==</option>
                                                @foreach ($months as $month)
                                                <option value="{{ $month->id }}">
                                                    {{ $month->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>ค่าใช้จ่าย<span class="small text-danger">*</span></label>
                                            <select name="scholarshipCategory"
                                                class="form-control select2 @error('scholarshipCategory') is-invalid @enderror"
                                                style="width: 100%;">
                                                <option value="">==เลือกค่าใช้จ่าย==</option>
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
                                            <label>จำนวนเงิน<span class="small text-danger">*</span></label>
                                            <input type="text" name="cost" value="{{old('cost')}}"
                                                class="form-control @error('cost') is-invalid @enderror">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>เพิ่มเติม</label>
                                            <input type="text" name="message" value="{{old('message')}}"
                                                class="form-control @error('message') is-invalid @enderror">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-12">
                                        <hr>
                                        <label for="">เอกสารแนบ</label>
                                        <table class="table table-striped text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>เอกสาร</th>
                                                    <th class="text-right">แนบไฟล์</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($scholarshipAttachments as $key =>
                                                $scholarshipAttachment)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$scholarshipAttachment->name}}</td>
                                                    <td class="text-right"><a class="btn btn-info btn-sm" href="">
                                                            <i class="fas fa-save mr-1">
                                                            </i>
                                                            อัปโหลด
                                                        </a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">

                                ข้อกำหนด
                            </h3>
                        </div>

                        <div class="card-body">
                            <ul>
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Facilisis in pretium nisl aliquet</li>
                                <li>Nulla volutpat aliquam velit
                                    <ul>
                                        <li>Phasellus iaculis neque</li>
                                        <li>Purus sodales ultricies</li>
                                        <li>Vestibulum laoreet porttitor sem</li>
                                    </ul>
                                </li>
                                <li>Faucibus porta lacus fringilla vel</li>
                                <li>Eget porttitor lorem</li>
                            </ul>
                            <div class="icheck-primary d-inline">
                                <input name="users[]" type="checkbox" class="user-checkbox" id="checkboxPrimary"
                                    checked>
                                <label for="checkboxPrimary">ยอมรับเงื่อนไข</label>
                            </div>
                        </div>
                        <div class="col-12 mb-2">
                            <button type="submit" class="btn bg-gradient-success btn-flat float-right">บันทึก</button>
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