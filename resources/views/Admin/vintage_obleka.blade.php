@extends('dashboard')

@section('title', 'Products')
@section('content')

<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    </div>
    @endif
</div>

<div class="container mt-2 mx-auto">
    <div class="row d-flex justify-content-center align-items-center mx-auto">
        <div class="col-sm-12 col-md-6 offset-2 mr-4">
            <div class="search-container">
                <input type="text" class="search-input" id="searchInput" placeholder=" Пребарувај ...">
                <i class="fas fa-search search-icon" id="search"></i>
                <div class="icon-container">
                    <button id="tableButton"> <i class="fa-solid fa-border-none sort-icon"></i>
                    </button>
                    <button id="listButton"> <i class="fas fa-list filter-icon"></i>
                    </button>
                </div>
            </div>
            <div id="searchResults">

            </div>
        </div>
    </div>

    <div class="green mt-3 d-flex align-items-center smallMargin justify-content-end">
        <h5>Додај нов продукт</h5>
        <a href="{{ route('create_product') }}" class="green  text-decoration-none"><i class="fa-solid fa-plus plus"></i></a>

    </div>
    <div class="container mt-3 mx-auto" id="listView">
        <div class="row d-flex justify-content-center align-items-center mx-auto">
            <div>
                @foreach ($products as $product)
                @if ($product)
                <div class="product-item border-rounded d-flex align-items-center justify-content-between p-3 my-4">
                    <div class="product-details text-center d-flex align-items-center justify-content-between">
                        <h4 class="green m-0 mr-3">0{{ $product->id }}</h4>
                    </div>
                    <div class="product-details text-center d-flex align-items-center justify-content-between">
                        <h4 class="m-0">{{ ucfirst($product->name) }} - {{ $product->category->name }}</h4>
                    </div>
                    <div class="actions">
                        <a href="{{ route('edit_product', $product->id) }}" class="ml-3">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="container mt-3 mx-auto col-md-10 col-sm-5 offset-2 d-none" id="tableView">

        @foreach ($products as $product)
        <div class="product-item border-rounded d-flex align-items-center justify-content-between p-3 my-4">
            <div class="card ">
                <p class="text-secondary font-weight-bold">
                    @if($product->quantity == 0)
                    Продадено
                    @elseif($product->quantity == 1)
                    *само 1 парче
                    @else
                    Достапно
                    @endif
                </p>

                <img class="card-img-top img-thumbnail" src="{{ asset($product->image) }}" alt="Example image">
                <div class="card-body">
                    <div class="text-right d-flex justify-content-end align-items-center">
                        <span class="mr-2 green font-weight-bold">{{.0. $product->id }}</span>
                        <i class="fas fa-heart mx-2"></i>
                        <i class="fas fa-shopping-cart ml-2"></i>
                    </div>


                    <h4 class="card-title font-weight-bold">{{ ucfirst($product->name) }} - {{ ucfirst($product->category->name) }}</h4>
                    <p class="card-text">Боја:
                        <span class="color-square" style="background-color: {{ $product->color }} "></span>
                    </p>
                    <div class=" d-flex justify-content-between align-items-center">
                        <p class="card-text">Величина: {{ $product->size }}</p>
                        <span class="text-right m-0 text-dark font-weight-bold">Цена: {{ $product->price }} ден</span>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="col-6 offset-3 ">
        <div class="mt-3 pagination mx-auto">
            <span> {{ $products->links()  }} </span>
        </div>
    </div>

</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let removeTextElements = document.querySelectorAll('.removeText');
        removeTextElements.forEach(function(element) {
            element.textContent = '';
        });
        document.getElementById('toggleSidebar').classList.add('d-none');

        let listButton = document.getElementById('listButton');
        let tableButton = document.getElementById('tableButton');
        console.log('List button:', listButton);
        console.log('Table button:', tableButton);
        listButton.addEventListener('click', function() {
            console.log('List button clicked');
            document.getElementById('tableView').classList.add('d-none');
            document.getElementById('listView').classList.remove('d-none');
        });
        tableButton.addEventListener('click', function() {
            console.log('Table button clicked');
            document.getElementById('listView').classList.add('d-none');
            document.getElementById('tableView').classList.remove('d-none');
        });

        // Handle search input keyup
        $('#searchInput').on('keyup', function() {
            var query = $(this).val().trim();
            if (query.length > 0) {
                $.ajax({
                    url: '/search',
                    method: 'GET',
                    data: {
                        query: query
                    },
                    success: function(response) {
                        console.log(response);

                        $('#searchResults').empty();

                        if (response.length > 0) {
                            var table = $('<table>').addClass('table');

                            var headers = '<tr><th>NAME</th><th>DESCRIPTION</th></tr>';
                            table.append(headers);

                            $.each(response, function(index, result) {
                                var row = $('<tr>');
                                var nameCell = $('<td>').text(result.name);
                                var descriptionCell = $('<td>').text(result.description);
                                row.append(nameCell, descriptionCell);
                                table.append(row);
                            });

                            $('#searchResults').append(table);
                        } else {
                            $('#searchResults').html('<div>No results found.</div>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                $('#searchResults').empty();
            }
        });
    });
</script>
@endsection