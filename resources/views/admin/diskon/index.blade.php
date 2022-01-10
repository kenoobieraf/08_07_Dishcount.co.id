@extends('admin.template')
@section('content-core')
<main>
    <div class="container-fluid">
        @if (count($errors) > 0)
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h3 class="mt-4">Diskon</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Diskon</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Data Diskon
            </div>
            <div class="card-body">
                <div class="row">
                </div>

                {{-- Form Tambah Data  --}}
                <a href="#tambah_diskon" class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#tambah_diskon"><strong><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</strong></a>
                <div class="modal fade" id="tambah_diskon" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Diskon</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/diskon" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="">Kategori Diskon</label>
                                        <select name="id_kategori_diskon" id="" class="custom-select" required>
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($kategori as $kat)
                                                <option value="{{ $kat->id_kategori_diskon }}">{{ $kat->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama Diskon</label>
                                        <input type="text" name="nama_diskon" class="form-control" placeholder="Isi Nama Diskon" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Deskripsi</label>
                                        <textarea name="deskripsi" id="" cols="" rows="10" class="form-control ckeditor" required placeholder="Isi Deskripsi"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Gambar Diskon <i>(Ekstensi file .jpeg, .jpg, .png)</i></label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input"
                                                id="validatedCustomFile"
                                                onchange="chkFile(this)"
                                                name="file" required>
                                            <label class="custom-file-label" data-browse="Cari File" for="validatedCustomFile">Pilih
                                                file...</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Simpan Data" class="btn btn-primary">
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
                            <th>Nama Diskon</th>
                            <th>Kategori</th>
                            <th>Gambar</th>
                            <th>Lokasi Diskon</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($diskon as $disc)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $disc->nama_diskon }}</td>
                                    <td>{{ $disc->kategori->nama_kategori }}</td>
                                    <td><img src="{{ url(Storage::url($disc->gambar_diskon)) }}" class="rounded" height="100px" width="auto"></td>
                                    <td>
                                        @if($disc->lokasi->isNotEmpty())
                                            <ol>
                                                @foreach ($disc->lokasi as $lokasi)
                                                    <li>{{ $lokasi->nama_kota }}</li>
                                                @endforeach
                                            </ol>
                                            <a href="/lokasi_diskon/{{ $disc->id_diskon }}" class="btn btn-sm btn-warning mx-auto"><i class="fa fa-edit" aria-hidden="true"></i> Edit lokasi</a>
                                        @else
                                        <a href="/lokasi_diskon/{{ $disc->id_diskon }}" class="btn btn-sm btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Tambahkan lokasi</a>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Option
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#editModal{{$disc->id_diskon}}" data-toggle="modal"
                                                    data-target="#editModal{{$disc->id_diskon}}">Edit</a>
                                                <a class="dropdown-item delete-item" href="/diskon/delete/{{$disc->id_diskon}}">Hapus</a>
                                                <a class="dropdown-item" href="/diskon/review/{{$disc->id_diskon}}">Lihat Review</a>

                                            </div>
                                        </div>
                                    </td>

                                    <div class="modal fade" id="editModal{{$disc->id_diskon}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Diskon</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/diskon/edit" method="POST" enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="id_diskon" value="{{ $disc->id_diskon }}">
                                                        <div class="form-group">
                                                            <label for="">Kategori Diskon</label>
                                                            <select name="id_kategori_diskon" id="" class="custom-select" required>
                                                                <option value="">Pilih Kategori</option>
                                                                @foreach ($kategori as $kat)
                                                                    <option value="{{ $kat->id_kategori_diskon }}"
                                                                        @if($kat->id_kategori_diskon==$disc->id_kategori_diskon) selected @endif>{{ $kat->nama_kategori }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Nama Diskon</label>
                                                            <input type="text" name="nama_diskon" class="form-control" placeholder="Isi Nama Diskon" required value="{{ $disc->nama_diskon }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Deskripsi</label>
                                                            <textarea name="deskripsi" id="" cols="" rows="10" class="ckeditor form-control" required placeholder="Isi Deskripsi">{{ $disc->deskripsi }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Gambar Diskon <i>(Ekstensi file .jpeg, .jpg, .png)</i></label><br>
                                                            <span><i>* jika tidak ingin mengubah gambar maka tidak butuh menyertakan gambar baru</i></span>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input"
                                                                    id="validatedCustomFile"
                                                                    onchange="chkFile(this)"
                                                                    name="file">
                                                                <label class="custom-file-label" data-browse="Cari File" for="validatedCustomFile">Pilih
                                                                    file...</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="submit" value="Edit Data" class="btn btn-warning">
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
                            <th>Nama Diskon</th>
                            <th>Kategori</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
