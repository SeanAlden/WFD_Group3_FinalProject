@extends('layouts.app')
@section('content')

    <body>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="max-w-6xl p-6 mx-auto bg-white rounded-lg shadow-md">
                        <div class="flex justify-start mb-4">
                            <button onclick="showAddProductModal()"
                                class="px-4 py-2 ml-4 text-sm font-medium text-white bg-blue-600 rounded-md shadow hover:bg-blue-700 focus:outline-none">
                                Add New Product
                            </button>
                        </div>

                        <!-- List of Products -->
                        <div class="bg-white rounded-md shadow">
                            <h1 class="mb-4 text-lg font-semibold text-gray-800">List of Products</h1>
                            <table class="w-full text-sm border-collapse table-auto">
                                <thead>
                                    <tr class="font-medium text-gray-600 bg-gray-100">
                                        <th class="px-4 py-3 text-left">PHOTO</th>
                                        <th class="px-4 py-3 text-left">PRODUCT NAME</th>
                                        <th class="px-4 py-3 text-left">BRAND</th>
                                        <th class="px-4 py-3 text-left">CPU</th>
                                        <th class="px-4 py-3 text-left">GPU</th>
                                        <th class="px-4 py-3 text-left">Memory</th>
                                        <th class="px-4 py-3 text-left">Storage</th>
                                        <th class="px-4 py-3 text-left">Stock</th>
                                        <th class="px-4 py-3 text-left">Price</th>
                                        <th class="px-4 py-3 text-left">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody id="productList">
                                    @foreach ($products as $product)
                                <tbody class="space-y-9">
                                    <tr class="border-t border-gray-200 my-9 hover:bg-gray-50">
                                        <td>
                                            @if ($product->photo)
                                                <img src="{{ asset('storage/' . $product->photo) }}"
                                                    alt="{{ $product->product_name }}" style="width: 70px; height: 70px;">
                                            @else
                                                <img src="{{ URL::asset('img/avatar.png') }}" alt="No Image" height="70"
                                                    width="70">
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-gray-800">{{ $product->product_name }}</td>
                                        <td class="px-4 py-3 text-gray-600">{{ $product->brand }}</td>
                                        <td class="px-4 py-3 text-gray-600">{{ $product->cpu }}</td>
                                        <td class="px-4 py-3 text-gray-600">{{ $product->gpu }}</td>
                                        <td class="px-4 py-3 text-gray-600">{{ $product->memory }}</td>
                                        <td class="px-4 py-3 text-gray-800">{{ $product->storage }}</td>
                                        <td class="px-4 py-3 text-gray-600">{{ $product->stock }}</td>
                                        <td class="px-4 py-3 text-gray-600">{{ $product->price }}</td>
                                        <td class="px-4 py-3">
                                            <button onclick="editProduct({{ json_encode($product) }})"
                                                class="mr-4 font-medium text-blue-600 hover:underline">Edit</button>
                                            <button onclick="showDeleteConfirmModal({{ $product->id }})"
                                                class="font-medium text-red-500 hover:underline">Remove</button>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Modal Add Product -->
                    <div id="addProductModal"
                        class="fixed inset-0 z-10 flex items-center justify-center hidden bg-gray-800 bg-opacity-50">
                        <div class="w-1/2 p-6 bg-white rounded-lg shadow-lg">
                            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h2 class="mb-4 text-lg font-semibold text-gray-800">Add New Product</h2>
                                <div class="mb-5 form-group col-md-12">
                                    <label for="">Photo</label>
                                    <div class="avatar-upload">
                                        <div>
                                            <input type='file' id="imageUpload" name="photo" accept=".png, .jpg, jpeg"
                                                onchange="previewImage(this)" />
                                            <label for="imageUpload"></label>
                                        </div>
                                        <br>
                                        <div class="avatar-preview">
                                            {{-- <div id="imagePreview" style="background-image: url('{{ url('/img/avatar.png') }}')"></div> --}}
                                            <img src="{{ URL::asset('/img/avatar.png') }}" alt="profile Pic" height="100"
                                                width="100">
                                        </div>
                                    </div>
                                </div>
                                {{-- <input type="text" name="description" placeholder="Product Description" required
                                    class="w-full mb-2 border-gray-300 rounded"> --}}
                                <input type="text" name="product_name" placeholder="Product Name" required
                                    class="w-full mb-2 border-gray-300 rounded">
                                <!-- Menggunakan textarea dengan Tailwind CSS -->
                                <textarea name="description" placeholder="Product Description" required
                                    class="mb-2 max-h-[200px] min-h-[100px] w-full resize-none overflow-y-auto rounded border-gray-300 p-2"></textarea>
                                <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-2">
                                    <input type="text" name="brand" placeholder="Brand" required
                                        class="w-full mb-2 border-gray-300 rounded">
                                    <input type="text" name="cpu" placeholder="CPU" required
                                        class="w-full mb-2 border-gray-300 rounded">
                                    <input type="text" name="gpu" placeholder="GPU" required
                                        class="w-full mb-2 border-gray-300 rounded">
                                    <input type="text" name="memory" placeholder="Memory" required
                                        class="w-full mb-2 border-gray-300 rounded">
                                    <input type="text" name="storage" placeholder="Storage" required
                                        class="w-full mb-2 border-gray-300 rounded">
                                    <input type="number" name="stock" placeholder="Stock" required
                                        class="w-full mb-2 border-gray-300 rounded">
                                    <input type="number" name="price" placeholder="Price" required
                                        class="w-full mb-2 border-gray-300 rounded">
                                    <!-- Dropdown untuk kategori -->
                                    <select name="category_id" required class="w-full mb-2 border-gray-300 rounded">
                                        <option value="" disabled selected>Pilih Kategori</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex justify-end space-x-4">
                                    <button type="button" onclick="hideAddProductModal()"
                                        class="px-4 py-2 text-white bg-gray-500 rounded">Cancel</button>
                                    <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded">Add
                                        Product</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Modal Delete Confirm -->
                    <div id="deleteConfirmModal"
                        class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
                        <div class="p-6 bg-white rounded shadow">
                            <h2 class="mb-4 text-lg font-semibold">Delete Confirm</h2>
                            <p class="mb-4">Are you sure you want to delete this product?</p>
                            <div class="flex justify-end">
                                <button type="button" onclick="closeDeleteConfirmModal()"
                                    class="px-4 py-2 mr-4 bg-gray-200">No</button>
                                <form id="deleteProductForm" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 text-white bg-red-600">Yes</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Edit Product -->
                    <div id="editProductModal"
                        class="fixed inset-0 z-10 flex items-center justify-center hidden bg-gray-800 bg-opacity-50">
                        <div class="w-1/2 p-6 bg-white rounded-lg shadow-lg">
                            <form id="editProductForm" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <h2 class="mb-4 text-lg font-semibold text-gray-800">Edit Product</h2>
                                <div class="mb-5 form-group col-md-12">
                                    <label for="">Photo</label>
                                    <div class="avatar-upload">
                                        <div>
                                            <input type='file' id="imageUpload" name="photo"
                                                accept=".png, .jpg, jpeg" onchange="previewImage(this)" />
                                            <label for="imageUpload"></label>
                                        </div>
                                        <br>
                                        <div class="avatar-preview">
                                            <img src="{{ URL::asset('/img/avatar.png') }}" alt="profile Pic"
                                                height="100" width="100">
                                        </div>
                                    </div>
                                </div>
                                <input type="text" name="product_name" id="editProductName" required
                                    class="w-full mb-2 border-gray-300 rounded">
                                {{-- <input type="text" name="description" id="editProductDesc" required
                                    class="w-full mb-2 border-gray-300 rounded"> --}}
                                <textarea name="description" id="editProductDesc" placeholder="Product Description" required
                                    class="mb-2 max-h-[200px] min-h-[100px] w-full resize-none overflow-y-auto rounded border-gray-300 p-2"></textarea>
                                <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-2">
                                    <input type="text" name="brand" id="editBrand" required
                                        class="w-full mb-2 border-gray-300 rounded">
                                    <input type="text" name="cpu" id="editCPU" required
                                        class="w-full mb-2 border-gray-300 rounded">
                                    <input type="text" name="gpu" id="editGPU" required
                                        class="w-full mb-2 border-gray-300 rounded">
                                    <input type="text" name="memory" id="editMemory" required
                                        class="w-full mb-2 border-gray-300 rounded">
                                    <input type="text" name="storage" id="editStorage" required
                                        class="w-full mb-2 border-gray-300 rounded">
                                    <input type="number" name="stock" id="editStock" required
                                        class="w-full mb-2 border-gray-300 rounded">
                                    <input type="number" name="price" id="editPrice" required
                                        class="w-full mb-2 border-gray-300 rounded">
                                        <select name="category_id" id="editCategoryId" required class="w-full mb-2 border-gray-300 rounded">
                                            <option value="" disabled selected>Pilih Kategori</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="flex justify-end space-x-4">
                                    <button type="button" onclick="hideEditProductModal()"
                                        class="px-4 py-2 text-white bg-gray-500 rounded">Cancel</button>
                                    <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded">Save
                                        Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

