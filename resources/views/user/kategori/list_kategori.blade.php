@extends('user.template')
@section('content-core')
<div class="container-fluid marketing p-5 pt-0">

    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">List Kategori</li>
    </ol>

    <div class="row mb-2">
        @foreach ($kategori_diskon as $kat)
        <div class="col-xl-3 col-md-6">
            <div class="card bg-light mb-4">
                <div class="card-body">&nbsp<strong>{{ $kat->nama_kategori }}</strong></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small stretched-link" href="/diskon/list_diskon/{{ $kat->id_kategori_diskon }}">Lihat Daftar Diskon</a>
                    <div class="small"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->



</div><!-- /.container -->
@endsection
