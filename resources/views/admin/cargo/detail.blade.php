@extends('layouts.admin.index')

@section('title', 'Detail Muatan')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="card">
            <div class="card-header">
                <h5>Detail Muatan</h5>
                <div class="flex">
                    @can('create cargo')
                        <a class="btn btn-primary mb-3" href="{{ route('admin.cargos.create', $manifest_id) }}">
                            <i class="bx bx-plus me-1"></i>Tambah Data
                        </a>
                    @endcan
                    <a class="btn btn-secondary mb-3" href="{{ url()->previous() }}">
                        <i class="bx bx-arrow-back me-1"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                @if ($cargos->isEmpty())
                    <p>Tidak ada data muatan untuk manifest ini</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Muatan</th>
                                <th>Nama Pemilik</th>
                                <th>Berat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cargos as $key => $cargo)
                                <tr>
                                    <td>{{ $cargo->code }}</td>
                                    <td>{{ $cargo->name }}</td>
                                    <td>{{ $cargo->owner }}</td>
                                    <td>{{ $cargo->weight }}</td>
                                    <td>
                                        <div class="d-flex">
                                            @can('edit cargo')
                                                <a class="btn btn-warning me-2"
                                                    href="{{ route('admin.cargo.edit', $cargo->id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i>
                                                    Edit</a>
                                            @endcan

                                            @can('delete cargo')
                                                <form action="{{ route('admin.cargo.destroy', $cargo->id) }}" method="POST"
                                                    role="alert" alert-title="Hapus Data"
                                                    alert-text="Yakin ingin menghapusnya?">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger me-2"><i
                                                            class="bx bx-trash">Hapus</i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
