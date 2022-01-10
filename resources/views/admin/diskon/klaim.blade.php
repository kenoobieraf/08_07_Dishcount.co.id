@extends('admin.template')
@section('content-core')
<main>
    <div class="container-fluid">
        <h3 class="mt-4">Klaim Diskon</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Diskon</li>
            <li class="breadcrumb-item active">Klaim</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Data Riwayat Klaim Diskon
            </div>
            <div class="card-body">
                <div class="row">
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <th>No.</th>
                            <th>Waktu</th>
                            <th>Diskon</th>
                            <th>Member</th>
                        </thead>
                        <tbody>
                            @foreach ($klaim as $kla)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $kla->created_at->translatedFormat('l, d F Y H:i') }}</td>
                                    <td>{{ $kla->diskon->nama_diskon }}</td>
                                    <td>{{ $kla->membership->nama_lengkap }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <th>No.</th>
                            <th>Waktu</th>
                            <th>Diskon</th>
                            <th>Member</th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
