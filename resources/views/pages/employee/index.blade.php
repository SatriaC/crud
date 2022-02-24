@extends('layouts.admin')

@section('title', 'Data Employee')
@section('content')

    <div class="container">
          @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <h4 class="alert-heading">Success</h4>
              <div class="alert-body">
                  {{ session('success') }}
              </div>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah Data Pegawai
                    </button>
                </div>
                <div class="card-body">
                    <div class="col-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Tanggal Lahir</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">No Telepon</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Agama</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $value)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $value->nama }}</td>
                                        <td>{{ $value->nip }}</td>
                                        <td>{{ $value->tanggal_lahir }}</td>
                                        <td>{{ $value->gender->nama }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->nomor_telepon }}</td>
                                        <td>{{ $value->alamat }}</td>
                                        <td>{{ $value->religion->nama }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <div class="dropdown">

                                                        <a class="btn btn-sm btn-info" href="{{route('employee.edit', $value->id)}}">
                                                            Sunting
                                                        </a>
                                                        <form action="{{route('employee.destroy',$value->id)}}" method="POST">
                                                            @method('delete') @csrf
                                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                                                                Hapus
                                                            </button>
                                                        </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('employee.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
                        </div>
                        <div class="mb-3">
                            <label for="nip" class="form-label">NIP</label>
                            <input type="text" class="form-control" id="nip" name="nip" value="{{ old('nip') }}">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                value="{{ old('tanggal_lahir') }}">
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Nama</label>
                            <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                                <option value="">Pilih Jenis Kelamin</option>
                                @foreach ($genders as $value)
                                    <option value="{{ $value->id }}"
                                        {{ old('jenis_kelamin') == $value->id ? 'selected' : '' }}>{{ $value->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email') }}">
                        </div>
                        <div class="mb-3">
                            <label for="nomor_telepon" class="form-label">No Telepon</label>
                            <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon"
                                value="{{ old('nomor_telepon') }}">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Alamat</label>
                            <textarea name="alamat" id="alamat" cols="30" rows="5"
                                class="form-control">{{ old('alamat') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="agama" class="form-label">Agama</label>
                            <select name="agama" class="form-control" id="agama">
                                <option value="">Pilih Agama</option>
                                @foreach ($genders as $value)
                                    <option value="{{ $value->id }}"
                                        {{ old('agama') == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
