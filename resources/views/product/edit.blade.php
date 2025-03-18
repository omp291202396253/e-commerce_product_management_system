@extends('layouts.header')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Edit Product</strong>
        </div>
        <div class="card-body card-block">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        
            <form action="{{ route('product.update', $sProduct->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                @method('PUT') 
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="product_name" class="form-control-label">Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="product_name" name="product_name" placeholder="Enter Product Name" class="form-control" value="{{ old('product_name', $sProduct->product_name) }}" >
                        @error('product_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="textarea-input" class="form-control-label">Description</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea name="description" id="textarea-input" rows="9" placeholder="Enter Product Description" class="form-control" >{{ old('description', $sProduct->description) }}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="price" class="form-control-label">Price</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="price" name="price" placeholder="Enter Price" class="form-control" value="{{ old('price', $sProduct->price) }}" >
                        @error('price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="quantity" class="form-control-label">Quantity</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="quantity" name="quantity" placeholder="Enter Quantity" class="form-control" value="{{ old('quantity', $sProduct->quantity) }}" >
                        @error('quantity')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="image" class="form-control-label">Product Image</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="image" name="image" class="form-control"> {{-- Image is optional in edit --}}
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        @if ($sProduct->image)
                            <br>
                            <img src="{{ asset($sProduct->image) }}" alt="Product Image" width="50">
                        @endif
                    </div>
                </div>
            
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="category_id" class="form-control-label">Select Category</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="category_id" id="category_id" class="form-control" >
                            <option value="">Please select</option>
                            @foreach($sCategory as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $sProduct->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="status" class="form-control-label">Status</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="status" id="status" class="form-control" >
                            <option value="">Please select</option>
                            <option value="1" {{ old('status', $sProduct->status) == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $sProduct->status) == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            
                <button type="submit" class="btn btn-primary btn-sm">
                    Submit
                </button>
                <button type="button" class="btn btn-danger btn-sm" onclick="window.location.href='{{ route('product.index') }}'">
                    Back
                </button>
            </form>            
        </div>              
    </div>
</div>

@endsection