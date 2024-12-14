<div>
    <!-- table bordered -->
    <div class="table-responsive">
        <table class="table table-bordered mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Space</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gudangs as $gudang)
                    <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td>{{ $gudang->nama }}</td>
                        <td>{{ $gudang->alamat }}</td>
                        <td>{{ $gudang->kapasitas }}</td>
                        <td>
                            <div>
                                <a href="{{ route('invent.gudang.edit', $gudang->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('invent.gudang.destroy', $gudang->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $gudangs->links() }}
    </div>
</div>
