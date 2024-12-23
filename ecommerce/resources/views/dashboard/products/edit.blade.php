<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Produk Baru') }}
        </h2>
    </x-slot>
    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="card-body">
                <form action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT') @csrf
                    <!-- Input Nama Produk -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="name" 
                            name="name" value="{{ $product->name }}" required>
                    </div>

                    <!-- Input Deskripsi Produk -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi Produk</label>
                        <textarea class="form-control" id="description" name="description" rows="4" required>{{ $product->description }}</textarea>
                    </div>
                    <!-- Input Stok Produk -->
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stok Produk</label>
                        <input type="number" class="form-control" id="stock" 
                            name="stock" value="{{ $product->stock }}" min="0" required>
                    </div>

                    <!-- Input Harga Produk -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Harga Produk</label>
                        <input type="number" class="form-control" id="price" 
                            name="price" value="{{ $product->price }}" min="0" required>
                    </div>
                    <img src="{{ asset($product->image) }}" alt="{{$product->name}}" width="100">
                    <!-- Input Gambar Produk -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Produk</label>
                        <input type="file" class="form-control" 
                            id="image" name="image" accept="image/*">
                    </div>

                    <!-- Input Kategori Produk -->
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Kategori Produk</label>
                        <select class="form-select" id="category_id" name="category_id" required>
                            <option value="" disabled selected>Pilih Kategori</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" {{ $product->product_category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                            <!-- Tambahkan kategori lain sesuai kebutuhan -->
                        </select>
                    </div>
                    <!-- Tombol Submit -->
                    <button type="submit" class="btn btn-primary">Update Produk</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>