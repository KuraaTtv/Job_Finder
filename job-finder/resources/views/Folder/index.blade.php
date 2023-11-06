@extends('layout')
@section('content')
<!-- <h1>This is all jobs in here</h1> -->
@include('Parts.hero')
@include('Parts.serach')
<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @if(count($abc) == 0)
            <p>No Jobs Available for now</p>
        @else
            @foreach($abc as $job)
           <x-job-card :job="$job"/>
            @endforeach
        @endif
    </div>
        <div class="mt-6 p-4">
                    {{$abc->links()}}
                </div>

<!-- <a href="job">job</a> -->
@endsection