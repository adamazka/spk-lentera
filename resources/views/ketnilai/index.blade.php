@extends('template.main')
@section('container')
@include('template.header')
@include('template.sidebar')
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <!-- KRITERIA -->
    <div class="page-heading">
        <h1 class="page-title">Halaman Keterangan Nilai</h1>
        <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Tabel Kriteria</li> -->
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox invoice">
            <div class="mb-3">
                <div class="text-left">
                    <a href="#" class="btn btn-info" type="button" data-toggle="modal" data-target="#modalTambahKetnilai">
                        Tambah Keterangan Nilai
                    </a>
                </div>
            </div>
            <ol class="breadcrumb">
                <li style="text-align: center">Tabel Keterangan Nilai</li>
            </ol>
            <!-- pop up sukses -->
            <div class="mb-3">
                @if (session()->has('success'))
                <div class="alert alert-success alert-bordered"><button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Sukses!</strong> {{ session('success') }}</div>
                @endif
            </div>
            <table class="table table-bordered table-hover table-responsive-xl text-nowrap" id="tabel-ketnilai" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Rentang Nilai</th>
                        <th>Besaran</th>
                        <th>Nilai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($ketnilai as $ke)
                    <tr>
                        <td>{{ $no++ }}.</td>
                        <td>{{ $ke->nama_ketnilai }}</td>
                        <td>{{ $ke->besaran_ketnilai }}</td>
                        <td>{{ $ke->nilai_ketnilai }}</td>
                        <td class="text-center">
                            <a href="/ketnilai/{{ $ke->id_ketnilai }}/edit" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalUbahKetnilai-{{ $ke->id_ketnilai }}">Ubah</a>
                            
                            <button class="btn btn-danger" id='delete' href="{{ route('ketnilai.destroy', $ke->id_ketnilai) }}" data-nama="{{ $ke->nama_ketnilai }}">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- modal tambah --}}
        <div class="modal fade" id="modalTambahKetnilai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            Tambah Keterangan Nilai
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('ketnilai.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Nama Nilai</label>
                                <input class="form-control" type="text" name="nama_ketnilai" id="nama_ketnilai">
                            </div>
                            <div class="form-group">
                                <label>Besaran</label>
                                <select name="besaran_ketnilai" id="besaran_ketnilai" class="form-control">
                                    <option value="Lebih dari (>)">
                                        Lebih dari (>)
                                    </option>
                                    <option value="Kurang dari (<)">
                                        Kurang dari (<)
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nilai</label>
                                <input class="form-control" type="text" name="nilai_ketnilai" id="nilai_ketnilai">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah Keterangan Nilai</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- modal ubah --}}
        @foreach ($ketnilai as $ke)
        <div class="modal fade" id="modalUbahKetnilai-{{ $ke->id_ketnilai }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            Ubah Keterangan Nilai
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('ketnilai.update', $ke->id_ketnilai) }}"method="POST">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label>Nama Nilai</label>
                                <input class="form-control" type="text" name="nama_ketnilai" id="nama_ketnilai" value="{{ $ke->nama_ketnilai }}">
                            </div>
                            <div class="form-group">
                                <label>Besaran</label>
                                <select name="besaran_ketnilai" id="besaran_ketnilai" class="form-control">
                                    <option value="Lebih dari (>)">
                                        Lebih dari (>)
                                    </option>
                                    <option value="Kurang dari (<)">
                                        Kurang dari (<)
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nilai</label>
                                <input class="form-control" type="text" name="nilai_ketnilai" id="nilai_ketnilai" value="{{ $ke->nilai_ketnilai }}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Ubah Keterangan Nilai</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach


        <style>
            .invoice {
                padding: 20px
            }

            .invoice-header {
                margin-bottom: 50px
            }

            .invoice-logo {
                margin-bottom: 50px;
            }

            .table-invoice tr td:last-child {
                text-align: right;
            }
        </style>
    </div>

    <!-- akhir tabel kriteria -->
    @include('template.footer')
</div>
@include('template.delete')
@endsection

<!-- script untuk menghapus data muncul toast -->
@push('scripts')
@include('template.sweetalert')
<!-- indikator -->
<script>
    $('button#delete').on('click', function() {
        var href = $(this).attr('href');
        var nama = $(this).data('nama');
        Swal.fire({
                title: "Anda yakin untuk menghapus data \"" + nama + "\"?",
                text: "Setelah dihapus, data tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ya, hapus'
            })
            .then((willDelete) => {
                if (willDelete.value) {
                    $('#deleteForm').attr('action', href);
                    $('#deleteForm').submit();
                }
            })
    });
</script>
@endpush