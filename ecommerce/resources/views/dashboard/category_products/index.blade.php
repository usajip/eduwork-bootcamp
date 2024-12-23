<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Kategori Produk') }}
        </h2>
    </x-slot>
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Tombol Tambah Kategori -->
        <a href="{{ route('product-category.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>
        <!-- Tabel Kategori -->
        <table class="table table-bordered">
            <thead class="bg-dark text-light">
                <tr>
                    <th>ID</th>
                    <th>Nama Kategori</th>
                    <th>Jumlah Produk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->product_count}}</td>
                    <td>
                        <a href="{{ route('product-category.edit', $category->id)}}" 
                            class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('product-category.destroy', $category->id) }}" method="POST" style="display: inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" 
                            onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                <!-- Baris kategori lainnya bisa ditambahkan di sini -->
            </tbody>
        </table>
    </div>
</x-app-layout>
