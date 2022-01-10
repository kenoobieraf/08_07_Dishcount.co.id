@extends('user.template')
@section('content-core')
<div class="container-fluid marketing p-5 pt-0">

    <ol class="breadcrumb">
        @if($kategori!=null && $kategori=='top')
        <li class="breadcrumb-item">Top Diskon</li>
        @elseif($kategori!=null && $kategori=='search')
        <li class="breadcrumb-item">Search</li>
        @elseif($kategori!=null && $kategori=='lokasi')
        <li class="breadcrumb-item">Sesuai Lokasi Anda</li>
        @elseif($kategori!=null)
        <li class="breadcrumb-item">{{ $kategori->nama_kategori }}</li>
        @endif
        <li class="breadcrumb-item active" aria-current="page">Diskon</li>
    </ol>

    <div class="row mb-2">
        @if($kategori!=null && $kategori=='lokasi')
            @auth
            <div class="col-md-12 mb-3 mt-3">
                <h5><i class="fas fa-map-marker-alt"></i> {{ auth()->user()->membership->kota??'Belum setel lokasi (silahkan atur pada halaman profil)' }}</h5>
            </div>
            @endauth
        @endif
        @if(!$diskon->isNotEmpty())
        <div class="col-md-12">
            <div class="alert alert-warning" role="alert">
                Data tidak ditemukan!
            </div>
        </div>

        @endif
        @foreach ($diskon as $disc)
        <div class="col-md-3">
            <div class="card mb-4">
                <img class="card-img-top" src="{{ url(Storage::url($disc->gambar_diskon)) }}" alt="Card image cap">
                <div class="card-body">
                    <p class="font-weight-bold text-primary">{{ $disc->kategori->nama_kategori }}</p>
                    <h3 class="mb-2">
                        <a class="text-dark" href="/diskon/detail_diskon/{{ $disc->id_diskon }}">{{ $disc->nama_diskon }}</a>
                    </h3>
                    <div class="mb-1 text-muted"> Promo hanya berlaku di
                        @if($disc->lokasi->isNotEmpty())
                            @foreach ($disc->lokasi as $lokasi)
                                {{ $lokasi->nama_kota }}{{ $loop->last?'.':',' }}
                            @endforeach
                        @else
                            (tidak tersedia)
                        @endif
                    </div>
                    <a href="/diskon/detail_diskon/{{ $disc->id_diskon }}">Baca lebih lanjut...</a><br>
                    @auth
                        @if (auth()->user()->membership->klaim_diskon->where('id_diskon',$disc->id_diskon)->first()!=null)
                            <button class="btn btn-sm btn-secondary mt-2" disabled><i class="fas fa-check"></i> Sudah Di Klaim</button>
                        @else
                            <form action="/pakai_diskon" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="id_diskon" value="{{ $disc->id_diskon }}">
                                <input type="hidden" name="id_membership" value="{{ auth()->user()->membership->id_membership }}">
                                <input type="submit" value="Pakai" class="btn btn-sm btn-outline-info mt-2">
                            </form>
                        @endif
                    @endauth

                    @guest
                        <a href="/login" class="btn btn-sm btn-outline-info mt-2">Pakai</a>
                    @endguest
                </div>
                {{-- <img class="card-img-right flex-auto d-none d-md-block img"  alt="Card image cap" height="200px" width="auto"> --}}
            </div>
        </div>
        @endforeach
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->



</div><!-- /.container -->
@endsection
