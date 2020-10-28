@extends('admin-layout.master')
@section('title', 'title list')

@section('ten', ' list product')

@section('content')
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">content</th>
      <th scope="col">user_id</th>
      <th scope="col">product_id</th>
      <th scope="col">status</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
                @foreach ($comments as $item)
                <tr>
                 <td>{{$item->content}}</td>
                

                @if(isset($product->category->name))
                 <td>{{$product->category->name}}</td>
                 @else
                <td>null</td>
                @endif
                @endforeach
                    
                    
                </tr>
        </tbody>

</table>

    
    @endsection 