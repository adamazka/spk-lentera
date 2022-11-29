@extends('template.main')
@section('container')
    @include('template.header')
    @include('template.sidebar')
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Halaman User</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html"><i class="la la-home font-20"></i></a>
                </li>
                <li class="breadcrumb-item">Data User Lentera Fajar Indonesia</li>
            </ol>
        </div>
        <div class="page-content fade-in-up">
            <div class="ibox invoice">
                <div class="mb-3">
                    <div class="text-left">
                        <a href="#modalTambahUser" class="btn btn-info" type="button" data-toggle="modal" data-target="#modalTambahUser">
                            Tambah User
                        </a>
                    </div>
                </div>
                <div class="mb-3">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-bordered"><button class="close" data-dismiss="alert"
                                aria-label="Close">×</button><strong>Sukses!</strong> {{ session('success') }}</div>
                    @endif
                </div>
                {{-- tabel user --}}
                <table class="table table-bordered table-hover table-responsive-xl text-nowrap" id="table-haluser" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($user as $u)
                            <tr>
                                <td>{{ $no++ }}.</td>
                                <td>{{ $u->guru->nama_guru }}</td>
                                <td>{{ $u->username }}</td>
                                <td>{{ $u->password }}</td>
                                <td>{{ $u->role->role_name }}</td>
                                <td class="text-center">
                                    <a href="/user/{{ $u->id_user }}/edit" type="button" class="btn btn-warning" data-toggle="modal" data-target="#editUser-{{ $u->id_user }}">Ubah</a>
                                    <button class="btn btn-danger" id='delete'
                                        href="{{ route('user.destroy', $u->id_user) }}"
                                        data-nama="{{ $u->username }}">Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- end tabel user --}}
            </div>
            {{-- modal tambah user --}}
            <div class="modal fade" id="modalTambahUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">
                                Tambah User
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('user.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <select name="user_nama" id="user_nama" class="form-control">
                                        @foreach ($guru as $g)
                                        <option value="{{ $g->id_guru }}">{{ $g->nama_guru }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" type="text" name="user_username" id="user_username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" type="text" name="user_password" id="user_password">
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select name="user_role" id="user_role" class="form-control">
                                        @foreach ($role as $r)
                                        <option value="{{ $r->id_role }}">{{ $r->role_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Tambah User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end tambah user --}}

            {{-- modal edit user --}}
            @foreach ($user as $u)
            <div class="modal fade" id="editUser-{{ $u->id_user }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                            <form action="/user/{{ $u->id_user }}" method="POST">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <select name="edit_user_nama" id="edit_user_nama" class="form-control">
                                        <option value="{{ $u->id_guru }}">{{ $u->guru->nama_guru }}</option>
                                        @foreach ($guru as $g)
                                        <option value="{{ $g->id_guru }}">{{ $g->nama_guru }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" type="text" name="edit_user_username" id="edit_user_username" value="{{ $u->username }}">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" type="text" name="edit_user_password" id="edit_user_password" value="{{ $u->password }}">
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select name="edit_user_role" id="edit_user_role" class="form-control">
                                        <option value="{{ $u->id_role }}">{{ $u->role->role_name }}</option>
                                        @foreach ($role as $r)
                                        <option value="{{ $r->id_role }}">{{ $r->role_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Ubah User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- end edit modal user --}}
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
                    title: "Anda yakin untuk menghapus data user \"" + nama + "\"?",
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
