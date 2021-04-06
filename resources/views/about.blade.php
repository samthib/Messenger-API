@extends('layouts.master')

@section('content')
  <div class="container-md">
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1 >About</h1>
        <p>
          <b>Messenger-API</b> is an simple API which provide the ability to GET, POST, UPDATE and DELETE messages from an potential <a href="{{ route('site') }}">messaging website</a>.
        </p>
        <p>
          After registration you will get a <b class="text-danger">token</b> wish give you the necessary authorization to use the API.
        </p>
        <p>
          You can make a call to get 1 or all the existing messages. After posting a new message you can update it or delete it as you wish.
          A <b>JSON</b> will be returned for all API's calls to further process the received informations.
          <br>
          You can see your messages updated automaticaly in the frame on the <a href="{{ route('home') }}">home page</a> which embed the <a href="{{ route('site') }}">messaging website</a>.
        </p>
        <p>
          The documentation is available on <b>Postman</b>.
        </p>
        <p>
          <a class="btn btn-primary" href="https://documenter.getpostman.com/view/12179141/TVK8cLsG#ce827242-706f-4040-ad69-b50e12d088b0" role="button" target="_blank">See the Documentation <i class="fa fa-external-link" aria-hidden="true"></i></a>
        </p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row text-white">
        <div class="col-md-3">
          <h2 class="text-success">GET</h2>
          <p>
            Call the API to get 1 message by its ID or all the messages on the website.
          </p>
          <p><a class="btn btn-secondary" href="{{ url('/#get') }}" role="button">Try it &raquo;</a></p>
        </div>
        <div class="col-md-3">
          <h2 class="text-primary">POST</h2>
          <p>
            Post to add a new message on the website and see it in the response and frame.
          </p>
          <p><a class="btn btn-secondary" href="{{ url('/#post') }}" role="button">Try it &raquo;</a></p>
        </div>
        <div class="col-md-3">
          <h2 class="text-warning">UPDATE</h2>
          <p>
            Edit a message already posted on the website using its ID and see it in the response.
          </p>
          <p><a class="btn btn-secondary" href="{{ url('/#update') }}" role="button">Try it &raquo;</a></p>
        </div>
        <div class="col-md-3">
          <h2 class="text-danger">DELETE</h2>
          <p>
            Delete a message on the website using its ID and see the confirmation response.
          </p>
          <p><a class="btn btn-secondary" href="{{ url('/#delete') }}" role="button">Try it &raquo;</a></p>
        </div>
      </div>

      <hr>

    </div> <!-- /container -->


  </div>
@endsection
