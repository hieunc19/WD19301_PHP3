@extends('layoutadmin')
@section('title')
    Thêm mới sản phẩm
@endsection
@section('content')
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(session('success'))
        {{ session('success') }}
    @endif
    @if(session('error'))
        {{ session('error') }}
    @endif
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text"
            class="form-control"
            name="name"
            placeholder="name">
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="text"
            class="form-control"
            name="price">
        </div>
        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="text"
            class="form-control"
            name="quantity">
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file"
            class="form-control"
            name="image">
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category_id" class="form-select" aria-label="Default select example">
                @foreach ($listCate as $item )
                    <option value="{{ $item->id }}" @if($item->id == old('category_id')) selected @endif>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-sucssess" type="submit">Gửi</button>
        <a href="{{ route('products.index') }}" class="btn btn-light">Quay lại</a>
    </form>
@endsection
