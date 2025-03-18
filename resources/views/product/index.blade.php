@extends('layouts.header')

@section('content')

    <style>
        .pagination {
            display: flex;
            justify-content: center;
            padding: 0;
        }

        .page-item {
            margin: 0 3px;
        }

        .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
        }

        .page-link {
            padding: 8px 12px;
            border-radius: 5px;
            color: #333;
            transition: 0.3s;
        }

        .page-link:hover {
            background-color: #007bff;
            color: white;
        }

    </style>
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 mb-3">product</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-left">
                </div>
                <div class="table-data__tool-right">
                    <button class="au-btn au-btn-icon au-btn--green au-btn--small" onclick="window.location.href='{{ url('product/create') }}'">
                        <i class="zmdi zmdi-plus"></i>add product</button>

                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="table-responsive table-responsive-data2">
                <table class="table table-data2">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>price</th>
                            <th>quantity</th>
                            <th>category</th>
                            <th>status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sProduct as $product)
                            <tr class="tr-shadow">
                                <td class="desc">{{ $loop->iteration + ($sProduct->currentPage() - 1) * $sProduct->perPage() }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->category_name }}</td>
                                <td>{{ $product->status == "1" ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    <div class="table-data-feature justify-content-center">
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit" onclick="window.location.href='{{ route('product.edit', ['product'=>$product->id])}}'">
                                            <i class="zmdi zmdi-edit"></i>
                                        </button>
                                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </form>                                        
                                    </div>
                                </td>
                            </tr>
                            <tr class="spacer"></tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination Links -->
            <nav aria-label="Page navigation" class="mt-3">
                <ul class="pagination">
                    @if ($sProduct->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">«</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $sProduct->previousPageUrl() }}" rel="prev">«</a></li>
                    @endif

                    @foreach ($sProduct->getUrlRange(1, $sProduct->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $sProduct->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    @if ($sProduct->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $sProduct->nextPageUrl() }}" rel="next">»</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link">»</span></li>
                    @endif
                </ul>
            </nav>

            
            <!-- END DATA TABLE -->
        </div>
    </div>

@endsection