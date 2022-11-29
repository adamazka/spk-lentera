@extends('template.main')
@section('container')
@include('template.header')
@include('template.sidebar')
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <!-- KRITERIA -->
    <div class="page-heading">
        <h1 class="page-title">Halaman Kriteria</h1>
        <ol class="breadcrumb">
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox invoice">
            <div class="mb-3">
                <div class="text-left">
                    <a href="#" class="btn btn-info" type="button" data-toggle="modal" data-target="#modalTambahKriteria">
                        Tambah Kriteria
                    </a>
                </div>
            </div>
            <ol class="breadcrumb">
                <li style="text-align: center">Tabel Kriteria</li>
            </ol>
            <!-- pop up sukses -->
            <div class="mb-3">
                @if (session()->has('success'))
                <div class="alert alert-success alert-bordered"><button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Sukses!</strong> {{ session('success') }}</div>
                @endif
            </div>
            <table class="table table-bordered table-hover table-responsive-xl text-nowrap" id="table-kriteria" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kriteria</th>
                        <th>Bobot (%)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($kriteria as $k)
                    <tr>
                        <td>{{ $no++ }}.</td>
                        <td>{{ $k->nama_kriteria }}</td>
                        <td>{{ $k->bobot_kriteria }} %</td>
                        <td class="text-center">
                            <a href="/kriteria/{{ $k->id_kriteria }}/edit" type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModalKriteria-{{ $k->id_kriteria }}">Ubah</a>
                            <button class="btn btn-danger" id='delete' href="{{ route('kriteria.destroy', $k->id_kriteria) }}" data-nama="{{ $k->nama_kriteria }}">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Indikator -->
        <div class="ibox invoice">
            <div class="mb-3">
                <div class="text-left">
                    <a href="#modalTambahIndikator" class="btn btn-info" type="button" data-toggle="modal" data-target="#modalTambahIndikator">
                        Tambah Indikator
                    </a>
                </div>
            </div>
            <ol class="breadcrumb">
                <li style="text-align: center">Tabel Indikator</li>
            </ol>
            <table class="table table-bordered table-hover table-responsive-xl text-nowrap" id="table-indikator" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kriteria</th>
                        <th>Indikator</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($indikator as $i)
                    <tr>
                        <td>{{ $no++ }}.</td>
                        <td>{{ $i->kriteria->nama_kriteria }}</td>
                        <td>{{ $i->nama_indikator }}</td>
                        <td class="text-center">
                            <a href="/indikator/{{ $i->id_indikator }}/edit" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEditIndikator-{{ $i->id_indikator }}">Ubah</a>
                            <button class="btn btn-danger" id='delete' href="{{ route('indikator.destroy', $i->id_indikator) }}" data-nama="{{ $i->nama_indikator }}">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Pertanyaan -->
        <div class="ibox invoice">
            <div class="mb-3">
                <div class="text-left">
                    <button type="button" class="btn btn-info" type="button" data-toggle="modal" data-target="#modalTambahPertanyaan">
                        Tambah Pertanyaan
                    </button>
                </div>
            </div>
            <ol class="breadcrumb">
                <li style="text-align: center">Tabel Pertanyaan</li>
            </ol>
            <table class="dataTables_scroll table-scrl table table-bordered table-hover" id="table-pertanyaan" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Indikator</th>
                        <th>Pertanyaan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($pertanyaan as $p)
                    <tr>
                        <td>{{ $no++ }}.</td>
                        <td>{{ $p->indikator->nama_indikator }}</td>
                        <td>{{ $p->pertanyaan}}</td> 
                        <td class="text-center text-nowrap">
                            <a href="/pertanyaan/{{ $p->id_pertanyaan }}/edit" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEditPertanyaan-{{ $p->id_pertanyaan }}">Ubah</a>
                            <button class="btn btn-danger" id='delete' href="{{ route('pertanyaan.destroy', $p->id_pertanyaan) }}" data-nama="{{ $p->pertanyaan }}">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        

        <!-- modal tambah Kriteria -->
        <div class="modal fade" id="modalTambahKriteria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            Tambah Kriteria
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('kriteria.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Nama Kriteria</label>
                                <input class="form-control" type="text" name="nama_kriteria" id="nama_kriteria">
                            </div>
                            <div class="form-group">
                                <label>Bobot Kriteria</label>
                                <input class="form-control" type="text" name="bobot_kriteria" id="bobot_kriteria">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah Kriteria</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal edit kriteria -->
        @foreach ($kriteria as $k)
        <div class="modal fade" id="editModalKriteria-{{ $k->id_kriteria }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            Ubah Data Kriteria
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('kriteria.update', $k->id_kriteria) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label>Nama Kriteria</label>
                                <input class="form-control" type="text" name="nama_kriteria" id="nama_kriteria" value="{{ $k->nama_kriteria }}">
                            </div>
                            <div class="form-group">
                                <label>Bobot Kriteria</label>
                                <input class="form-control" type="text" name="bobot_kriteria" id="bobot_kriteria" value="{{ $k->bobot_kriteria }}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Ubah Kriteria</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- modal tambah Indikator -->
        <div class="modal fade" id="modalTambahIndikator" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            Tambah Indikator
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('indikator.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Nama Kriteria</label>
                                <select name="tambah_id_kriteria" id="tambah_id_kriteria" class="form-control">
                                    @foreach ($kriteria as $k)
                                    <option value="{{ $k->id_kriteria }}">{{ $k->nama_kriteria }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Indikator</label>
                                <input class="form-control" type="textarea" name="nama_indikator" id="nama_indikator">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah Indikator</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal ubah Indikator -->
        @foreach ($indikator as $i)
        <div class="modal fade" id="modalEditIndikator-{{ $i->id_indikator }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            Ubah Data Indikator
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('indikator.update', $i->id_indikator) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label>Nama Kriteria</label>
                                <!-- dropdown berdasarkan kriteriaS -->
                                <select name="ubah_id_kriteria" id="ubah_id_kriteria" class="form-control">
                                    @foreach ($kriteria as $k)
                                    <option value="{{ $k->id_kriteria }}">{{ $k->nama_kriteria }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Indikator</label>
                                <input class="form-control" type="textarea" name="nama_indikator" id="nama_indikator" value="{{ $i->nama_indikator }}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Ubah Indikator</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- modal tambah Pertanyaan -->
        <div class="modal fade" id="modalTambahPertanyaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            Tambah Pertanyaan
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('pertanyaan.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Nama Kriteria</label>
                                <select name="pertanyaan_id_kriteria" id="pertanyaan_id_kriteria" class="form-control" onchange="GetIndikatorByKriteria(this.value)" placeholder="Pilih Kriteria">
                                    <option value="0">
                                        Pilih Kriteria
                                    </option>
                                    @foreach ($kriteria as $k)
                                    <option value="{{ $k->id_kriteria }}">
                                        {{ $k->nama_kriteria }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Indikator</label>
                                <select name="pertanyaan_id_indikator" id="pertanyaan_id_indikator" class="form-control" placeholder="Pilih Indikator">
                                    <option value="0">
                                        Pilih Indikator
                                    </option>
                                    @foreach ($indikator as $i)
                                    <option style="width: 1rem" value="{{ $i->id_indikator }}">
                                        {{ $i->nama_indikator }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pertanyaan</label>
                                <textarea class="form-control" type="text" name="pertanyaan" id="pertanyaan"></textarea>     
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah Pertanyaan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal ubah Pertanyaan -->
        @foreach ($pertanyaan as $p)
        <div class="modal fade" id="modalEditPertanyaan-{{ $p->id_pertanyaan }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            Ubah Pertanyaan
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action={{ route('pertanyaan.update', $p->id_pertanyaan) }} method="POST">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label>Nama Kriteria</label>
                                <select name="ubah_pertanyaan_id_kriteria" id="ubah_pertanyaan_id_kriteria" class="form-control" onchange="GetIndikatorByKriteria(this.value)" placeholder="Pilih Kriteria">
                                    <option value="0">
                                        {{ $p->kriteria->nama_kriteria }}
                                    </option>
                                    @foreach ($kriteria as $k)
                                    <option value="{{ $k->id_kriteria }}">
                                        {{ $k->nama_kriteria }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Indikator</label>
                                <select name="ubah_pertanyaan_id_indikator" id="ubah_pertanyaan_id_indikator" class="form-control" placeholder="Pilih Indikator">
                                    <option value="0">
                                        {{ $p->indikator->nama_indikator }}
                                    </option>
                                    @foreach ($indikator as $i)
                                    <option style="width: 20px" value="{{ $i->id_indikator }}">
                                        {{ $i->nama_indikator }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pertanyaan</label>
                                <textarea class="form-control" type="text-area" name="pertanyaan" id="pertanyaan">{{ $p->pertanyaan }}</textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Ubah Pertanyaan</button>
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
<script src="http://code.jquery.com/jquery-3.4.1.js"></script>
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

{{-- script tampil indikator berdasarkan kriteria yg dipilih --}}
<script>
    function GetIndikatorByKriteria(id){
        var a = [];
        var text = "";
        @foreach($indikator as $i)
            a[{{ $loop->index }}] = [{{ $i->id_kriteria }}, {{ $i->id_indikator}}, '{{ $i->nama_indikator }}'];
        @endforeach
        for (let i = 0; i < a.length; i++) {
            if(a[i][0] == id){
                text += "<option value='" + a[i][1] + "'>"+ a[i][2] +"</option>";
            }
        }        
        document.getElementById('pertanyaan_id_indikator').innerHTML = text;
    }
</script>
@endpush