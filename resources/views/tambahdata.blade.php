@extends('layout.admin')

@section('content')
<body>
  
  
    
    {{-- <button type="button" class="btn btn-primary">Tambah data+</button> --}}
    <div class="container">
    <div class="row justify-content-center mt-4">
      
      <div class="col-sm-8">
      <div class=".col-mt-4 .ml-auto">
        <br>
        <h2 class="text-center mt-4">+ Tambah Data Karyawan!</h2>
        <div class="card">
          <div class="card-body">
            
              <form action="/masukandata" method="POST" enctype="multipart/form-data">
                @csrf
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputEmail1">Jenis Kelamin</label>
                    <div class="col-sm-6">
                      <select class="custom-select" name="jeniskelamin">
                        <option selected>Pilih Jenis Kelamin</option>
                        <option value="laki-laki">Laki</option>
                        <option value="perempuan">Perempuan</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Masukan Foto</label>
                    <input type="file" name="foto" class="form-control" aria-describedby="emailHelp">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nomor Telepon</label>
                    <input type="number" name="notlp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('notlp')
                            <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                 
                  

                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <div>
          </div>
        </div>
      </div>
    </div>
  </div>

     <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
     <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


</body>


@endsection