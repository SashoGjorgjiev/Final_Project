@extends('components.style')
@section('title','Create Brand')

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

<div class="row">
    <div class="col-lg-6 offset-sm-2 col-sm-6  mt-4">
        <div class="my-3 d-flex justify-between align-items-center">
            <a href="{{ route('admin.discount') }}" class="text-secondary">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h3 class="text-center mx-5"> Нов бренд</h3>
        </div>
        <form action="{{ route('store_brand') }}" class="w-sm-25" method="POST">
            @csrf
            <div class="d-flex justify-content-end ">
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="statusDropdownButton" aria-haspopup="true" aria-expanded="false">
                        Статус
                    </button>
                    <div class="dropdown-menu" aria-labelledby="statusDropdownButton">
                        <select class="form-control" id="status" name="status" onchange="updateButtonText('status', 'statusDropdownButton')">
                            <option value="active">Active</option>
                            <option value="archived">Archived</option>
                        </select>
                    </div>
                    <input type="hidden" id="statusHidden" name="statusHidden">
                </div>
            </div>
            <div class="form-group">
                <label for="name">Име на бренд</label>
                <input type="text" class="form-control text-muted" id="name" name="name" value="{{ old('name') }}">
            </div>
            <div class="form-group my-3">
                <label for="description"> Опис</label>
                <input type="text" class="form-control text-muted" id="description" name="description" value="{{ old('description') }}">
            </div>
            <div class="form-group mt-2 mb-5 d-flex justify-between">
                <label>Категорија:</label>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="categoryDropdownButton" aria-haspopup="true" aria-expanded="false">
                        Одбери
                    </button>
                    <div class="dropdown-menu" aria-labelledby="categoryDropdownButton">
                        <select class="form-control" id="category_id" name="category_id" onchange="updateButtonText('category_id', 'categoryDropdownButton')">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $brand->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group mt-2">
                <label for="tags">Ознаки</label>
                <div class="form-group">
                    <select class="form-control" id="tag_id" name="tag_id">
                        @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">#{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group mt-3 text-center d-flex justify-content-between">

                <button type="submit" class="mx-auto mt-3 login">Зачувај</button>
                <a href="{{ route('admin.brand') }}" class="mx-auto mt-4 text-decoration-none text-secondary ">Откажи</a>
            </div>
        </form>
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
        var selectedOption = selectElement.options[selectElement.selectedIndex].text;
        document.getElementById("statusDropdownButton").textContent = selectedOption;
    }

    function updateCategoryButtonText() {
        var selectElement = document.getElementById("category_id");
        var selectedOption = selectElement.options[selectElement.selectedIndex].text;
        document.getElementById("categoryDropdownButton").textContent = selectedOption;
    }
    c

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