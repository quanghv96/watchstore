@extends('admin.layout')
@section('content')
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>{{ __('Bình luận Mã ') }} {{ $comment->id }}</h5>
                <div class="clear"></div>
                <span>{{ __('Nội dung bình luận') }}</span>
                <div>{!! Form::textarea('content', $comment->content, ['disabled', 'id' => 'content']) !!}</div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="line"></div>
    <!-- Message -->
    <!-- Main content wrapper -->
    <div class="wrapper" id="main_product">
        <div class="widget">
            <div class="title">
                <span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
                <h6>
                <h6>
                    {{ __('Danh sách reply') }}
                </h6>
                <div class="num f12">{{ trans('common.title.sl') }} <b id="total">{{ count($comment->replies) }}</b></div>
            </div>
            @if(isset($comment) && count($comment->replies) > 0)
                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
                    <thead>
                    <tr>
                        <td><img src="{{ asset('source/bower_components/library/backend/admin/images/icons/tableArrows.png') }}" /></td>
                        <td>{{ __('Mã số') }}</td>
                        <td>{{ __('Tên khách hàng') }}</td>
                        <td>{{ __('Tên sản phẩm') }}</td>
                        <td>{{ __('Nội dung') }}</td>
                        <td>{{ __('Ngày tạo') }}</td>
                    </tr>
                    </thead>
                    <tbody class="list_item">
                    @foreach($comment->replies as $row)
                        <tr class='row_{{ $row->id }}'>
                            <td>{!! Form::checkbox('id[]', $row->id, false, ['class' => 'check-del']) !!}</td>
                            <td class="textC">{{ $row->id }}</td>
                            <td class="textC">{{ $row->user->name }}</td>
                            <td class="textC">{{ $row->product->name }}</td>
                            <td class="textC">{{ $row->content }}</td>
                            <td class="textC">{{ $row->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="list_action itemActions">
                    <a href="{{ route('comment.delMulRep')}}" id="delMul" class="button blueB reply-del">
                        <span>{{ __('Xóa') }}</span>
                    </a>
                    <a style="margin-left: 25px" href="{{ route('comment.index') }}" class="button basic">
                        <span>{{ __('Quay lại') }}</span>
                    </a>
                </div>
            @else
                <h5 class="eror">{{ __('Không có reply nào') }}</h5>
            @endif
        </div>
    </div>
    <div class="clear mt30"></div>
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/js/add-ckeditor.js') }}" type="text/javascript"></script>
@endsection