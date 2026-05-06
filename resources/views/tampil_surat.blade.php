<x-app-layout>

<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
Daftar Surat Masuk
</h2>
</x-slot>

<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

<div class="bg-white shadow-sm sm:rounded-lg p-6">

@if(session('success'))
<div class="mb-4 p-3 bg-green-500 text-white rounded">
{{ session('success') }}
</div>
@endif

<div class="mb-4">
<a href="{{ route('surat.create') }}"
class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-500">
Tambah Surat
</a>
</div>

<div class="overflow-x-auto">

<table class="min-w-full border border-gray-300">

<thead class="bg-gray-100">
<tr>
<th class="px-4 py-2 border">No</th>
<th class="px-4 py-2 border">Nomor Surat</th>
<th class="px-4 py-2 border">kategori</th>
<th class="px-4 py-2 border">Pengirim</th>
<th class="px-4 py-2 border">Perihal</th>
<th class="px-4 py-2 border">Tanggal</th>
<th class="px-4 py-2 border">Foto</th>
<th class="px-4 py-2 border">Sifat</th>
<th class="px-4 py-2 border text-center">Aksi</th>
</tr>
</thead>

<tbody>

@foreach($data as $surat)

<tr class="hover:bg-gray-50">

<td class="px-4 py-2 border">{{ $loop->iteration }}</td>

<td class="px-4 py-2 border">{{ $surat->nomor_surat }}</td>

<td class="px-4 py-2 border">{{ $surat->kategori->nama_kategori ?? '-'}}</td>

<td class="px-4 py-2 border">{{ $surat->pengirim }}</td>

<td class="px-4 py-2 border">{{ $surat->perihal }}</td>

<td class="px-4 py-2 border">
{{ \Carbon\Carbon::parse($surat->tanggal_terima)->format('d-m-Y') }}
</td>

<!-- FOTO -->
<td class="px-4 py-2 border text-center">
    @if($surat->foto)
        <img src="{{ asset('storage/' . $surat->foto) }}" 
             class="w-20 h-20 object-cover rounded">
    @else
        <span class="text-gray-500">Tidak ada foto</span>
    @endif
</td>

<!-- SIFAT -->
<td class="px-4 py-2 border text-center">
@if($surat->sifat == 'Penting')
<span class="bg-red-500 text-white px-2 py-1 rounded text-sm">Penting</span>
@elseif($surat->sifat == 'Rahasia')
<span class="bg-purple-600 text-white px-2 py-1 rounded text-sm">Rahasia</span>
@else
<span class="bg-gray-500 text-white px-2 py-1 rounded text-sm">Biasa</span>
@endif
</td>

<td class="px-4 py-2 border text-center space-x-2">

<a href="{{ route('surat.edit',$surat->id) }}"
class="bg-yellow-500 hover:bg-yellow-400 text-black px-3 py-1 rounded-md">
Edit
</a>

<a href="{{ route('surat.destroy',$surat->id) }}"
onclick="return confirm('Yakin hapus data surat ini?')"
class="bg-red-600 hover:bg-red-300 text-white px-3 py-1 rounded-md">
Hapus
</a>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>
</div>
</div>

</x-app-layout>