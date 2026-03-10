@extends("layout_dashboard/master")
@section("title", "Cek riwayat presensi")
@section("main")

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

<main class="main main--ml-sidebar-width">
    <div class="row">
        <header class="main__header col-12 mb-2">
            <div class="main__title">
                <h4>Riwayat Presensi</h4>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                    <li class="breadcrumb-item active">Riwayat Presensi</li>
                </ul>
            </div>
        </header>

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

        <div class="col-12 mb-3">
            <a href="{{ route('admin.download_riwayat') }}" class="btn btn--blue">
                <i class="fa fa-download"></i> Download Riwayat Presensi
            </a>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar Riwayat Presensi</h5>
                    <div style="overflow-x: auto;">
                        <table class="table table-hover table-striped" id="table">
                            <thead>
                                <tr>
                                    <th width="40px">No</th>
                                    <th width="180px">Nama</th>
                                    <th width="200px">Gambar</th>
                                    <th width="100px">Keterangan</th>
                                    <th width="150px">Waktu Presensi</th>
                                    <th width="250px">Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($riwayat as $var)
                                <tr>
                                    <td><strong>{{ $no++ }}</strong></td>
                                    <td>{{ $var->name }}</td>
                                    <td>
                                        @if($var->keterangan=="Hadir")
                                            <img src="{{ $var->gambar }}" alt="Gambar presensi..." width="150px" style="border-radius: 6px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                                        @else
                                            <img src="{{ asset('img/user_icon.png') }}" alt="Default icon" width="150px" style="border-radius: 6px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                                        @endif
                                    </td>
                                    <td>
                                        @if($var->keterangan=="Hadir")
                                            <span class="badge badge-success">
                                                <i class="fa fa-check-circle"></i> Hadir
                                            </span>
                                        @else
                                            <span class="badge badge-secondary">
                                                <i class="fa fa-circle-o"></i> Belum
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($var->updated_at == null)
                                            <span style="color: #999;">-</span>
                                        @else
                                            {{ $var->updated_at->format('d/m/Y H:i') }}
                                        @endif
                                    </td>
                                    <td>
                                        <small>{{ $var->deskripsi ?? '-' }}</small>
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
</main>

@endsection

@push("script")
<script type="text/javascript" src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
   $('#table').DataTable({
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
</script>
@endpush
