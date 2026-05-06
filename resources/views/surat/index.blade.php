@extends('layouts.master')

@section('title', 'Data Surat')

@section('content')

<h1 class="text-xl font-bold mb-4">Data Surat</h1>

<table class="w-full bg-white shadow rounded">

    <thead class="bg-gray-200">
        <tr>
            <th class="p-2">Nomor Surat</th>
            <th class="p-2">Pengirim</th>
            <th class="p-2">Perihal</th>
        </tr>
    </thead>

    <tbody>
        @foreach($surat as $s)
        <tr class="border-t">
            <td class="p-2">{{ $s->nomor_surat }}</td>
            <td class="p-2">{{ $s->pengirim }}</td>
            <td class="p-2">{{ $s->perihal }}</td>
        </tr>
        @endforeach
    </tbody>

</table>

@endsection