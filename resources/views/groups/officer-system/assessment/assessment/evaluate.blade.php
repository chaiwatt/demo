@extends('layouts.dashboard')

@section('content')
@include('layouts.partial.dashboard-aside', ['groupUrl' => $groupUrl])
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        {{$assessmentAssignmentUser->user->prefix->name}}{{$assessmentAssignmentUser->user->name}}
                        {{$assessmentAssignmentUser->user->lastname}}</h1>
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
                                        <th>หัวข้อการประเมิน</th>
                                        <th>รายละเอียด</th>
                                        <th class="text-right">ผลการประเมิน</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($assessmentAssignmentUser
                                    ->assessmentAssignment->assessmentItems($assessment->id)
                                    as $key => $assessmentAssignment)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$assessmentAssignment->assessmentItem->name}}</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" name="budget" value="{{old('budget')}}"
                                                    class="form-control @error('budget') is-invalid @enderror">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <select name="result"
                                                    class="form-control select2 @error('result') is-invalid @enderror"
                                                    style="width: 100%;">
                                                    <option value="1">ผ่าน</option>
                                                    <option value="2">ไม่ผ่าน</option>

                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>


                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">
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