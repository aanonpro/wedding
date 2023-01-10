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
                    <span>All: ({{$vill_count ? $vill_count : 0}}) | <span class="text-info">Published:</span>  ({{$count_publish ? $count_publish : 0}})</span>
                    <div class="row mt-4 mb-2">
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
                    </div>
                    <div class="row py-4">
                        <div class="col-md-4 ">
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Village</label>
                                <div class="col-sm-10">
                                    <select class="form-control" aria-label="Default select example">
                                        <option selected>All</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4 ">
                            <div class="row">
                                <label  class="col-sm-2 col-form-label">Date</label>
                                <div class="col-sm-10 ">
                                    <input type="text" class="form-control" name="datefilter" value="01/01/2023 - 01/15/2023" />
                                    {{-- <button class="btn btn-outline-danger mx-1" type="submit">Search</button> --}}
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <form class="d-flex float-right" role="search">
                                <input class="form-control mx-1" name="serach" id="search" style="width: 250px;" type="search" placeholder="Search here" aria-label="Search">
                                <button class="btn btn-danger mx-1" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                  </div>
                    @csrf
                    <div class="col-md-12 " id="show-village" >
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
   
   
   $(function (){
    // pagination
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

        // search 
        // $('#search').on('keyup', function(){
        //     var value =$(this).val();
        //     $.ajax({
        //         url: "{{route('search')}}",
        //         method: "GET",
        //         data:{search: value},
        //         success:function(data){
        //             var villages = data.villages;
        //             var html ='';
        //             if(villages.length > 0 ){
        //                 for(let i = 0; i <villages.length; i++){
        //                     html += '<tr>\
        //                                 <td>'+villages[i][id]+'</td>\
        //                                 <td>'+villages[i][name]+'</td>\
        //                                 <td>'+villages[i][noted]+'</td>\
        //                                 <td>'+villages[i][status]+'</td>\
                                      
        //                             </tr>';
        //                 }
        //             }else{
        //                 html +='<tr>\
        //                             <td>No village available</td>\
        //                         </tr>';
        //             }
        //             $('.datatable').html(html);
                    
        //         }
        //     });
        // });
   
    });

    
</script>

@endsection
