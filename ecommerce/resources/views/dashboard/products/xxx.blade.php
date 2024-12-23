

<form action="{{ route('products.update', $product->id) }}" method="POST" 
    enctype="multipart/form-data">@csrf @method('PUT')
    <div class="mb-3">
        <label for="productName" class="form-label">Nama Produk</label>
        <input type="text" class="form-control" id="productName" value="{{ $product->name }}" required>
    </div>
    <div class="mb-3">
        <label for="productDescription" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="productDescription" rows="3" required>{{$product->description}}</textarea>
    </div>
    <div class="mb-3">
        <label for="productStock" class="form-label">Stok</label>
        <input type="number" class="form-control" id="productStock" value="{{ $product->stock }}" required>
    </div>
    <img src="{{ asset($product->image) }}" alt="" width="100">
    <div class="mb-3">
        <label for="productImage" class="form-label">Gambar</label>
        <input type="file" class="form-control" id="productImage" required>
    </div>
    <select class="form-select" aria-label="Default select example">
        <option>Pilih</option>
        @foreach($catgories as $category)
        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>