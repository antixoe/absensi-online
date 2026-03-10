@extends('layout_dashboard/master')

@section('title', 'Dashboard')

@section('main')

<!-- main -->
<main class="main main--ml-sidebar-width">
    <div class="row">
        <header class="main__header col-12 mb-4">
            <div class="main__title">
                <h4>Dashboard</h4>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
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

        <div class="col-md-6 mb-3">
            <section class="info-box shadow border-0">
                <div class="info-box__icon"><i class="fa fa-shield"></i></div>
                <div class="info-box__description">
                    <h2>Total Admin</h2>
                    <h1>{{ $data_admin->count() }}</h1>
                    <time>
                        Terakhir diubah: 
                        @if($data_admin->latest("updated_at")->first())
                            {{ $data_admin->latest("updated_at")->first()->updated_at->format('d/m/Y H:i') }}
                        @else
                            -
                        @endif
                    </time>
                </div>
                <a class="info-box__btn-detail" href="{{ route('action.user') }}" title="Lihat manajemen user">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </section>
        </div>

        <div class="col-md-6 mb-3">
            <section class="info-box shadow border-0" style="background: linear-gradient(135deg, #51cf66 0%, #1bd741 100%); color: white;">
                <div class="info-box__icon"><i class="fa fa-users"></i></div>
                <div class="info-box__description">
                    <h2>Total User</h2>
                    <h1>{{ $data_user->count() }}</h1>
                    <time>
                        Terakhir diubah: 
                        @if($data_user->latest("updated_at")->first())
                            {{ $data_user->latest("updated_at")->first()->updated_at->format('d/m/Y H:i') }}
                        @else
                            -
                        @endif
                    </time>
                </div>
                <a class="info-box__btn-detail" href="{{ route('action.user') }}" title="Lihat manajemen user" style="color: white;">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </section>
        </div>

        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar User Terbaru</h5>
                    <p class="card-subtitle mb-3">Data 10 user paling terakhir didaftarkan</p>
                    <div style="overflow-x: auto;">
                        <table class="table table-hover table-striped" id="users-table">
                            <thead>
                                <tr>
                                    <th width="50px">No</th>
                                    <th width="200px">Nama</th>
                                    <th width="250px">Email</th>
                                    <th width="100px">Role</th>
                                    <th width="100px">Status</th>
                                    <th width="120px">Terdaftar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>
                                @foreach($data_user_in_table as $d)
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
                                        <small>{{ $d->created_at->format('d/m/Y') }}</small>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if($data_user->latest("updated_at")->first())
                        <h5 class="card-title">Statistik Presensi</h5>
                        <p class="card-subtitle mb-4">
                            Status presensi untuk hari ini
                        </p>
                        <div style="position: relative; height: 300px;">
                            <canvas id="pie_chart"></canvas>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fa fa-chart-pie" style="font-size: 48px; color: #ddd; margin-bottom: 20px;"></i>
                            <h5 style="color: #999;">Data statistik tidak tersedia</h5>
                            <p style="color: #aaa;">Belum ada data presensi untuk ditampilkan</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

@if(session("success_login"))
    @push("script")
    <script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "success",
            title: "Selamat datang!"
        });
    </script>
    @endpush
@endif

@push("script")
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    // Initialize DataTable
    $(document).ready(function(){
        $("#users-table").DataTable({
            "pageLength": 10,
            "order": [[5, "desc"]],
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

    // Pie Chart
    @if($data_user->latest("updated_at")->first())
    const pieChart = document.querySelector("#pie_chart");
    if (pieChart) {
        const ctx = pieChart.getContext('2d');
        const configPieChart = {
            type: 'doughnut',
            data: {
                labels: ['Sudah Presensi', 'Belum Presensi'],
                datasets: [{
                    data: [{{ $count_hadirRiwayatPresensi }}, {{ $count_allUsers - $count_hadirRiwayatPresensi }}],
                    backgroundColor: [
                        "rgba(27, 215, 65, 0.8)",
                        "rgba(221, 37, 37, 0.8)"
                    ],
                    borderColor: [
                        "#1bd741",
                        "#dd2525"
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            font: {
                                size: 13,
                                weight: 'bold'
                            }
                        }
                    }
                }
            }
        };
        new Chart(ctx, configPieChart);
    }
    @endif

    @if(session("error_https"))
    Swal.fire({
        title: "Peringatan!",
        text: "Situs web Anda tidak menggunakan protokol HTTPS. Harap perbaiki konfigurasi agar menggunakan HTTPS, karena ini dapat menyebabkan masalah dengan kamera web!",
        icon: "warning",
        confirmButtonColor: "#667eea"
    });
    @endif
</script>
@endpush
