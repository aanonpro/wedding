@extends('layouts.app')
@section('title', 'Village view')
@section('content')


    <div class="content-wrapper ">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                           {{-- excel import  --}}
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="m-0">Villages <a href="{{route('villages.create')}}" class="btn btn-danger btn-sm "><i class="fa fa-plus" aria-hidden="true"></i> Add New</a>
                                    {{-- <a href="{{ route('villages.index') }}" class="btn btn-sm btn-outline-default"><i class="fa fa-history" aria-hidden="true"></i></a> --}}
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
                <span>All: ({{$vill_count ? $vill_count : 0}}) | <span class="text-info">Published:</span>  ({{$count_publish ? $count_publish : 0}})</span>
                {{-- <div class="row mt-4 mb-2">
                    <div class="col-md-3 float-right ">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="file" class="form-control"
                                    aria-label="Upload" name="file" required>
                                <button class="btn btn-outline-success"><i class="fa fa-cloud-download" aria-hidden="true"></i> Import</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3">
                        <a class="btn btn-warning float-left" href=""><i class="fa fa-sign-out" aria-hidden="true"></i> Export</a>
                    </div>
                </div> --}}
                <div class="row py-2">
                    {{-- <div class="col-lg-3 col-6">
                      <!-- small box -->
                      hadooeho
                    </div> --}}
                    <!-- ./col -->
                    <div class="col-lg-4 col-6 mt-2">
                      <!-- small box -->      
                        <div class="form-row mx-auto">   
                            <label  class=" col-form-label">Status type</label>            
                            <div class="dropdown d-flex">
                                <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                {{$status}}
                                </button>
                                <div class="dropdown-menu ">
                                    <a class="dropdown-item" href="{{ url('villages') }}">All status</a>
                                    <a class="dropdown-item" href="{{ url('villages?status=active') }}">Active</a>
                                    <a class="dropdown-item" href="{{ url('villages?status=inactive') }}">Inactive</a>
                                </div>
                            </div>    
                        </div>         
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6 mt-2">
                      <!-- small box -->                     
                        <form action="{{route('villages.index')}}" method="get" class="d-flex " role="search">
                            <div class="form-row mx-auto"> 
                                <label  class=" col-form-label">Date</label>
                                <div class=" d-flex">
                                    <input type="text" class="form-control" name="searchDate"  value="{{ \Request::get('searchDate') }}" />
                                    <button class="btn btn-outline-danger" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </form>                    
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6 mt-2">
                      <!-- small box -->
                        <form action="{{route('villages.index')}}" method="GET" class="d-flex float-right" role="search">
                            <div class="form-row "> 
                                <div class="d-flex">
                                    <input class="form-control" onkeyup="success()" value="{{ \Request::get('search') }}" title="type to search"
                                    name="search" id="search" type="text" placeholder="Search here">
                                    <button class="btn btn-danger" type="submit" title="search"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>
                              
                            </div>
                        </form>
                    </div>
                    <!-- ./col -->
                 
                    @csrf
                    <div class="col-md-12 py-4" id="show-village" >
                        @if (session('message'))
                            <div class="alert alert-info" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        @include('village.paginate')
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->

    </div>

@endsection

@section('script')

<script>

    // pagination
   $(function (){
        $('body').delegate('.village_paginate a','click',function (){
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);

        });

        function fetch_data(page){
            var _token = $("input[name=_token]").val();
            $.ajax({
                method: "POST",
                url: "{{route('villages.fetch_data') }}",
                data:  {_token: _token, page:page},
                success: function(data) {
                    $('#show-village').html(data);
                }
            });
        }
    });

    // disabled button search
    // function success() {
	//     if(document.getElementById("search").value==="") { 
    //         document.getElementById('button').disabled = true; 
    //     } else { 
    //         document.getElementById('button').disabled = false;
    //     }
    // }


</script>

@endsection
