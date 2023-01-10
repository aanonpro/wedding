@extends('layouts.app')
@section('title', 'Village create')
@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        {{-- excel import  --}}
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="m-0">Villages <a href="{{ route('villages.index') }}"
                                    class="btn btn-outline-primary btn-sm "><i class="fa fa-arrow-left" aria-hidden="true"></i> Leave</a>
                                </h1>
                            </div>
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card " >
                            <div class="card-body">
                                <div class="row py-3">
                                    <div class="col-md-10 mx-auto">
                                        <form action="{{ isset($village) ? route('villages.update',$village->id) : route('villages.store')}}" method="POST">
                                        @csrf
                                        @if (isset($village))
                                            @method('PUT')
                                        @endif
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label">Name <span class="text-danger"> *</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="name" placeholder="Name" @if(isset($village)) value="{{$village->name}}" @endif class="form-control" autofocus required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label">Describe</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="noted" placeholder="Describe here ( Optional )">@if(isset($village)) {{$village->noted}} @endif</textarea>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" >Status <span class="text-danger"> *</span></label>
                                                <div class="col-sm-10">
                                                    <select class="form-select form-control" name="status" required>
                                                        <option selected disabled value="">Choose status...</option>
                                                        <option value="1" @if (isset($village)) {{ $village->status == '1' ? 'selected' : '' }} @endif>Active </option>
                                                        <option value="0" @if (isset($village)) {{ $village->status == '0' ? 'selected' : '' }} @endif>Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-danger">{{isset($village) ? 'Update' : 'Save'}} </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->

    </div>

@endsection
