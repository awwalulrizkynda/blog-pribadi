@extends('layouts.app')

@section('title','Artikel')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">

    <h3>Daftar Artikel</h3>

    <a href="{{ route('articles.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Artikel
    </a>

</div>

<table class="table table-bordered table-striped align-middle">

    <thead class="table-dark">

        <tr>
            <th>No</th>
            <th>Thumbnail</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Status</th>
            <th width="170">Aksi</th>
        </tr>

    </thead>

    <tbody>

    @forelse($articles as $article)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td width="120">

                @if($article->thumbnail)

                    <img src="{{ asset('storage/'.$article->thumbnail) }}"
                         width="100"
                         class="img-thumbnail">

                @else

                    -

                @endif

            </td>

            <td>{{ $article->title }}</td>

            <td>{{ $article->category->name }}</td>

            <td>

                @if($article->status=='published')

                    <span class="badge bg-success">Published</span>

                @else

                    <span class="badge bg-secondary">Draft</span>

                @endif

            </td>

            <td>

                <a href="{{ route('articles.edit',$article) }}"
                   class="btn btn-warning btn-sm">

                    Edit

                </a>

                <form action="{{ route('articles.destroy',$article) }}"
                      method="POST"
                      class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus artikel?')">

                        Hapus

                    </button>

                </form>

            </td>

        </tr>

    @empty

        <tr>

            <td colspan="6" class="text-center">

                Belum ada artikel.

            </td>

        </tr>

    @endforelse

    </tbody>

</table>

@endsection