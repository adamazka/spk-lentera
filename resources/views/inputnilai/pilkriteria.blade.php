@extends('template.main')
@section('container')
    @include('template.header')
    @include('template.sidebar')
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Halaman Penilaian Kinerja Guru</h1>
        </div>
        <div class="page-content fade-in-up">
            <div class="ibox invoice">
                <div class="breadcrumb">
                    <label class="la la-home font-16"> <b>Periode Penilaian</b> 
                        @foreach ($periode as $p)
                        <input class="form-control" id="periode_id" name="periode_id" value="{{ $p->id_periode }}" hidden>
                            <input class="form-control font-18" type="text" name="periode" id="periode"
                                value="{{ date('F Y', strtotime($p->periode_penilaian)) }}" disabled>
                        @endforeach
                    </label>

                    <label class="la la-home font-16"> <b>Nama Guru</b> 
                        <input class="form-control" id="guru_id" name="guru_id" value="{{ $guru->id_guru }}" hidden>
                        <input class="form-control font-18" type="text" id="guru_nama" name="guru_nama"
                            value="{{ $guru->nama_guru }}" disabled>
                    </label>
                </div>

                {{-- TABEL KRITERIA --}}
                <table class="table table-bordered table-hover table-responsive-xl text-nowrap" id="tabel-guru"
                    cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Kriteria</th>
                            <th class="text-center">Nilai Perkompetensi</th>
                            <th class="text-center">Nilai (C)</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($kriteria as $k)
                            <tr>
                                <td class="text-center">{{ $no++ }}.</td>
                                <td>{{ $k->nama_kriteria }}</td>
                                <td class="text-center">0</td>
                                <td class="text-center">0</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary" name="btn_pilih"
                                        onclick="hal_pilkrit('{{ $k->id_kriteria }}')">Pilih</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
    {{-- SCRIPT UNTUK MENGAMBIL DATA PERIODE DAN GURU DAN KRITERIA --}}
    <script>
        function hal_pilkrit(kriteria, guru) {
            var periode = $('#periode_id').val();
            var guru = $('#guru_id').val();
            var url =
                "{{ route('inputnilai.pilih_kriteria', ['guru' => ':guru', 'periode' => ':periode', 'kriteria' => ':kriteria']) }}";
            url = url.replace(':kriteria', kriteria);
            url = url.replace(':guru', guru);
            url = url.replace(':periode', periode);
            window.location.href = url;
        }
    </script>
@endpush
