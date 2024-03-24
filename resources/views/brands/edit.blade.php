@extends('components.style')
@section('title','Edit Brand')


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

<div class="container edit-page">

    <div class="row ">
        <div class="col-lg-6 offset-sm-2 col-sm-6  mt-4">
            <div class="my-3 d-flex justify-between align-items-center">
                <a href="{{ route('admin.discount') }}" class="text-secondary">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h3 class="text-center mx-5"> Бренд</h3>



            </div>
            <form action="{{ route('update_brand', $brand->id) }}" class="w-sm-25 " method="POST">
                @csrf
                @method('PUT')
                <div class="d-flex justify-content-end ">
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" class="status" type="button" id="statusDropdownButton" aria-haspopup="true" aria-expanded="false">
                            Статус
                        </button>

                        <div class="dropdown-menu" aria-labelledby="statusDropdownButton">
                            <select class="form-control" id="status" name="status" onchange="updateButtonText()">
                                <option value="active">Active</option>
                                <option value="archived">Archived</option>
                            </select>
                        </div>
                        <input type="hidden" id="statusHidden" name="statusHidden">

                    </div>
                </div>

                <div class="form-group">
                    <label for="code">Име на бренд</label>
                    <input type="text" class="form-control text-muted" id="name" name="name" value="{{ $brand->name }}  ">
                </div>
                <div class="form-group my-3">
                    <label for="amount"> Опис</label>
                    <input type="text" class="form-control text-muted" id="description" name="description" value="{{ $brand->description }}   ">
                </div>
                <div class="form-group mt-2 mb-5 d-flex justify-between">
                    <label>Категорија:</label>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="categoryDropdownButton" aria-haspopup="true" aria-expanded="false">
                            {{ $brand->category->name ?? 'Одбери' }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="categoryDropdownButton" onchange="updateCategoryButtonText()">
                            <select class="form-control" id="category_id" name="category_id">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $brand->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <label>Бренд:</label>

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="brandDropdownButton" aria-haspopup="true" aria-expanded="false">
                            {{ $brand->name ?? 'Одбери' }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="categoryDropdownButton" onchange="updateCategoryButtonText()">
                            <select class="form-control" id="category_id" name="category_id">
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="tag_id">Ознаки</label>
                    <select class="form-control" id="tag_id" name="tag_id" multiple">
                        @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ '#' . $tag->name }}</option>
                        @endforeach
                    </select>


                </div>
                <div class="col-sm-6 offset-sm-2 col-md-6 ">
                    <label for="image">Слики</label>
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-4">
                            <div class="mx-2">
                                <img src="{{ $product->image }}" class="img-fluid" alt="Product Image">
                            </div>
                        </div>
                        @endforeach

                        <div class="col-4">
                            <div class="form-group mt-2">
                                <label for="image"></label>
                                <label for="image" class="file-upload">
                                    <i class="fas fa-plus"></i>
                                </label>
                                <input type="file" id="image" name="image" style="display: none;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3 text-center d-flex justify-content-between">

                    <button type="submit" class="mx-auto mt-3 login">Зачувај</button>
                    <a href="{{ route('admin.brand') }}" class="mx-auto mt-4 text-decoration-none text-secondary ">Откажи</a>
                </div>
            </form>


        </div>

    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    const dropdownButtons = document.querySelectorAll('.dropdown-toggle');
    const dropdownMenus = document.querySelectorAll('.dropdown-menu');


    dropdownButtons.forEach((button, index) => {
        button.addEventListener('click', function() {
            dropdownMenus[index].classList.toggle('show');
        });
    });

    document.addEventListener('click', function(event) {
        dropdownButtons.forEach((button, index) => {
            if (!dropdownMenus[index].contains(event.target) && !button.contains(event.target)) {
                dropdownMenus[index].classList.remove('show');
            }
        });
    });
    document.getElementById('status').addEventListener('change', function() {
        updateButtonText('status', 'statusDropdownButton');
    });

    document.getElementById('category_id').addEventListener('change', function() {
        updateButtonText('category_id', 'categoryDropdownButton');
    });

    document.getElementById('brand_id').addEventListener('change', function() {
        updateButtonText('brand_id', 'brandDropdownButton');
    });

    function updateButtonText() {
        var selectElement = document.getElementById("status");
        var selectedOption = selectElement.options[selectElement.selectedIndex].value;
        document.getElementById("statusHidden").value = selectedOption;
        document.getElementById("statusDropdownButton").textContent = selectedOption;

    }

    function updateCategoryButtonText() {
        var selectElement = document.getElementById("category_id");
        var selectedOption = selectElement.options[selectElement.selectedIndex].text;
        document.getElementById("categoryDropdownButton").textContent = selectedOption;
    }

    function updateBrandButtonText() {
        var selectElement = document.getElementById("brand_id");
        var selectedOption = selectElement.options[selectElement.selectedIndex].text;
        document.getElementById("brandDropdownButton").textContent = selectedOption;
    }


    function updateButtonText() {
        var selectElement = document.getElementById("status");
        var selectedOption = selectElement.options[selectElement.selectedIndex].value;
        document.getElementById("statusHidden").value = selectedOption;
        document.getElementById("statusDropdownButton").textContent = selectedOption;
    }
</script>