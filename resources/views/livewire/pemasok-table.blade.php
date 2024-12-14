<div>
    <!-- table bordered -->
    <div class="table-responsive">
        <table class="table table-bordered mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pemasok</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pemasoks as $pemasok)
                    <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td>{{ $pemasok->nama }}</td>
                        <td>{{ $pemasok->alamat }}</td>
                        <td>{{ $pemasok->telp }}</td>
                        <td>
                            <div>
                                <a href="{{ route('invent.pemasok.edit', $pemasok->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('invent.pemasok.destroy', $pemasok->id) }}" method="POST"
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
        {{ $pemasoks->links() }}
    </div>
</div>
