@extends('layouts.app')
@section('title', 'Faculties Dashboard')
@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">                   
                           
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="m-0">Villages <a href="{{route('villages.create')}}" class="btn btn-info btn-sm "><i class="fa fa-plus" aria-hidden="true"></i> Add New</a>
                                </h1> 
                            </div>                                
                            
                            <div class="col-md-3 float-right ">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="inputGroupFile04"
                                            aria-label="Upload" name="file" required>
                                        <button class="btn btn-success  " id="inputGroupFileAddon04"><i class="fa fa-cloud-download" aria-hidden="true"></i> Import</button>
                                    </div>                           
                                </form>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-warning float-left" href=""><i class="fa fa-sign-out" aria-hidden="true"></i> Export</a>
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
                    <span>All: ( ) | <span class="text-info">Published:</span>  ( )</span>

                    <div class="row py-4">                       
                        <div class="col-md-3 ">
                            <div class="row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Village</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="inputEmail3" aria-label="Default select example">
                                        <option selected>All</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>    
                                </div>
                            </div>
                           
                        </div>   
                        <div class="col-md-3 ">
                            <div class="row float-right">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
                                <div class="col-sm-10  d-flex">
                                    <input type="text" id="inputEmail3" class="form-control" name="daterange" value="01/01/2018 - 01/15/2018" />
                                    <button class="btn btn-info mx-1" type="submit">Search</button>
                                </div>
                            </div>
                           
                        </div> 
                        <div class="col-md-6">
                            <form class="d-flex float-right" role="search">
                                <input class="form-control mx-1" style="width: 280px;" type="search" placeholder="Search here" aria-label="Search">
                                <button class="btn btn-info mx-1" type="submit">Search</button>
                            </form>
                        </div>
                    </div>       
                  </div>                    
                 
                    <div class="col-md-12">
                        @if (session('message'))
                            <div class="alert alert-info" role="alert">
                                {{ session('message') }} <i class="fa fa-check" aria-hidden="true"></i>
                            </div>
                        @endif                       
                        <table class="table table-bordered " style="background-color: white;">
                            <thead>
                                <tr class="text-center">
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Noted</th>
                                    <th>Status</th>
                                    <th style="width: 300px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($villages as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->name ? $item->name : '---' }}</td>
                                        <td>{{ $item->noted ? $item->noted : '---' }}</td>
                                        <td>
                                            @if ($item->status == 1)
                                            <span class="badge bg-defalt">Active <i class="fa fa-circle text-success" aria-hidden="true"></i></span>
                                            @else
                                            <span class="badge bg-defalt">Inactive <i class="fa fa-circle text-danger" aria-hidden="true"></i></span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('villages.destroy', $item->id) }}"
                                                method="POST">
                                                <a href="{{ route('villages.show', $item->id) }}"
                                                    class=" btn btn-sm btn-info"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></a>
                                                <a href="{{ route('villages.edit', $item->id) }}"
                                                    class=" btn btn-sm btn-warning"><i class="fa fa-pencil-square-o"
                                                        aria-hidden="true"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger "><i class="fa fa-trash-o"
                                                        aria-hidden="true"></i></button>
                                            </form>
                                        </td>

                                    </tr>
                                @empty
                                    <td colspan="5" class="text-center py-3">No Data Available</td>
                                @endforelse

                            </tbody>
                        </table>
                        {{-- <span>All: ( ) | <span class="text-info">Published:</span>  ( )</span> --}}
                    </div> 
                </div>
            </div>
        </section>
        <!-- /.content -->

    </div>

@endsection

@section('script')
    <script>
        $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });
    </script>
@endsection