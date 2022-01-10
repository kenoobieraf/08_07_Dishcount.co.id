@extends('user.template')
@section('content-core')
<div class="container marketing mt-5">

    <div class="row">
        <div class="col-md-12">
            <div class="carousel slide" id="carousel-530776">
				<ol class="carousel-indicators">
					<li data-slide-to="0" data-target="#carousel-530776">
					</li>
					<li data-slide-to="1" data-target="#carousel-530776" class="active">
					</li>
					<li data-slide-to="2" data-target="#carousel-530776">
					</li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item">
						<img class="d-block w-100" alt="Carousel Bootstrap First" src="https://i.postimg.cc/SRt98PmR/car1.jpg" />
						
					</div>
					<div class="carousel-item active">
						<img class="d-block w-100" alt="Carousel Bootstrap Second" src="https://i.postimg.cc/jd6GTtKr/promo-ramadhan-go-food-extension.jpg" />
						
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" alt="Carousel Bootstrap Third" src="https://i.postimg.cc/wTQvSPCm/1440x700-Blog-Dislat-99-AGS-2021-FINAL.jpg" />
		
					</div>
				</div> <a class="carousel-control-prev" href="#carousel-530776" data-slide="prev"><span class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a> <a class="carousel-control-next" href="#carousel-530776" data-slide="next"><span class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
			</div>
        </div>

    </div>

    <h3>Top Coupons</h3>
    <hr>
    <div class="row mb-2">
        @foreach ($diskon_top_4 as $disc)
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

    <h3>Latest Coupons</h3>
    <hr>
    <div class="row mb-2">
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
