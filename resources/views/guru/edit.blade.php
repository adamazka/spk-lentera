@extends('template.main')
@push('style')
    <style>
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }

    </style>
@endpush
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
                <!-- <li class="breadcrumb-item">Tambah Data Guru</li> -->
            </ol>
        </div>
        <div class="page-content fade-in-up">
            <div class="ibox col-8 centered">
                <div class="ibox-head">
                    <div class="ibox-title">Ubah Data Guru</div>
                </div>
                <div class="ibox-body">
                    <form class="mt-3" method="POST" action="/guru/{{ $guru->id_guru }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="form-group" hidden>
                                            <label>ID USER</label>
                                            <input class="form-control" type="text" name="id_user"
                                                value="{{ $guru->id_user }}">
                                        </div>
                        <!-- nama dan telpon -->
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Nama Lengkap<span class="text-danger"></span></label>
                                <input class="form-control" type="text" name="nama_guru" value="{{ $guru->nama_guru }}"
                                    required>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Telepon<span class="text-danger"></span></label>
                                <input class="form-control" type="number" name="tlp_guru" 
                                    value="{{ $guru->tlp_guru }}" maxlength="13"
                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    required>
                            </div>
                        </div>
                        <!-- KTP dan KK -->
                        <div class="row">
                        <div class="col-sm-6 form-group">
                                <label>Nomor Kartu Tanda Penduduk<span class="text-danger"></span></label>
                                <input class="form-control" type="number" name="no_ktp_guru"
                                    value="{{ $guru->no_ktp_guru }}" maxlength="16"
                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    required>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Nomor Kartu Keluarga<span class="text-danger"></span></label>
                                <input class="form-control" type="number" name="no_kk_guru" 
                                    value="{{ $guru->no_kk_guru }}" maxlength="16"
                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    required>
                            </div>
                        </div>
                        <!-- TTL -->
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="">Tempat Lahir<span class="text-danger"></span></label>
                                <input class="form-control" type="text" name="tempat_lahir" 
                                    value="{{ $guru->tempat_lahir }}" required>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="">Tanggal Lahir<span class="text-danger"></span></label>
                                <input class="form-control" type="text" placeholder="tanggal / bulan / tahun"
                                    value="{{ $guru->tanggal_lahir }}" onfocus="(this.type='date')"
                                    onblur="(this.type='text')" name="tanggal_lahir" required>
                            </div>
                        </div>
                        <!-- Pendidikan dan Jabatan -->
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Pendidikan Terakhir</label>
                                <input class="form-control" type="text" name="pen_akhir_guru"
                                    value="{{ $guru->pen_akhir_guru }}">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Jabatan</label>
                                <input class="form-control" type="text" name="jabatan_guru"
                                    value="{{ $guru->jabatan_guru }}">
                            </div>
                        </div>
                        <!-- alamat -->
                        <div class="form-group">
                            <label>Alamat<span class="text-danger"></span></label>
                            <textarea class="form-control" type="text" name="alamat_guru"required>{{ $guru->alamat_guru }}</textarea>
                        </div>
                        <!-- Tahun Masuk dan Keluar -->
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Tahun Masuk</label>
                                <input class="form-control" type="text" placeholder="tanggal / bulan / tahun"
                                    value="{{ $guru->tahun_masuk }}" onfocus="(this.type='date')"
                                    onblur="(this.type='text')" name="tahun_masuk">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Tahun Keluar</label>
                                <input class="form-control" type="text" placeholder="tanggal / bulan / tahun"
                                    value="{{ $guru->tahun_keluar }}" onfocus="(this.type='date')"
                                    onblur="(this.type='text')" name="tahun_keluar">
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Ubah Data</button>
                            <a href="/guru" type="button" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT-->
        @include('template.footer')
    </div>
@endsection



@push('scripts')
    <!-- Script Disabling Scrolls num-->
    <script>
        const numberInputOnWheelPreventChange = (e) => {
            // Prevent the input value change
            e.target.blur()

            // Prevent the page/container scrolling
            e.stopPropagation()

            // Refocus immediately, on the next tick (after the current function is done)
            setTimeout(() => {
                e.target.focus()
            }, 0)
        }

        return <input type = "number"
        onWheel = {
            numberInputOnWheelPreventChange
        }
        />
    </script>
    <!-- End Script Disabling Scrolls num-->

    <!-- Removing regex non-numerics -->
    <script>
        var ctrlDown = false;
        var ctrlKey = 17,
            vKey = 86;
        $("[type='number']").on("keydown", function(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode
            if (charCode == ctrlKey) ctrlDown = true;
            if (ctrlDown == true && charCode == vKey) {
                return true;
            }
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }).keyup(function(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode
            if (charCode == ctrlKey) ctrlDown = false;
        });
        $("[type='number']").bind("cut copy paste", function(evt) {
            var number = (evt.originalEvent || evt).clipboardData.getData('text/plain');
            x = parseInt(number.replace(/\D/g, ''), 10);
            console.log(number);
            $(this).val(x);
            evt.preventDefault();
        });
    </script>
    <!-- End Removing regex non-numerics -->
@endpush
