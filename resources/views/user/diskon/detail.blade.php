@extends('user.template')
@section('content-core')
<div class="container-fluid marketing p-5 pt-0">

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/diskon/list_diskon">Diskon</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $diskon->nama_diskon }}</li>
    </ol>

    <div class="row p-3">
        <div class="col-md-8 blog-main">

            <div class="blog-post">
                <h2 class="blog-post-title">{{ $diskon->nama_diskon }}</h2>
                <p class="blog-post-meta">{{ $diskon->created_at }}</p>
                <div class="mb-1 text-muted"> Promo hanya berlaku di
                    @if($diskon->lokasi->isNotEmpty())
                        @foreach ($diskon->lokasi as $lokasi)
                            {{ $lokasi->nama_kota }}{{ $loop->last?'.':',' }}
                        @endforeach
                    @else
                        (tidak tersedia)
                    @endif
                </div>
                <hr>
                <img src="{{ url(Storage::url($diskon->gambar_diskon)) }}"
                    class="img img-responsive text-center" height="auto" width="800px" id="img_02">
                <div class="mt-3">
                    {!! $diskon->deskripsi !!}
                </div>
                <br><hr>
                <h5 class="mt-4"><strong>Ulasan : </strong></h5>
                @if(!$diskon->review->isNotEmpty())
                    <strong><i>Belum ada ulasan.</i></strong>
                @endif
                @foreach ($diskon->review as $review)
                <div class="row mb-3">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <strong>
                                    <h5>{{ $review->membership->nama_lengkap }}</h5>
                                </strong>
                                <div class="mb-2">
                                    <span class="text-muted">{{ $review->created_at->translatedFormat('l, d F Y H:i') }}</span>
                                </div>
                                <span class="font-italic font-weight-bold">
                                    {{ $review->isi_review }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div><!-- /.blog-post -->

        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
            <div class="p-3 mb-3 bg-light rounded">
                @auth
                    @if (auth()->user()->membership->klaim_diskon->where('id_diskon',$diskon->id_diskon)->first()!=null)
                        <button class="btn btn-lg btn-secondary mt-2" disabled><i class="fas fa-check"></i> Sudah Di Klaim</button>
                    @else
                        <form action="/pakai_diskon" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id_diskon" value="{{ $diskon->id_diskon }}">
                            <input type="hidden" name="id_membership" value="{{ auth()->user()->membership->id_membership }}">
                            <input type="submit" value="Pakai" class="btn btn-lg btn-outline-info mt-2">
                        </form>
                    @endif
                @endauth

                @guest
                    <a href="/login" class="btn btn-lg btn-outline-info">Pakai</a>
                @endguest
            </div>


            <div class="card">

                <h5 class="card-header">
                    Diskon Terbaru
                </h5>
                @foreach($diskon_top_4 as $disc)
                <div class="card-footer">
                    <img class="img rounded float-left mr-3" src="{{ url(Storage::url($disc->gambar_diskon)) }}" alt="Card image cap" height="50px" width="auto">
                    <a href="/diskon/detail_diskon/{{ $disc->id_diskon }}">
                        <p class="text-muted">
                            {{ $disc->nama_diskon }} </p>
                    </a>
                </div>
                @endforeach
            </div>
        </aside><!-- /.blog-sidebar -->

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->



    </div><!-- /.container -->
    @endsection
