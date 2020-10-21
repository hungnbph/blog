@extends('admin-layout.master')
@section('title', 'detail categories')

@section('ten', ' deatil categories')

@section('content')
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">stt</th>
      <th scope="col">Name</th>
      <th scope="col">parent_id</th>
      <th scope="col">status</th>
      
      
    </tr>
  </thead>
  <tbody>
  @foreach($category as $cate)
                <tr>
                     <td>{{ $cate->id }}</td>
                    <td>{{ $cate->name }}</td>
                    <td>{{ $cate->parent_id }}</td>
                    <td>
                        @if ($cate->status == 1)
                            đang trong sử dụng
                        @else
                            danh mục đang tạm ngừng hoạt động
                        @endif
                    </td>
                </tr>
                @endforeach
        </tbody>

</table>

    
    @endsection