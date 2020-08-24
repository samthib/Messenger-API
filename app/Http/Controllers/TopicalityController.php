<?php

namespace App\Http\Controllers;

use App\Http\Resources\Topicality as ResourcesTopicality;
use App\Topicality;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class TopicalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return ResourcesTopicality::collection(Topicality::orderByDesc('created_at')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'title' => 'required|min:3|max:255',
          'content' => 'required|min:3|max:2000',
          'api_token' => 'required',
      ]);

      if ($validator->fails()) {
        return response()->json([
          'errors' => $validator->errors()->all()
        ]);
      }

      if ($post = Topicality::create($validator->validate())) {
        return response()->json([
          'success' => 'Post created',
          'post' => $post,
        ], 200);
      } else {
        return response()->json([
          'fail' => 'Post not created'
        ], 200);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topicality  $topicality
     * @return \Illuminate\Http\Response
     */
    public function show(Topicality $topicality)
    {
        return new ResourcesTopicality($topicality);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topicality  $topicality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topicality $topicality)
    {
      $validator = Validator::make($request->all(), [
          'title' => 'required|min:3|max:255',
          'content' => 'required|min:3|max:2000',
          'api_token' => 'required',
      ]);

      if ($validator->fails()) {
        return response()->json([
          'errors' => $validator->errors()->all()
        ]);
      }

        if ($topicality->update($validator->validate())) {
          return response()->json([
            'success' => 'Post edited',
            'post' => $topicality
          ], 200);
        } else {
          return response()->json([
            'fail' => 'Post not edited'
          ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topicality  $topicality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topicality $topicality)
    {
        if ($topicality->delete()) {
          return response()->json([
            'success' => 'Post deleted',
            'post' => $topicality
          ], 200);
        } else {
          return response()->json([
            'fail' => 'Post not deleted'
          ], 200);
        }
    }
}
