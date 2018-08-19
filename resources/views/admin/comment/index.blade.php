@extends('admin.layout')
@section('content')
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>{{ __('Bình luận') }}</h5>
                <span>{{ __('Quản lý Bình luận') }}</span>
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
                    {{ __('Danh sách comment') }}
                </h6>
                <div class="num f12">{{ trans('common.title.sl') }} <b id="total">{{ count($comment) }}</b></div>
            </div>
            @if(isset($comment) && count($comment)>0)
                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
                    <thead>
                    <tr>
                        <td><img src="{{ asset('source/bower_components/library/backend/admin/images/icons/tableArrows.png') }}" /></td>
                        <td>{{ __('Mã số') }}</td>
                        <td>{{ __('Mã khách hàng') }}</td>
                        <td>{{ __('Tên khách hàng') }}</td>
                        <td>{{ __('Tên sản phẩm') }}</td>
                        <td>{{ __('Nội dung') }}</td>
                        <td>{{ __('Ngày tạo') }}</td>
                        <td>{{ __('Hành động') }}</td>
                    </tr>
                    </thead>
                    <tbody class="list_item">
                    @foreach($comment as $row)
                        <tr class='row_{{ $row->id }}'>
                            <td>{!! Form::checkbox('id[]', $row->id, false, ['class' => 'check-del']) !!}</td>
                            <td class="textC">{{ $row->id }}</td>
                            <td class="textC">{{ $row->user->id }}</td>
                            <td class="textC">{{ $row->user->name }}</td>
                            <td class="textC">{{ $row->product->name }}</td>
                            <td class="textC">{{ $row->content }}</td>
                            <td class="textC">{{ $row->created_at }}</td>
                            <td class="textC">
                                <a href="{{ route('comment.view', ['id' => $row->id]) }}" title="Xem chi tiết" class="tipS">
                                    <img src="{{ asset('source/bower_components/library/backend/admin/images/icons/color/view.png') }}" />
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="list_action itemActions">
                    <a href="{{ route('comment.delMulCom')}}" id="delMul" class="button blueB">
                        <span>{{ __('Xóa') }}</span>
                    </a>
                </div>
            @else
                <h5 class="eror">{{ __('Không có bình luận nào') }}</h5>
            @endif
        </div>
    </div>
    <div class="clear mt30"></div>
@endsection
