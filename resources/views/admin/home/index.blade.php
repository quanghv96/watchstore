@extends('admin.layout')
	@section('content')
	 <div class="wrapper">
        <div class="widgets">
        	<div class="oneTwo">
				<div class="widget">
					<div class="title">
						<img src="{{ asset('source/bower_components/library/backend/admin/images/icons/dark/money.png') }}" class="titleIcon" />
						<h6>{{ __('Doanh số') }}</h6>
					</div>
					
					<table cellpadding="0" cellspacing="0" width="100%" class="sTable myTable">
						<tbody>
							<tr>
								<td class="fontB blue f13">{{ __('Tổng doanh số') }}</td>
								<td class="textR webStatsLink red" style="width:120px;">
									{{ number_format($money['total_mn']) }} đ
								</td>
							</tr>
						    <tr>
								<td class="fontB blue f13">{{ __('Doanh số tháng trước') }}</td>
								<td class="textR webStatsLink red" style="width:120px;">
									{{ number_format($money['last_month_mn']) }} đ
								</td>
							</tr>
							<tr>
								<td class="fontB blue f13">{{ __('Doanh số tháng này') }}</td>
								<td class="textR webStatsLink red" style="width:120px;">
									{{ number_format($money['month_mn']) }} đ
								</td>
							</tr>
						    <tr>
								<td class="fontB blue f13">{{ __('Doanh số hôm nay') }}</td>
								<td class="textR webStatsLink red" style="width:120px;">
									{{ number_format($money['day_mn']) }} đ</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
            <div class="oneTwo">
                <div class="widget">
                    <div class="title">
                        <img src="{{ asset('source/bower_components/library/backend/admin/images/icons/dark/users.png') }}" class="titleIcon" />
                        <h6>{{ __('Thống kê dữ liệu') }}</h6>
                    </div>
                    <table cellpadding="0" cellspacing="0" width="100%" class="sTable myTable">
                        <tbody>
                        <tr>
                            <td>
                                <div class="left">{{ __('Tổng số đơn đặt hàng') }}</div>
                                <div class="right f11"><a href="{{ route('order.index') }}" target="_blank">{{ __('Chi tiết') }}</a></div>
                            </td>
                            <td class="textC webStatsLink">
                                {{ $data['total_order'] }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="left">{{ __('Tổng số sản phẩm') }}</div>
                                <div class="right f11"><a href="{{ route('product.index') }}" target="_blank">{{ __('Chi tiết') }}</a></div>
                            </td>

                            <td class="textC webStatsLink">
                                {{ $data['total_product'] }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="left">{{ __('Tổng số liên hệ') }}</div>
                                <div class="right f11"><a href="{{ route('contact.index') }}" target="_blank">{{ __('Chi tiết') }}</a></div>
                            </td>

                            <td class="textC webStatsLink">
                                {{ $data['total_contact'] }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="left">{{ __('Tổng số bình luận') }}</div>
                                <div class="right f11"><a href="{{ route('comment.index') }}" target="_blank">{{ __('Chi tiết') }}</a></div>
                            </td>

                            <td class="textC webStatsLink">
                                {{ $data['total_comment'] }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="left">{{ __('Tổng số khách hàng') }}</div>
                                <div class="right f11"><a href="{{ route('customer.index') }}" target="_blank">{{ __('Chi tiết') }}</a></div>
                            </td>

                            <td class="textC webStatsLink">
                                {{ $data['total_user'] }}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="clear"></div>
        </div>
    </div>
	@endsection