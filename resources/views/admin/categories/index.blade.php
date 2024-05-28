@extends('layouts.app')

@section('head-title', 'Categorie')

@section('content')
  <div class="container">
    <h1 class="text-center">Categorie</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Categoria</th>
          <th class="text-end" scope="col">
            <a class="me-3" href="{{ route('admin.categories.create') }}"><i class="fa-solid fa-plus"></i></a>
          </th>
        </tr>
      </thead>
      <tbody>
        @forelse ($categories as $cat)
          <tr>
            <td>{{ $cat->name }}</td>
            <td class="text-end">
              <a class="me-3 text-black" href="{{ route('admin.categories.edit', $cat->id) }}"><i class="fa-regular fa-pen-to-square"></i></a>
              <a href="javascript:void(0)" class="me-3 text-danger" data-bs-toggle="modal" data-bs-target="#destroyCatModal{{ $cat->id }}">
                <i class="fa-solid fa-trash"></i>
              </a>
            </td>
          </tr>
        @empty
          <td colspan="100%">No categories available</td>
        @endforelse


      </tbody>
    </table>
    <div class="text-white">

      {{ $categories->links() }}
    </div>
  </div>
@endsection

@push('modals')
  @foreach ($categories as $cat)
    <!-- Modals -->
    <div class="modal fade" id="destroyCatModal{{ $cat->id }}" tabindex="-1" aria-labelledby="destroyCatModal{{ $cat->id }}Label" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5 text-black" id="destroyCatModal{{ $cat->id }}Label">Elimina categoria</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-black">
            Sei sicuro di voler <b>eliminare definitivamente</b> la categoria <span class="fst-italic">'{{ $cat->name }}'</span>?
          </div>
          <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" class="modal-footer">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
            <button type="submit" class="btn btn-danger">Elimina</button>
          </form>
        </div>
      </div>
    </div>
  @endforeach
@endpush
