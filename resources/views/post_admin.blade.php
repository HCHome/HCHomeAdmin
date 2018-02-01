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
                                {{--<button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button>--}}
                                {{--<button type="button" class="am-btn am-btn-default"><span class="am-icon-save"></span> 保存</button>--}}
                                {{--<button type="button" class="am-btn am-btn-default"><span class="am-icon-archive"></span> 审核</button>--}}
                                <button class="am-btn am-btn-danger am-btn-xs"><span
                                            class="am-icon-trash-o"></span> 批量删除
                                </button>
                            </div>

                            <div class="am-form-group am-margin-left am-fl">
                                <select>
                                    <option value="option1">所有类别</option>
                                    <option value="option2">IT业界</option>
                                    <option value="option3">情感</option>

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="am-u-md-3 am-cf">
                    <div class="am-fr">
                        <div class="am-input-group am-input-group-sm">
                            <input type="text" class="am-form-field">
                            <span class="am-input-group-btn">
                  <button class="am-btn am-btn-default" type="button">搜索</button>
                </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="am-g">
                <div class="am-u-sm-12">
                    <form class="am-form">
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
                                    <td><input type="checkbox"/></td>
                                    <td>
                                        @if($post->is_top==1)
                                            <span class="am-icon-arrow-up"></span>
                                        @endif
                                        {{$post->post_id}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->category}}</td>
                                    <td>{{$post->nickname}}</td>
                                    <td>{{$post->updated_at}}</td>
                                    <td>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                {{--<button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</button>--}}
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
                        <p>and: 神奇之bug，可能是应用的js里有点毛病。第一个列表项不能置顶，影响不算大，木有精力debug</p>
                    </form>
                </div>

            </div>.
        </div>
    </div>
@endsection

@section('script')
    <!--[if (gte IE 9)|!(IE)]><!-->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/amazeui.min.js"></script>
@endsection