
@extends('layouts.app')

@section('content')

<div>

    {{-- Page Header --}}
    <div class="mb-10">
        <h1 class="text-3xl font-bold text-white">
            Sites
        </h1>

        <p class="mt-2 text-slate-400">
            All websites managed by your agency.
        </p>


<div class="mb-8">

    <livewire:site-search />

</div>

    </div>





</div>

@endsection



