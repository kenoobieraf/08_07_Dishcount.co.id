@extends('admin.template')
@section('content-core')
<main>
    <div class="container-fluid">
        <h3 class="mt-4">Review Diskon</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/diskon">Diskon</a></li>
            <li class="breadcrumb-item">{{ $diskon->nama_diskon }}</li>
            <li class="breadcrumb-item active">Review</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Data Review Diskon
            </div>
            <div class="card-body">
                <div class="row">
                </div>

                <h4>Nama Diskon : {{ $diskon->nama_diskon }}</h4>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <th>No.</th>
                            <th>Waktu</th>
                            <th>Member</th>
                            <th>Isi Review</th>
                        </thead>
                        <tbody>
                            @foreach ($review as $rev)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $rev->created_at->translatedFormat('l, d F Y H:i') }}</td>
                                    <td>{{ $rev->membership->nama_lengkap }}</td>
                                    <td>{{ $rev->isi_review }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <th>No.</th>
                            <th>Waktu</th>
                            <th>Member</th>
                            <th>Isi Review</th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
