@extends('layout.admin')
@section('content')
<body>
  <div class="container">
    <div class="row justify-content-center mt-4">
      
      <div class="col-sm-8">
      <div class=".col-mt-4 .ml-auto">
        <br>
        <h1 class="text-center mt-4">+ Edit Data Karyawan!</h1>
        <div class="card">
          <div class="card-body">
       
              <form action="/updatedata/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" name="nama" value="{{ $data->nama }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <input type="text" name="alamat" value="{{ $data->alamat }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputEmail1">Jenis Kelamin</label>
                    <div class="col-sm-6">
                      <select class="custom-select" name="jeniskelamin" value="{{ $data->jeniskelamin }}">
                        <option value="laki-laki" @if($data->jeniskelamin == "laki-laki") selected @endif>Laki-laki</option>
                      <option value="perempuan" @if($data->jeniskelamin == "perempuan") selected @endif>perempuan</option> 
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ganti Foto</label>
                    <input type="file" name="foto" value="{{ $data->foto }}" class="form-control" aria-describedby="emailHelp">
                    <img src="{{ asset('fotokaryawan/'.$data->foto) }}" alt="" style="width:40px";>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nomor Telepon</label>
                    <input type="number" name="notlp" value="{{ $data->notlp }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>
@endsection