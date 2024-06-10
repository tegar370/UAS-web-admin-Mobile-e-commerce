@extends('template.index')

@section('content')

<style>
    #bulan-filter {
        max-width: 200px;
    }
</style>

<div class="container">
    <h3 class="text-center text-secondary">DATA BALITA
    </h3>
    @if ($messege = Session::get('success_delete'))
    <div class="alert alert-danger alert-dismissible " role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif ($messege= Session::get('success_add'))
    <div class="alert alert-success alert-dismissible " role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif ($messege= Session::get('failed_add'))
    <div class="alert alert-danger alert-dismissible " role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif ($messege= Session::get('success_edit'))
    <div class="alert alert-warning alert-dismissible text-white" role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif ($messege= Session::get('success_delete'))
    <div class="alert alert-danger alert-dismissible text-white" role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title text-white">Ubah Data Product</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="/product/edit">
            @csrf
            @foreach ($data_product as $dtp)
            <input type="hidden" name="id" value="{{$dtp->id}}">


            <div class="card-body">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input value="{{$dtp->name}}" type="text" class="form-control" name="name" id="name" placeholder="Masukkan name">
                </div>

                <div class="form-group">
                    <label for="image_url">Image</label>
                    <input type="file" class="form-control" name="image_url" id="image_url" placeholder="Masukkan Image">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control">{{$dtp->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input value="{{$dtp->price}}" type="number" class="form-control" name="price" id="price" placeholder="Masukkan price">
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input value="{{$dtp->stock}}" type="number" class="form-control" name="stock" id="stock" placeholder="Masukkan stock">
                </div>




            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-warning text-white">Ubah Data</button>
            </div>
            @endforeach
        </form>
    </div>

</div>
<script>
    var bulanArray = [
        "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember"
    ];

    const getSelectBulan = document.getElementById("bulan")
    bulanArray.map((data) => {
        getSelectBulan.innerHTML += `<option value="${data}">${data}</option>`
    })
</script>


</div>
@endsection