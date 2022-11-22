@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Sửa thương hiệu sản phẩm
                </header>
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-alert">' . $message . '</span>';
                    Session::put('message', null);
                }
                ?>
                <div class="panel-body">
                    @foreach ($edit_brand_product as $key => $edit_value)
                        <div class="position-center">
                            <form role="form" action="{{ URL::to('/update-brand-product/'.$edit_value->brand_id) }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="text" class="form-control" onkeyup="ChangeToSlug();"
                                        name="brand_product_name" id="slug" value="{{$edit_value->brand_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" name="slug_brand_product" class="form-control"
                                        id="convert_slug" value="{{$edit_value->brand_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="brand_product_desc"
                                        id="exampleInputPassword1">{{$edit_value->brand_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Từ khóa thương hiệu</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="brand_product_keywords"
                                        id="exampleInputPassword1" placeholder="Mô tả thương hiệu"></textarea>
                                </div> 
                    @endforeach
                    <button type="submit" name="add_brand_product" class="btn btn-info">Cập nhập thương hiệu</button>
                    </form>
                </div>

        </div>
        </section>

    </div>
@endsection
