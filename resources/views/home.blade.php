<x-layout>
    {{-- Componen x-slot:title isinya adalahj title, jadi home akan menjadi slot bagi layout --}}
    {{-- <x-slot:title> digunakan untuk mengirim data title ke komponen layout. --}}
    <x-slot:title>{{ $title }}</x-slot:title>
    <h3 class="text-xl">Ini adalah halaman Home Page</h3>
</x-layout>