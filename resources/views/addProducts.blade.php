@extends('frontend.layouts.main')
@section('title', 'Add New Listing | ResellZone')

@section('main-container')

    <div class="aboutbanner innerbanner"
        style="background: linear-gradient(135deg, #0db893, #0db893); color: white; padding: 80px 0; position: relative; text-align: center;">
        <div class="inner-breadcrumb" style="background:  #0db893(0, 0, 0, 0.5); padding: 20px; border-radius: 10px;">
            <div class="container" style="max-width: 1200px; margin: 0 auto;">
                <div class="row align-items-center text-center">
                    <div class="col-md-12 col-12">
                        <br><br>
                        <h2 class="breadcrumb-title"
                            style="font-size: 3rem; font-family: 'Poppins';margin-top:7%; sans-serif; margin-bottom: 20px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">
                            Fill Out the Form to Post Your Ad Effortlessly!
                        </h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb"
                                style="display: inline-block; background: none; padding: 0; margin: 0; font-size: 1.2rem; font-family: 'Roboto', sans-serif; color: white; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);">
                                <li class="breadcrumb-item" style="display: inline; color: white;">
                                    <a href="/"
                                        style="color: #ffd700; text-decoration: none; font-weight: bold;">Home</a>
                                    <span style="color: white;">> add Product</span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div style="display: flex; justify-content: space-between; padding: 20px;">
        <div style="flex: 1; padding-right: 20px;">
            </h2>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div
                style="width: 300px; padding: 16px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9; height: 49%;">
                <h3 style="color: #00695c; font-weight: bold; font-size: 18px;">Need help getting started?</h3>
                <p style="color: #333; font-size: 14px; line-height: 1.5;">
                    Review these resources to learn how to create a great ad and increase your selling chances.
                </p>
                <ul style="list-style-type: disc; padding-left: 20px; font-size: 14px;">
                    <li><a href="#" style="color: #00695c; font-weight: bold; text-decoration: none;">Tips for
                            improving your ads and your chances of selling</a></li>
                    <li><a href="#" style="color: #00695c; font-weight: bold; text-decoration: none;">All you need
                            to know about Posting Ads</a></li>
                </ul>
                <p style="color: #333; font-size: 14px;">
                    You can always come back to change your ad.
                </p>
            </div>

            <div class="col-md-10 col-lg-8 mx-auto">
                <div class="form-bordered-container" style="background: white">
                    <h2 class="text-center" style="color: black;">
                        Post Your Adds for Sale
                    </h2>




                    <form action="{{ isset($product) ? route('product.update', $product->id) : url('product') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label fw-bold">Which Category you want to sell*</label>
                            <select id="nameSelect" name="type" class="form-select" required>
                                <option value="Select Type" selected disabled>Select a type</option>
                                <option value="car">Car</option>
                                <option value="Cars on Installments">Cars on Installments</option>
                                <option value="Cars Accessories">Cars Accessories</option>
                                <option value="Spare Parts">Spare Parts</option>
                                <option value="Buses, Vans & Trucks">Buses, Vans & Trucks</option>
                                <option value="Rickshaw & Chingchi">Rickshaw & Chingchi</option>
                                <option value="Tractors & Trailers">Tractors & Trailers</option>
                                <option value="Other Vehicles">Vehicles</option>
                                <option value="Televisions & Accessories">Televisions & Accessories</option>
                                <option value="AC & Coolers">AC & Coolers</option>
                                <option value="Heaters">Heaters</option>
                                <option value="Washing Machines & Dryers">Washing Machines & Dryers</option>
                                <option value="Generators">Generators</option>
                                <option value="UPS">UPS</option>
                                <option value="Water Dispensers">Water Dispensers</option>
                                <option value="Watches">Watches</option>
                                <option value="Fashion Assessories">Fashion Accessories</option>
                                <option value="Other Fashion">fashion style</option>
                                <option value="Sports Equipment">Sports Equipment</option>
                                <option value="Musical Instruments">Musical Instruments</option>
                                <option value="Gym & Fitness">Gym & Fitness</option>
                                <option value="Other Sports">Other Sports</option>
                                <option value="Hospital Accessories">Hospital Accessories</option>
                                <option value="Other Healthcare">health care</option>
                                <option value="Tablets">Tablets</option>
                                <option value="Mobile Phones">mobiles</option>
                                <option value="Accessories">Mobile Accessories</option>
                                <option value="Smart Watches">Smart Watches</option>
                                <option value="Kids Furniture">Kids Furniture</option>
                                <option value="Bath & Diapers">Bath & Diapers</option>
                                <option value="Kids Clothing">Kids Clothing</option>
                                <option value="Kids Accessories">Kids Accessories</option>
                                <option value="Kids Toys">kids</option>
                                <option value="Architecture & Interior Design">Architecture & Interior Design</option>
                                <option value="Camera Installation">Camera Installation</option>
                                <option value="Construction Services">Construction Services</option>
                                <option value="Drivers & Taxi">Drivers & Taxi</option>
                                <option value="Other Services">Other Services</option>
                                <option value="Car Services">services</option>
                                <option value="sofachairs">Sofa Chairs</option>
                                <option value="Table and Dinning">Table and Dinning</option>
                                <option value="Curtains and Blinds">Curtains and Blinds</option>
                                <option value="Office Furniture">Office Furniture</option>
                                <option value="Other Household Furniture">furniture</option>
                                <option value="Land & Plots">Land & Plots</option>
                                <option value="Houses">Houses</option>
                                <option value="Apartments & Flats">Apartments & Flats</option>
                                <option value="Shops - Offices - Commercial Space">Shops - Offices - Commercial Space
                                </option>
                                <option value="Portions & Floors">Portions & Floors</option>
                                <option value="Sports">Sports</option>
                                <option value="Jobs">job board</option>
                                <option value="Property">property</option>
                                <option value="Property">books supports</option>
                                <option value="Property">pet animal</option>
                            </select>
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    const urlParams = new URLSearchParams(window.location.search);
                                    const category = urlParams.get("category");

                                    const categoryOptions = {
                                        "Vehicles": ["Select Type", "car", "Cars on Installments", "Cars Accessories", "Spare Parts",
                                            "Buses, Vans & Trucks", "Rickshaw & Chingchi", "Tractors & Trailers"
                                        ],
                                        "Electronics": ["Select Type", "Televisions & Accessories", "Computer & Laptops", "AC & Coolers", "Heaters",
                                            "Washing Machines & Dryers", "Generators", "UPS", "Water Dispensers"
                                        ],
                                        "fashion style": ["Select Type", "Watches", "Fashion Accessories"],
                                        "mobiles": ["Select Type", "Tablets", "Mobile Phones", "Accessories", "Smart Watches"],
                                        "property": ["Select Type", "Land & Plots", "Houses", "Apartments & Flats",
                                            "Shops - Offices - Commercial Space", "Portions & Floors"
                                        ],
                                        "services": ["Select Type", "Architecture & Interior Design", "Camera Installation",
                                            "Construction Services",
                                            "Drivers & Taxi", "Other Services", "Car Services"
                                        ],
                                        "kids": ["Select Type", "Kids Furniture", "Bath & Diapers", "Kids Clothing", "Kids Accessories",
                                            "Kids Toys"
                                        ],
                                        "books & supports": ["Select Type",
                                            "Textbooks",
                                            "Reference Books",
                                            "Novels & Fiction",
                                            "Academic Books , Magazines & Journals",
                                            "Childrens Books",
                                            "Law, Politics, History & Culture",
                                            "Other",

                                        ],

                                        "pet & animal": [
                                            "Select Type",
                                            "Birds & Poultry",
                                            "Domestic Pets",
                                            "Farm Animals",
                                        ],

                                        "furniture": ["Select Type", "Sofa & Chairs", "Table and Dining", "Curtains and Blinds",
                                            "Office Furniture",
                                            "Other Household Furniture"
                                        ],
                                        "health care": ["Select Type", "Other Healthcare", "Test"],
                                        "job board": ["Select Type", "Jobs"]
                                    };

                                    const selectElement = document.getElementById("nameSelect");

                                    // Hide the select to prevent flickering
                                    selectElement.style.display = "none";

                                    // Clear existing options to avoid showing all at first
                                    selectElement.innerHTML = "";

                                    if (category && categoryOptions[category]) {
                                        categoryOptions[category].forEach(optionValue => {
                                            const option = document.createElement("option");
                                            option.value = optionValue;
                                            option.textContent = optionValue;
                                            selectElement.appendChild(option);
                                        });
                                    }

                                    selectElement.style.display = "block";
                                });
                            </script>
                        </div>



                        <div class="mb-4">
                            <label class="form-label fw-bold">Upload Images in Format jpeg, png, jpg, gif, svg* (Upload up
                                to 12 images)</label>
                            <div class="image-upload-container">
                                <div class="row">
                                    @for ($i = 0; $i < 12; $i++)
                                        <div class="col-2 d-flex align-items-center justify-content-center mb-3">
                                            <div class="image-upload-placeholder text-center">
                                                <input type="file" name="pictures[]" id="pictures{{ $i }}"
                                                    class="image-input" accept="image/*" style="display:none;"
                                                    data-index="{{ $i }}">
                                                <label for="pictures{{ $i }}" class="image-label">
                                                    <div class="image-icon">
                                                        <i class="fa fa-camera"></i>
                                                    </div>
                                                    <img id="preview{{ $i }}" src=""
                                                        alt="Image Preview" class="img-fluid">
                                                </label>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                            <div class="counter">Selected: <span id="selectedCount">0</span></div>
                        </div>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const imageInputs = document.querySelectorAll('.image-input');
                                const selectedCountSpan = document.getElementById('selectedCount');
                                const maxImages = 12;
                                let selectedCount = 0;

                                imageInputs.forEach(input => {
                                    input.addEventListener('change', function() {
                                        const index = this.getAttribute('data-index');
                                        const previewImg = document.getElementById(`preview${index}`);

                                        if (this.files && this.files[0]) {
                                            const file = this.files[0];
                                            const reader = new FileReader();

                                            reader.onload = function(e) {
                                                previewImg.src = e.target.result;
                                                previewImg.style.display = 'block'; // Show the preview image
                                            }

                                            reader.readAsDataURL(file);
                                            selectedCount++;
                                        } else {
                                            selectedCount--;
                                            previewImg.style.display = 'none';
                                        }

                                        updateSelectedCount();
                                    });
                                });

                                function updateSelectedCount() {
                                    selectedCountSpan.textContent = `${selectedCount} / ${maxImages}`;
                                }
                            });
                        </script>
                        <input type="hidden" name="user_id" value="{{ session()->get('id') }}">
                        <input type="hidden" name="status" value="active">
                        <div class="mb-4">
                            <label class="form-label fw-bold">Title*</label>
                            <input type="text" name="title" id="title-input" class="form-control" minlength="10"
                                maxlength="100" placeholder="Enter a title" required>
                            <small id="title-error" class="text-danger d-none">Title must be at least 10 characters long
                                and
                                not just spaces.</small>
                        </div>

                        <script>
                            const titleInput = document.getElementById('title-input');
                            const titleError = document.getElementById('title-error');

                            titleInput.addEventListener('input', function() {
                                const trimmedValue = this.value.trim();

                                if (trimmedValue.length < 10) {
                                    titleInput.classList.add('is-invalid');
                                    titleError.classList.remove('d-none');
                                } else {
                                    titleInput.classList.remove('is-invalid');
                                    titleError.classList.add('d-none');
                                }
                            });
                        </script>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Description*</label>
                            <textarea name="description" id="description-input" class="form-control" rows="5" minlength="20"
                                maxlength="200" placeholder="Enter a detailed description" required></textarea>
                            <small id="description-error" class="text-danger d-none">Description must be at least 20
                                characters.</small>
                        </div>

                        <script>
                            const descriptionInput = document.getElementById('description-input');
                            const descriptionError = document.getElementById('description-error');

                            descriptionInput.addEventListener('input', function() {
                                const trimmedValue = this.value.trim(); // Remove leading and trailing spaces

                                if (trimmedValue.length < 20) {
                                    descriptionInput.classList.add('is-invalid'); // Add red border for invalid input
                                    descriptionError.classList.remove('d-none'); // Show error message
                                } else {
                                    descriptionInput.classList.remove('is-invalid'); // Remove red border for valid input
                                    descriptionError.classList.add('d-none'); // Hide error message
                                }
                            });
                        </script>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Name*</label>
                            <input type="text" name="name" id="name-input" class="form-control"
                                placeholder="Enter your name" required>
                            <small id="name-error" class="text-danger d-none">Only letters and spaces are allowed.</small>
                        </div>

                        <input type="hidden" name="category" value="{{ request('category') }}">
                        <div class="mb-4">
                            <label class="form-label fw-bold">Price*</label>
                            <input type="text" id="formatted_price" class="form-control"
                                placeholder="Enter the price" required oninput="formatPrice(this)">
                            <input type="hidden" name="price" id="raw_price">
                        </div>

                        <script>
                            function formatPrice(input) {
                                let value = input.value.replace(/[^0-9.]/g, '');
                                const parts = value.split('.');
                                let integerPart = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ','); // Add commas
                                let decimalPart = parts.length > 1 ? '.' + parts[1].slice(0, 2) : ''; // Limit decimals

                                input.value = integerPart + decimalPart;

                                document.getElementById('raw_price').value = value;
                            }
                        </script>
                        <script>
                            const nameInput = document.getElementById('name-input');
                            const nameError = document.getElementById('name-error');

                            nameInput.addEventListener('input', function() {
                                const regex = /^[A-Za-z\s]*$/; 
                                if (!regex.test(this.value)) {
                                    nameInput.classList.add('is-invalid');
                                    nameError.classList.remove('d-none');
                                } else {
                                    nameInput.classList.remove('is-invalid'); 
                                    nameError.classList.add('d-none'); 
                                }
                            });
                        </script>
                      <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const category = new URLSearchParams(window.location.search).get('category');

                                if (category) {
                                    const selectElement = document.getElementById('nameSelect');
                                    const options = selectElement.options;

                                    for (let i = 0; i < options.length; i++) {
                                        if (options[i].textContent.trim().toLowerCase() === category.toLowerCase()) {
                                            options[i].selected = true;
                                            break; // Exit loop once matching option is found
                                        }
                                    }

                                    if (!selectElement.value) {
                                        console.log(`Category "${category}" not found in the dropdown options.`);
                                    }
                                }
                            });
                        </script>






                        <div id="dynamicForm" class="form-section"></div>

                        <script>
                            document.getElementById('nameSelect').addEventListener('change', function() {
                                const selectedName = this.value; // Get the selected value from the dropdown
                                const dynamicForm = document.getElementById('dynamicForm');
                                dynamicForm.innerHTML = '';

                                if (selectedName === 'car') {
                                    dynamicForm.innerHTML = `
                                   <div class="mb-4">
    <label class="form-label fw-bold">Select*</label>
    <div class="d-flex gap-4">
        <button type="button" class="btn condition-btn" data-value="new">New</button>
        <button type="button" class="btn condition-btn" data-value="used">Used</button>
    </div>
    
    <!-- Hidden input to store selected condition -->
    <input type="hidden" name="condition" >
</div>
             <div id="dynamic-fields">
                <!-- New Fields -->
                <div id="new-fields" class="d-none">
                    <div class="mb-4">
                        <label class="form-label fw-bold">Body Type*</label>
                        <select name="body_type" class="form-select">
                            <option value="" disabled selected>Select Body Type</option>
                            <option value="sedan">Sedan</option>
                            <option value="suv">SUV</option>
                            <option value="hatchback">Hatchback</option>
                            <option value="convertible">Convertible</option>
                            <option value="pickup">Pickup</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Transmission*</label>
                        <select name="transmission" class="form-select">
                            <option value="" disabled selected>Select Transmission</option>
                            <option value="manual">Manual</option>
                            <option value="automatic">Automatic</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Fuel Type*</label>
                        <select name="fuel_type" class="form-select">
                            <option value="" disabled selected>Select Fuel Type</option>
                            <option value="gas">Gas</option>
                            <option value="diesel">Diesel</option>
                            <option value="petrol">Petrol</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Color*</label>
                        <input list="color-options" name="color_options" class="form-control" placeholder="Enter Color">
                        <datalist id="color-options">
                            <option value="White">
                            <option value="Black">
                            <option value="Silver">
                            <option value="Gray">
                            <option value="Red">
                            <option value="Blue">
                            <option value="Green">
                            <option value="Yellow">
                            <option value="Orange">
                            <option value="Brown">
                            <option value="Beige">
                            <option value="Gold">
                            <option value="Bronze">
                            <option value="Purple">
                            <option value="Pink">
                            <option value="Maroon">
                            <option value="Navy Blue">
                            <option value="Dark Green">
                            <option value="Turquoise">
                            <option value="Champagne">
                            <option value="Burgundy">
                            <option value="Magenta">
                            <option value="Charcoal">
                            <option value="Lime Green">
                            <option value="Ivory">
                            <option value="Teal">
                            <!-- Add more colors as needed -->
                        </datalist>
                    </div>


                   <div class="mb-4">
    <label class="form-label fw-bold">Number of Seats*</label>
    <input type="number" name="seats" class="form-control" placeholder="Enter Number of Seats" min="1" step="1" required>
</div>


                    <div class="mb-4">
            <label class="form-label fw-bold">Features*</label>
            <div class="d-flex flex-wrap gap-2">
                <!-- Feature Buttons -->
                            <button type="button" class="btn feature-btn" data-feature="Air Conditioning">Air Conditioning</button>
                            <button type="button" class="btn feature-btn" data-feature="Navigation System">Navigation System</button>
                            <button type="button" class="btn feature-btn" data-feature="Leather Seats">Leather Seats</button>
                            <button type="button" class="btn feature-btn" data-feature="Backup Camera">Backup Camera</button>
                            <button type="button" class="btn feature-btn" data-feature="Bluetooth">Bluetooth</button>
                            <button type="button" class="btn feature-btn" data-feature="Sunroof">Sunroof</button>
                            <button type="button" class="btn feature-btn" data-feature="Power Windows">Power Windows</button>
                            <button type="button" class="btn feature-btn" data-feature="Power Steering">Power Steering</button>
                            <button type="button" class="btn feature-btn" data-feature="Keyless Entry">Keyless Entry</button>
                            <button type="button" class="btn feature-btn" data-feature="Cruise Control">Cruise Control</button>
                            <button type="button" class="btn feature-btn" data-feature="Alloy Wheels">Alloy Wheels</button>
                            <button type="button" class="btn feature-btn" data-feature="Fog Lights">Fog Lights</button>
                            <button type="button" class="btn feature-btn" data-feature="Anti-lock Braking System (ABS)">Anti-lock Braking System (ABS)</button>
                            <button type="button" class="btn feature-btn" data-feature="Electronic Stability Control (ESC)">Electronic Stability Control (ESC)</button>
                            <button type="button" class="btn feature-btn" data-feature="Parking Sensors">Parking Sensors</button>
                            <button type="button" class="btn feature-btn" data-feature="Leather Upholstery">Leather Upholstery</button>
                            <button type="button" class="btn feature-btn" data-feature="Touchscreen Display">Touchscreen Display</button>
                            <button type="button" class="btn feature-btn" data-feature="Remote Start">Remote Start</button>
                            <button type="button" class="btn feature-btn" data-feature="Heated Seats">Heated Seats</button>
                            <button type="button" class="btn feature-btn" data-feature="Rear Air Conditioning">Rear Air Conditioning</button>
                            <button type="button" class="btn feature-btn" data-feature="ISOFIX Child Seat Anchors">ISOFIX Child Seat Anchors</button>
                            <button type="button" class="btn feature-btn" data-feature="Multi-zone Climate Control">Multi-zone Climate Control</button>
                            <button type="button" class="btn feature-btn" data-feature="Adaptive Headlights">Adaptive Headlights</button>
                            <button type="button" class="btn feature-btn" data-feature="Rear View Camera">Rear View Camera</button>                <!-- Add more buttons as needed -->
            </div>
            <input type="hidden"  name="features" value="">
        </div>

                   
                 <div class="mb-4">
                        <label class="form-label fw-bold">Registration City*</label>
                        <select name="register_city" class="form-select">
                            <option value="" disabled selected>Select City</option>
                            <option value="karachi">Karachi</option>
                            <option value="lahore">Lahore</option>
                            <option value="islamabad">Islamabad</option>
                            <option value="rawalpindi">Rawalpindi</option>
                            <option value="faisalabad">Faisalabad</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Car Documents*</label>
                        <select name="car_documents" class="form-select">
                            <option value="" disabled selected>Select Document Status</option>
                            <option value="original">Original</option>
                            <option value="duplicate">Duplicate</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Assembly*</label>
                        <select name="assembly_type" class="form-select">
                            <option value="" disabled selected>Select Assembly</option>
                            <option value="local">Local</option>
                            <option value="imported">Imported</option>
                        </select>
                    </div>
                </div>

                <!-- Used Fields -->
              <div id="used-fields" class="d-none">
    <div class="mb-4">
        <label class="form-label fw-bold">KM Driven*</label>
        <input type="number" name="km_driven" class="form-control" placeholder="Enter KM Driven" min="1" step="1" required>
    </div>
</div>
      <div class="mb-4">
                        <label class="form-label fw-bold">Body Type*</label>
                        <select name="body_type" class="form-select">
                            <option value="" disabled selected>Select Body Type</option>
                            <option value="sedan">Sedan</option>
                            <option value="suv">SUV</option>
                            <option value="hatchback">Hatchback</option>
                            <option value="convertible">Convertible</option>
                            <option value="pickup">Pickup</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Transmission*</label>
                        <select name="transmission" class="form-select">
                            <option value="" disabled selected>Select Transmission</option>
                            <option value="manual">Manual</option>
                            <option value="automatic">Automatic</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Fuel Type*</label>
                        <select name="fuel_type" class="form-select">
                            <option value="" disabled selected>Select Fuel Type</option>
                            <option value="gas">Gas</option>
                            <option value="diesel">Diesel</option>
                            <option value="petrol">Petrol</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Color*</label>
                        <input list="color-options" name="color_options" class="form-control" placeholder="Enter Color">
                        <datalist id="color-options">
                            <option value="White">
                            <option value="Black">
                            <option value="Silver">
                            <option value="Gray">
                            <option value="Red">
                            <option value="Blue">
                            <option value="Green">
                            <option value="Yellow">
                            <option value="Orange">
                            <option value="Brown">
                            <option value="Beige">
                            <option value="Gold">
                            <option value="Bronze">
                            <option value="Purple">
                            <option value="Pink">
                            <option value="Maroon">
                            <option value="Navy Blue">
                            <option value="Dark Green">
                            <option value="Turquoise">
                            <option value="Champagne">
                            <option value="Burgundy">
                            <option value="Magenta">
                            <option value="Charcoal">
                            <option value="Lime Green">
                            <option value="Ivory">
                            <option value="Teal">
                            <!-- Add more colors as needed -->
                        </datalist>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Number of Seats*</label>
                        <input type="number" name="seats" class="form-control" placeholder="Enter Number of Seats">
                    </div>
                   <div class="mb-4">
                    <div class="mb-4">
                        <label class="form-label fw-bold">Features*</label>
                        <div class="d-flex flex-wrap gap-2">
                            <!-- Feature Buttons -->
                            <button type="button" class="btn feature-btn" data-feature="Air Conditioning">Air Conditioning</button>
                            <button type="button" class="btn feature-btn" data-feature="Navigation System">Navigation System</button>
                            <button type="button" class="btn feature-btn" data-feature="Leather Seats">Leather Seats</button>
                            <button type="button" class="btn feature-btn" data-feature="Backup Camera">Backup Camera</button>
                            <button type="button" class="btn feature-btn" data-feature="Bluetooth">Bluetooth</button>
                            <button type="button" class="btn feature-btn" data-feature="Sunroof">Sunroof</button>
                            <button type="button" class="btn feature-btn" data-feature="Power Windows">Power Windows</button>
                            <button type="button" class="btn feature-btn" data-feature="Power Steering">Power Steering</button>
                            <button type="button" class="btn feature-btn" data-feature="Keyless Entry">Keyless Entry</button>
                            <button type="button" class="btn feature-btn" data-feature="Cruise Control">Cruise Control</button>
                            <button type="button" class="btn feature-btn" data-feature="Alloy Wheels">Alloy Wheels</button>
                            <button type="button" class="btn feature-btn" data-feature="Fog Lights">Fog Lights</button>
                            <button type="button" class="btn feature-btn" data-feature="Anti-lock Braking System (ABS)">Anti-lock Braking System (ABS)</button>
                            <button type="button" class="btn feature-btn" data-feature="Electronic Stability Control (ESC)">Electronic Stability Control (ESC)</button>
                            <button type="button" class="btn feature-btn" data-feature="Parking Sensors">Parking Sensors</button>
                            <button type="button" class="btn feature-btn" data-feature="Leather Upholstery">Leather Upholstery</button>
                            <button type="button" class="btn feature-btn" data-feature="Touchscreen Display">Touchscreen Display</button>
                            <button type="button" class="btn feature-btn" data-feature="Remote Start">Remote Start</button>
                            <button type="button" class="btn feature-btn" data-feature="Heated Seats">Heated Seats</button>
                            <button type="button" class="btn feature-btn" data-feature="Rear Air Conditioning">Rear Air Conditioning</button>
                            <button type="button" class="btn feature-btn" data-feature="ISOFIX Child Seat Anchors">ISOFIX Child Seat Anchors</button>
                            <button type="button" class="btn feature-btn" data-feature="Multi-zone Climate Control">Multi-zone Climate Control</button>
                            <button type="button" class="btn feature-btn" data-feature="Adaptive Headlights">Adaptive Headlights</button>
                            <button type="button" class="btn feature-btn" data-feature="Rear View Camera">Rear View Camera</button>
                        </div>
                    </div>

                    <!-- Hidden Input for Selected Features -->
                    <input type="hidden" name="features" id="features-input">


                   <div class="mb-4">
                        <label class="form-label fw-bold">Registration City*</label>
                        <select name="register_city" class="form-select">
                            <option value="" disabled selected>Select City</option>
                            <option value="karachi">Karachi</option>
                            <option value="lahore">Lahore</option>
                            <option value="islamabad">Islamabad</option>
                            <option value="rawalpindi">Rawalpindi</option>
                            <option value="faisalabad">Faisalabad</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Car Documents*</label>
                        <select name="car_documents" class="form-select">
                            <option value="" disabled selected>Select Document Status</option>
                            <option value="original">Original</option>
                            <option value="duplicate">Duplicate</option>
                        </select>
                    </div>
                    <div class="mb-4">
    <label class="form-label fw-bold">Brand*</label>
    <select name="brand" id="brand" class="form-select">
        <option value="" disabled selected>Select Brand</option>
        <option value="toyota">Toyota</option>
        <option value="honda">Honda</option>
        <option value="suzuki">Suzuki</option>
        <option value="nissan">Nissan</option>
        <option value="ford">Ford</option>
        <option value="bmw">BMW</option>
        <option value="mercedes">Mercedes-Benz</option>
        <option value="audi">Audi</option>
        <option value="hyundai">Hyundai</option>
        <option value="kia">Kia</option>
        <option value="mazda">Mazda</option>
        <option value="volkswagen">Volkswagen</option>
        <option value="chevrolet">Chevrolet</option>
        <option value="mitsubishi">Mitsubishi</option>
        <option value="jeep">Jeep</option>
        <option value="lexus">Lexus</option>
    </select>
</div>
<div class="mb-4">
    <label class="form-label fw-bold">Make*</label>
    <select name="make" id="make" class="form-select">
        <option value="" disabled selected>Select Make</option>
    </select>
</div>
<div class="mb-4">
    <label class="form-label fw-bold">Model*</label>
    <input type="number" name="model" class="form-control" placeholder="Enter Model Year" min="1900" max="2025" required>
</div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Assembly*</label>
                        <select name="assembly_type" class="form-select" required>
                            <option value="" disabled selected>Select Assembly</option>
                            <option value="local">Local</option>
                            <option value="imported">Imported</option>
                        </select>
                    </div>

                </div>
           
                                `;
                                    document.querySelectorAll('.condition-btn').forEach(button => {
                                        button.addEventListener('click', function() {
                                            const condition = this.getAttribute('data-value');

                                            // Hide both new and used fields initially
                                            document.getElementById('new-fields').classList.add('d-none');
                                            document.getElementById('used-fields').classList.add('d-none');

                                            // Show the appropriate fields based on the selected condition
                                            if (condition === 'new') {
                                                document.getElementById('new-fields').classList.remove('d-none');
                                            } else if (condition === 'used') {
                                                document.getElementById('used-fields').classList.remove('d-none');
                                            }

                                            // Update hidden input value
                                            document.querySelector('input[name="condition"]').value = condition;

                                            // Make sure required fields are only active in the visible section
                                            document.querySelectorAll("#new-fields input, #new-fields select").forEach(
                                                el => {
                                                    el.required = (condition === 'new');
                                                });
                                            document.querySelectorAll("#used-fields input, #used-fields select")
                                                .forEach(el => {
                                                    el.required = (condition === 'used');
                                                });

                                            // Optional: Add some active class to the clicked button for better UI feedback
                                            document.querySelectorAll('.condition-btn').forEach(btn => btn.classList
                                                .remove('active'));
                                            this.classList.add('active');
                                        });
                                    });

                                    const featureButtons = document.querySelectorAll(".feature-btn");
                                    const selectedFeaturesInput = document.getElementById("selected-features");

                                    let selectedFeatures = [];

                                    featureButtons.forEach(button => {
                                        button.addEventListener("click", function() {
                                            const feature = this.getAttribute("data-feature");

                                            // Toggle the selected state
                                            if (selectedFeatures.includes(feature)) {
                                                selectedFeatures = selectedFeatures.filter(f => f !== feature);
                                                this.classList.remove("btn-success");
                                                this.classList.add("btn-secondary");
                                            } else {
                                                selectedFeatures.push(feature);
                                                this.classList.remove("btn-secondary");
                                                this.classList.add("btn-success");
                                            }

                                            selectedFeaturesInput.value = selectedFeatures.join(",");
                                        });
                                    });





                                } else if (selectedName === 'sofachairs') {
                                    // Inject dynamic form content for "Sofa Chairs"
                                    dynamicForm.innerHTML = `
                                    <div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>


                                    <div class="mb-4">
                                        <label class="form-label fw-bold">Type*</label>
                                        <select id="furniture-type" name="type" class="form-select" required>
                                            <option value="" disabled selected>Select the type of Sofa Chair</option>
                                            <option value="recliner">Recliner</option>
                                            <option value="loveseat">Loveseat</option>
                                            <option value="sectional">Sectional</option>
                                            <option value="other">Other Sofa Chairs</option>
                                        </select>
                                    </div>
                                `;
                                }
                               else if (selectedName === 'Cars on Installments') {
                                    // Inject dynamic form content for "Cars on Installments"
                                    dynamicForm.innerHTML = `

 <div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>


        <div class="mb-4">
            <label class="form-label fw-bold">Body Type*</label>
            <select name="body_type" class="form-select">
                <option value="" disabled selected>Select Body Type</option>
                <option value="sedan">Sedan</option>
                <option value="suv">SUV</option>
                <option value="hatchback">Hatchback</option>
                <option value="convertible">Convertible</option>
                <option value="pickup">Pickup</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label fw-bold">Transmission*</label>
            <select name="transmission" class="form-select">
                <option value="" disabled selected>Select Transmission</option>
                <option value="manual">Manual</option>
                <option value="automatic">Automatic</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label fw-bold">Fuel Type*</label>
            <select name="fuel_type" class="form-select">
                <option value="" disabled selected>Select Fuel Type</option>
                <option value="gas">Gas</option>
                <option value="diesel">Diesel</option>
                <option value="petrol">Petrol</option>
            </select>
        </div>

         <div class="mb-4">
                        <label class="form-label fw-bold">Color*</label>
                        <input list="color-options" name="color_options" class="form-control" placeholder="Enter Color">
                        <datalist id="color-options">
                            <option value="White">
                            <option value="Black">
                            <option value="Silver">
                            <option value="Gray">
                            <option value="Red">
                            <option value="Blue">
                            <option value="Green">
                            <option value="Yellow">
                            <option value="Orange">
                            <option value="Brown">
                            <option value="Beige">
                            <option value="Gold">
                            <option value="Bronze">
                            <option value="Purple">
                            <option value="Pink">
                            <option value="Maroon">
                            <option value="Navy Blue">
                            <option value="Dark Green">
                            <option value="Turquoise">
                            <option value="Champagne">
                            <option value="Burgundy">
                            <option value="Magenta">
                            <option value="Charcoal">
                            <option value="Lime Green">
                            <option value="Ivory">
                            <option value="Teal">
                            <!-- Add more colors as needed -->
                        </datalist>
                    </div>


        <div class="mb-4">
            <label class="form-label fw-bold">Features*</label>
            <div class="d-flex flex-wrap gap-2">
                <!-- Feature Buttons -->
                            <button type="button" class="btn feature-btn" data-feature="Air Conditioning">Air Conditioning</button>
                            <button type="button" class="btn feature-btn" data-feature="Navigation System">Navigation System</button>
                            <button type="button" class="btn feature-btn" data-feature="Leather Seats">Leather Seats</button>
                            <button type="button" class="btn feature-btn" data-feature="Backup Camera">Backup Camera</button>
                            <button type="button" class="btn feature-btn" data-feature="Bluetooth">Bluetooth</button>
                            <button type="button" class="btn feature-btn" data-feature="Sunroof">Sunroof</button>
                            <button type="button" class="btn feature-btn" data-feature="Power Windows">Power Windows</button>
                            <button type="button" class="btn feature-btn" data-feature="Power Steering">Power Steering</button>
                            <button type="button" class="btn feature-btn" data-feature="Keyless Entry">Keyless Entry</button>
                            <button type="button" class="btn feature-btn" data-feature="Cruise Control">Cruise Control</button>
                            <button type="button" class="btn feature-btn" data-feature="Alloy Wheels">Alloy Wheels</button>
                            <button type="button" class="btn feature-btn" data-feature="Fog Lights">Fog Lights</button>
                            <button type="button" class="btn feature-btn" data-feature="Anti-lock Braking System (ABS)">Anti-lock Braking System (ABS)</button>
                            <button type="button" class="btn feature-btn" data-feature="Electronic Stability Control (ESC)">Electronic Stability Control (ESC)</button>
                            <button type="button" class="btn feature-btn" data-feature="Parking Sensors">Parking Sensors</button>
                            <button type="button" class="btn feature-btn" data-feature="Leather Upholstery">Leather Upholstery</button>
                            <button type="button" class="btn feature-btn" data-feature="Touchscreen Display">Touchscreen Display</button>
                            <button type="button" class="btn feature-btn" data-feature="Remote Start">Remote Start</button>
                            <button type="button" class="btn feature-btn" data-feature="Heated Seats">Heated Seats</button>
                            <button type="button" class="btn feature-btn" data-feature="Rear Air Conditioning">Rear Air Conditioning</button>
                            <button type="button" class="btn feature-btn" data-feature="ISOFIX Child Seat Anchors">ISOFIX Child Seat Anchors</button>
                            <button type="button" class="btn feature-btn" data-feature="Multi-zone Climate Control">Multi-zone Climate Control</button>
                            <button type="button" class="btn feature-btn" data-feature="Adaptive Headlights">Adaptive Headlights</button>
                            <button type="button" class="btn feature-btn" data-feature="Rear View Camera">Rear View Camera</button>                <!-- Add more buttons as needed -->
            </div>
            <input type="hidden" id="selected-features" name="features" value="">
        </div>


    `;

                                    // Handle feature button clicks after content is injected
                                    const featureButtons = document.querySelectorAll(".feature-btn");
                                    const selectedFeaturesInput = document.getElementById("selected-features");

                                    let selectedFeatures = [];

                                    featureButtons.forEach(button => {
                                        button.addEventListener("click", function() {
                                            const feature = this.getAttribute("data-feature");

                                            // Toggle the selected state
                                            if (selectedFeatures.includes(feature)) {
                                                selectedFeatures = selectedFeatures.filter(f => f !== feature);
                                                this.classList.remove("btn-success");
                                                this.classList.add("btn-secondary");
                                            } else {
                                                selectedFeatures.push(feature);
                                                this.classList.remove("btn-secondary");
                                                this.classList.add("btn-success");
                                            }

                                            selectedFeaturesInput.value = selectedFeatures.join(",");
                                        });
                                    });
                                } else if (selectedName === 'Cars Accessories') {
                                    // Inject dynamic form content for "Cars on Installments"
                                    dynamicForm.innerHTML = `
                                      <div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>

`;
                                } else if (selectedName === 'Spare Parts') {
                                    // Inject dynamic form content for "Cars on Installments"
                                    dynamicForm.innerHTML = `
    <div class="mb-4">
            <label class="form-label fw-bold">Type*</label>
            <select name="make"  class="form-select" required>
                <option value="" disabled selected>Select Vehicle Make</option>
                <!-- Options here... --><option value="">Select Type</option>
                <option value="Cars Parts">Cars Parts</option>
                <option value="Other Parts">Other Parts</option>

            </select>
        </div>

`;
                                } else if (selectedName === 'Buses, Vans & Trucks') {
                                    dynamicForm.innerHTML = `
                                   <div class="mb-4">
            <label class="form-label fw-bold">Make*</label>
            <select name="make"  class="form-select" required>
                <option value="" disabled selected>Select Vehicle Make</option>
                <!-- Options here... --><option value="">Select Make</option>
                <option value="suzuki">Suzuki</option>
                <option value="toyota">Toyota</option>
                <option value="honda">Honda</option>
                <option value="daihatsu">Daihatsu</option>
                <option value="nissan">Nissan</option>
                <option value="mazda">Mazda</option>
                <option value="hyundai">Hyundai</option>
                <option value="kia">Kia</option>
                <option value="mitsubishi">Mitsubishi</option>
                <option value="isuzu">Isuzu</option>
                <option value="proton">Proton</option>
                <option value="chevrolet">Chevrolet</option>
                <option value="changan">Changan</option>
                <option value="faw">FAW</option>
                <option value="fiat">Fiat</option>
                <option value="jeep">Jeep</option>
                <option value="ford">Ford</option>
                <option value="mercedes">Mercedes</option>
                <option value="bmw">BMW</option>
                <option value="audi">Audi</option>
            </select>
        </div>

      <div class="mb-4">
                        <label class="form-label fw-bold">Model*</label>
                        <input type="number" name="model"  class="form-control" placeholder="Enter Model" required>
                        <span id="error-message" style="color:red; display:none;">Model should not be less than 1980</span>
                    </div>
<div class="mb-4">
    <label class="form-label fw-bold">KM Driven*</label>
    <input type="number" name="km_driven" id="km_driven" class="form-control" placeholder="Enter KM Driven" min="0" required>
</div>


`;
                                    document.getElementById('model').addEventListener('input', function() {
                                        var model = parseInt(this.value);
                                        var errorMessage = document.getElementById('error-message');

                                        if (model < 1980) {
                                            errorMessage.style.display = 'block';
                                        } else {
                                            errorMessage.style.display = 'none';
                                        }
                                    });
                                } else if (selectedName === 'Rickshaw & Chingchi') {
                                    dynamicForm.innerHTML = `
       <div class="mb-4">
            <label class="form-label fw-bold">Make*</label>
            <select name="make"  class="form-select" required>
                <option value="" disabled selected>Select Vehicle Make</option>
                <!-- Options here... --><option value="">Select Make</option>
                <option value="suzuki">Suzuki</option>
                <option value="toyota">Toyota</option>
                <option value="honda">Honda</option>
                <option value="daihatsu">Daihatsu</option>
                <option value="nissan">Nissan</option>
                <option value="mazda">Mazda</option>
                <option value="hyundai">Hyundai</option>
                <option value="kia">Kia</option>
                <option value="mitsubishi">Mitsubishi</option>
                <option value="isuzu">Isuzu</option>
                <option value="proton">Proton</option>
                <option value="chevrolet">Chevrolet</option>
                <option value="changan">Changan</option>
                <option value="faw">FAW</option>
                <option value="fiat">Fiat</option>
                <option value="jeep">Jeep</option>
                <option value="ford">Ford</option>
                <option value="mercedes">Mercedes</option>
                <option value="bmw">BMW</option>
                <option value="audi">Audi</option>
            </select>
        </div>

     <div class="mb-4">
                        <label class="form-label fw-bold">Model*</label>
                        <input type="number" name="model"  class="form-control" placeholder="Enter Model" required>
                        <span id="error-message" style="color:red; display:none;">Model should not be less than 1980</span>
                    </div>
                    <div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>


`;
                                    document.getElementById('model').addEventListener('input', function() {
                                        var model = parseInt(this.value);
                                        var errorMessage = document.getElementById('error-message');

                                        if (model < 1980) {
                                            errorMessage.style.display = 'block';
                                        } else {
                                            errorMessage.style.display = 'none';
                                        }
                                    });
                                } else if (selectedName === 'Tractors & Trailers') {
                                    dynamicForm.innerHTML = `

     <div class="mb-4">
                        <label class="form-label fw-bold">Model*</label>
                        <input type="number" name="model"  class="form-control" placeholder="Enter Model" required>
                        <span id="error-message" style="color:red; display:none;">Model should not be less than 1980</span>
                    </div>
                    <div class="mb-4">
    <label class="form-label fw-bold">KM Driven*</label>
    <input type="number" name="km_driven" id="km_driven" class="form-control" placeholder="Enter KM Driven" min="0" required>
</div>


`;
                                    document.getElementById('model').addEventListener('input', function() {
                                        var model = parseInt(this.value);
                                        var errorMessage = document.getElementById('error-message');

                                        if (model < 1980) {
                                            errorMessage.style.display = 'block';
                                        } else {
                                            errorMessage.style.display = 'none';
                                        }
                                    });
                                } else if (selectedName === 'Other Vehicles') {
                                    dynamicForm.innerHTML = `


`;
                                }
                                else if (selectedName === 'Domestic Pets') {
    dynamicForm.innerHTML = `
     <!-- Breed Dropdown -->
    <label for="breed" class="block font-bold text-gray-700 text-lg">Breed*</label>
    <div class="relative">
        <select id="breed" name="breed" class="w-full border border-gray-300 bg-white text-gray-700 px-4 py-4 rounded-lg appearance-none focus:outline-none focus:ring-2 focus:ring-gray-400 text-lg" required>
            <option value="" disabled selected>Select Breed</option>
            <option value="persian">Persian</option>
            <option value="siamese">Siamese</option>
            <option value="maine_coon">Maine Coon</option>
            <option value="ragdoll">Ragdoll</option>
        </select>
    </div>

    <!-- Sex Dropdown -->
    <label for="sex" class="block font-bold text-gray-700 text-lg mt-4">Sex</label>
    <div class="relative">
        <select id="sex" name="sex" class="w-full border border-gray-300 bg-white text-gray-700 px-4 py-4 rounded-lg appearance-none focus:outline-none focus:ring-2 focus:ring-gray-400 text-lg" required>
            <option value="" disabled selected>Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="pair">Pair</option>
        </select>
    </div>

    <!-- Age Dropdown -->
    <label for="age" class="block font-bold text-gray-700 text-lg mt-4">Age</label>
    <div class="relative">
        <select id="age" name="age" class="w-full border border-gray-300 bg-white text-gray-700 px-4 py-4 rounded-lg appearance-none focus:outline-none focus:ring-2 focus:ring-gray-400 text-lg" required>
            <option value="" disabled selected>Select Age</option>
            <option value="1">1 Year</option>
            <option value="2">2 Years</option>
            <option value="3">3 Years</option>
            <option value="4">4 Years</option>
            <option value="5+">5+ Years</option>
        </select>
    </div>
    `;
}

                                else if (selectedName === 'Televisions & Accessories') {
                                    dynamicForm.innerHTML = `
    <div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>

       <!-- Dropdown for Brand -->
        <div class="mb-4">
    <label class="form-label fw-bold">Brand*</label>
     <select name="brand" class="form-select">
        <option value="Popular Brand">Popular Brand</option>
        <option value="Samsung">Samsung</option>
        <option value="TCL">TCL</option>
        <option value="Sony">Sony</option>
        <option value="LG">LG</option>
        <option value="Audionic">Audionic</option>
        <option value="Changhong Ruba">Changhong Ruba</option>
        <option value="EcoStar">EcoStar</option>
        <option value="Haier">Haier</option>
        <option value="Hisense">Hisense</option>
        <option value="Logitech">Logitech</option>
        <option value="Orient">Orient</option>
        <option value="Panasonic">Panasonic</option>
        <option value="PEL">PEL</option>
        <option value="Philips">Philips</option>
        <option value="Others">Others</option>
    </select>
</div>

<div class="mb-4">
    <label class="form-label fw-bold">Screen Size*</label>
    <select name="screen_size" class="form-select">
        <option value="Below 32 Inches">Below 32 Inches</option>
        <option value="32 Inches">32 Inches</option>
        <option value="33-43 Inches">33-43 Inches</option>
        <option value="44-49 Inches">44-49 Inches</option>
        <option value="50-59 Inches">50-59 Inches</option>
        <option value="60-69 Inches">60-69 Inches</option>
        <option value="70 Inches & above">70 Inches & above</option>
    </select>
</div>

<!-- Dropdown for Resolution -->
<div class="mb-4">
    <label class="form-label fw-bold">Resolution*</label>
    <select name="resolution" class="form-select">
        <option value="Standard (480p)">Standard (480p)</option>
        <option value="HD (720p)">HD (720p)</option>
        <option value="Full HD (1080p)">Full HD (1080p)</option>
        <option value="4K or Ultra HD (2160p)">4K or Ultra HD (2160p)</option>
        <option value="Others">Others</option>
    </select>
</div>
`;
                                } else if (selectedName === 'Birds & Poultry') {
                                    // Inject dynamic form content for "Cars on Installments"
                                    dynamicForm.innerHTML = `
                                    <div id="birds-poultry-fields" class="category-fields" style="display: none;">
    <div class="mb-4">
        <label class="form-label fw-bold">Bird Species*</label>
        <input type="text" name="bird_species" class="form-control" placeholder="Enter Bird Species">
    </div>

    <div class="mb-4">
        <label class="form-label fw-bold">Age*</label>
        <input type="number" name="bird_age" class="form-control" placeholder="Enter Bird Age">
    </div>

    <div class="mb-4">
        <label class="form-label fw-bold">Breed*</label>
        <input type="text" name="bird_breed" class="form-control" placeholder="Enter Bird Breed">
    </div>

    <div class="mb-4">
        <label class="form-label fw-bold">Health Status*</label>
        <select name="bird_health" class="form-select">
            <option value="" disabled selected>Select Health Status</option>
            <option value="healthy">Healthy</option>
            <option value="sick">Sick</option>
            <option value="vaccinated">Vaccinated</option>
        </select>
    </div>
</div>



`;
                                } else if (selectedName === ' Domestic Pets') {
                                    // Inject dynamic form content for "Cars on Installments"
                                    dynamicForm.innerHTML = `
                                    <div id="domestic-pets-fields" class="category-fields" style="display: none;">
    <div class="mb-4">
        <label class="form-label fw-bold">Pet Species*</label>
        <input type="text" name="pet_species" class="form-control" placeholder="Enter Pet Species (Dog, Cat, etc.)">
    </div>

    <div class="mb-4">
        <label class="form-label fw-bold">Age*</label>
        <input type="number" name="pet_age" class="form-control" placeholder="Enter Pet Age">
    </div>

    <div class="mb-4">
        <label class="form-label fw-bold">Breed*</label>
        <input type="text" name="pet_breed" class="form-control" placeholder="Enter Pet Breed">
    </div>

    <div class="mb-4">
        <label class="form-label fw-bold">Health Status*</label>
        <select name="pet_health" class="form-select">
            <option value="" disabled selected>Select Health Status</option>
            <option value="healthy">Healthy</option>
            <option value="sick">Sick</option>
            <option value="vaccinated">Vaccinated</option>
        </select>
    </div>
</div>

`;
                                } else if (selectedName === 'Farm Animals') {
                                    // Inject dynamic form content for "Cars on Installments"
                                    dynamicForm.innerHTML = `
                                    <div id="domestic-pets-fields" class="category-fields" style="display: none;">
    <div class="mb-4">
        <label class="form-label fw-bold">Pet Species*</label>
        <input type="text" name="pet_species" class="form-control" placeholder="Enter Pet Species (Dog, Cat, etc.)">
    </div>

    <div class="mb-4">
        <label class="form-label fw-bold">Age*</label>
        <input type="number" name="pet_age" class="form-control" placeholder="Enter Pet Age">
    </div>

    <div class="mb-4">
        <label class="form-label fw-bold">Breed*</label>
        <input type="text" name="pet_breed" class="form-control" placeholder="Enter Pet Breed">
    </div>

    <div class="mb-4">
        <label class="form-label fw-bold">Health Status*</label>
        <select name="pet_health" class="form-select">
            <option value="" disabled selected>Select Health Status</option>
            <option value="healthy">Healthy</option>
            <option value="sick">Sick</option>
            <option value="vaccinated">Vaccinated</option>
        </select>
    </div>
</div>

`;
                                } else if (selectedName === 'Textbooks') {
                                    dynamicForm.innerHTML = `

                                <div class="mb-4">
    <label class="form-label fw-bold">Book Title*</label>
    <input type="text" name="book_title" class="form-control" placeholder="Enter Book Title">
</div>

<div class="mb-4">
    <label class="form-label fw-bold">Author*</label>
    <input type="text" name="author" class="form-control" placeholder="Enter Author Name">
</div>

<div class="mb-4">
    <label class="form-label fw-bold">Language*</label>
    <select name="language" class="form-select">
        <option value="" disabled selected>Select Language</option>
        <option value="English">English</option>
        <option value="Urdu">Urdu</option>
        <option value="Arabic">Arabic</option>
        <option value="French">French</option>
        <option value="Other">Other</option>
    </select>
</div>

                                `;
                                } else if (selectedName === 'Reference Books') {
                                    dynamicForm.innerHTML = `

                                <div class="mb-4">
    <label class="form-label fw-bold">Book Title*</label>
    <input type="text" name="book_title" class="form-control" placeholder="Enter Book Title">
</div>

<div class="mb-4">
    <label class="form-label fw-bold">Author*</label>
    <input type="text" name="author" class="form-control" placeholder="Enter Author Name">
</div>

<div class="mb-4">
    <label class="form-label fw-bold">Language*</label>
    <select name="language" class="form-select">
        <option value="" disabled selected>Select Language</option>
        <option value="English">English</option>
        <option value="Urdu">Urdu</option>
        <option value="Arabic">Arabic</option>
        <option value="French">French</option>
        <option value="Other">Other</option>
    </select>
</div>

                                `;
                                } else if (selectedName === 'Novels & Fiction') {
                                    dynamicForm.innerHTML = `

                                <div class="mb-4">
    <label class="form-label fw-bold">Book Title*</label>
    <input type="text" name="book_title" class="form-control" placeholder="Enter Book Title">
</div>

<div class="mb-4">
    <label class="form-label fw-bold">Author*</label>
    <input type="text" name="author" class="form-control" placeholder="Enter Author Name">
</div>

<div class="mb-4">
    <label class="form-label fw-bold">Language*</label>
    <select name="language" class="form-select">
        <option value="" disabled selected>Select Language</option>
        <option value="English">English</option>
        <option value="Urdu">Urdu</option>
        <option value="Arabic">Arabic</option>
        <option value="French">French</option>
        <option value="Other">Other</option>
    </select>
</div>

                                `;
                                } else if (selectedName === 'Childrens Books') {
                                    dynamicForm.innerHTML = `

                                <div class="mb-4">
    <label class="form-label fw-bold">Book Title*</label>
    <input type="text" name="book_title" class="form-control" placeholder="Enter Book Title">
</div>

<div class="mb-4">
    <label class="form-label fw-bold">Author*</label>
    <input type="text" name="author" class="form-control" placeholder="Enter Author Name">
</div>

<div class="mb-4">
    <label class="form-label fw-bold">Language*</label>
    <select name="language" class="form-select">
        <option value="" disabled selected>Select Language</option>
        <option value="English">English</option>
        <option value="Urdu">Urdu</option>
        <option value="Arabic">Arabic</option>
        <option value="French">French</option>
        <option value="Other">Other</option>
    </select>
</div>

                                `;
                                } else if (selectedName === 'Academic Books , Magazines & Journals') {
                                    dynamicForm.innerHTML = `

                                <div class="mb-4">
    <label class="form-label fw-bold">Book Title*</label>
    <input type="text" name="book_title" class="form-control" placeholder="Enter Book Title">
</div>

<div class="mb-4">
    <label class="form-label fw-bold">Author*</label>
    <input type="text" name="author" class="form-control" placeholder="Enter Author Name">
</div>

<div class="mb-4">
    <label class="form-label fw-bold">Language*</label>
    <select name="language" class="form-select">
        <option value="" disabled selected>Select Language</option>
        <option value="English">English</option>
        <option value="Urdu">Urdu</option>
        <option value="Arabic">Arabic</option>
        <option value="French">French</option>
        <option value="Other">Other</option>
    </select>
</div>

                                `;
                                } else if (selectedName === 'Law, Politics, History & Culture') {
                                    dynamicForm.innerHTML = `

                                <div class="mb-4">
    <label class="form-label fw-bold">Book Title*</label>
    <input type="text" name="book_title" class="form-control" placeholder="Enter Book Title">
</div>

<div class="mb-4">
    <label class="form-label fw-bold">Author*</label>
    <input type="text" name="author" class="form-control" placeholder="Enter Author Name">
</div>

<div class="mb-4">
    <label class="form-label fw-bold">Language*</label>
    <select name="language" class="form-select">
        <option value="" disabled selected>Select Language</option>
        <option value="English">English</option>
        <option value="Urdu">Urdu</option>
        <option value="Arabic">Arabic</option>
        <option value="French">French</option>
        <option value="Other">Other</option>
    </select>
</div>

                                `;
                                } else if (selectedName === 'Other') {
                                    dynamicForm.innerHTML = `

                                <div class="mb-4">
    <label class="form-label fw-bold">Book Title*</label>
    <input type="text" name="book_title" class="form-control" placeholder="Enter Book Title">
</div>

<div class="mb-4">
    <label class="form-label fw-bold">Author*</label>
    <input type="text" name="author" class="form-control" placeholder="Enter Author Name">
</div>

<div class="mb-4">
    <label class="form-label fw-bold">Language*</label>
    <select name="language" class="form-select">
        <option value="" disabled selected>Select Language</option>
        <option value="English">English</option>
        <option value="Urdu">Urdu</option>
        <option value="Arabic">Arabic</option>
        <option value="French">French</option>
        <option value="Other">Other</option>
    </select>
</div>

                                `;
                                } else if (selectedName === 'Heaters') {
                                    dynamicForm.innerHTML = `

<div class="mb-4">
    <label class="form-label fw-bold">Brand*</label>
    <select name="brand" class="form-select">
        <option value="Anex">Anex</option>
        <option value="Electric Quartz">Electric Quartz</option>
        <option value="Nasgas">Nasgas</option>
        <option value="SECO">SECO</option>
        <option value="Sogo">Sogo</option>
        <option value="Others">Others</option>
    </select>
</div>
<div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>


<div class="mb-4">
    <label class="form-label fw-bold">Power Source*</label>
    <select name="power_source" class="form-select">
        <option value="Electric">Electric</option>
        <option value="Electric & Gas(Dual)">Electric & Gas(Dual)</option>
        <option value="Gas">Gas</option>
    </select>
</div>

`;
                                } else if (selectedName === 'AC & Coolers') {
                                    // Inject dynamic form content for "Cars on Installments"
                                    dynamicForm.innerHTML = `
    <!-- Dropdown for Type -->
<div class="mb-4">
    <label class="form-label fw-bold">Type*</label>
    <select name="type" class="form-select">
        <option value="Window ACs">Window ACs</option>
        <option value="Split ACs">Split ACs</option>
        <option value="Floor Standing ACs">Floor Standing ACs</option>
        <option value="Portable ACs">Portable ACs</option>
        <option value="Others">Others</option>
    </select>
</div>
<!-- Dropdown for Capacity -->
<div class="mb-4">
    <label class="form-label fw-bold">Capacity*</label>
    <select name="capacity" class="form-select">
        <option value="Popular Capacity">Popular Capacity</option>
        <option value="0.75 Ton">0.75 Ton</option>
        <option value="1 Ton">1 Ton</option>
        <option value="1.2 Ton">1.2 Ton</option>
        <option value="1.3 Ton">1.3 Ton</option>
        <option value="1.5 Ton">1.5 Ton</option>
        <option value="1.8 Ton">1.8 Ton</option>
        <option value="2 Ton">2 Ton</option>
        <option value="2.2 Ton">2.2 Ton</option>
        <option value="2.5 Ton">2.5 Ton</option>
        <option value="3.5 Ton">3.5 Ton</option>
        <option value="4 & above Ton">4 & above Ton</option>
        <option value="Others">Others</option>
    </select>
</div>
                                <div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>

                    `;
                                } else if (selectedName === 'Washing Machines & Dryers') {
                                    dynamicForm.innerHTML = `
                                                        <div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>

<div class="mb-4">
    <label class="form-label fw-bold">Brand*</label>
    <select name="brand" class="form-select">
        <option value="Dawlance">Dawlance</option>
        <option value="Haier">Haier</option>
        <option value="LG">LG</option>
        <option value="National">National</option>
        <option value="PEL">PEL</option>
        <option value="Super Asia">Super Asia</option>
        <option value="Others">Others</option>
    </select>
</div>
<!-- Dropdown for Type -->
<div class="mb-4">
    <label class="form-label fw-bold">Type*</label>
    <select name="type" class="form-select">

        <option value="Fully Automatic">Fully Automatic</option>
        <option value="Semi Automatic">Semi Automatic</option>
        <option value="Others">Others</option>
    </select>
</div>
<!-- Dropdown for Load Type -->
<div class="mb-4">
    <label class="form-label fw-bold">Load Type*</label>
    <select name="load_type" class="form-select">
        <option value="Top Load">Top Load</option>
        <option value="Front Load">Front Load</option>
    </select>
</div>


`;
                                } else if (selectedName === 'Generators') {

                                    dynamicForm.innerHTML = `

<div class="mb-4">
    <label class="form-label fw-bold">Type*</label>
    <select name="type" class="form-select">
        <option value="">Select Type</option>
        <option value="Portable Generator">Portable Generator</option>
        <option value="Commercial Generator">Commercial Generator</option>
        <option value="Others">Others</option>
    </select>
</div>
<div class="mb-4">
    <label class="form-label fw-bold"> Fuel Type*</label>
    <select name="fuel_type" class="form-select">
        <option value="">Select Type</option>
        <option value="Battery">Battery</option>
        <option value="Diesel">Diesel</option>
        <option value="Diesel & Gas">Diesel & Gas</option>
        <option value="Gas">Gas</option>
        <option value="Petrol">Petrol</option>
        <option value="Petrol & Gas">Petrol & Gas</option>
        <option value="Solar Energy">Solar Energy</option>
    </select>
</div>
<div class="mb-4">
    <label class="form-label fw-bold">Voltage*</label>
    <select name="voltage" class="form-select">
        <option value="">Select Type</option>
        <option value="100">1-100 kva</option>
        <option value="101">100 kva & above</option>
    </select>
</div>

<div class="mb-4">
    <label class="form-label fw-bold">Brand Name*</label>
    <select name="brand" class="form-select">
        <option value="">Select Type</option>
        <option value="Popular Brand">Popular Brand</option>
        <option value="Others">Others</option>
        <option value="Jasco">Jasco</option>
        <option value="Loncin">Loncin</option>
        <option value="Perkins (UK)">Perkins (UK)</option>
        <option value="Hyundai">Hyundai</option>
        <option value="Angel">Angel</option>
        <option value="Cummins (USA)">Cummins (USA)</option>
        <option value="Denyo">Denyo</option>
        <option value="Elemax">Elemax</option>
        <option value="Firman">Firman</option>
        <option value="Homage">Homage</option>
        <option value="Isuzu">Isuzu</option>
        <option value="Yamaha">Yamaha</option>
    </select>
</div>
    <div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>



`;
                                } else if (selectedName === 'UPS') {

                                    dynamicForm.innerHTML = `
                                 <div class="mb-4">
    <label class="form-label fw-bold" for="brand">Brand*</label>
    <select name="brand"  required class="form-control">
        <option value="" disabled selected>Select Brand</option>
        <option value="apc">APC</option>
        <option value="apollo">Apollo</option>
        <option value="cyberpower">CyberPower</option>
        <option value="ecostar">EcoStar</option>
        <option value="fronus">Fronus</option>
        <option value="homage">Homage</option>
        <option value="inverex">Inverex</option>
        <option value="voltronic">Voltronic Power</option>
        <option value="others">Others</option>
    </select>
</div>

<div class="mb-4">
    <label class="form-label fw-bold" for="wattage">Wattage*</label>
    <select name="wattage"  required class="form-control">
        <option value="" disabled selected>Select Wattage</option>
        <option value="500">500 Watts</option>
        <option value="1000">1000 Watts</option>
        <option value="1500">1500 Watts</option>
        <option value="2000">2000 Watts</option>
    </select>
</div>





                                    <div class="mb-4">
                                        <label class="form-label fw-bold">Condition*</label>
                                        <div class="d-flex flex-column gap-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
                                                <label class="form-check-label" for="new">New</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
                                                <label class="form-check-label" for="used">Used</label>
                                            </div>
                                        </div>
                                    </div>



`;
                                } 
                                
                                else if (selectedName === 'Computer & Laptops') {

                                    dynamicForm.innerHTML = `
                                  <div class="mb-4">
            <label class="form-label fw-bold" for="brand">Brand*</label>
            <select name="brand" required class="form-control">
                <option value="" disabled selected>Select Brand</option>
                <option value="dell">Dell</option>
                <option value="hp">HP</option>
                <option value="lenovo">Lenovo</option>
                <option value="asus">ASUS</option>
                <option value="acer">Acer</option>
                <option value="apple">Apple</option>
                <option value="msi">MSI</option>
                <option value="razer">Razer</option>
                <option value="other">Other</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold" for="processor">Processor*</label>
            <select name="processor" required class="form-control">
                <option value="" disabled selected>Select Processor</option>
                <option value="intel i3">Intel Core i3</option>
                <option value="intel i5">Intel Core i5</option>
                <option value="intel i7">Intel Core i7</option>
                <option value="intel i9">Intel Core i9</option>
                <option value="amd ryzen 3">AMD Ryzen 3</option>
                <option value="amd ryzen 5">AMD Ryzen 5</option>
                <option value="amd ryzen 7">AMD Ryzen 7</option>
                <option value="amd ryzen 9">AMD Ryzen 9</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold" for="ram">RAM*</label>
            <select name="ram" required class="form-control">
                <option value="" disabled selected>Select RAM</option>
                <option value="4GB">4 GB</option>
                <option value="8GB">8 GB</option>
                <option value="16GB">16 GB</option>
                <option value="32GB">32 GB</option>
                <option value="64GB">64 GB</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold" for="storage">Storage*</label>
            <select name="storage" required class="form-control">
                <option value="" disabled selected>Select Storage</option>
                <option value="128GB SSD">128 GB SSD</option>
                <option value="256GB SSD">256 GB SSD</option>
                <option value="512GB SSD">512 GB SSD</option>
                <option value="1TB SSD">1 TB SSD</option>
                <option value="1TB HDD">1 TB HDD</option>
                <option value="2TB HDD">2 TB HDD</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">Condition*</label>
            <div class="d-flex flex-column gap-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
                    <label class="form-check-label" for="new">New</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
                    <label class="form-check-label" for="used">Used</label>
                </div>
            </div>
        </div>



`;
                                }
                                
                                
                                
                                
                                else if (selectedName === 'Water Dispensers') {

                                    dynamicForm.innerHTML = `
                                    <form style="margin: 20px;">
    <label for="numTaps" style="font-size: 16px; font-weight: bold; color: #17a2b8; display: block; margin-bottom: 8px;">
        Number of Taps:
    </label>
    <select id="numTaps" name="numTaps" style="padding: 10px; border: 1px solid #ccc; border-radius: 6px; font-size: 14px; color: #333; cursor: pointer; background-color: #ADD8E6; width: 100%; transition: background-color 0.3s ease;">
        <option value="" disabled selected>Select number of taps</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select>

    <br><br>

    <label for="refrigerator" style="font-size: 16px; font-weight: bold; color: #17a2b8; display: block; margin-bottom: 8px;">
        With Refrigerator:
    </label>
    <select name="refrigerator" style="padding: 10px; border: 1px solid #ccc; border-radius: 6px; font-size: 14px; color: #333; cursor: pointer; background-color: #ADD8E6; width: 100%; transition: background-color 0.3s ease;">
        <option value="" disabled selected>Select an option</option>
        <option value="yes">Yes</option>
        <option value="no">No</option>
    </select>
</form>
<div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>



                                `;
                                } else if (selectedName === 'Sports Equipment') {

                                    dynamicForm.innerHTML = `


<!-- Label and dropdown -->
<label class="form-label fw-bold" for="type">Type*</label>
<select name="type"  class="form-select">
    <option value="" disabled selected>Select Type</option>
    <option value="hiking">Hiking</option>
    <option value="horse_riding">Horse Riding</option>
    <option value="golf">Golf</option>
    <option value="boxing">Boxing</option>
    <option value="skating">Skating</option>
    <option value="swimming">Swimming</option>
    <option value="fishing">Fishing</option>
    <option value="sport_clothes">Sport Clothes</option>
    <option value="sports_shoes">Sports Shoes</option>
    <option value="other_sports">Other Sports</option>
</select>



                                        <label class="form-label fw-bold">Condition*</label>
                                        <div class="d-flex flex-column gap-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
                                                <label class="form-check-label" for="new">New</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
                                                <label class="form-check-label" for="used">Used</label>
                                            </div>
                                        </div>
                                    </div>


`;
                                } else if (selectedName === 'Musical Instruments') {

                                    dynamicForm.innerHTML = `


 <label class="form-label fw-bold" for="musical_instruments">Musical Instruments*</label>
<select name="musical_instruments" required>
    <option value="" disabled selected>Select Instrument</option>
    <option value="guitar">Guitar</option>
    <option value="piano">Piano</option>
    <option value="violin">Violin</option>
    <option value="flute">Flute</option>
    <option value="drums">Drums</option>
    <option value="saxophone">Saxophone</option>
    <option value="trumpet">Trumpet</option>
    <option value="harp">Harp</option>
    <option value="accordion">Accordion</option>
    <option value="clarinet">Clarinet</option>
</select>


<div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>

`;
                                } else if (selectedName === 'Gym & Fitness') {

                                    dynamicForm.innerHTML = `


<!-- Label and dropdown -->
<label class="form-label fw-bold" for="gym_and_fitness">Gym And Fitness*</label>
<select name="gym_and_fitness" id="gym_and_fitness" required>
    <option value="" disabled selected>Select Type</option>
    <option value="yoga">Yoga</option>
    <option value="weight_training">Weight Training</option>
    <option value="cardio">Cardio</option>
    <option value="crossfit">CrossFit</option>
    <option value="bodybuilding">Bodybuilding</option>
    <option value="stretching">Stretching</option>
    <option value="functional_training">Functional Training</option>
    <option value="aerobics">Aerobics</option>
    <option value="pilates">Pilates</option>
    <option value="calisthenics">Calisthenics</option>
</select>

<div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>


`;
                                } else if (selectedName === 'Tablets') {

                                    dynamicForm.innerHTML = `


<!-- Label and dropdown -->
 <label class="form-label fw-bold" for="brands">Brands*</label>
<select name="brand" id="brands" required>
    <option value="" disabled selected>Select Brand</option>
    <option value="apple">Apple</option>
    <option value="samsung">Samsung</option>
    <option value="lenovo">Lenovo</option>
    <option value="huawei">Huawei</option>
    <option value="microsoft">Microsoft</option>
    <option value="amazon">Amazon</option>
    <option value="xiaomi">Xiaomi</option>
    <option value="asus">Asus</option>
    <option value="acer">Acer</option>
    <option value="google">Google</option>
</select>

<div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>



`;
                                } else if (selectedName === 'Mobile Phones') {

                                    dynamicForm.innerHTML = `


<!-- Label and dropdown -->
<label class="form-label fw-bold" for="mobile_brands">Mobile Brands*</label>
<select name="brand"  required>
    <option value="" disabled selected>Select Brand</option>
    <option value="apple">Apple</option>
    <option value="samsung">Samsung</option>
    <option value="lenovo">Lenovo</option>
    <option value="huawei">Huawei</option>
    <option value="microsoft">Microsoft</option>
    <option value="amazon">Amazon</option>
    <option value="xiaomi">Xiaomi</option>
    <option value="asus">Asus</option>
    <option value="acer">Acer</option>
    <option value="google">Google</option>
</select>
<div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>

`;
                                } 
                                else if (selectedName === 'Watches') {

                                    dynamicForm.innerHTML = `

<label for="smartWatchBrand" style="font-size: 16px; font-weight: bold; color: #17a2b8; display: block; margin-bottom: 8px;">
    Brand*
</label>
<select name="brand">
    <option value="" disabled selected>Select brand</option>
    <option value="Apple">Apple</option>
    <option value="Samsung">Samsung</option>
    <option value="Garmin">Garmin</option>
    <option value="Fitbit">Fitbit</option>
    <option value="Huawei">Huawei</option>
    <option value="Amazfit">Amazfit</option>
    <option value="Fossil">Fossil</option>
    <option value="TicWatch">TicWatch</option>
    <option value="Other">Other</option>
</select>

<div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>
`;
                                } 
                                else if (selectedName === 'Sofa & Chairs') {

                                    dynamicForm.innerHTML = `

<label for="smartWatchBrand" style="font-size: 16px; font-weight: bold; color: #17a2b8; display: block; margin-bottom: 8px;">
    Brand*
</label>
<select name="brand">
    <option value="" disabled selected>Select brand</option>
    <option value="Apple">Apple</option>
    <option value="Samsung">Samsung</option>
    <option value="Garmin">Garmin</option>
    <option value="Fitbit">Fitbit</option>
    <option value="Huawei">Huawei</option>
    <option value="Amazfit">Amazfit</option>
    <option value="Fossil">Fossil</option>
    <option value="TicWatch">TicWatch</option>
    <option value="Other">Other</option>
</select>

<div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>



`;
                                } 
                                
                                
                                
                                else if (selectedName === 'Smart Watches') {

                                    dynamicForm.innerHTML = `

<label for="smartWatchBrand" style="font-size: 16px; font-weight: bold; color: #17a2b8; display: block; margin-bottom: 8px;">
    Brand*
</label>
<select name="brand">
    <option value="" disabled selected>Select brand</option>
    <option value="Apple">Apple</option>
    <option value="Samsung">Samsung</option>
    <option value="Garmin">Garmin</option>
    <option value="Fitbit">Fitbit</option>
    <option value="Huawei">Huawei</option>
    <option value="Amazfit">Amazfit</option>
    <option value="Fossil">Fossil</option>
    <option value="TicWatch">TicWatch</option>
    <option value="Other">Other</option>
</select>

<div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>



`;
                                } else if (selectedName === 'Kids Furniture') {

                                    dynamicForm.innerHTML = `
                                 <label for="furnitureType" style="font-size: 16px; font-weight: bold; color: #17a2b8; display: block; margin-bottom: 8px;">
    Furniture Type*
</label>
<select name="type" id="furnitureType" class="form-select">
    <option value="" disabled selected>Select furniture type</option>
    <option value="Sofa">Sofa</option>
    <option value="Bed">Bed</option>
    <option value="Dining Table">Dining Table</option>
    <option value="Chair">Chair</option>
    <option value="Coffee Table">Coffee Table</option>
    <option value="Wardrobe">Wardrobe</option>
    <option value="Desk">Desk</option>
    <option value="Bookshelf">Bookshelf</option>
    <option value="Cabinet">Cabinet</option>
    <option value="Other">Other</option>
</select>



<div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>

                                `;
                                } else if (selectedName === 'Bath & Diapers') {

                                    dynamicForm.innerHTML = `
                                <label for="kids_bath_diaper" class="form-label fw-bold" style="font-size: 16px; color: #17a2b8; margin-bottom: 8px;">
    Kids' Bath & Diaper Products*
</label>
<select name="kids_bath_diaper"  class="form-select">
    <option value="" disabled selected>Select product type</option>
    <option value="Baby Shampoo">Baby Shampoo</option>
    <option value="Baby Soap">Baby Soap</option>
    <option value="Diapers">Diapers</option>
    <option value="Baby Wipes">Baby Wipes</option>
    <option value="Baby Lotion">Baby Lotion</option>
    <option value="Bath Towels">Bath Towels</option>
    <option value="Changing Mats">Changing Mats</option>
    <option value="Diaper Cream">Diaper Cream</option>
    <option value="Other">Other</option>
</select>



<div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>

                                                              `;
                                } else if (selectedName === 'Kids Accessories') {

                                    dynamicForm.innerHTML = `
                                   <label for="kid_Accessories" class="form-label fw-bold" style="font-size: 16px; font-weight: bold; color: #17a2b8; display: block; margin-bottom: 8px;">
    Kids' Accessories*
</label>
<select name="kid_accessories"  class="form-select">
    <option value="" disabled selected>Select accessory type</option>
    <option value="Hats">Hats</option>
    <option value="Gloves">Gloves</option>
    <option value="Socks">Socks</option>
    <option value="Scarves">Scarves</option>
    <option value="Sunglasses">Sunglasses</option>
    <option value="Backpacks">Backpacks</option>
    <option value="Belts">Belts</option>
    <option value="Jewelry">Jewelry</option>
    <option value="Other">Other</option>
</select>




<div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>

                                                              `;
                                } else if (selectedName === 'Kids Toys') {

                                    dynamicForm.innerHTML = `
                                  <label for="kidsToys" class="form-label fw-bold">
    Kids' Toys*
</label>
<select name="kids_toys" id="kidsToys" class="form-select">
    <option value="" disabled selected>Select toy type</option>
    <option value="Action Figures">Action Figures</option>
    <option value="Dolls">Dolls</option>
    <option value="Building Blocks">Building Blocks</option>
    <option value="Puzzle Toys">Puzzle Toys</option>
    <option value="Stuffed Animals">Stuffed Animals</option>
    <option value="Remote Control Cars">Remote Control Cars</option>
    <option value="Educational Toys">Educational Toys</option>
    <option value="Musical Toys">Musical Toys</option>
    <option value="Other">Other</option>
</select>

<div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>


                                                              `;
                                } else if (selectedName === 'Camera Installation') {

                                    dynamicForm.innerHTML = `

                                  <label class="form-label fw-bold">Camera Installation*</label>
<select name="camera_installation" id="kidsToys" style="
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 16px;
    background-color: #ADD8E6; /* Exact color from the image */
    color: #333;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    outline: none;
">
    <option value="camera-installation">Camera Installation</option>
    <option value="dahua">Dahua Technology Ltd.</option>
    <option value="hikvision">Hikvision</option>
    <option value="others">Others</option>
</select>
<div class="mb-4">
  <label class="form-label fw-bold">Wifi*</label>
  <div class="d-flex flex-column gap-2">
    <div class="form-check">
      <input class="form-check-input" type="radio" name="wifi_availability" id="yes" value="yes" required>
      <label class="form-check-label" for="yes">Yes</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="wifi_availability" id="no" value="no" required>
      <label class="form-check-label" for="no">No</label>
    </div>
  </div>
</div>





<div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>



                                                              `;
                                } else if (selectedName === 'Car Services') {

                                    dynamicForm.innerHTML = `


<label class="form-label fw-bold">Make*</label>
<select name="make" id="carMake" style="
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 16px;
    background-color: #ADD8E6; /* Exact color from the image */
    color: #333;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    outline: none;
">
    <option value="" disabled selected>Select car make</option>
    <option value="toyota">Toyota</option>
    <option value="honda">Honda</option>
    <option value="bmw">BMW</option>
    <option value="mercedes">Mercedes</option>
    <option value="audi">Audi</option>
    <option value="ford">Ford</option>
    <option value="chevrolet">Chevrolet</option>
    <option value="others">Others</option>
</select>

<div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>




                                                              `;
                                } else if (selectedName === 'Table and Dinning') {


                                    dynamicForm.innerHTML = `
                                    <label class="form-label fw-bold">Table and Dining*</label>
<select name="table_dinning" id="tableAndDining" style="
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 16px;
    background-color: #ADD8E6; /* Exact color from the image */
    color: #333;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    outline: none;
">
    <option value="" disabled selected>Select table and dining option</option>
    <option value="indoor">Indoor</option>
    <option value="outdoor">Outdoor</option>
    <option value="balcony">Balcony</option>
    <option value="private">Private</option>
    <option value="patio">Patio</option>
    <option value="lounge">Lounge</option>
    <option value="reserved">Reserved</option>
    <option value="others">Others</option>
</select>

<div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>  `;

                                } else if (selectedName === 'Curtains and Blinds') {
                                    dynamicForm.innerHTML = `
                                        <div class="mb-4">
                                            <label class="form-label fw-bold">Select Item*</label>
                                            <select name="item" id="itemSelection"  required style="
                                                width: 100%;
                                                padding: 12px;
                                                border: 1px solid #ccc;
                                                border-radius: 6px;
                                                font-size: 16px;
                                                background-color: #ADD8E6; /* Exact color from the image */
                                                color: #333;
                                                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                                                transition: border-color 0.3s ease, box-shadow 0.3s ease;
                                                outline: none;
                                            " onchange="showConditionOptions()">
                                                <option value="" disabled selected>Select Curtains or Blinds</option>
                                                <option value="curtains">Curtains</option>
                                                <option value="blinds">Blinds</option>
                                            </select>
                                        </div>
<div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>
                                    `;
                                } else if (selectedName === 'Office Furniture') {
                                    dynamicForm.innerHTML = `
                                        <div class="mb-4">
                                            <label class="form-label fw-bold">Select Furniture Type*</label>
                                            <select name="type" id="furnitureSelection" name="type" required style="
                                                width: 100%;
                                                padding: 12px;
                                                border: 1px solid #ccc;
                                                border-radius: 6px;
                                                font-size: 16px;
                                                background-color: #ADD8E6; /* Exact color from the image */
                                                color: #333;
                                                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                                                transition: border-color 0.3s ease, box-shadow 0.3s ease;
                                                outline: none;
                                            " onchange="showConditionOptions(); showSubtypeOptions()">
                                                <option value="" disabled selected>Select Office Furniture</option>
                                                <option value="desk">Desk</option>
                                                <option value="chair">Chair</option>
                                                <option value="cabinet">Cabinet</option>
                                                <option value="table">Table</option>
                                                <option value="shelf">Shelf</option>
                                                <option value="others">Others</option>
                                            </select>
                                        </div>

                                        <div class="mb-4"  style="display: none;">
                                            <label class="form-label fw-bold">Select Specific Type*</label>
                                            <select  name="officefurnituresubtypeSelection" required style="
                                                width: 100%;
                                                padding: 12px;
                                                border: 1px solid #ccc;
                                                border-radius: 6px;
                                                font-size: 16px;
                                                background-color: #ADD8E6; /* Exact color from the image */
                                                color: #333;
                                                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                                                transition: border-color 0.3s ease, box-shadow 0.3s ease;
                                                outline: none;
                                            ">
                                                <option value="" disabled selected>Select Specific Type</option>
                                                <!-- Options will be added dynamically -->
                                            </select>
                                        </div>
<div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>
                                                                         `;
                                } else if (selectedName === 'Other Household Furniture') {
                                    dynamicForm.innerHTML = `
                                        <div class="mb-4">
                                            <label class="form-label fw-bold">Select Furniture Type*</label>
                                            <select id="householdFurnitureSelection" name="type" required style="
                                                width: 100%;
                                                padding: 12px;
                                                border: 1px solid #ccc;
                                                border-radius: 6px;
                                                font-size: 16px;
                                                background-color: #ADD8E6; /* Exact color from the image */
                                                color: #333;
                                                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                                                transition: border-color 0.3s ease, box-shadow 0.3s ease;
                                                outline: none;
                                            " onchange="showHouseholdConditionOptions(); showHouseholdSubtypeOptions()">
                                                <option value="" disabled selected>Select Other Household Furniture</option>
                                                <option value="sofa">Sofa</option>
                                                <option value="bed">Bed</option>
                                                <option value="dining-set">Dining Set</option>
                                                <option value="dresser">Dresser</option>
                                                <option value="coffee-table">Coffee Table</option>
                                                <option value="others">Others</option>
                                            </select>
                                        </div>

                                        <div class="mb-4"  style="display: none;">
                                            <label class="form-label fw-bold">Select Specific Type*</label>
                                            <select  name="householdSubtypeSelection" required style="
                                                width: 100%;
                                                padding: 12px;
                                                border: 1px solid #ccc;
                                                border-radius: 6px;
                                                font-size: 16px;
                                                background-color: #ADD8E6; /* Exact color from the image */
                                                color: #333;
                                                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                                                transition: border-color 0.3s ease, box-shadow 0.3s ease;
                                                outline: none;
                                            ">
                                                <option value="" disabled selected>Select Specific Type</option>
                                                <!-- Options will be added dynamically -->
                                            </select>
                                        </div>
<div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>
                                    `;
                                } else if (selectedName === 'Land & Plots') {
                                    dynamicForm.innerHTML = `
                                        <div class="mb-4">
                                            <label class="form-label fw-bold">Select Specific Type*</label>
                                            <select id="subtypeLand" name="type" required style="
                                                width: 100%;
                                                padding: 12px;
                                                border: 1px solid #ccc;
                                                border-radius: 6px;
                                                font-size: 16px;
                                                background-color: #ADD8E6; /* Exact color from the image */
                                                color: #333;
                                                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                                                transition: border-color 0.3s ease, box-shadow 0.3s ease;
                                                outline: none;
                                            ">
                                                <option value="" disabled selected>Select Specific Type</option>
                                                <option value="agricultural-land">Agricultural Land</option>
                                                <option value="residential-plot">Residential Plot</option>
                                                <option value="commercial-plot">Commercial Plot</option>
                                            </select>
                                        </div>
                                    `;
                                } else if (selectedName === 'Houses') {
                                    dynamicForm.innerHTML = `

                                        <div class="mb-4">
                                            <label class="form-label fw-bold">Select Specific Type*</label>
                                            <select  name="subtype" required style="
                                                width: 100%;
                                                padding: 12px;
                                                border: 1px solid #ccc;
                                                border-radius: 6px;
                                                font-size: 16px;
                                                background-color: #ADD8E6; /* Exact color from the image */
                                                color: #333;
                                                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                                                transition: border-color 0.3s ease, box-shadow 0.3s ease;
                                                outline: none;
                                            ">
                                                <option value="" disabled selected>Select Specific Type</option>
                                                <option value="single-family-home">Single Family Home</option>
                                                <option value="townhouse">Townhouse</option>
                                                <option value="duplex">Duplex</option>
                                            </select>
                                        </div>
                                        <div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>
                                    `;
                                } else if (selectedName === 'Apartments & Flats') {
                                    dynamicForm.innerHTML = `
                                     <div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>                                          <div class="mb-4">
                                            <label class="form-label fw-bold">Select Specific Type*</label>
                                            <select  name="type" required style="
                                                width: 100%;
                                                padding: 12px;
                                                border: 1px solid #ccc;
                                                border-radius: 6px;
                                                font-size: 16px;
                                                background-color: #ADD8E6; /* Exact color from the image */
                                                color: #333;
                                                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                                                transition: border-color 0.3s ease, box-shadow 0.3s ease;
                                                outline: none;
                                            ">
                                                <option value="" disabled selected>Select Specific Type</option>
                                                <option value="1-bedroom">1-Bedroom</option>
                                                <option value="2-bedroom">2-Bedroom</option>
                                                <option value="3-bedroom">3-Bedroom</option>
                                            </select>
                                        </div>
                                    `;
                                } else if (selectedName === 'Shops - Offices - Commercial Space') {
                                    dynamicForm.innerHTML = `
                                      <div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>    <div class="mb-4">
                                            <label class="form-label fw-bold">Select Specific Type*</label>
                                            <select id="subtypeShop" name="type" required style="
                                                width: 100%;
                                                padding: 12px;
                                                border: 1px solid #ccc;
                                                border-radius: 6px;
                                                font-size: 16px;
                                                background-color: #ADD8E6; /* Exact color from the image */
                                                color: #333;
                                                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                                                transition: border-color 0.3s ease, box-shadow 0.3s ease;
                                                outline: none;
                                            ">
                                                <option value="" disabled selected>Select Specific Type</option>
                                                <option value="retail-shop">Retail Shop</option>
                                                <option value="office-space">Office Space</option>
                                                <option value="warehouse">Warehouse</option>
                                            </select>
                                        </div>
                                    `;
                                } else if (selectedName === 'Portions & Floors') {
                                    dynamicForm.innerHTML = `
                                       <div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>
                                        <div class="mb-4">
                                            <label class="form-label fw-bold">Select Specific Type*</label>
                                            <select  name="type" required style="
                                                width: 100%;
                                                padding: 12px;
                                                border: 1px solid #ccc;
                                                border-radius: 6px;
                                                font-size: 16px;
                                                background-color: #ADD8E6; /* Exact color from the image */
                                                color: #333;
                                                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                                                transition: border-color 0.3s ease, box-shadow 0.3s ease;
                                                outline: none;
                                            ">
                                                <option value="" disabled selected>Select Specific Type</option>
                                                <option value="upper-portion">Upper Portion</option>
                                                <option value="lower-portion">Lower Portion</option>
                                                <option value="floor">Floor</option>
                                            </select>
                                        </div>
                                    `;
                                } else if (selectedName === 'Sports') {

                                    dynamicForm.innerHTML = `
                                                                                    <div class="mb-4">
                                                    <label class="form-label fw-bold">Select Sports Type*</label>
                                                    <select  name="type" required style="
                                                        width: 100%;
                                                        padding: 12px;
                                                        border: 1px solid #ccc;
                                                        border-radius: 6px;
                                                        font-size: 16px;
                                                        background-color: #ADD8E6; /* Light blue color for sports theme */
                                                        color: #333;
                                                        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                                                        transition: border-color 0.3s ease, box-shadow 0.3s ease;
                                                        outline: none;
                                                    " onchange="updateSubcategories()">
                                                        <option value="" disabled selected>Select Sports Type</option>
                                                        <option value="team-sport">Team Sport</option>
                                                        <option value="individual-sport">Individual Sport</option>
                                                        <option value="outdoor">Outdoor</option>
                                                        <option value="indoor">Indoor</option>
                                                        <option value="water-sport">Water Sport</option>
                                                    </select>
                                                </div>

                                                <div class="mb-4" id="subcategoriesDiv" style="display: none;">
                                                    <label class="form-label fw-bold">Select Subcategory*</label>
                                                    <select  name="subcategory" style="
                                                        width: 100%;
                                                        padding: 12px;
                                                        border: 1px solid #ccc;
                                                        border-radius: 6px;
                                                        font-size: 16px;
                                                        background-color: #ADD8E6; /* Light blue color */
                                                        color: #333;
                                                        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                                                        transition: border-color 0.3s ease, box-shadow 0.3s ease;
                                                        outline: none;
                                                    ">
                                                        <!-- Subcategories will be inserted here dynamically -->
                                                    </select>
                                                </div>

<div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>




                        `;
                                } else if (selectedName === 'Jobs') {

                                    dynamicForm.innerHTML = `
                                    <div class="mb-4">
    <label class="form-label fw-bold">Select Job Type*</label>
    <select id="jobSelect" name="job_type" required style="
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
        background-color: #ADD8E6; /* Light blue color for job selection */
        color: #333;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
        outline: none;
    " onchange="updateJobSubcategories()">
        <option value="" disabled selected>Select Job Type</option>
        <option value="full-time">Full Time</option>
        <option value="part-time">Part Time</option>
        <option value="internship">Internship</option>
        <option value="freelance">Freelance</option>
    </select>
</div>

<div class="mb-4" id="jobSubcategoriesDiv" style="display: none;">
    <label class="form-label fw-bold">Select Job Subcategory*</label>
    <select id="jobSubcategorySelect" name="jobSubcategory" style="
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
        background-color: #ADD8E6; /* Light blue color */
        color: #333;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
        outline: none;
    ">
        <!-- Job subcategories will be inserted dynamically -->
    </select>
</div>
<div class="mb-4">
                                        <label class="form-label fw-bold">Condition*</label>
                                        <div class="d-flex flex-column gap-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
                                                <label class="form-check-label" for="new">Freshee</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
                                                <label class="form-check-label" for="used">Experienced</label>
                                            </div>
                                        </div>
                                    </div>
`;
                                } else if (selectedName === 'Property') {

                                    dynamicForm.innerHTML = `
<div class="mb-4">
    <label class="form-label fw-bold">Select Property Type*</label>
    <select id="propertySelect" name="propertyType" required style="
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
        background-color: #ADD8E6; /* Light blue color for property selection */
        color: #333;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
        outline: none;
    " onchange="updatePropertySubcategories()">
        <option value="" disabled selected>Select Property Type</option>
        <option value="residential">Residential</option>
        <option value="commercial">Commercial</option>
        <option value="land">Land</option>
        <option value="industrial">Industrial</option>
    </select>
</div>

<div class="mb-4" id="propertySubcategoriesDiv" style="display: none;">
    <label class="form-label fw-bold">Select Property Subcategory*</label>
    <select id="propertySubcategorySelect" name="propertySubcategory" style="
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
        background-color: #ADD8E6; /* Light blue color */
        color: #333;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
        outline: none;
    ">
        <!-- Property subcategories will be inserted dynamically -->
        <option value="" disabled selected>Select Property Subcategory</option>
    </select>
</div>
<div class="mb-4">
    <label class="form-label fw-bold">Condition*</label>
    <div class="d-flex flex-column gap-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="new" value="new" required>
            <label class="form-check-label" for="new">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="condition" id="used" value="used" required>
            <label class="form-check-label" for="used">Used</label>
        </div>
    </div>
</div>


`;
                                }

                                dynamicForm.style.display = 'block';
                            });
                        </script>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Location*</label>
                            <select name="location" id="location" class="form-select" required>
                                <option value="" disabled selected>Select Region</option>
                                <option value="azad-kashmir">Azad Kashmir, Pakistan</option>
                                <option value="balochistan">Balochistan, Pakistan</option>
                                <option value="islamabad">Islamabad Capital Territory, Pakistan</option>
                                <option value="khyber-pakhtunkhwa">Khyber Pakhtunkhwa, Pakistan</option>
                                <option value="northern-areas">Northern Areas, Pakistan</option>
                                <option value="punjab">Punjab, Pakistan</option>
                                <option value="sindh">Sindh, Pakistan</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">City*</label>
                            <input list="city-options" name="city" id="city" class="form-control" required
                                placeholder="Enter your city">
                            <datalist id="city-options"></datalist>
                        </div>

                        <script>
                            // Define cities for each province
                            const citiesByProvince = {
                                "azad-kashmir": ["Muzaffarabad", "Mirpur", "Rawalakot", "Bagh", "Kotli"],
                                "balochistan": ["Quetta", "Gwadar", "Turbat", "Khuzdar", "Sibi"],
                                "islamabad": ["Islamabad"],
                                "khyber-pakhtunkhwa": ["Peshawar", "Abbottabad", "Mardan", "Swat", "Kohat"],
                                "northern-areas": ["Gilgit", "Skardu", "Hunza", "Diamer"],
                                "punjab": ["Lahore", "Rawalpindi", "Faisalabad", "Multan", "Gujranwala", "Sargodha", "Sialkot",
                                    "Bahawalpur"],
                                "sindh": ["Karachi", "Hyderabad", "Sukkur", "Larkana", "Nawabshah"]
                            };

                            document.getElementById("location").addEventListener("change", function() {
                                const selectedProvince = this.value;
                                const cityOptions = document.getElementById("city-options");

                                // Clear previous options
                                cityOptions.innerHTML = "";

                                // Populate new city options
                                if (selectedProvince && citiesByProvince[selectedProvince]) {
                                    citiesByProvince[selectedProvince].forEach(city => {
                                        let option = document.createElement("option");
                                        option.value = city;
                                        cityOptions.appendChild(option);
                                    });
                                }
                            });
                        </script>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Contact No*</label>
                            <input type="tel" name="phone_number" class="form-control" maxlength="11"
                                pattern="\d{11}" required placeholder="Enter your 11-digit phone number">
                            <small class="form-text text-muted">Enter Your 11 digits phone number.</small>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        function showConditionOptions() {
            const itemSelection = document.getElementById('itemSelection');
            const conditionContainer = document.getElementById('conditionContainer');

            if (itemSelection.value) {
                conditionContainer.style.display = 'block';
            } else {
                conditionContainer.style.display = 'none';
            }
        }
    </script>
    <script>
        function updateSubcategories() {
            var selectedType = document.getElementById('subtypeSports').value;
            var subcategoriesDiv = document.getElementById('subcategoriesDiv');
            var subcategorySelect = document.getElementById('subtypeSportsCategories');

            subcategorySelect.innerHTML = '<option value="" disabled selected>Select Subcategory</option>';

            subcategoriesDiv.style.display = 'block';

            var options = [];
            if (selectedType === 'team-sport') {
                options = ['Football', 'Basketball', 'Volleyball', 'Rugby'];
            } else if (selectedType === 'individual-sport') {
                options = ['Tennis', 'Boxing', 'Golf', 'Cycling'];
            } else if (selectedType === 'outdoor') {
                options = ['Running', 'Hiking', 'Climbing', 'Cycling'];
            } else if (selectedType === 'indoor') {
                options = ['Gymnastics', 'Table Tennis', 'Badminton', 'Squash'];
            } else if (selectedType === 'water-sport') {
                options = ['Swimming', 'Rowing', 'Surfing', 'Water Polo'];
            }

            for (var i = 0; i < options.length; i++) {
                var option = document.createElement('option');
                option.value = options[i].toLowerCase().replace(/\s+/g,
                    '-');
                option.textContent = options[i];
                subcategorySelect.appendChild(option);
            }
        }
    </script>

    <script>
        function showConditionOptions() {
            const furnitureSelection = document.getElementById('furnitureSelection');
            const conditionContainer = document.getElementById('conditionContainer');

            if (furnitureSelection.value) {
                conditionContainer.style.display = 'block';
            } else {
                conditionContainer.style.display = 'none';
            }
        }

        function showSubtypeOptions() {
            const furnitureSelection = document.getElementById('furnitureSelection');
            const subtypeContainer = document.getElementById('subtypeContainer');
            const subtypeSelection = document.getElementById('subtypeSelection');

            subtypeSelection.innerHTML = '<option value="" disabled selected>Select Specific Type</option>';


            if (furnitureSelection.value) {
                subtypeContainer.style.display = 'block';

                let subtypes = [];
                switch (furnitureSelection.value) {
                    case 'desk':
                        subtypes = ['Executive Desk', 'Writing Desk', 'Standing Desk'];
                        break;
                    case 'chair':
                        subtypes = ['Office Chair', 'Executive Chair', 'Gaming Chair'];
                        break;
                    case 'cabinet':
                        subtypes = ['File Cabinet', 'Storage Cabinet', 'Display Cabinet'];
                        break;
                    case 'table':
                        subtypes = ['Meeting Table', 'Coffee Table', 'Dining Table'];
                        break;
                    case 'shelf':
                        subtypes = ['Wall Shelf', 'Book Shelf', 'Display Shelf'];
                        break;
                    case 'others':
                        subtypes = ['Other Type 1', 'Other Type 2'];
                        break;
                }

                subtypes.forEach(function(subtype) {
                    const option = document.createElement('option');
                    option.value = subtype.toLowerCase().replace(/\s+/g, '-');
                    option.textContent = subtype;
                    subtypeSelection.appendChild(option);
                });
            } else {
                subtypeContainer.style.display = 'none';
            }
        }
    </script>
    <script>
        function showHouseholdConditionOptions() {
            const householdFurnitureSelection = document.getElementById('householdFurnitureSelection');
            const householdConditionContainer = document.getElementById('householdConditionContainer');
            if (householdFurnitureSelection.value) {
                householdConditionContainer.style.display = 'block';
            } else {
                householdConditionContainer.style.display = 'none';
            }
        }

        function showHouseholdSubtypeOptions() {
            const householdFurnitureSelection = document.getElementById('householdFurnitureSelection');
            const householdSubtypeContainer = document.getElementById('householdSubtypeContainer');
            const householdSubtypeSelection = document.getElementById('householdSubtypeSelection');

            householdSubtypeSelection.innerHTML = '<option value="" disabled selected>Select Specific Type</option>';

            if (householdFurnitureSelection.value) {
                householdSubtypeContainer.style.display = 'block';

                let householdSubtypes = [];
                switch (householdFurnitureSelection.value) {
                    case 'sofa':
                        householdSubtypes = ['Sectional Sofa', 'Loveseat', 'Recliner'];
                        break;
                    case 'bed':
                        householdSubtypes = ['King Bed', 'Queen Bed', 'Bunk Bed'];
                        break;
                    case 'dining-set':
                        householdSubtypes = ['6-Seater', '4-Seater', '8-Seater'];
                        break;
                    case 'dresser':
                        householdSubtypes = ['Chest of Drawers', 'Double Dresser', 'Tallboy'];
                        break;
                    case 'coffee-table':
                        householdSubtypes = ['Glass Top', 'Wooden', 'Storage Coffee Table'];
                        break;
                    case 'others':
                        householdSubtypes = ['Other Type 1', 'Other Type 2'];
                        break;
                }

                householdSubtypes.forEach(function(subtype) {
                    const option = document.createElement('option');
                    option.value = subtype.toLowerCase().replace(/\s+/g, '-');
                    option.textContent = subtype;
                    householdSubtypeSelection.appendChild(option);
                });
            } else {
                householdSubtypeContainer.style.display = 'none';
            }
        }
    </script>
    <script>
        function showHouseholdConditionOptions() {
            const householdFurnitureSelection = document.getElementById('householdFurnitureSelection');
            const householdConditionContainer = document.getElementById('householdConditionContainer');

            householdConditionContainer.style.display = householdFurnitureSelection.value ? 'block' : 'none';
        }

        function showHouseholdSubtypeOptions() {
            const householdFurnitureSelection = document.getElementById('householdFurnitureSelection');
            const householdSubtypeContainer = document.getElementById('householdSubtypeContainer');
            const householdSubtypeSelection = document.getElementById('householdSubtypeSelection');

            householdSubtypeSelection.innerHTML = '<option value="" disabled selected>Select Specific Type</option>';
            if (householdFurnitureSelection.value) {
                householdSubtypeContainer.style.display = 'block';

                let householdSubtypes = [];
                switch (householdFurnitureSelection.value) {
                    case 'sofa':
                        householdSubtypes = ['Sectional Sofa', 'Loveseat', 'Recliner'];
                        break;
                    case 'bed':
                        householdSubtypes = ['King Bed', 'Queen Bed', 'Bunk Bed'];
                        break;
                    case 'dining-set':
                        householdSubtypes = ['6-Seater', '4-Seater', '8-Seater'];
                        break;
                    case 'dresser':
                        householdSubtypes = ['Chest of Drawers', 'Double Dresser', 'Tallboy'];
                        break;
                    case 'coffee-table':
                        householdSubtypes = ['Glass Top', 'Wooden', 'Storage Coffee Table'];
                        break;
                    case 'others':
                        householdSubtypes = ['Other Type 1', 'Other Type 2'];
                        break;
                }
                householdSubtypes.forEach(function(subtype) {
                    const option = document.createElement('option');
                    option.value = subtype.toLowerCase().replace(/\s+/g, '-');
                    option.textContent = subtype;
                    householdSubtypeSelection.appendChild(option);
                });
            } else {
                householdSubtypeContainer.style.display = 'none';
            }
        }
        document.getElementById('propertyType').addEventListener('change', function() {
            const selectedName = this.value;
            const dynamicForm = document.getElementById('dynamicForm');

            dynamicForm.innerHTML = '';

            switch (selectedName) {
                case 'Curtains and Blinds':
                    dynamicForm.innerHTML = `
                        <div class="mb-4">
                            <label class="form-label fw-bold">Condition*</label>
                            <select  name="condition" required style="...">
                                <option value="" disabled selected>Select Condition</option>
                                <option value="new">New</option>
                                <option value="used">Used</option>
                            </select>
                        </div>
                    `;
                    break;

                case 'Office Furniture':
                    dynamicForm.innerHTML = `
                        <div class="mb-4">
                            <label class="form-label fw-bold">Condition*</label>
                            <select  name="condition" required style="...">
                                <option value="" disabled selected>Select Condition</option>
                                <option value="new">New</option>
                                <option value="used">Used</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Select Specific Type*</label>
                            <select  name="subtype" required style="...">
                                <option value="" disabled selected>Select Specific Type</option>
                                <option value="desk">Desk</option>
                                <option value="chair">Chair</option>
                                <option value="cabinet">Cabinet</option>
                                <option value="table">Table</option>
                                <option value="shelf">Shelf</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                    `;
                    break;
                default:
                    break;
            }
        });
    </script>
    <script>
        function updateJobSubcategories() {
            var selectedJobType = document.getElementById('jobSelect').value;
            var jobSubcategoriesDiv = document.getElementById('jobSubcategoriesDiv');
            var jobSubcategorySelect = document.getElementById('jobSubcategorySelect');

            jobSubcategorySelect.innerHTML = '<option value="" disabled selected>Select Job Subcategory</option>';
            jobSubcategoriesDiv.style.display = 'block';

            var options = [];
            if (selectedJobType === 'full-time') {
                options = ['Software Engineer', 'Project Manager', 'HR Manager', 'Data Scientist'];
            } else if (selectedJobType === 'part-time') {
                options = ['Customer Support', 'Content Writer', 'Sales Representative'];
            } else if (selectedJobType === 'internship') {
                options = ['Marketing Intern', 'Software Development Intern', 'Graphic Design Intern'];
            } else if (selectedJobType === 'freelance') {
                options = ['Web Developer', 'Graphic Designer', 'Copywriter'];
            }

            for (var i = 0; i < options.length; i++) {
                var option = document.createElement('option');
                option.value = options[i].toLowerCase().replace(/\s+/g,
                    '-');
                option.textContent = options[i];
                jobSubcategorySelect.appendChild(option);
            }
        }
    </script>

    <script>
        function updatePropertySubcategories() {
            var selectedPropertyType = document.getElementById('propertySelect').value;
            var propertySubcategoriesDiv = document.getElementById('propertySubcategoriesDiv');
            var propertySubcategorySelect = document.getElementById('propertySubcategorySelect');

            propertySubcategorySelect.innerHTML = '<option value="" disabled selected>Select Property Subcategory</option>';

            var options = [];
            if (selectedPropertyType === 'residential') {
                options = ['Apartment', 'Villa', 'House', 'Studio'];
            } else if (selectedPropertyType === 'commercial') {
                options = ['Office Space', 'Retail Store', 'Warehouse', 'Showroom'];
            } else if (selectedPropertyType === 'land') {
                options = ['Agricultural Land', 'Residential Land', 'Commercial Land'];
            } else if (selectedPropertyType === 'industrial') {
                options = ['Factory', 'Warehouse', 'Industrial Plot'];
            }

            if (options.length > 0) {
                propertySubcategoriesDiv.style.display = 'block';

                for (var i = 0; i < options.length; i++) {
                    var option = document.createElement('option');
                    option.value = options[i].toLowerCase().replace(/\s+/g,
                        '-');
                    option.textContent = options[i];
                    propertySubcategorySelect.appendChild(option);
                }
            } else {
                propertySubcategoriesDiv.style.display = 'none';
            }
        }
    </script>
    <style>
        /* General Form Fields */
        .form-control {
            background-color: #fff !important;
            /* White background */
            border: 2px solid #ddd !important;
            /* Light grey border */
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
        }

        /* Focused Input Field */
        .form-control:focus {
            border-color: #3498db !important;
            /* Blue border */
            box-shadow: 0px 0px 8px rgba(52, 152, 219, 0.3) !important;
            background-color: #fff !important;
            /* Keep white when focused */
            outline: none;
        }

        /* Placeholder Styling */
        ::placeholder {
            color: #999;
            /* Light grey text */
            font-size: 14px;
        }

        /* Customizing Datalist */
        datalist option {
            font-size: 14px;
            padding: 5px;
        }



        /* Custom Styling for Select Dropdown */
        .form-select {
            background-color: #fff !important;
            /* White background */
            border: 2px solid #ddd !important;
            /* Light grey border */
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
            appearance: none;
            /* Removes default browser styling */
            cursor: pointer;
        }

        /* Select Dropdown Focus */
        .form-select:focus {
            border-color: #3498db !important;
            /* Blue border on focus */
            box-shadow: 0px 0px 8px rgba(52, 152, 219, 0.3) !important;
            outline: none;
        }

        /* Styling Dropdown Options */
        .form-select option {
            font-size: 14px;
            padding: 10px;
        }

        /* General Form Fields */
        .form-control {
            background-color: #fff !important;
            /* White background */
            border: 2px solid #ddd !important;
            /* Light grey border */
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
        }

        /* Focused Input Field */
        .form-control:focus {
            border-color: #3498db !important;
            /* Blue border */
            box-shadow: 0px 0px 8px rgba(52, 152, 219, 0.3) !important;
            background-color: #fff !important;
            /* Keep white when focused */
            outline: none;
        }

        /* Custom Styling for Image Upload Section */
        .image-upload-container {
            margin-top: 15px;
        }

        .image-upload-placeholder {
            position: relative;
            border: 2px solid #ddd;
            border-radius: 8px;
            background-color: #f8f8f8;
            width: 100px;
            height: 100px;
            overflow: hidden;
            transition: border-color 0.3s ease;
        }

        .image-upload-placeholder:hover {
            border-color: #3498db;
        }

        .image-input {
            display: none;
        }

        .image-label {
            display: block;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            text-align: center;
            cursor: pointer;
        }

        .image-icon {
            margin-top: 30%;
            font-size: 24px;
            color: #aaa;
        }

        .preview-image {
            display: none;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: opacity 0.3s ease;
        }

        .image-upload-placeholder input:checked~.image-label .preview-image {
            display: block;
            opacity: 1;
        }

        .counter {
            font-size: 16px;
            margin-top: 10px;
            color: #333;
        }

        /* General styling for radio button container */
        .form-check {
            position: relative;
            display: flex;
            align-items: center;
            background-color: white;
            /* Default white background */
            border: 2px solid #800000;
            /* Maroon border */
            border-radius: 8px;
            padding: 10px 15px;
            cursor: pointer;
            transition: background 0.3s, color 0.3s;
        }

        /* Hide the default radio button */
        .form-check input[type="radio"] {
            opacity: 0;
            position: absolute;
        }

        /* Custom styling for label */
        .form-check label {
            width: 100%;
            text-align: center;
            padding: 10px 15px;
            border-radius: 8px;
            transition: background 0.3s, color 0.3s;
        }

        /* When radio button is selected */
        .form-check input[type="radio"]:checked+label {
            background-color: #800000;
            /* Maroon background when selected */
            color: white;
            /* White text */
        }
    </style>
@endsection
