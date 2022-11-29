@extends('template.main')
@section('container')
@include('template.header')
@include('template.sidebar')
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Halaman Periode</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Data Periode Penilaian Kinerja</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox invoice">
            <div class="mb-3">
                <div class="text-left">
                    <a href="#" class="btn btn-info" type="button" data-toggle="modal" data-target="#modalTambahPeriode">
                        Tambah Periode
                    </a>
                </div>
            </div>
            <!-- pop up sukses -->
            <div class="mb-3">
                @if (session()->has('success'))
                <div class="alert alert-success alert-bordered"><button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Sukses!</strong> {{ session('success') }}</div>
                @endif
            </div>
            <!-- tabel periode -->
            <table class="table table-bordered table-hover table-responsive-xl text-nowrap dataTable" id="tabel_periode" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Periode Penilaian</th>
                        <th>Semester</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($periode as $p)
                    <tr>
                        <td>{{ $no++ }}.</td>
                        @if ($p->periode_penilaian)
                        <td><?php echo date_format(new DateTime($p->periode_penilaian), 'M Y'); ?></td>
                        @elseif ($p->periode_penilaian == null)
                        <td>-</td>
                        @endif
                        <td>{{ $p->smt_periode }}</td>
                        @if ($p->sts_periode == 1)
                        <td>Berjalan</td>
                        @else
                        <td>Selesai</td>
                        @endif
                        <td class="text-center">
                            <a href="/periode/{{ $p->id_periode }}/edit" type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModalPeriode-{{ $p->id_periode }}">Edit</a>
                            <!-- <button class="btn btn-danger" id='delete' href="{{ route('periode.destroy', $p->id_periode) }}" data-nama="{{ $p->id_periode }}">Hapus</button>
                            {{-- <form action="/guru/{{ $p->id_guru }}" method="POST" class="d-inline">
                            @method('delete')
                                        @csrf
                                        <button class="btn btn-danger"
                                            onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form> --}} -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- modal tambah periode -->
        <div class="modal fade" id="modalTambahPeriode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            Tambah Periode Penilaian Kinerja
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('periode.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Periode Penilaian</label>
                                <input class="form-control" type="text" placeholder="tanggal / bulan / tahun" value="{{ old('periode_penilaian') }}" onfocus="(this.type='date')" onblur="(this.type='text')" name="periode_penilaian" required>
                            </div>
                            <div class="form-group">
                                <label>Semester</label>
                                <select name="smt_periode" id="smt_periode" class="form-control">
                                    <option value="Ganjil">
                                        Ganjil
                                    </option>
                                    <option value="Genap">
                                        Genap
                                    </option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- akhir modal -->

        <!-- modal edit periode -->
        @foreach ($periode as $p)
        <div class="modal fade" id="editModalPeriode-{{ $p->id_periode }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            Ubah Periode Penilaian Kinerja
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('periode.update', $p->id_periode) }}" method="POST">
                        @method('put')
                        @csrf
                            <div class="form-group">
                                <label>Periode Penilaian</label>
                                <input class="form-control" type="text" placeholder="tanggal / bulan / tahun" value="{{ $p->periode_penilaian }}" onfocus="(this.type='date')" onblur="(this.type='text')" name="periode_penilaian" required>
                            </div>
                            <div class="form-group">
                                <label>Semester</label>
                                <select name="smt_periode" id="smt_periode" class="form-control">
                                    <option value="Ganjil">
                                        Ganjil
                                    </option>
                                    <option value="Genap">
                                        Genap
                                    </option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Ubah Periode</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- akhir modal edit -->
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
    @include('template.footer')
</div>
@endsection