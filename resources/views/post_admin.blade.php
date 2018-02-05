@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/amazeui.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="admin-content">

            <div class="am-cf am-padding">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">帖子管理</strong> /
                    <small>Post admin</small>
                </div>
            </div>

            <div class="am-g">
                <div class="am-u-md-6 am-cf">
                    <div class="am-fl am-cf">
                        <div class="am-btn-toolbar am-fl">
                            <div class="am-btn-group am-btn-group-xs">
                                <button class="am-btn am-btn-danger am-btn-xs"><span
                                            class="am-icon-trash-o"></span> 批量删除
                                </button>
                            </div>

                            <div class="am-form-group am-margin-left am-fl">
                                <select>
                                    <option value="option1">所有类别</option>
                                    <option value="option2">IT</option>
                                    <option value="option3">情感</option>

                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="am-u-md-3 am-cf">
                    <div class="am-fr">
                        <form method="post" action="/search_post">
                            {{ csrf_field() }}
                            <div class="am-input-group am-input-group-sm">
                                <input type="text" class="am-form-field" name="search_title">
                                <span class="am-input-group-btn"><button
                                            class="am-btn am-btn-default">搜索</button></span>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <div class="am-g">
                <div class="am-u-sm-12">
                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>
                                <th class="table-check"></th>
                                <th class="table-id">ID</th>
                                <th class="table-title">标题</th>
                                <th class="table-type">类别</th>
                                <th class="table-author">作者</th>
                                <th class="table-date">修改日期</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td><label><input type="checkbox"/></label></td>
                                    <td>
                                        @if($post->is_top==1)
                                            <span class="am-icon-arrow-up"></span>
                                        @endif
                                        {{$post->post_id}}</td>
                                    <td><a href="/post/{{$post->post_id}}"> {{$post->title}}</a></td>
                                    <td>{{$post->category}}</td>
                                    <td>{{$post->nickname}}</td>
                                    <td>{{$post->updated_at}}</td>
                                    <td>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <form method="post" action="/post_up/{{$post->post_id}}"
                                                      class="btn-group">
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="am-btn am-btn-default am-btn-xs">
                                                        <span class="am-icon-arrow-up"></span> 置顶
                                                    </button>
                                                </form>
                                                <form method="post" action="/post_down/{{$post->post_id}}"
                                                      class="btn-group">
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="am-btn am-btn-default am-btn-xs"><span
                                                                class="am-icon-arrow-down"></span> 取消置顶
                                                    </button>
                                                </form>
                                                <form class="btn-group">
                                                    <a href="/delete_post/{{$post->post_id}}" type='submit'
                                                       data-method="delete"
                                                       data-token="{{csrf_token()}}" data-confirm="三思而后行~覆水难收"
                                                       class="am-btn am-btn-danger am-btn-xs">
                                                        <span class="am-icon-trash-o"></span>删除
                                                    </a>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="am-cf">
                            共 15 条记录
                            <div class="am-fr">
                                <ul class="am-pagination">
                                    <li class="am-disabled"><a href="#">«</a></li>
                                    <li class="am-active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">»</a></li>
                                </ul>
                            </div>
                        </div>
                        <hr/>
                        <p>注：别瞎删哦，考虑每个人的话语权~~求同存异</p>
                </div>

            </div>
        </div>
    </div>

    <form id="create_topic" class="white_content" method="POST" action="/article_create">
        {{ csrf_field() }}

        <div class="container" style="top: 5em;">
            <h3 style="alignment: center;margin-top: 1em">
                发表帖子
            </h3>
            <hr>
            <div class="form-group">
                <label for="title">标题</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="title" placeholder="取个喜欢的名字" required>
            </div>
            <div class="form-group">
                <label for="url">内容</label>
                <textarea class="form-control" id="formGroupExampleInput2" name="description" placeholder="描述活动详情"
                          required></textarea>
            </div>

            <button type="submit" class="btn btn-light" style="float:right;margin-right: 1em;margin-top: 1.5em">提交</button>

        </div>

    </form>
@endsection

@section('script')
    <script src="/js/jquery.min.js"></script>
    <script src="/js/amazeui.min.js"></script>
@endsection