@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/amazeui.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="admin-content">

            <div class="am-cf am-padding">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> /
                    <small>一些常用模块</small>
                </div>
            </div>

            <ul class="am-avg-sm-1 am-avg-md-4 am-margin am-padding am-text-center admin-content-list ">
                <li><a href="/post_admin" class="am-text-success"><span
                                class="am-icon-btn am-icon-file-text"></span><br/>发帖管理<br/>2300</a></li>
                <li><a href="#" class="am-text-warning"><span
                                class="am-icon-btn am-icon-briefcase"></span><br/>文件上传<br/>308</a></li>
                <li><a href="#" class="am-text-danger"><span class="am-icon-btn am-icon-recycle"></span><br/>昨日访问<br/>80</a>
                </li>
                <li><a href="#user" class="am-text-secondary"><span
                                class="am-icon-btn am-icon-user-md"></span><br/>注册用户<br/>300</a></li>
            </ul>

            <div class="am-g">
                <div class="am-u-sm-12">
                    <table class="am-table am-table-bd am-table-striped admin-content-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>用户名</th>
                            <th>签到积分</th>
                            <th>微信标识</th>
                            <th>管理</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr id="user">
                            @foreach($users as $user)
                                <td>{{$user->user_id}}</td>
                                <td>{{$user->nickname}}</td>
                                <td><span class="am-badge am-badge-success">{{$user->sign_score}}</span></td>
                                <td>{{$user->wechat_identify}}</td>
                                <td>
                                    <a href="/delete_usr/{{$user->user_id}}" type='submit' data-method="delete"
                                       data-token="{{csrf_token()}}" data-confirm="Are you sure?"
                                       class="btn btn-danger">
                                        删除
                                    </a>
                                </td>
                            @endforeach
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="am-g">
                <div class="am-u-md-6">
                    <div class="am-panel am-panel-default">
                        <div class="am-panel-hd am-cf" data-am-collapse="{target: '#collapse-panel-1'}">音乐播放<span
                                    class="am-icon-chevron-down am-fr"></span></div>
                        <div class="am-panel-bd am-collapse am-in" id="collapse-panel-1">
                            <ul class="am-list admin-content-file">
                                <li>
                                    <strong> 文烨真棒.Mp3</strong>
                                    <p>管理员辛苦了，听听音乐放放松</p>
                                </li>
                                <li>
                                    <p>爱在记忆中找你 ——林峯</p>
                                    <audio controls="controls">
                                        <source src="http://www.tingge123.com/mp3/2016-09-28/1474995239.mp3" type="audio/mp3" />
                                    </audio>
                                </li>
                                <li>
                                    <p>后来 ——刘若英</p>
                                    <audio controls="controls">
                                        <source src="http://other.web.ra01.sycdn.kuwo.cn/resource/n2/192/11/54/2132876119.mp3" type="audio/mp3" />
                                    </audio>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="am-panel am-panel-default">
                        <div class="am-panel-hd am-cf" data-am-collapse="{target: '#collapse-panel-2'}"><span
                                    class="am-icon-bookmark"></span> 公告<span
                                    class="am-icon-chevron-down am-fr"></span></div>
                        <div class="am-panel-bd am-in" id="collapse-panel-2">
                            <p>网站忙里抽空三天内写完，定有诸多bug，若对管理平台有什么建议，可以联系我：419766878@qq.com</p>
                            <p>时光静好，与君语；细水流年，与君同 —— 15级潮友林文烨</p>
                            <label>网站Github源码链接：</label>
                            <a href="https://github.com/HCHome/HCHomeAdmin" class="am-icon-btn am-icon-github"></a>
                        </div>
                    </div>
                </div>

                <div class="am-u-md-6">
                    <div class="am-panel am-panel-default">
                        <div class="am-panel-hd am-cf" data-am-collapse="{target: '#collapse-panel-4'}">注册申请<span
                                    class="am-icon-chevron-down am-fr"></span></div>
                        <div id="collapse-panel-4" class="am-panel-bd am-collapse am-in">
                            <ul class="am-list admin-content-task">
                                @foreach($user_applies as $apply)
                                    <li>
                                        <div class="admin-task-meta"> {{$apply->term}}级 申请人：{{$apply->name}}
                                            申请时间：{{$apply->created_at}}</div>
                                        <div class="admin-task-bd">
                                            {{$apply->apply_message}}
                                        </div>
                                        <div class="am-cf">

                                            <div class="am-fr">
                                                <div class="am-btn-group am-btn-group-xs">
                                                    <button type="button" class="am-btn am-btn-default"><span
                                                                class="am-icon-check"></span></button>
                                                    <button type="button" class="am-btn am-btn-default"><span
                                                                class="am-icon-times"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="am-panel am-panel-default">
                        <div class="am-panel-hd am-cf" data-am-collapse="{target: '#collapse-panel-3'}">用户反馈<span
                                    class="am-icon-chevron-down am-fr"></span></div>
                        <div class="am-panel-bd am-collapse am-in am-cf" id="collapse-panel-3">
                            <ul class="am-comments-list admin-content-comment">
                                @foreach($feedback as $back)

                                    <li class="am-comment">
                                        {{--<a href="#"><img--}}
                                        {{--src="http://amui.qiniudn.com/bw-2014-06-19.jpg?imageView/1/w/96/h/96"--}}
                                        {{--alt="" class="am-comment-avatar" width="48" height="48"></a>--}}
                                        <div class="am-comment-main">
                                            <header class="am-comment-hd">
                                                <div class="am-comment-meta"><a href="#"
                                                                                class="am-comment-author">{{$back->user_name}}</a>
                                                    评论于
                                                    <time>{{$back->created_at}}</time>
                                                </div>
                                            </header>
                                            <div class="am-comment-bd"><p>{{$back->content}}</p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                            <ul class="am-pagination am-fr admin-content-pagination">
                                <li class="am-disabled"><a href="#">&laquo;</a></li>
                                <li class="am-active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!--[if (gte IE 9)|!(IE)]><!-->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/amazeui.min.js"></script>
@endsection