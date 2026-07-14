@extends('layouts.app')

@section('title', 'Kategori')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">

    <h3>Data Kategori</h3>

    <a href="{{ route('categories.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Kategori
    </a>

</div>

<table class="table table-bordered table-striped">

    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Slug</th>
            <th>Deskripsi</th>
            <th width="170">Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse($categories as $category)

        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->slug }}</td>
            <td>{{ $category->description }}</td>
            <td>

                <a href="{{ route('categories.edit',$category) }}"
                    class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="{{ route('categories.destroy',$category) }}"
                    method="POST"
                    class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button
                        onclick="return confirm('Yakin ingin menghapus kategori ini?')"
                        class="btn btn-danger btn-sm">
                        Hapus
                    </button>

                </form>

            </td>
        </tr>

        @empty

        <tr>
            <td colspan="5" class="text-center">
                Belum ada kategori.
            </td>
        </tr>

        @endforelse

    </tbody>

</table>

@endsection 