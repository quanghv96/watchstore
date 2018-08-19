@if (Session::has('message1'))
    <div class="alert alert-danger">
        {{ Session::get('message1') }}
    </div>
    <h3>Danh sách các sản phẩm trong giỏ hàng của bạn hiện không tồn tại</h3>
    <div class="cart-page-area">
          <div class="table-responsive">
            <table class="shop-cart-table">
              <thead>
                <tr>
                  <th class="product-thumbnail ">Image</th>
                  <th class="product-name ">Product Name</th>
                  <th class="product-unitprice ">Unit Price</th>
                </tr>
              </thead>
              <tbody>
                @foreach(Cart::instance("error" . Auth::user()->id)->content() as $row)
                <tr class="cart_item row-{{ $row->id }}">
                  <td class="item-img"><a href="#"><img src="{{ url(config('app.imageUrl')) }}/{{ $row->options->avatar }}" alt="Product tilte is here "> </a></td>
                  <td class="item-title"><a href="{{ route('product.view', ['id' => $row->id]) }}">{{ $row->name }}</a></td>
                  <td class="item-price">{{ number_format($row->price, null, null, ".") }} đ</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
    </div>
@endif