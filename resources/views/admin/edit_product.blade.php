@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Sửa sản phẩm
                </header>
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-alert">' . $message . '</span>';
                    Session::put('message', null);
                }
                ?>
                <div class="panel-body">
                    <div class="position-center">
                        @foreach ($edit_product as $key => $pro)
                            <form role="form" action="{{ URL::to('/update-product/'.$pro->product_id) }}" method="post"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" class="form-control" onkeyup="ChangeToSlug();" name="product_name"
                                        id="slug" value="{{ $pro->product_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" name="slug_product" class="form-control" id="convert_slug"
                                        placeholder="Tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" class="form-control" onkeyup="ChangeToSlug();"
                                        name="product_price" id="slug" value="{{ $pro->product_price }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputPassword1">
                                    <img src="{{ URL::to('public/uploads/product/' . $pro->product_image) }}" height="100" width="100">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="product_desc" id="exampleInputPassword1">{{ $pro->product_desc }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="product_content" id="exampleInputPassword1">{{ $pro->product_content }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Từ khóa sản phẩm</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="product_keywords" id="exampleInputPassword1"
                                        placeholder="Mô tả sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="product_status" class="form-control input-sm m-bot15">
                                        <option value="1">Hiển thị</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                      <select name="product_cate" class="form-control input-sm m-bot15">
                                        @foreach($cate_product as $key => $cate)
                                            @if($cate->category_id==$pro->category_id)
                                            <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @else
                                            <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @endif
                                        @endforeach
                                            
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thương hiệu</label>
                                      <select name="product_brand" class="form-control input-sm m-bot15">
                                        @foreach($brand_product as $key => $brand)
                                             @if($cate->category_id==$pro->category_id)
                                            <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                             @else
                                            <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                             @endif
                                        @endforeach
                                            
                                    </select>
                                </div>
                        @endforeach
                        <button type="submit" name="add_product" class="btn btn-info">Sửa sản phẩm</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    @endsection
