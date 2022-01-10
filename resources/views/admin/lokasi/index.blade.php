@extends('admin.template')
@section('content-core')
<main>
    <div class="container-fluid">
        <h3 class="mt-4">Lokasi Diskon</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/diskon">Diskon</a></li>
            <li class="breadcrumb-item">{{ $diskon->nama_diskon }}</li>
            <li class="breadcrumb-item active">Lokasi</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Data Lokasi Diskon
            </div>
            <div class="card-body">
                <div class="row">
                </div>

                <h4>Nama Diskon : {{ $diskon->nama_diskon }}</h4>
                {{-- Form Tambah Data  --}}
                <a href="#tambah_lokasi" class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#tambah_lokasi"><strong><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</strong></a>
                <div class="modal fade" id="tambah_lokasi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Lokasi Diskon</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/lokasi_diskon" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id_diskon" value="{{ $diskon->id_diskon }}">
                                    <div class="form-group">
                                        <label for="">Lokasi</label>
                                        <select name="nama_kota" id="" class="custom-select pilihKota" required>
                                            <option value="">Pilih Kota</option>
                                            @foreach ($kota as $city)
                                                <option value="{{ $city }}">{{ $city }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Simpan" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button"
                                    data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <th>No.</th>
                            <th>Lokasi</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($lokasi as $loc)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $loc->nama_kota }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Option
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#editModal{{$loc->id_lokasi_diskon}}" data-toggle="modal"
                                                    data-target="#editModal{{$loc->id_lokasi_diskon}}">Edit</a>
                                                <a class="dropdown-item delete-item" href="/lokasi_diskon/delete/{{$loc->id_lokasi_diskon}}">Hapus</a>
                                            </div>
                                        </div>
                                    </td>
                                    <div class="modal fade" id="editModal{{$loc->id_lokasi_diskon}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Lokasi Diskon</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/lokasi_diskon/edit" method="POST">
                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <label for="">Lokasi</label>
                                                            <select name="nama_kota" id="" class="custom-select pilihKota" required>
                                                                <option value="">Pilih Kota</option>
                                                                @foreach ($kota as $city)
                                                                    <option value="{{ $city }}"
                                                                    @if($loc->nama_kota==$city) selected @endif>{{ $city }}</option>
                                                                @endforeach
                                                            </select>
                                                            <input type="hidden" name="id_lokasi_diskon" value="{{ $loc->id_lokasi_diskon }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="submit" value="Simpan" class="btn btn-primary">
                                                        </div>
                                                    </form>

                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button"
                                                        data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <th>No.</th>
                            <th>Lokasi</th>
                            <th>Aksi</th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
