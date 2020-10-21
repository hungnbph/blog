@extends('admin-layout.master')

@section('title', 'Edit student')

@section('ten', "Edit student")
@section('content')
@if ($errors->any())
        <ul>
        <!-- Neu co loi thi se foreach de hien thi loi ra -->
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
            @endif  
<form
method="POST"  action="{{route('categories.store') }}">
         <!-- Them token gui len -->
         @csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name">name</label>
      <input type="text" class="form-control" id="name" name="name"   >
    </div>
    </div>

    <div class="form-row">
    <div class="col-md-6">
    <label for="parent">parent category</label>
      <!-- <label for="phone">parent_id</label>
      <input type="text" class="form-control" name="phone" id="phone"  > -->
      <select name="parent_id" id="parent_id" class="form-control">
         <option value="0"> danh mục cha</option>
         @foreach($category as $cate)
         <option value="{{$cate->parent_id}}">{{$cate->name}}</option>
         @endforeach

      </select>
      </div>
    </div>
    <div class="form-row">
    <div class="col-md-6">
    <label for="status">status</label>
      <!-- <label for="phone">parent_id</label>
      <input type="text" class="form-control" name="phone" id="phone"  > -->
      <select name="status" id="status" class="form-control">
         <option value="0">hoatj dong</option>
         <option value="1"> khong hoat dong</option>

      </select>
      </div>
    </div>
    <br>
  <button type="submit" class="btn btn-primary">create</button>
</form>

    
@endsection
