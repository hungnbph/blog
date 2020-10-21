@extends('admin-layout.master')
@section('title', 'title list')

@section('ten', ' list product')

@section('content')
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">name</th>
      <th scope="col" >category_id</th>
      <th scope="col">image_url</th>
      <th scope="col">description</th>
      <th scope="col">price</th>
      <th scope="col">sale_percent</th>
      <th scope="col">is_active</th>
    </tr>
  </thead>
  <tbody>               
                <tr>
                    <td>{{ $product->name }}</td>
                    <td >{{ $product->category_id }}</td>
                    <td>{{ $product->image_url }} </td>
                    <td>{{ $product->description }} </td>
                    <td>{{ $product->price}} </td>
                    <td>{{ $product->sale_percent}} </td>
                    <td>@if ($product->is_active == 1)
                            đang trong sử dụng
                        @else
                            ngừng hoạt động
                        @endif</td>
                    
                </tr>
        </tbody>

</table>
    
    @endsection