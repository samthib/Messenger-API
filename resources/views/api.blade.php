@extends('layouts.master')

@section('content')
  <div class="container-fluid">
    <div class="row text-white">

      <div class="col-lg-6 order-lg-2 min-vh-100">
        <h2>Messenger Website <small><a href="{{ route('site') }}" target="_blank"><i class="fa fa-external-link" aria-hidden="true"></i></a></small></h2>
        <iframe id="site-frame" src="{{ url('site') }}" class="w-100 h-75 rounded overflow-auto shadow"></iframe>
      </div>

      <div class="col-lg-6 order-lg-1">
        <h2>API Calls</h2>
        @guest
          <h3 class="text-danger">Register to get your token</h3>
        @endguest
        @auth
          <h5>Your token:</h5>
          <textarea class="form-control my-2 text-danger" name="post-response" rows="2" cols="80" readonly>{{ Auth::user()->api_token }}</textarea>
        @endauth


        <form id="get-form" class="mt-3">
          <fieldset class="form-group">
            <h6><b><span class="text-success">GET</span> Post</b></h6>
            <div class="mt-1">
              Ex<strong>(1 post)</strong>: {{ url('api/topicality').'/' }}<span class="text-danger">{post-ID}</span>?api_token=<span class="text-danger">{user-token}</span>
              <br>
              Ex<strong>(all posts)</strong>: {{ url('api/topicality') }}?api_token=<span class="text-danger">{user-token}</span>
            </div>
            @auth
              <input type="text" id="get-input" name="url" class="form-control mt-1" value="{{ url('api/topicality').'/1?api_token='.Auth::user()->api_token }}">
              <button type="submit" class="btn btn-primary shadow mt-1">Submit</button>
            @endauth
            <pre><code class="json border rounded text-left frame mt-1" id="get-frame" style="height:150px;">{"API" : "Response ..."} @guest {{ 'Login first' }} @endguest</code></pre>
          </fieldset>
          </form>

          <form id="post-form" class="mt-3">
            <fieldset class="form-group">
              <h6><b><span class="text-primary">POST</span> Post</b></h6>
              <div class="mt-1">
                Ex: {{ url('api/topicality') }}?api_token=<span class="text-danger">{user-token}</span>
              </div>
              @auth
                <input type="text" id="post-input" name="url" class="form-control mt-1" value="{{ url('api/topicality').'?api_token='.Auth::user()->api_token }}">
                <input type="text" id="post-input-title" name="title" class="form-control mt-1" placeholder="Title ...">
                <textarea id="post-input-content" name="content" class="form-control mt-1" rows="4" cols="80" placeholder="Content ..."></textarea>
                <button type="submit" class="btn btn-primary shadow mt-1">Submit</button>
              @endauth
              <pre><code class="json border rounded text-left frame mt-1" id="post-frame" style="height:150px;">{"API" : "Response ..."} @guest {{ 'Login first' }} @endguest</code></pre>
            </fieldset>
            </form>

            <form id="update-form" class="mt-3">
              <fieldset class="form-group">
                <h6><b><span class="text-warning">UPDATE</span> Post</b></h6>
                <div class="my-1">
                  Ex: {{ url('api/topicality').'/' }}<span class="text-danger">{post-ID}</span>?api_token=<span class="text-danger">{user-token}</span>
                </div>
                @auth
                  <input type="text" id="update-input" name="url" class="form-control mt-1" value="{{ url('api/topicality').'/1?api_token='.Auth::user()->api_token }}">
                  <input type="text" id="update-input-title" name="title" class="form-control mt-1" placeholder="Title ...">
                  <textarea id="update-input-content" name="content" class="form-control mt-1" rows="4" cols="80" placeholder="Content ..."></textarea>
                  <button type="submit" class="btn btn-primary shadow mt-1">Submit</button>
                @endauth
                <pre><code class="json border rounded text-left frame mt-1" id="update-frame" style="height:150px;">{"API" : "Response ..."} @guest {{ 'Login first' }} @endguest</code></pre>
              </fieldset>
              </form>

              <form id="delete-form" class="mt-3">
                <fieldset class="form-group">
                  <h6><b><span class="text-danger">DELETE</span> Post</b></h6>
                  <div class="my-1">
                    Ex: {{ url('api/topicality').'/' }}<span class="text-danger">{post-ID}</span>?api_token=<span class="text-danger">{user-token}</span>
                  </div>
                  @auth
                    <input type="text" id="delete-input" name="url" class="form-control mt-1" value="{{ url('api/topicality').'/1?api_token='.Auth::user()->api_token }}">
                    <button type="submit" class="btn btn-primary shadow mt-1">Submit</button>
                  @endauth
                  <pre><code class="json border rounded text-left frame mt-1" id="delete-frame" style="height:150px;">{"API" : "Response ..."} @guest {{ 'Login first' }} @endguest</code></pre>
                </fieldset>
                </form>
              </div>

            </div>
          </div>
        @endsection