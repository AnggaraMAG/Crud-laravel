<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>{{$title}}</title>
  </head>
  <body>
      <div class="container col-md-8 mt-4">
    <h1 class="text-center">Daftar Nama Siswa</h1>
    <div class="my-3 float-right">
        <a href="/create" class="btn btn-primary">Tambah Data Siswa</a>
    </div>
    @if (session('status'))
    <div class="alert alert-success col-md-6">
        {{session('status')}}
    </div>
    @endif
    <div>
        <p class="text-center font-weight-bolder bg-danger col-3">Jumlah Siswa : {{$jumlahData}}</p>
    </div>
    <div>

        <table class="table table-hover">
            <thead class="text-center">
                <tr>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Umur</th>
                        <th>Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($crud_list as $siswa)
                <tr>
                        <td>{{$siswa->nisn}}</td>
                        <td>{{$siswa->nama}}</td>
                        <td>{{$siswa->tanggal_lahir}}</td>
                        <td>{{$siswa->umur}}</td>
                        <td>
                            <a href="/crud/edit/{{$siswa->id}}" class="btn btn-dark">Edit</a>
                            <a href="/detail/{{$siswa->id}}" class="btn btn-info" ">Detail</a>
                            <form action="/crud/{{$siswa->id}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button  onclick="return confirm('yakin?')" type="submit" class="btn btn-danger"> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
