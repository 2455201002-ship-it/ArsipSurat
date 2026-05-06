<x-app-layout>

<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
Tambah Surat
</h2>
</x-slot>

<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

<div class="bg-white shadow-sm sm:rounded-lg p-6">

@if ($errors->any())
<div class="mb-4 p-3 bg-red-500 text-white rounded">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 max-w-xl">

@csrf

<div>
<label class="block text-sm font-medium">Nomor Surat</label>
<input type="text" name="nomor_surat"
value="{{ old('nomor_surat') }}"
class="border-gray-300 rounded-md shadow-sm mt-1 block w-full">
</div>

<div>
<label for="kategori" class="block text-sm font-medium">Nomor Surat</label>
<select name="id_kategori" id="id_kategori" class="border-gray-300 rounded-md shadow-sm mt-1 block w-full">
    <option value="">---pilih kategori---</option>
@foreach ($kategori as $k)
    <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
@endforeach</select>
</div>

<div>
<label class="block text-sm font-medium">Pengirim</label>
<input type="text" name="pengirim"
value="{{ old('pengirim') }}"
class="border-gray-300 rounded-md shadow-sm mt-1 block w-full">
</div>

<div>
<label class="block text-sm font-medium">Perihal</label>
<input type="text" name="perihal"
value="{{ old('perihal') }}"
class="border-gray-300 rounded-md shadow-sm mt-1 block w-full">
</div>

<div>
<label class="block text-sm font-medium">Tanggal Terima</label>
<input type="date" name="tanggal_terima"
value="{{ old('tanggal_terima') }}"
class="border-gray-300 rounded-md shadow-sm mt-1 block w-full">
</div>

<div>
<label class="block text-sm font-medium">Foto</label>
<input type="file" name="foto" accept="image/*"
value="{{ old('foto') }}"
class="border-gray-300 rounded-md shadow-sm mt-1 block w-full">
</div>

<div>
<label class="block text-sm font-medium">Sifat</label>

<select name="sifat"
class="border-gray-300 rounded-md shadow-sm mt-1 block w-full">

<option value="Biasa">Biasa</option>
<option value="Penting">Penting</option>
<option value="Rahasia">Rahasia</option>

</select>

</div>

<div class="flex gap-4">

<button type="submit"
class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700">
Simpan
</button>

<a href="{{ route('surat.index') }}"
class="px-4 py-2 bg-gray-200 rounded">
Batal
</a>

</div>

</form>

</div>
</div>
</div>

</x-app-layout>