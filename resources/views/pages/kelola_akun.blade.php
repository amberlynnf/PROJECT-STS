@extends('template.navbar')

@section('content-dinamis')  
    <div class="container mt-5">
        <div class="d-flex justify-content-end">
            <form class="d-flex me-3" action="{{ route('kelola_akun.user') }}" method="GET">
                {{-- 1. tag form harus ada action sama method
                    2. value method GET/POST
                        - GET : form yg fungsinya untuk mencari
                        - POST : form yg fungsinya untuk menambah/menghapus/mengubah
                    3. input harus ada attr name, name => mengambil data dr isian input agar bisa di proses di controller
                    4. ada button/input yg type="submit"
                    5. action
                        - form untuk mencari : action ambil route yg menampilkan halaman blade ini (return view blade ini)
                        - form bukan mencari : action terpisah dengan route return view bladenya
                 --}}
                @if (Request::get('kelola_akun') == 'akun')
                    <input type="hidden" name="kelola_akun" value="akun">
                @endif
                <input type="text" name="cari" placeholder="Search Username..." class="form-control me-2">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
            <form action="{{ route('kelola_akun.user') }}" method="GET" class="me-2">
                <input type="hidden" name="kelola_akun" value="akun">
            </form>
               {{-- <button class="btn btn-success">+ Tambah</button> --}}

               <a href="{{ route('kelola_akun.tambah')}}" class="btn btn-success">+ Add</a>
            </div>
            @if(Session::get('success'))
            <div class="alert alert-success" id="alert-user"> 
                {{ Session::get('success')}}
            </div>
        @endif
    
            <table class="table table-stripped table-bordered mt-3 text-center">
    
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                </thead>
                <tbody>
                    {{-- jika data obat kosong --}}
                    @if (count($users) < 0)
                        <tr>
                            <td colspan="6">Account Data Empty</td>
                        </tr>
                    @else
                    @foreach ($users as $index => $item)
<tr>
    <td>{{ ($users->currentPage()-1) * ($users->perpage()) + ($index+1) }}</td>
    <td>{{ $item['name'] }}</td>
    <td>{{ $item['email'] }}</td>
    <td>{{ $item['role'] }}</td>
    {{-- $item['column_di_migration'] --}}
    <td class="d-flex justify-content-center">
        <a href="{{ route('kelola_akun.ubah' , $item['id']) }}" class="btn btn-primary me-2">Edit</a>
        {{-- showModalDelete mengirim data id untuk spesifik data yang dihapus, name untuk nama obat didalam modal --}}
        {{-- $item dari foreach --}}
        <button class="btn btn-danger" onclick="showModalDeleteUser('{{ $item->id }}', '{{ $item->name}}')">Delete</button>
    </td>
</tr>
@endforeach
 @endif

</trbody>
</table>
</div>
      {{-- memanggil pagination --}}
      <div class="d-flex justify-content-end my-3">
        {{ $users->links() }}
    </div>
</div>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="POST">
        @csrf
        @method('DELETE')
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
    <p>Are You Sure You Want to Delete Data User <b id="name_user"></b>?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Delete</button>
        </div>
      </div>
    </form>
    </div>
  </div>


@push('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
function showModalDeleteUser(id,name) {

    // memasukan teks dari parameter ke html bagian id="name_user"
    $("#name_user").text(name); // $ yaitu jquery, mempersingkat sintaks js || // Menampilkan nama pengguna di modal
    // memanggil route hapus
    let url = "{{ route('kelola_akun.hapus', ':id') }}"; 
    // isi path dinamis :id dari data parameter id ||  // Mengganti :id dengan ID pengguna
    url = url.replace(':id', id);
    // action="" di form diisi dengan url diatas
    $('form').attr('action', url); // Menetapkan action form untuk penghapusan
    //memunculkan modal dengan id="exampleModal"
    $("#exampleModalUser").modal('show'); // menampilkan modal
}


</script>
@endpush
   
</trbody>
</table>
</div>
        @endsection