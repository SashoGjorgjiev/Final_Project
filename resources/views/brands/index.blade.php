@extends('dashboard')
@section('title','Brands')
@section('content')
<div class="container mt-2 mx-auto">
    <div class="row d-flex justify-content-center align-items-center mx-auto">
        <div class="col-xs-12 col-md-6 offset-2 mr-4">
            <div class="search-container">
                <input type="text" class="search-input" id="searchInput" placeholder=" Пребарувај ...">
                <i class="fas fa-search search-icon" id="search"></i>

            </div>
            <div id="searchResults">

            </div>
        </div>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="green mt-3 d-flex align-items-center smallMargin justify-content-end">
        <h5>Додај нов бренд</h5>
        <a href="{{ route('create_brand') }}" class="green  text-decoration-none"><i class="fa-solid fa-plus plus"></i></a>

    </div>

    <div class="container mt-3 mx-auto  " id="listView">
        <div class="row d-flex justify-content-center align-items-center mx-auto">
            <div>
                <h4>Активни</h4>
                @foreach ($brands as $brand)
                @if ($brand->status == 'active')
                <div class="product-item border-rounded d-flex align-items-center justify-content-between p-3 my-4">
                    <div class="product-details text-center d-flex align-items-center justify-content-between">
                        <h4 class=" m-0 mr-3">{{ $brand->name  }} </h4>
                    </div>
                    <div class="actions">
                        <a href="{{ route('edit_brand',  $brand->id) }}" class="ml-3">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                </div>
                <div class="product-item border-rounded d-flex align-items-center justify-content-between p-3 my-4">

                    <div class="product-details text-center d-flex align-items-center justify-content-between">
                        <h4 class=" m-0 mr-3">{{ $brand->description  }}</h4>
                    </div>
                    <div class="actions">
                        <a href="{{ route('edit_brand',  $brand->id) }}" class="ml-3">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="container mt-3 mx-auto  " id="listView">
        <div class="row d-flex justify-content-center align-items-center mx-auto">
            <div>
                <h4 class="text-muted">Архивa</h4>
                @foreach ($brands as $brand)
                @if ($brand->status == 'archived')
                <div class="product-item border-rounded d-flex align-items-center justify-content-between p-3 my-4">
                    <div class="product-details text-center d-flex align-items-center justify-content-between">
                        <h4 class=" m-0 mr-3 text-muted">{{ $brand->name  }} </h4>
                    </div>
                    <div class="actions">
                        <a href="{{ route('edit_brand',  $brand->id) }}" class="ml-3">

                    </div>
                </div>
                <div class="product-item border-rounded d-flex align-items-center justify-content-between p-3 my-4">
                    <div class="product-details text-center d-flex align-items-center justify-content-between">
                        <h4 class=" m-0 mr-3  text-muted">{{ $brand->description  }}</h4>
                    </div>
                    <div class="actions">
                        <a href="{{ route('edit_brand',  $brand->id) }}" class="ml-3">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    $('#searchInput').on('keyup', function() {
                        let query = $(this).val().trim();
                        if (query.length > 0) {
                            $.ajax({
                                url: '/search_brand',
                                method: 'GET',
                                data: {
                                    query: query
                                },
                                success: function(response) {
                                    console.log(response);

                                    $('#searchResults').empty();

                                    if (response.length > 0) {
                                        var table = $('<table>').addClass('table');

                                        var headers = '<tr><th>Name</th><th>Description</th></tr>';
                                        table.append(headers);

                                        $.each(response, function(index, brand) {
                                            var row = $('<tr>');
                                            var nameCell = $('<td>').text(brand.name);
                                            var descriptionCell = $('<td>').text(brand.description);
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