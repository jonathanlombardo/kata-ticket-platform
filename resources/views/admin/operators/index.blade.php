@extends('layouts.app')

@section('content')
<div class="container">
      <h1 class="text-center mb-4">Lista operatori</h1>
      <a class="me-3 btn btn-primary mb-3" href="#">Aggiungi operatore <i class="fa-solid fa-plus"></i></a>
      <table class="table">
      <thead class="table-secondary">
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">Cognome</th>
          <th scope="col">Indirizzo email</th>
          <th scope="col">Disponibilità</th>
          <th class="text-end" scope="col">
          Opzioni
            {{-- <a class="me-3" href="{{ route('admin.categories.create') }}"><i class="fa-solid fa-plus"></i></a> --}}
          </th>
        </tr>
      </thead>
      <tbody>
        @forelse ($operators as $operator)
          <tr>
            <td>{{ $operator->first_name }}</td>
            <td>{{ $operator->last_name }}</td>
            <td>{{ $operator->email }}</td>
            <td>{{ $operator->available }}</td>
            <td class="text-end">
            {{-- Link edit operator --}}
              <a class="me-3 text-black" href="#">
              <i class="fa-regular fa-pen-to-square"></i></a>
              {{-- Link delete operator --}}
              <a href="javascript:void(0)" class="me-3 text-danger"
              data-bs-toggle="modal" data-bs-target="#destroyOperatorModal{{ $operator->id }}">
                <i class="fa-solid fa-trash"></i>
              </a>
            </td>
          </tr>
        @empty
          <td colspan="100%">No categories available</td>
        @endforelse
        </tbody>
    </table>

</div>
@endsection

@push('modals')
  @foreach ($operators as $operator)
    <!-- Modals -->
    <div class="modal fade" id="destroyOperatorModal{{ $operator->id }}" tabindex="-1" aria-labelledby="destroyOperatorModal{{ $operator->id }}Label" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5 text-black" id="destroyOperatorModal{{ $operator->id }}Label">Elimina operatore</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-black">
            Sei sicuro di voler <b>eliminare definitivamente</b> l'operatore <span class="fst-italic">'{{ $operator->first_name }} {{ $operator->last_name }}'</span>?
          </div>
          <form action="{{ route('admin.operators.destroy', $operator->id) }}" method="POST" class="modal-footer">
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