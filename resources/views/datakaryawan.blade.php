@extends('layout.admin')
@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
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
        <a href="/tambahdata" class="btn btn-primary">Tambah data+</a>
          {{-- membuat form cari --}}
          <div class="form-group row mt-2">
            <div class="col-sm-2">
              <form action="/karyawan" method="GET">
                <input type="search" class="form-control" name="cari" id="inputPassword" placeholder="Cari Karyawan">
              </form>
            </div>
            <div class="col-auto">
              <a href="/exportpdf" class="btn btn-primary btn-info">Export PDF</a>
            </div>
            <div class="col-auto">
              <a href="/exportexel" class="btn btn-warning btn-info">Export XLS</a>
            </div>
            <div class="col-auto">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Import XLS
              </button>
            </div>
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
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nomor Telpon</th>
                    <th scope="col">Aksi</th>
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
                    <td>{{ $k->alamat }}</td>
                    <td>{{ $k->jeniskelamin }}</td>
                    <td>
                      <img src="{{ asset('fotokaryawan/'.$k->foto) }}" alt="" style="width:40px";>
                    </td>
                    <td>0{{ $k->notlp }}</td>
                    <td>
                      <a href="/editdata/{{ $k->id }}" class="btn btn-success">Edit</a>
                      {{-- //pake swall kemudian kita panggil data id --}}
                      <a href="#" class="btn btn-danger delete" data-id="{{ $k->id }}" data-nama="{{ $k->nama }}">Hapus</a>                     
                    </td>
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

     @push('scripts')
      
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
  
  </body>
  <script>
    $('.delete').click(function(){
      var karyawanid = $(this).attr('data-id');
      var karyawannama = $(this).attr('data-nama');

            swal({
              title: "Yakin?",
              // text: "kamu akan mengkapus data karyawan dengan id "+karyawanid+" ",
              text: "kamu akan mengkapus data karyawan dengan id "+karyawannama+" ",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                window.location = "/hapusdata/"+karyawanid+" "
                swal("data berhasil dihapus", {
                  icon: "success",
                });
              } else {
                swal("data tidak jadi dihapus!");
              }
            });

    });
  </script>
  <script>
     @if (Session::has('success'))
     toastr.success("{{ Session::get('success') }}")
     @endif
    
  </script>
     @endpush


@endsection
