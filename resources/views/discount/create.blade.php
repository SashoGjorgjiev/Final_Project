@extends('components.style')
@section('title', ' Create Discount')

<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-sm-2 col-sm-6  mt-4">
            <div class="my-3 d-flex justify-between align-items-center">
                <a href="{{ route('admin.discount') }}" class="text-secondary">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h3 class="text-center mx-5"> Попуст/Промо код</h3>


            </div>
            <form action="{{ route('store_discount') }}" class="w-sm-25" method="POST">
                @csrf
                <div class="d-flex justify-content-end ">
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="statusDropdownButton" aria-haspopup="true" aria-expanded="false">
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
                    <label for="code">Име на Попуст/Промо код:</label>
                    <input type="text" class="form-control text-muted" id="code" name="code">
                </div>
                <div class="form-group my-3">
                    <label for="amount"> Попуст</label>
                    <input type="text" class="form-control text-muted" id="amount" name="amount">
                </div>
                <div class="form-group mt-2 mb-5 d-flex justify-between">
                    <label>Категорија:</label>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="categoryDropdownButton" aria-haspopup="true" aria-expanded="false">
                            Одбери
                        </button>
                        <div class="dropdown-menu" aria-labelledby="categoryDropdownButton" onchange="updateCategoryButtonText()">
                            <select class="form-control" id="category_id" name="category_id">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <label>Бренд:</label>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="brandDropdownButton" aria-haspopup="true" aria-expanded="false">
                            Одбери
                        </button>
                        <div class="dropdown-menu" aria-labelledby="brandDropdownButton" onchange="updateBrandButtonText()">
                            <select class="form-control" id="brand_id" name="brand_id">
                                @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="tags">Постави попуст на </label>
                    <div class="form-group">
                        <select class="form-control" id="tag_id" name="tag_id" multiple>
                            @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" {{ $discount->tag_id == $tag->id ? 'selected' : '' }}>#{{ $tag->id }} - {{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary login my-5 text-center">Зачувај</button>
            </form>
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