<script>
    function showAddProductModal() {
        document.getElementById('addProductModal').classList.remove('hidden');
    }

    function hideAddProductModal() {
        document.getElementById('addProductModal').classList.add('hidden');
    }

    function editProduct(product) {
        document.getElementById('editProductForm').action = `/products/${product.id}`;
        // document.getElementById('editProductImage').value = product.photo;
        document.getElementById('editProductName').value = product.product_name;
        document.getElementById('editProductDesc').value = product.description;
        document.getElementById('editBrand').value = product.brand;
        document.getElementById('editCPU').value = product.cpu;
        document.getElementById('editGPU').value = product.gpu;
        document.getElementById('editMemory').value = product.memory;
        document.getElementById('editStorage').value = product.storage;
        document.getElementById('editStock').value = product.stock;
        document.getElementById('editPrice').value = product.price;
        document.getElementById('editCategoryId').value = product.category_id;
        document.getElementById('editProductModal').classList.remove('hidden');
    }

    function hideEditProductModal() {
        document.getElementById('editProductModal').classList.add('hidden');
    }

    // Show Delete Confirm Modal
    function showDeleteConfirmModal(productId) {
        const deleteForm = document.getElementById('deleteProductForm');
        deleteForm.action = `/products/${productId}`;
        document.getElementById('deleteConfirmModal').classList.remove('hidden');
    }

    // Close Delete Confirm Modal
    function closeDeleteConfirmModal() {
        document.getElementById('deleteConfirmModal').classList.add('hidden');
    }

    function previewImage(input) {
        // if (input.files && input.files[0]) {
        //     var reader = new FileReader();
        //     reader.onload = function(e) {
        //         $("#imagePreview").css('background-image', 'url(' + e.target.result + ')');
        //         $("#imagePreview").hide();
        //         $("#imagePreview").fadeIn(700)
        //     }
        //     reader.readAsDataURL(input.files[0]);
        // }
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('.avatar-preview img').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
