<div class="d-flex">
    @can('show sailing warrant')
        <a class="btn btn-secondary me-2" href="{{ route('admin.sailingwarrant.show', $id) }}"><i class="bx bx-show me-1"></i>
            Detail</a>
    @endcan

    @can('edit sailing warrant')
        <a class="btn btn-warning me-2" href="{{ route('admin.sailingwarrant.edit', $id) }}"><i
                class="bx bx-edit-alt me-1"></i> Edit</a>
    @endcan

    @can('delete sailing warrant')
        <form action="{{ route('admin.sailingwarrant.destroy', $id) }}" method="POST" role="alert" alert-title="Hapus Data"
            alert-text="Yakin ingin menghapusnya?">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger me-2"><i class="bx bx-trash">Hapus</i>
            </button>
        </form>
    @endcan
</div>
