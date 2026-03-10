@extends("layout_dashboard/master")

@section("title","Manajemen User")

@section('main')
<!-- main -->
<main class="main main--ml-sidebar-width">
    <div class="row">
        <header class="main__header col-12 mb-3">
            <div class="main__title">
                <h4>Manajemen User</h4>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                    <li class="breadcrumb-item active">Manajemen User</li>
                </ul>
            </div>
        </header>
    </div>

    @if($cek_hari==0)
    <div class="col-12 mb-3">
        <div class="card bg-danger text-white" style="background: linear-gradient(135deg, #ff6b6b 0%, #dd2525 100%) !important; border: none;">
            <div class="card-body">
                <h5 class="card-title" style="margin-bottom: 10px;">
                    <i class="fa fa-exclamation-triangle"></i> Peringatan!
                </h5>
                <p class="card-text" style="margin: 0;">
                    Silahkan update pengaturan presensi pada menu <a href='{{ route("tambah.absensi") }}' class="text-white" style="text-decoration: underline; font-weight: 600;">"Buat Presensi"</a>. Jika tidak, user tidak bisa melakukan presensi.
                </p>
            </div>
        </div>
    </div>
    @endif

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Daftar User</h5>
                <p class="card-subtitle mb-3">Kelola user dan setujui pendaftaran baru</p>
                <div style="overflow-x: auto;">
                    <table class="table table-hover table-striped" id="users-table">
                        <thead>
                            <tr>
                                <th width="50px">No</th>
                                <th width="200px">Nama</th>
                                <th width="250px">Email</th>
                                <th width="100px">Role</th>
                                <th width="100px">Status</th>
                                <th width="150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach($data as $d)
                            <tr>
                                <td><strong>{{ $no++ }}</strong></td>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->email }}</td>
                                <td>
                                    <span class="badge" style="background-color: @if($d->role=='admin') #667eea @else #3b82f6 @endif; color: white;">
                                        {{ strtoupper($d->role) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="badge @if($d->accept=='yes') badge-primary @else badge-warning @endif">
                                        {{ strtoupper($d->accept) }}
                                    </div>
                                </td>
                                <td>
                                    @if($d->accept=="no")
                                    <a href="{{url('admin/user/accept/'.$d->id)}}" class="btn btn-sm" style="background-color: var(--success-color); color: white; font-size: 11px; padding: 5px 10px; border-radius: 4px; text-decoration: none; margin-right: 5px;">
                                        <i class="fa fa-check"></i> Terima
                                    </a>
                                    @endif
                                    <a href="{{url('admin/user/delete/'.$d->id)}}" class="btn btn-sm" style="background-color: var(--danger-color); color: white; font-size: 11px; padding: 5px 10px; border-radius: 4px; text-decoration: none;" onclick="return confirm('Yakin ingin menghapus?');">
                                        <i class="fa fa-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

@push("script")
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#users-table").DataTable({
            "pageLength": 25,
            "language": {
                "search": "Cari:",
                "paginate": {
                    "previous": "Sebelumnya",
                    "next": "Berikutnya"
                },
                "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ entries"
            }
        });
    });

    @if(session("berhasil"))
    Swal.fire({
        title: "Berhasil!",
        text: "User berhasil diterima!",
        icon: "success",
        confirmButtonColor: "#667eea"
    });
    @elseif(session("gagal"))
    Swal.fire({
        title: "Gagal!",
        text: "Gagal menerima user. Silahkan cek konfigurasi!",
        icon: "error",
        confirmButtonColor: "#667eea"
    });
    @endif
</script>
@endpush
@endsection

    @if(session("berhasil_delete"))
    Swal.fire({
      title: "Berhasil!",
      text: "Anda berhasil hapus user!",
      icon: "success"
    });
    @elseif(session("gagal_delete"))
    Swal.fire({
      title: "Gagal!",
      text: "Anda gagal menghapus user, silahkan cek konfigurasi!",
      icon: "error"
    });
    @endif

</script>
@endpush
@endsection
