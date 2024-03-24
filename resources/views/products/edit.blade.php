@extends('components.style')
@section('title', ' Edit Product')
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
<div class="row edit-page">
    <div class="col-lg-6 offset-sm-2 col-sm-6  mt-4">
        <div class="my-3 d-flex justify-between align-items-center">
            <a href="{{ route('admin.vintage_obleka') }}" class="text-secondary">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h3 class="text-center mx-5"> Продукт</h3>

        </div>
        <form action="{{ route('update_product',  $product->id) }}" id="form" class="w-sm-25" method="POST">
            @csrf
            @method('PUT')
            <div class="d-flex justify-content-end">
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="statusDropdownButton" aria-haspopup="true" aria-expanded="false">
                        @if($product->status == 'active' || $product->status == 'archived')
                        {{ ucfirst($product->status) }}
                        @else
                        Одбери
                        @endif
                    </button>

                    <div class="dropdown-menu" aria-labelledby="statusDropdownButton" onchange="updateButtonText()">
                        <select class="form-control" id="status" name="status">
                            <option value="active">Active</option>
                            <option value="archived">Archived</option>
                        </select>
                        <input type="hidden" id="statusHidden" name="statusHidden">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="name">Име на продуктот:</label>
                <textarea class="form-control" id="name" name="name" rows="2">{{ $product->name }}</textarea>
            </div>
            <div class="form-group">
                <label for="description">Опис:</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $product->description }}</textarea>

                </textarea>
            </div>
            <div class="form-group">
                <label for="price">Цена:</label>
                <input type="number" class="form-control" value="{{ $product->price }}" id="price" name="price">
            </div>
            <div class="form-group">
                <label for="quantity"> Количина: </label>
                <div class="input-group">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-secondary" onclick="decrementValue()">-</button>
                    </span>
                    <input type="number" class="form-control" value="{{ $product->quantity }}" id="quantity" name="quantity" value="1">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-secondary" onclick="incrementValue()">+</button>
                    </span>
                </div>
            </div>
            <div class="form-group mt-2">
                <label for="size">Величина:</label>
                <div class="checkbox-list">
                    <div class="checkbox-option size-option" data-value="S">S</div>
                    <div class="checkbox-option size-option" data-value="M">M</div>
                    <div class="checkbox-option size-option" data-value="L">L</div>
                    <div class="checkbox-option size-option" data-value="XL">XL</div>
                </div>
                <input type="hidden" id="size" name="size">
            </div>

            <div class="form-group mt-2">
                <label>Боја:</label>
                <div class="checkbox-list">
                    <div class="checkbox-option color-option" data-value="red" style="background-color: red;"></div>
                    <div class="checkbox-option color-option" data-value="blue" style="background-color: blue;"></div>
                    <div class="checkbox-option color-option" data-value="green" style="background-color: green;"></div>
                    <div class="checkbox-option color-option" data-value="yellow" style="background-color: yellow;"></div>
                    <div class="checkbox-option color-option" data-value="black" style="background-color: black;"></div>
                    <div class="checkbox-option color-option" data-value="white" style="background-color: white;"></div>
                    <div class="checkbox-option color-option" data-value="lightgray" style="background-color: lightgray;"></div>
                </div>
                <input type="hidden" id="color" name="color">
            </div>

            <div class="form-group mt-2">
                <label for="guidelines_for_maintenance">Насоки за одржување:</label>
                <textarea class="form-control" id="guidelines_for_maintenance" name="guidelines_for_maintenance" rows="3"> {{ $product->guidelines_for_maintenance }}</textarea>
            </div>
            <div class="form-group mt-2">
                <label for="tags_id"> Ознаки:</label>
                <select class="form-control" id="tags_id" name="tags_id" multiple>
                    @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ '#' . $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-6">
                <label for="image">Слики</label>
                <div class="row align-items-center">
                    @foreach($product as $image)
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


            <div class="form-group mt-2 mb-5 d-flex justify-between">
                <label>Категорија:</label>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="categoryDropdownButton" aria-haspopup="true" aria-expanded="false">

                        {{ $product->category->name ?? 'Одбери' }}

                    </button>
                    <div class="dropdown-menu" aria-labelledby="categoryDropdownButton" onchange=" updateCategoryButtonText()">
                        <select class="form-control" id="category_id" name="category_id">
                            @foreach($category as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <label>Бренд:</label>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="brandDropdownButton" aria-haspopup=" true" aria-expanded="false">

                        Одбери
                    </button>
                    <div class="dropdown-menu" aria-labelledby="brandDropdownButton" onchange="updateBrandButtonText()">
                        <select class=" form-control" id="brand_id" name="brand_id">
                            @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group my-3 text-center d-flex justify-content-between">

                <button type="submit" class="mx-auto mt-3 login">Зачувај</button>
                <a href="{{ route('admin.vintage_obleka') }}" class="mx-auto mt-4 text-decoration-none text-secondary ">Откажи</a>
            </div>
        </form>



    </div>
</div>
<!-- <h4 class="green text-decoration-none" data-toggle="modal" data-target="#discountModal">Додај попуст</h4>
                <i class="fa-solid fa-plus border"></i>
                <div class="modal fade" id="discountModal" tabindex="-1" role="dialog" aria-labelledby="discountModalLabel" aria-hidden="true">

                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="discountModalLabel">Додај попуст</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="discount_id">Код на попуст:</label>
                                        <select class="form-control" id="discount_id" name="discount_id">
                                            @foreach($discounts as $discount)
                                            <option value="{{ $discount->id }}">{{ $discount->code }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="discount_amount">Износ на попуст:</label>
                                        <input type="text" class="form-control" id="discount_amount" name="discount_amount">
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Затвори</button>
                                <button type="button" class="btn btn-primary" id="saveDiscountButton">Зачувај</button>
                            </div>
                        </div>
                    </div>
                </div> -->

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
    const sizeOptions = document.querySelectorAll('.size-option');
    const colorOptions = document.querySelectorAll('.color-option');
    const sizeInput = document.getElementById('size');
    const colorInput = document.getElementById('color');

    sizeOptions.forEach(option => {
        option.addEventListener('click', function() {
            const value = this.getAttribute('data-value');
            const isSelected = this.classList.contains('selected');
            console.log(isSelected);


        })
    });
    sizeOptions.forEach(option => {
        option.addEventListener('click', function() {
            const value = this.getAttribute('data-value');
            sizeOptions.forEach(opt => opt.classList.remove('selected'));
            this.classList.add('selected');
            sizeInput.value = value;
        });
    });

    colorOptions.forEach(option => {
        option.addEventListener('click', function() {
            const value = this.getAttribute('data-value');
            colorOptions.forEach(opt => opt.classList.remove('selected'));
            this.classList.add('selected');
            colorInput.value = value;
            console.log(value);

        });

    });
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

    function incrementValue() {
        let input = document.getElementById('quantity');
        let value = parseInt(input.value, 10);
        value = isNaN(value) ? 1 : value;
        value++;
        input.value = value;
    }

    function decrementValue() {
        let input = document.getElementById('quantity');
        let value = parseInt(input.value, 10);
        value = isNaN(value) ? 1 : value;
        if (value > 1) {
            value--;
            input.value = value;
        }
    }
</script>