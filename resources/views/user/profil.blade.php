@extends('user.template')
@section('content-core')
<div class="container-fluid marketing p-5 pt-0">
    @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        <div class="col-md-7 blog-main text-right">
            <dl>
                <dt>
                    <i class="fa fa-user fa-fw"></i> Nama Lengkap
                </dt>
                <dd>
                    {{ $member->nama_lengkap }} </dd><br>
                <dt>
                    <i class="fa fa-envelope fa-fw"></i> Email
                </dt>
                <dd>
                    {{ $user->email }} </dd><br>
                <dt>
                    <i class="fa fa-phone fa-fw"></i> No. Telp
                </dt>
                <dd>
                    {{ $member->no_telp }} </dd><br>
                <dt>
                    <i class="fas fa-map-marker-alt"></i> Alamat
                </dt>
                <dd>
                    {{ $member->alamat??'-' }} </dd><br>
                <dt>
                    <i class="fas fa-city"></i> Kota / Kabupaten
                </dt>
                <dd>
                    {{ $member->kota??'-' }} </dd>
                <dd>
                    <a id="modal-990160" href="#modal-container-99017017" role="button" data-toggle="modal">Edit</a>
                    <div class="modal fade text-left" id="modal-container-99017017" role="dialog"
                        aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel">
                                        Edit Data User
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/user/edit">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id_level" value="{{ $user->id_level }}">
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama_lengkap" value="{{ $member->nama_lengkap }}" />
                                            <input type="hidden" name="id_membership" value="{{ $member->id_membership }}">
                                            <input type="hidden" class="form-control" name="id" value="{{ $user->id }}" />
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ $user->email }}" />
                                        </div>
                                        <div class="form-group">
                                            <label>No. Telp</label>
                                            <input type="text" class="form-control" name="no_telp" value="{{ $member->no_telp }}" />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Kota / Kabupaten</label>
                                            <label for="Kota"></label>
                                            <select name="kota" id="" class="custom-select pilihKota" required>
                                                <option value="">Pilih Kota</option>
                                                @foreach ($kota as $city)
                                                    <option value="{{ $city }}"
                                                    @if($member->kota==$city) selected @endif>{{ $city }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <textarea name="alamat" class="form-control" rows="5">{{ $member->alamat??'-' }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="form-control btn btn-primary" />
                                        </div>

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>

                        </div>

                    </div>
                </dd>
            </dl>
        </div><!-- /.blog-main -->
        <div class="col-md-1">
            <div class="vl"></div>
        </div>
        <aside class="col-md-4 blog-sidebar">
            <div class="p-3 mb-3 bg-light rounded">
                <div class="text-center">
                    <img src="{{ asset('assets/img/male-user.png') }}" class="img img-responsive" height="200px" width="auto">
                </div><br>


                <p class="mb-0 text-center"><em>{{ $user->name }}</em></p>
            </div>


        </aside><!-- /.blog-sidebar -->

    </div><!-- /.row -->

    <hr>

    <div class="row mb-2">
        <div class="col-md-12">
            <h2 class="text-center">Riwayat Klaim Diskon</h2><br>
            @if($klaim_diskon->isNotEmpty())
                <div class="row mb-2">
                    @foreach ($klaim_diskon as $disc)
                    <div class="col-md-3">
                        <div class="card mb-4">
                            <img class="card-img-top" src="{{ url(Storage::url($disc->diskon->gambar_diskon)) }}" alt="Card image cap">
                            <div class="card-body">
                                <p class="font-weight-bold text-primary">{{ $disc->diskon->kategori->nama_kategori }}</p>
                                <h3 class="mb-2">
                                    <a class="text-dark" href="/diskon/detail_diskon/{{ $disc->diskon->id_diskon }}">{{ $disc->diskon->nama_diskon }}</a>
                                </h3>
                                <div class="mb-1 text-muted"> Promo hanya berlaku di
                                    @if($disc->diskon->lokasi->isNotEmpty())
                                        @foreach ($disc->diskon->lokasi as $lokasi)
                                            {{ $lokasi->nama_kota }}{{ $loop->last?'.':',' }}
                                        @endforeach
                                    @else
                                        (tidak tersedia)
                                    @endif
                                </div>
                                <button class="btn btn-sm btn-secondary mb-2" disabled><i class="fas fa-check"></i> Sudah Di Klaim</button><br>
                                @if($disc->diskon->review->where('id_membership',auth()->user()->membership->id_membership)->isNotEmpty())
                                    <div class="card card-body">
                                        <strong>Ulasan Anda:</strong>
                                        <span><i>{{ $disc->diskon->review->where('id_membership',auth()->user()->membership->id_membership)->first()->isi_review }}</i></span>
                                    </div>
                                @else
                                    <a class="" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Berikan Ulasan
                                    </a><br>
                                    <div class="collapse mt-3" id="collapseExample">
                                        <div class="card card-body">
                                            <form action="/review_diskon" method="POST">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id_diskon" value="{{ $disc->diskon->id_diskon }}">
                                                <input type="hidden" name="id_membership" value="{{ auth()->user()->membership->id_membership }}">
                                                <div class="form-group">
                                                    <label for="">Isi Ulasan:</label>
                                                    <textarea name="isi_review" class="form-control" rows="5" placeholder="Isi ulasan..." required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-sm btn-info float-right" value="Submit">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
            Data kosong!
            <button class="btn btn-sm btn-info" disabled><i class="fas fa-check"></i> Sudah Di Klaim</button>

            @endif
        </div>

    </div>

    <hr>

    <br>
</div>
<hr>

<!-- /END THE FEATURETTES -->



</div><!-- /.container -->
<script>
    (function(){
        var rating = document.querySelector('.rating');
        var handle = document.getElementById('toggle-rating');
        handle.onchange = function(event) {
            rating.classList.toggle('rating', handle.checked);
        };
    }());
</script>
@endsection
