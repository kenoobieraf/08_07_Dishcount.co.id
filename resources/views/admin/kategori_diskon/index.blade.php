@extends('admin.template')
@section('content-core')
<main>
    <div class="container-fluid">
        <h3 class="mt-4">Kategori Diskon</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Diskon</li>
            <li class="breadcrumb-item active">Kategori</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Data Kategori Diskon
            </div>
            <div class="card-body">
                <div class="row">
                </div>

                {{-- Form Tambah Data  --}}
                <a href="#tambah_kategori" class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#tambah_kategori"><strong><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</strong></a>
                <div class="modal fade" id="tambah_kategori" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kategori Diskon</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/kategori_diskon" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="">Nama Kategori</label>
                                        <input type="text" name="nama_kategori" class="form-control" placeholder="Isi Nama Kategori" required>
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
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $kat)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $kat->nama_kategori }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Option
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#editModal{{$kat->id_kategori_diskon}}" data-toggle="modal"
                                                    data-target="#editModal{{$kat->id_kategori_diskon}}">Edit</a>
                                                <a class="dropdown-item delete-item" href="/kategori_diskon/delete/{{$kat->id_kategori_diskon}}">Hapus</a>
                                            </div>
                                        </div>
                                    </td>
                                    <div class="modal fade" id="editModal{{$kat->id_kategori_diskon}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Kategori Diskon</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/kategori_diskon/edit" method="POST">
                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <label for="">Nama Kategori</label>
                                                            <input type="text" name="nama_kategori" id="" value="{{ $kat->nama_kategori }}" class="form-control" required>
                                                            <input type="hidden" name="id_kategori_diskon" value="{{ $kat->id_kategori_diskon }}">
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
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
