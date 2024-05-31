@extends('layouts.app')

@section('head-title', 'Ticket')
@section('head-content')
  @vite(['resources/js/vue/vue.js'])
@endsection

@section('content')
  <div class="container">
    <h1 class="text-center mb-4">Lista ticket</h1>
    <div class="filter-wrapper mb-4 row row-cols-2 g-5">
      <div class="col">
        <div class="row g-3">
          <label class="col-3 col-form-label" for="dateInput">Data</label>
          <div class="col-9">
            <input v-model="filter.date" class="form-control" type="date" id="dateInput">
          </div>
          <label class="col-3 col-form-label" for="operatorSelect">Operatore</label>
          <div class="col-9">
            <select v-model="filter.operatorId" class="form-select" id="operatorSelect">
              <option selected value="false" class="d-none">Seleziona un operatore</option>
              @foreach ($operators as $operator)
                <option value="{{ $operator->id }}">{{ $operator->first_name }} {{ $operator->last_name }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="row g-3">
          <label class="col-3 col-form-label" for="statusSelect">Stato</label>
          <div class="col-9">
            <select v-model="filter.statusId" class="form-select" id="statusSelect">
              <option selected value="false" class="d-none">Seleziona uno stato</option>
              @foreach ($statues as $status)
                <option value="{{ $status->id }}">{{ $status->name }}</option>
              @endforeach
            </select>
          </div>

          <label class="col-3 col-form-label" for="categorySelect">Categoria</label>
          <div class="col-9">
            <select v-model="filter.categoryId" class="form-select" id="categorySelect">
              <option selected value="false" class="d-none">Seleziona una categoria</option>
              @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
    </div>
    <table class="table">
      <thead class="table-secondary">
        <tr>
          <th scope="col">Titolo</th>
          <th scope="col">Data</th>
          <th scope="col">Categoria</th>
          <th scope="col">Operatore</th>
          <th scope="col">Priorità</th>
          <th scope="col">Stato</th>
          <th class="text-end" scope="col">
            <a class="me-3" href="{{ route('admin.tickets.create') }}"><i class="fa-solid fa-plus"></i></a>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-if="loading">
          <td colspan="100%">LOADING...</td>
        </tr>
        <tr v-else-if="tickets.length" v-for="ticket in tickets">
          <td>
            <a class="text-black" :href="`${baseUri}/admin/tickets/${ticket.id}`">@{{ ticket.title }}</a>
          </td>
          <td>@{{ ticket.date }}</td>
          <td>@{{ ticket.category.name }}</td>
          <td>@{{ ticket.operator.first_name + ' ' + ticket.operator.last_name }}</td>
          <td>@{{ ticket.priority.name }}</td>
          <td>@{{ ticket.status.name }}</td>
          <td class="text-end">
            {{-- Link edit operator --}}
            <a class="me-3 text-black" :href="`${baseUri}/admin/tickets/${ticket.id}/edit`">
              <i class="fa-regular fa-pen-to-square"></i></a>
            {{-- Link delete operator --}}
            <a href="javascript:void(0)" class="me-3 text-danger" data-bs-toggle="modal" :data-bs-target="`#destroyTicketModal${ticket.id}`">
              <i class="fa-solid fa-trash"></i>
            </a>
          </td>
        </tr>
        <tr v-else>
          <td colspan="100%">Nessun ticket trovato@{{ nFilter ? ' con i filtri inseriti' : ', applica almeno un filtro' }}</td>
        </tr>
      </tbody>
    </table>
    {{-- <div class="text-light">
      {{ $operators->links() }}
    </div> --}}
  </div>
@endsection

@push('modals')
  <!-- Modals -->
  <div v-for="ticket in tickets" class="modal fade" :id="`destroyTicketModal${ticket.id}`" tabindex="-1" :aria-labelledby="`destroyTicketModal${ticket.id}Label`" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-black" :id="`destroyTicketModal${ticket.id}Label`">Elimina ticket</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-black">
          Sei sicuro di voler <b>eliminare definitivamente</b> il ticket <span class="fst-italic">'@{{ ticket.title }}'</span>?
        </div>
        <form :action="`${baseUri}/admin/tickets/${ticket.id}`" method="POST" class="modal-footer">
          @csrf
          @method('DELETE')
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
          <button type="submit" class="btn btn-danger">Elimina</button>
        </form>
      </div>
    </div>
  </div>
@endpush
