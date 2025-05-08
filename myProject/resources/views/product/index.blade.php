@extends('layoutadmin')
@section('title')
    Danh sách sản phẩm
@endsection
@section('content')
    <a href="{{ route('products.create') }}" class="btn btn-primary">Thêm mới sản phẩm</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Image</th>
                <th scope="col">Category name</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listPro as $item )
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->quantity }}</td>
                <td>
                    @if(!isset($item->image))
                        Không có ảnh
                    @else
                        <img src="{{ Storage::url($item->image) }}" style="width:100px" alt="">
                    @endif
                </td>
                <td>{{ $item->listCate->name }}</td>
                <td>
                    <a href="#" class="btn btn-danger">Delete</a>
                    <a href="{{ route('products.edit', ['id'=>$item->id]) }}" class="btn btn-warning">Update</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
