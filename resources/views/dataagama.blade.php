@extends('layout.admin')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Data Agama</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v2</li> --}}
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <div class="container">
        <a href="/tambahagama" class="btn btn-primary">Tambah data+</a>
          {{-- membuat form cari --}}
          <div class="form-group row mt-2">
            {{-- <div class="col-sm-2">
              <form action="/karyawan" method="GET">
                <input type="search" class="form-control" name="cari" id="inputPassword" placeholder="Cari Karyawan">
              </form>
            </div>
            <div class="col-auto">
              <a href="/exportpdf" class="btn btn-primary btn-info">Export PDF</a>
            </div>
            <div class="col-auto">
              <a href="/exportexel" class="btn btn-warning btn-info">Export XLS</a>
            </div> --}}
            {{-- <div class="col-auto">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Import XLS
              </button>
            </div> --}}
          </div>
      
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="/importexel" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="modal-body">
                    <div class="form-group">
                      <input type="file" name="file" required>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
                </div>
              </div>
            </div>
      
         
        {{-- @if ($message = Session::get('success'))
        <div class="alert alert-primary" role="alert">
          {{ $message }}
        </div>
        @endif --}}
        <div class="row justify-content-center mt-4">
          <div class="col mb-8">
            <div>
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Agama</th>

                  </tr>
                </thead>
                @php
                    $no = 1;
                @endphp
                <tbody>
                   @foreach ($data as $index => $k)
                  <tr>
                    <th scope="row">{{ $index + $data->firstItem() }}</th>
                    <td>{{ $k->nama }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $data->links() }}
            </div>
          </div>
        </div>
      </div>

    <div>
  </body>



@endsection
