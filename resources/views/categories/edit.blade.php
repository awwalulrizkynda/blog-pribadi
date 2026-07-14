@extends('layouts.app')

@section('title','Edit Kategori')

@section('content')

<div class="card shadow">

    <div class="card-header">

        <h4>Edit Kategori</h4>

    </div>

    <div class="card-body">

        @if($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('categories.update',$category->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">

                    Nama Kategori

                </label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name',$category->name) }}"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Deskripsi

                </label>

                <textarea
                    name="description"
                    rows="5"
                    class="form-control">{{ old('description',$category->description) }}</textarea>

            </div>

            <button class="btn btn-warning">

                Update

            </button>

            <a href="{{ route('categories.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

@endsection