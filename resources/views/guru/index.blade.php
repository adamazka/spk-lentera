@extends('template.main')
@section('container')
    @include('template.header')
    @include('template.sidebar')
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Halaman Guru</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html"><i class="la la-home font-20"></i></a>
                </li>
                <li class="breadcrumb-item">Data Guru Lentera Fajar Indonesia</li>
            </ol>
        </div>
        <div class="page-content fade-in-up">
            <div class="ibox invoice">
                <div class="mb-3">
                    <div class="text-left">
                        <a href="/guru/create" class="btn btn-info" type="button">
                            Tambah Data Guru
                        </a>
                    </div>
                </div>
                <div class="mb-3">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-bordered"><button class="close" data-dismiss="alert"
                                aria-label="Close">×</button><strong>Sukses!</strong> {{ session('success') }}</div>
                    @endif
                </div>
                <table class="table table-bordered table-hover table-responsive-xl text-nowrap" id="tabel-guru" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>No. KTP</th>
                            <th>No. KK</th>
                            <th>Pendidikan Terakhir</th>
                            <th>Jabatan</th>
                            <th>Tahun Masuk</th>
                            <th>Tahun Keluar</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($guru as $g)
                            <tr>
                                <td>{{ $no++ }}.</td>
                                <td>{{ $g->nama_guru }}</td>
                                <td>{{ $g->alamat_guru }}</td>
                                <td>{{ $g->tlp_guru }}</td>
                                <!-- logic TTL -->
                                @if ($g->tanggal_lahir == null)
                                    <td>{{ $g->tempat_lahir }}</td>
                                @elseif($g->tempat_lahir == null)
                                    <td><?php echo date_format(new DateTime($g->tanggal_lahir), 'd M Y'); ?></td>
                                @else
                                    <td>{{ $g->tempat_lahir }}, <?php echo date_format(new DateTime($g->tanggal_lahir), 'd M Y'); ?></td>
                                @endif
                                <!-- end Logic TTL -->
                                <td>{{ $g->no_ktp_guru }}</td>
                                <td>{{ $g->no_kk_guru }}</td>
                                <td>{{ $g->pen_akhir_guru }}</td>
                                <td>{{ $g->jabatan_guru }}</td>
                                <!-- tahun masuk dan keluar -->
                                @if ($g->tahun_masuk)
                                    <td><?php echo date_format(new DateTime($g->tahun_masuk), 'd M Y'); ?></td>
                                @elseif ($g->tahun_masuk == null)
                                    <td>-</td>
                                @endif
                                @if ($g->tahun_keluar)
                                    <td><?php echo date_format(new DateTime($g->tahun_keluar), 'd M Y'); ?></td>
                                @elseif($g->tahun_keluar == null)
                                    <td>-</td>
                                @endif
                                <!-- end tahun masuk dan keluar -->
                                <td class="text-center">
                                </td>
                                <td class="text-center">
                                    <a href="/guru/{{ $g->nama_guru }}/edit" type="button"
                                        class="btn btn-warning">Edit</a>
                                    <button class="btn btn-danger" id='delete'
                                        href="{{ route('guru.destroy', $g->id_guru) }}"
                                        data-nama="{{ $g->nama_guru }}">Hapus</button>
                                    {{-- <form action="/guru/{{ $g->id_guru }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
    @include('template.delete')
@endsection
<!-- script untuk menghapus data muncul toast -->
@push('scripts')
    @include('template.sweetalert')
    <script>
        $('button#delete').on('click', function() {
            var href = $(this).attr('href');
            var nama = $(this).data('nama');
            Swal.fire({
                    title: "Anda yakin untuk menghapus data guru yang bernama \"" + nama + "\"?",
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
