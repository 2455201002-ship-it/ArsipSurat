<x-app-layout>

<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
Edit Surat
</h2>
</x-slot>

<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

<div class="bg-white shadow-sm sm:rounded-lg p-6">

<form action="/surat/update/{{ $surat->id }}" method="POST" class="space-y-6 max-w-xl">
@csrf

<div>
<label>Nomor Surat</label>
<input type="text" name="nomor_surat"
value="{{ $surat->nomor_surat }}"
class="border-gray-300 rounded-md shadow-sm mt-1 block w-full">
</div>

<div>
<label>Pengirim</label>
<input type="text" name="pengirim"
value="{{ $surat->pengirim }}"
class="border-gray-300 rounded-md shadow-sm mt-1 block w-full">
</div>

<div>
<label>Perihal</label>
<input type="text" name="perihal"
value="{{ $surat->perihal }}"
class="border-gray-300 rounded-md shadow-sm mt-1 block w-full">
</div>

<div>
<label>Tanggal Terima</label>
<input type="date" name="tanggal_terima"
value="{{ $surat->tanggal_terima }}"
class="border-gray-300 rounded-md shadow-sm mt-1 block w-full">
</div>

<div>
<label>Sifat</label>

<select name="sifat"
class="border-gray-300 rounded-md shadow-sm mt-1 block w-full">

<option {{ $surat->sifat == 'Biasa' ? 'selected' : '' }}>Biasa</option>
<option {{ $surat->sifat == 'Penting' ? 'selected' : '' }}>Penting</option>
<option {{ $surat->sifat == 'Rahasia' ? 'selected' : '' }}>Rahasia</option>

</select>

</div>

<div class="flex gap-4">

<button type="submit"
class="px-4 py-2 bg-gray-800 text-white rounded">
Update
</button>

<a href="/surat"
class="px-4 py-2 bg-gray-200 rounded">
Batal
</a>

</div>

</form>

</div>
</div>
</div>

</x-app-layout>