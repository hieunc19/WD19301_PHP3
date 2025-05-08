@extends('layoutadmin')
@section('title')
    Chỉnh sửa sản phẩm
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
    <form action="{{ route('products.update', ['id' => $listPro->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" placeholder="name" value="{{ $listPro->name }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="text" class="form-control" name="price" value="{{ $listPro->price }}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="text" class="form-control" name="quantity" value="{{ $listPro->quantity }}">
            @error('quantity')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" name="image">
            <img src="{{ Storage::url($listPro->image) }}" style="width:100px">
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category_id" class="form-select" aria-label="Default select example">
                @foreach ($listCate as $item)
                    <option value="{{ $item->id }}" @if($item->id == old('category_id')) selected @endif>{{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-sucssess" type="submit">Gửi</button>
        <a href="{{ route('products.index') }}" class="btn btn-light">Quay lại</a>
    </form>
@endsection
