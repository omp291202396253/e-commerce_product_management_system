@extends('layouts.header')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Edit Category</strong>
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
        
            <form action="{{ route('category.update',['category'=>$sCategory->id]) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="category_name" class="form-control-label">Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="category_name" name="category_name" placeholder="Enter Category Name" class="form-control" value="{{ $sCategory->category_name }}" >
                    </div>
                </div>
        
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="textarea-input" class="form-control-label">Description</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea name="description" id="textarea-input" rows="9" placeholder="Enter Category Description" class="form-control" >{{ $sCategory->description }}</textarea>
                    </div>
                </div>
        
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="status" class="form-control-label">Status</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="status" id="status" class="form-control" >
                            <option value="">Please select</option>
                            <option value="1" {{ $sCategory->status == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $sCategory->status == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
        
                <button type="submit" class="btn btn-primary btn-sm">
                    Submit
                </button>
                <button type="button" class="btn btn-danger btn-sm" onclick="window.location.href='{{ route('category.index') }}'">
                    Back
                </button>
            </form>
        </div>              
    </div>
</div>

@endsection