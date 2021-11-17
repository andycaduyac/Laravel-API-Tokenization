<!-- Product Name Field -->
<div class="col-sm-12">
    {!! Form::label('product_name', 'Product Name:') !!}
    <p>{{ $products->product_name }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $products->description }}</p>
</div>

<!-- Price Field -->
<div class="col-sm-12">
    {!! Form::label('price', 'Price:') !!}
    <p>{{ $products->price }}</p>
</div>

