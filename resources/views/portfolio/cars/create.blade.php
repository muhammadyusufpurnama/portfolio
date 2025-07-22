<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mobil Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/project1style.css') }}"> {{-- Sesuaikan path CSS Anda --}}
    <style>
        /* Optional: Style for the preview image */
        .icon-preview-container {
            margin-top: 10px;
        }

        .icon-preview {
            max-width: 50px;
            /* Adjust as needed */
            height: auto;
            border: 1px solid #ddd;
            padding: 5px;
            border-radius: 5px;
            display: none;
            /* Hidden by default */
        }
    </style>
</head>

<body style="background-color: #E0F2F7; padding-top: 80px;">
    <div class="container py-5">
        <h1 class="mb-4">Tambah Mobil Baru</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama Mobil</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="brand" class="form-label">Merk Mobil</label>
                <select class="form-select" id="brand" name="brand" required>
                    <option value="">Pilih Merk</option>
                    <option value="Alfa Romeo" {{ old('brand') == 'Alfa Romeo' ? 'selected' : '' }}>Alfa Romeo</option>
                    <option value="BYD" {{ old('brand') == 'BYD' ? 'selected' : '' }}>BYD</option>
                    <option value="Citroen" {{ old('brand') == 'Citroen' ? 'selected' : '' }}>Citroen</option>
                    <option value="Cupra" {{ old('brand') == 'Cupra' ? 'selected' : '' }}>Cupra</option>
                    <option value="Dacia" {{ old('brand') == 'Dacia' ? 'selected' : '' }}>Dacia</option>
                    <option value="Honda" {{ old('brand') == 'Honda' ? 'selected' : '' }}>Honda</option>
                    <option value="Toyota" {{ old('brand') == 'Toyota' ? 'selected' : '' }}>Toyota</option>
                    <option value="Mitsubishi" {{ old('brand') == 'Mitsubishi' ? 'selected' : '' }}>Mitsubishi</option>
                    <option value="Hyundai" {{ old('brand') == 'Hyundai' ? 'selected' : '' }}>Hyundai</option>
                    <option value="Daihatsu" {{ old('brand') == 'Daihatsu' ? 'selected' : '' }}>Daihatsu</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Gambar Utama Mobil</label>
                <input type="file" class="form-control" id="image" name="image">
                @error('image')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Harga (per bulan)</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="fuel_type" class="form-label">Tipe Bahan Bakar</label>
                <select class="form-select" id="fuel_type" name="fuel_type" required
                    onchange="updateIconPreview('fuel')">
                    <option value="">Pilih Tipe Bahan Bakar</option>
                    <option value="Petrol Fuel" {{ old('fuel_type') == 'Petrol Fuel' ? 'selected' : '' }}>Petrol Fuel
                    </option>
                    <option value="Electric Fuel" {{ old('fuel_type') == 'Electric Fuel' ? 'selected' : '' }}>Electric
                        Fuel</option>
                </select>
                @error('fuel_type')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
                {{-- Hidden input for fuel_image path --}}
                <input type="hidden" id="fuel_image" name="fuel_image">
                <div class="icon-preview-container">
                    <images id="fuel_icon_preview" class="icon-preview" src="" alt="Fuel Icon Preview">
                </div>
            </div>

            {{-- Dropdown untuk Tipe Gearbox --}}
            <div class="mb-3">
                <label for="gearbox_type" class="form-label">Tipe Gearbox</label>
                <select class="form-select" id="gearbox_type" name="gearbox_type" required
                    onchange="updateIconPreview('gearbox')">
                    <option value="">Pilih Tipe Gearbox</option>
                    <option value="Manual Gearbox" {{ old('gearbox_type') == 'Manual Gearbox' ? 'selected' : '' }}>
                        Manual Gearbox</option>
                    <option value="Automatic Gearbox"
                        {{ old('gearbox_type') == 'Automatic Gearbox' ? 'selected' : '' }}>Automatic Gearbox</option>
                </select>
                @error('gearbox_type')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
                {{-- Hidden input for gearbox_image path --}}
                <input type="hidden" id="gearbox_image" name="gearbox_image">
                <div class="icon-preview-container">
                    <images id="gearbox_icon_preview" class="icon-preview" src="" alt="Gearbox Icon Preview">
                </div>
            </div>

            {{-- Dropdown untuk Tipe Cat --}}
            <div class="mb-3">
                <label for="paint_type" class="form-label">Tipe Cat</label>
                <select class="form-select" id="paint_type" name="paint_type" required
                    onchange="updateIconPreview('paint')">
                    <option value="">Pilih Tipe Cat</option>
                    <option value="Flat Paint" {{ old('paint_type') == 'Flat Paint' ? 'selected' : '' }}>Flat Paint
                    </option>
                    <option value="Metallic Paint" {{ old('paint_type') == 'Metallic Paint' ? 'selected' : '' }}>
                        Metallic Paint</option>
                </select>
                @error('paint_type')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
                {{-- Hidden input for paint_image path --}}
                <input type="hidden" id="paint_image" name="paint_image">
                <div class="icon-preview-container">
                    <images id="paint_icon_preview" class="icon-preview" src="" alt="Paint Icon Preview">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Mobil</button>
            <a href="{{ route('portfolio.project1') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function updateIconPreview(type) {
            const selectElement = document.getElementById(type + '_type');
            const previewImage = document.getElementById(type + '_icon_preview');
            const hiddenInput = document.getElementById(type + '_image');
            const selectedValue = selectElement.value;
            let imagePath = '';

            if (type === 'fuel') {
                if (selectedValue === 'Petrol Fuel') {
                    imagePath = '{{ asset('images/PetrolFuel.png') }}';
                } else if (selectedValue === 'Electric Fuel') {
                    imagePath = '{{ asset('images/ElectricFuel.png') }}';
                }
            } else if (type === 'gearbox') {
                if (selectedValue === 'Manual Gearbox') {
                    imagePath = '{{ asset('images/ManualGearbox.png') }}';
                } else if (selectedValue === 'Automatic Gearbox') {
                    imagePath = '{{ asset('images/AutomaticGearBox.png') }}';
                }
            } else if (type === 'paint') {
                // Both Flat Paint and Metallic Paint use CarPaint.png
                if (selectedValue === 'Flat Paint' || selectedValue === 'Metallic Paint') {
                    imagePath = '{{ asset('images/CarPaint.png') }}';
                }
            }

            if (imagePath) {
                previewImage.src = imagePath;
                previewImage.style.display = 'block';
                // Set the value of the hidden input field for the controller
                hiddenInput.value = imagePath.replace('{{ url('/') }}/',
                    ''); // Store relative path like 'images/PetrolFuel.png'
            } else {
                previewImage.style.display = 'none';
                previewImage.src = ''; // Clear source
                hiddenInput.value = ''; // Clear hidden input value
            }
        }

        // Initialize previews on page load if old values are present (e.g., after validation error)
        document.addEventListener('DOMContentLoaded', function() {
            updateIconPreview('fuel');
            updateIconPreview('gearbox');
            updateIconPreview('paint');
        });
    </script>
</body>

</html>
