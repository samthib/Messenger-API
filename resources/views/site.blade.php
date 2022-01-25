@extends('layouts.site')

@section('content')
  <div class="container-lg">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="text-white">Messages list</h2>
        <div class="p-4 bg-light rounded shadow">
          @foreach ($topics as $key => $topic)
            <section class="px-2 bg-white rounded shadow">
              <div class="d-flex justify-content-between p-1 bg-primary text-white rounded shadow">
                <small class="date">{{$topic->created_at}}</small>
                <span class="id">Post ID: {{$topic->id}}</span>
              </div>
              <h4 class="title">{{$topic->title}}</h4>
              <p class="content">{{$topic->content}}</p>
            </section>
          @endforeach
          {{ $topics->links() }}
        </div>
    </div>
    </div>
  </div>
@endsection
