@extends('template.main')
@section('container')
    @include('template.header')
    @include('template.sidebar')
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Halaman Hasil Penilaian</h1>
        </div>
        <div class="page-content fade-in-up">
            <div class="ibox invoice">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a class="la la-home font-16"><b>Pilih Periode Penilaian</b></a>
                        <select name="user_role" id="user_role" class="form-control">
                            @foreach ($periode as $p)
                            <option value="{{ $p->id_periode }}">
                                {{ date("F Y", strtotime($p->periode_penilaian) )}}
                            </option>
                            @endforeach
                        </select>
                    </li>
                </ol>
                {{-- TABEL GURU --}}
                <table class="table table-bordered table-hover table-responsive-xl text-nowrap" id="tabel-guru" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Lengkap</th>
                            <th class="text-center">Jabatan</th>
                            <th class="text-center">Status Penilaian</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($guru as $g)
                            <tr>
                                <td>{{ $no++ }}.</td>
                                <td>{{ $g->nama_guru }}</td>
                                <td class="text-center">{{ $g->jabatan_guru }}</td>
                                <td> Status </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary" name="btn_pilih" onclick="hal_input('{{ $g->id_guru }}')">Pilih</button>
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
@push('scripts')
    @include('template.sweetalert')
    {{-- SCRIPT UNTUK MENGAMBIL DATA PERIODE DAN GURU --}}
    <script>
        function hal_input(guru){
            var periode = $('select#user_role').val();
            var url = "{{ route('inputnilai.edit', ['guru'=>':guru', 'periode'=>':periode']) }}";
            url = url.replace(':guru', guru);
            url = url.replace(':periode', periode);
            window.location.href=url;
        }
    </script>
@endpush
