<table class="table table-bordered table-striped " style="background-color: white;">
    <thead>
        <tr class="text-center">
            <th style="width: 10px">#</th>
            <th>Name</th>
            <th>Noted</th>
            <th>Status</th>
            <th style="width: 300px">Action</th>
        </tr>
    </thead>
    <tbody class="datatable">
        @forelse ($villages as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->name ? $item->name : '---' }}</td>
                <td>
                    @if ($item->noted) <div class="text-center">{{$item->noted}}</div>@else <div class="text-center">---</div> @endif
                </td>
                <td>
                    @if ($item->status == 1)
                        <div class="text-center">
                            <button class="btn btn-sm btn-outline-success">Active  <i class="fa fa-circle text-success" aria-hidden="true"></i></button>
                        </div>
                    @else
                        <div class="text-center">
                            <button class="btn btn-sm btn-outline-danger">Inactive  <i class="fa fa-circle text-danger" aria-hidden="true"></i></button>
                        </div>
                    @endif
                </td>
                <td class="text-center">
                    <form action="{{ route('villages.destroy', $item->id) }}"
                        method="POST">
                        <a href="{{ route('villages.show', $item->id) }}"
                            class=" btn btn-sm btn-outline-info"><i class="fa fa-eye"
                                aria-hidden="true"></i></a>
                        <a href="{{ route('villages.edit', $item->id) }}"
                            class=" btn btn-sm btn-outline-warning"><i class="fa fa-pencil-square-o"
                                aria-hidden="true"></i></a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger "><i class="fa fa-trash-o"
                                aria-hidden="true"></i></button>
                    </form>
                </td>

            </tr>
        @empty
            <td colspan="5" class="text-center py-3">No Data Available</td>
        @endforelse

    </tbody>
</table>
<div class="village_paginate float-right py-2 mb-4 ">
    {!! $villages->appends($_GET)->links() !!}
</div>
