<!-- table bordered -->
<div wire:poll.3s class="table-responsive">
    <div class="mb-3">
        <a href="{{ route('pdf.view') }}" class="btn btn-success">View PDF</a>
        <a href="{{ route('pdf.download') }}" class="btn btn-primary">Download</a>
        <input type="text" class="float-end" wire:model="search" placeholder="Cari barang...">
    </div>
    <table class="table table-bordered mb-0 table-sortable">
        <thead>
            <tr class="text-center align-middle">
            <th>No</th>
            <th>Gambar</th>
            <th class="sort @if ($sortColumn == 'nama') {{ $sortDirection }} @endif" wire:click="sort('nama')">
                Name</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Stok</th>
            <th>Kategori</th>
            <th>Pemasok</th>
            <th>Gudang</th>
            @if (Auth::user()->role === 'admin')
                <th>Action</th>
            @else
            @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($barangs as $index => $barang)
                <tr>
                    <td>{{ $barangs->firstItem() + $index }}.</td>
                    <td><img src="{{ asset('storage/' . $barang->img) }}" alt="Gambar Barang"
                            style="width: 150px; height: auto;"</td>
                    <td class="text-bold-500">{{ $barang->nama }}</td>
                    <td>{{ $barang->harga }}</td>
                    <td class="text-bold-500">{{ $barang->deskripsi }}</td>
                    <td>{{ $barang->stok }}</td>
                    <td>{{ $barang->kategori->nama }}</td>
                    <td>{{ $barang->pemasok->nama }}</td>
                    <td>{{ $barang->gudang->nama }}</td>
                    @if (Auth::user()->role === 'admin')
                        <td>
                            <div>
                                <a href="{{ route('invent.barang.edit', $barang->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('invent.barang.destroy', $barang->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    @else
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $barangs->links() }}
</div>
