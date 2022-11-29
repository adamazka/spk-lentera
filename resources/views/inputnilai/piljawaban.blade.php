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
                    <input class="form-control" id="user_id" name="user_id" value="{{ auth()->user()->id_user }}" hidden>
                    <label class="la la-home font-16"><b>Periode Penilaian</b>
                        @foreach ($periode as $p)
                            <input class="form-control" id="periode_id" name="periode_id" value="{{ $p->id_periode }}"
                                hidden>
                            <input class="form-control font-18" type="text" name="periode" id="periode"
                                value="{{ date('F Y', strtotime($p->periode_penilaian)) }}" disabled>
                        @endforeach
                    </label>
                    <label class="la la-home font-16"><b>Nama Guru</b>
                        @foreach ($guru as $g)
                            <input class="form-control" id="guru_id" name="guru_id" value="{{ $g->id_guru }}" hidden>
                            <input class="form-control font-18" type="text" id="guru_nama" name="guru_nama"
                                value="{{ $g->nama_guru }}" disabled>
                        @endforeach
                    </label>

                    <label class="la la-home font-16"><b>Kriteria</b>
                        <input class="form-control" id="kriteria_id" name="kriteria_id" value="{{ $kriteria->id_kriteria }}"
                            hidden>
                        <input class="form-control" id="kriteria_bobot" name="kriteria_bobot"
                            value="{{ $kriteria->bobot_kriteria }}" hidden>
                        <input class="form-control font-18" type="text" id="kriteria" name="kriteria"
                            value="{{ $kriteria->nama_kriteria }}" disabled>
                    </label>
                </div>
                {{-- TABEL Pertanyaan --}}
                <table class="dataTables_scroll table-scrl table table-bordered table-hover" id="tabel-jawaban"
                    cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center col-sm-1">No</th>
                            <th class="text-center">Pertanyaan</th>
                            {{-- <th class="text-center col-sm-3">Jawaban</th> --}}
                            <th class="text-center">Tidak Terpenuhi</th>
                            <th class="text-center">Terpenuhi Sebagian</th>
                            <th class="text-center">Terpenuhi Seluruhnya</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($pertanyaan as $p)
                            <tr>
                                <td class="text-center col-sm-1">{{ $no++ }}.</td>
                                <td class="">{{ $p->pertanyaan }}</td>
                                <form id="hitungttskor">
                                    <td>
                                        <label class="form-label">
                                            <input type="radio" name="status_checkbox" value="0">
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-label">
                                            <input type="radio" name="status_checkbox" value="1">
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-label">
                                            <input type="radio" name="status_checkbox" value="2">
                                        </label>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                <button class="btn btn-danger col-sm-2" type="button" onclick="clearValuePertanyaan()">Clear</button>
                <button class="btn btn-primary col-sm-2" type="button" onclick="submitValuePertanyaan()">Submit</button>
                <br><br>
                {{-- hasil mengisi form pertanyaan --}}
                <div class="breadcrumb">
                    <label class="la la-home font-16"><b>Total Score</b>
                        <input class="form-control font-18" type="text" name="total" id="total" disabled>
                    </label>
                    <label class="la la-home font-16"><b>Nilai Perkompetensi</b>
                        <input class="form-control font-18" type="text" name="nilper" id="nilper" disabled>
                    </label>

                    <label class="la la-home font-16"><b>Nilai (C)</b>
                        <input class="form-control font-18" type="text" name="nilc" id="nilc" disabled>
                    </label>
                </div>
                <button class="btn btn-primary btn-submit col-sm-2">Simpan</button>
                <div id="price"></div>
                <div id="jrb"></div>
                <div id="ms"></div>
                <div id="bobot"></div>
                <div id="np"></div>
                <div id="sbb"></div>
                <br>
                <br>
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
    {{-- <script src="/path/to/cdn/jquery.slim.min.js"></script> --}}
    {{-- hitung total skor --}}
    <script>
        function submitValuePertanyaan() {
            var totalskor = 0;
            var jrb = document.querySelectorAll('input[type=radio]:checked').length;
            var maxskor = jrb * 2;
            var bobot = $('#kriteria_bobot').val();
            var sbb = $('#kriteria_bobot').val() / 5;
            const pertanyaan = document.querySelectorAll('input[name="status_checkbox"]')
            for (const p of pertanyaan) {
                if (p.checked) {
                    totalskor += parseInt(p.value)
                    var np = (parseInt(totalskor) / parseInt(maxskor)) * parseInt(bobot);

                    if (np >= sbb * 4) {
                        document.getElementById("nilc").value = 5
                    } else if (np >= sbb * 3) {
                        document.getElementById("nilc").value = 4
                    } else if (np >= sbb * 2) {
                        document.getElementById("nilc").value = 3
                    } else if (np >= sbb * 1) {
                        document.getElementById("nilc").value = 2
                    } else {
                        document.getElementById("nilc").value = 1
                    }

                    document.getElementById('price').innerHTML = "Total : " + totalskor
                    document.getElementById('jrb').innerHTML = "radio checked : " + jrb
                    document.getElementById('ms').innerHTML = "max score : " + maxskor
                    document.getElementById('bobot').innerHTML = "bobot : " + bobot
                    document.getElementById('np').innerHTML = "nilai perkompetensi : " + np
                    document.getElementById('sbb').innerHTML = "skala bobot : " + sbb
                    document.getElementById("total").value = totalskor
                    document.getElementById("nilper").value = np
                }
            }
        }

        function clearValuePertanyaan() {
            const pertanyaan = document.querySelectorAll('input[name="status_checkbox"]:checked')
            for (const p of pertanyaan) {
                if (p.checked) {
                    p.checked = false;
                }
            }
            document.getElementById('price').innerHTML = null;
        }

        function tesValueButton() {
            var id_guru = document.getElementById('guru_id').value
            var id_kriteria = document.getElementById('kriteria_id').value
            var id_periode = document.getElementById('periode_id').value
            var total_skor = document.getElementById('total').value
            var nilai_perkopetensi = document.getElementById('nilper').value
            var nilai_c = document.getElementById('nilc').value

            console.log(
                `id guru: ${id_guru}, id_kriteria: ${id_kriteria}, id_periode: ${id_periode}, total_skor: ${total_skor}, nilai_perkopetensi: ${nilai_perkopetensi}, nilai_c: ${nilai_c}`
            )
        }
        // $('#table-scrl').dataTable({
        //     "pageLength": 50
        // });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.btn-submit').click(function(e) {
            e.preventDefault();

            const id_periode = $('#periode_id').val();
            const id_guru = $('#guru_id').val();
            const id_kriteria = $('#kriteria_id').val();
            const id_user = $('#user_id').val();
            const total_skor = $('#total').val();
            const nilai_perkopetensi = $('#nilper').val();
            const nilai_c = $('#nilc').val();

            $.ajax({
                url: "{{ route('inputnilai.store') }}",
                type: 'POST',
                data: {
                    "id_periode": id_periode,
                    "id_guru": id_guru,
                    "id_kriteria": id_kriteria,
                    "id_user": id_user,
                    "total_skor": total_skor,
                    "nilai_perkopetensi": nilai_perkopetensi,
                    "nilai_c": nilai_c
                },
                success: function(data) {
                    alert('Nilai Kriteria' + ' ' + $('#kriteria').val() + ' ' + 'Berhasil Ditambahkan')
                },
                error: function(error) {
                    alert('Error')
                    console.log(error.responseJSON.message)
                }
            })
        })
    </script>
@endpush
