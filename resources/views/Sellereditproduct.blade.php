@extends('frontend.layouts.main')
@section('title', 'My Wishlist | ResellZone')

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
                    Edit Your Product
                </h2>
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb"
                        style="display: inline-block; background: none; padding: 0; margin: 0; font-size: 1.2rem; font-family: 'Roboto', sans-serif; color: white; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);">
                       
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
</div>
@if ($errors->any())
    <div class="alert alert-danger" style="margin: 20px auto; width: 60%;">
        <ul style="margin: 0;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">

    <form method="POST" action="{{ route('updateProduct', $product->id) }}">
        @csrf
        @method('PUT')

        {{-- Title --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Title*</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $product->title) }}" required>
        </div>

        {{-- Price --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Price*</label>
            <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Description*</label>
            <textarea name="description" class="form-control" required>{{ old('description', $product->description) }}</textarea>
        </div>
{{-- Location --}}
<div class="mb-3">
    <label class="form-label fw-bold">Location*</label>
    <input type="text" name="location" class="form-control" value="{{ old('location', $product->location) }}" required>
</div>

{{-- City --}}
<div class="mb-3">
    <label class="form-label fw-bold">City*</label>
    <input type="text" name="city" class="form-control" value="{{ old('city', $product->city) }}" required>
</div>

{{-- Phone Number --}}
<div class="mb-3">
    <label class="form-label fw-bold">Phone Number*</label>
    <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $product->phone_number) }}" required>
</div>

        {{-- Category --}}
       @php
    $categories = [
        'Vehicles',
        'Electronics',
        'fashion style',
        'health care',
        'job board',
        'mobiles',
        'property',
        'services',
        'kids',
        'books & supports',
        'pet & animal',
        'furniture',
        'car',
        'Computer & Laptops',
    ];
@endphp

<div class="mb-3">
    <label class="form-label fw-bold">Category*</label>
    <select name="category" id="categorySelect" class="form-control" required>
        <option value="">Select a Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category }}" {{ $product->category == $category ? 'selected' : '' }}>
                {{ ucfirst($category) }}
            </option>
        @endforeach
    </select>
</div>

@php
    $selectedCondition = old('condition', $product->condition); // get old value or DB value
@endphp

<div class="mb-4">
    <label class="form-label fw-bold">Select*</label>
    <div class="d-flex gap-4">
        <button type="button" class="btn condition-btn {{ $selectedCondition === 'new' ? 'btn-primary' : 'btn-outline-secondary' }}" data-value="new">New</button>
        <button type="button" class="btn condition-btn {{ $selectedCondition === 'used' ? 'btn-primary' : 'btn-outline-secondary' }}" data-value="used">Used</button>
    </div>

    <!-- Hidden input to store selected condition -->
    <input type="hidden" name="condition" id="conditionInput" value="{{ $selectedCondition }}">
</div>
        {{-- Dynamic Fields --}}
        <div id="dynamicFormContainer">
            {{-- Optional: Inject existing dynamic fields here via JS --}}
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
    const categorySelect = document.getElementById('categorySelect');
    const dynamicFormContainer  = document.getElementById('dynamicFormContainer');
    const currentData = @json($product);

    function renderDynamicForm(selectedName) {
//yahan sy shuru
         if (selectedName === 'car') {
                                   dynamicFormContainer.innerHTML = `
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
                                   dynamicFormContainer.innerHTML = `
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
                                   dynamicFormContainer.innerHTML = `

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
                                   dynamicFormContainer.innerHTML = `
`;
                                } else if (selectedName === 'Spare Parts') {
                                    // Inject dynamic form content for "Cars on Installments"
                                   dynamicFormContainer.innerHTML = `
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
                                   dynamicFormContainer.innerHTML = `
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
                                   dynamicFormContainer.innerHTML = `
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
                                   dynamicFormContainer.innerHTML = `

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
                                   dynamicFormContainer.innerHTML = `


`;
                                }
                                else if (selectedName === 'Domestic Pets') {
   dynamicFormContainer.innerHTML = `
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
                                   dynamicFormContainer.innerHTML = `
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
                                   dynamicFormContainer.innerHTML = `
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
                                   dynamicFormContainer.innerHTML = `
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
                                   dynamicFormContainer.innerHTML = `
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
                                   dynamicFormContainer.innerHTML = `

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
                                   dynamicFormContainer.innerHTML = `

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
                                   dynamicFormContainer.innerHTML = `

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
                                   dynamicFormContainer.innerHTML = `

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
                                   dynamicFormContainer.innerHTML = `

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
                                   dynamicFormContainer.innerHTML = `

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
                                   dynamicFormContainer.innerHTML = `

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
                                   dynamicFormContainer.innerHTML = `

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
                                   dynamicFormContainer.innerHTML = `
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
                                   dynamicFormContainer.innerHTML = `
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

                                   dynamicFormContainer.innerHTML = `

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

                                   dynamicFormContainer.innerHTML = `
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

                                   dynamicFormContainer.innerHTML = `
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

                                   dynamicFormContainer.innerHTML = `
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

                                   dynamicFormContainer.innerHTML = `


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

                                   dynamicFormContainer.innerHTML = `


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

                                   dynamicFormContainer.innerHTML = `


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

                                   dynamicFormContainer.innerHTML = `


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

                                   dynamicFormContainer.innerHTML = `


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


`;
                                } else if (selectedName === 'Smart Watches') {

                                   dynamicFormContainer.innerHTML = `

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

                                   dynamicFormContainer.innerHTML = `
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

                                   dynamicFormContainer.innerHTML = `
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

                                   dynamicFormContainer.innerHTML = `
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

                                   dynamicFormContainer.innerHTML = `
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

                                   dynamicFormContainer.innerHTML = `

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

                                   dynamicFormContainer.innerHTML = `


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


                                   dynamicFormContainer.innerHTML = `
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
                                   dynamicFormContainer.innerHTML = `
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
                                   dynamicFormContainer.innerHTML = `
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
                                   dynamicFormContainer.innerHTML = `
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
                                   dynamicFormContainer.innerHTML = `
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
                                   dynamicFormContainer.innerHTML = `

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
                                   dynamicFormContainer.innerHTML = `
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
                                   dynamicFormContainer.innerHTML = `
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
                                   dynamicFormContainer.innerHTML = `
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

                                   dynamicFormContainer.innerHTML = `
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

                                   dynamicFormContainer.innerHTML = `
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

                                   dynamicFormContainer.innerHTML = `
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

dynamicFormContainerContainer.style.display = 'block';
}
    }
    // Trigger on load and on change
    renderdynamicFormContainerContainer(categorySelect.value);
    categorySelect.addEventListener('change', function () {
        renderdynamicFormContainerContainer(this.value);
    });
</script>
@endsection
