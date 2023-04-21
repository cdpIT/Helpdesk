@extends('layouts.admin')
@section('container')
    <main class="content">
      <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Daftar Tiket</h1>
        @if (session()->has('success'))  
          <div class="badge bg-success text-white mb-2">
            {{ session('success') }}
          </div>
        @endif
        @if (session()->has('error'))  
          <div class="badge bg-danger text-white mb-2">
            {{ session('error') }}
          </div>
        @endif
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                {{-- <a href="/admin/departemen/create" class="btn btn-primary btn-sm mb-3"><i class="me-2" data-feather="user-plus"></i> <span class="align-middle">Tambah Departemen</span></a> --}}
                <table class="table my-0 table-sm">
									<thead>
										<tr>
											<th>No Tiket</th>
											<th>Status</th>
                      <th>Judul</th>
                      <th>Permintaan</th>
                      <th>Dikirim</th>
                      <th>Prioritas</th>
                      <th>Penerima Tugas</th>
                      <th>Aksi</th>
										</tr>
									</thead>
									<tbody>
                    @foreach ($tikets as $tiket)
										<tr>
											<td>{{ $tiket->noTiket }}</td>
											<td>{{ $tiket->status }}</td>
											<td>{{ $tiket->permintaan }}</td>
											<td>{{ $tiket->User->nama }}</td>
											<td>{{ $tiket->created_at }}</td>
											<td>{{ $tiket->prioritas }}</td>
											<td>@if ($tiket->status != 'Dikirim')
                        {{ $tiket->Teknisi->nama }}
                      @endif </td>
                      <td>
                        <a href="/admin/tiket/konfirmasi/{{ $tiket->noTiket }}" class="btn btn-primary btn-sm"><i class="align-middle" data-feather="edit"></i></a>
                        <form action="/admin/departemen/destroy/" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="align-middle" data-feather="trash"></i></button>
                        </form>
                      </td>
										</tr>
                    @endforeach
                  </tbody>
                </table> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection