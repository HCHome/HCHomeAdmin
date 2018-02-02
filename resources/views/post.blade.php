@extends('layouts.app')
@section('css')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/amazeui.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="col-md-10 content-left single-post">
            <h3 class="post">{{$post->title}}</h3>
            <div class="last-article">
                <ul class="categories">
                    <li><a href="#">{{$post->category}}</a></li>
                </ul>
                <div class="container">
                    <p class="artext">{{$post->text}}</p>
                    <div class="clearfix"></div>
                    <!--related-posts-->
                    <div class="row related-posts">
                        @foreach($post_pictures as $picture)
                            @if($picture!=null)
                                <div class="col-xs-6 col-md-2 related-grids">
                                    <div class="thumbnail">
                                        <img src={{$picture->url}} alt=""/>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <!--//related-posts-->

                <div class="response">
                    <h4>评论</h4>
                    @foreach($replies as $reply)
                        <div class="media response-info">
                            <div class="media-left response-text-left">
                                <img class="media-object" src={{$reply->avatar}} alt=""/>
                                <h5>陈正帆</h5>
                            </div>
                            <div class="media-body response-text-right">
                                <p>{{$reply->floor}}楼
                                    @if($reply->replied_floor!=0)
                                        回复{{$reply->replied_floor}}楼
                                    @endif
                                </p>

                                <p>{{$reply->text}}</p>
                                <ul>
                                    <li>{{$reply->created_at}}</li>
                                    {{--<li>--}}
                                    <a href="/delete_reply/{{$post->post_id}}/{{$reply->reply_id}}" type='submit'
                                       data-method="delete" data-token="{{csrf_token()}}" data-confirm="三思而后行~覆水难收"
                                       class="am-btn am-btn-danger am-btn-xs">
                                        <span class="am-icon-trash-o"></span>删除
                                    </a>
                                    {{--</li>--}}
                                </ul>

                            </div>
                            <div class="clearfix"></div>
                        </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
@endsection