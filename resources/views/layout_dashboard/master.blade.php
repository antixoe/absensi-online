<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tag wajib -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> @yield('title') </title>
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/reza-admin.min.css') }}">
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

    <!-- <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />

    <link rel="icon" href="https://incrustwerush.org/img/site/icon.ico">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --success-color: #1bd741;
            --danger-color: #dd2525;
            --warning-color: #f59e0b;
            --info-color: #3b82f6;
            --light-bg: #f8f9fa;
            --border-color: #e0e0e0;
            --text-color: #333;
            --text-muted: #666;
            --card-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        body {
            background-color: var(--light-bg);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-color);
        }

        /* ===== NAVBAR ===== */
        .navbar {
            background-color: white !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 15px 30px !important;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color) !important;
            font-size: 18px;
            letter-spacing: -0.5px;
        }

        .navbar-brand img {
            margin-right: 10px;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            background: linear-gradient(180deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.15);
            padding: 30px 0 !important;
        }

        .sidebar__nav {
            list-style: none;
            padding: 0;
        }

        .sidebar__item {
            padding: 12px 20px;
            list-style: none;
            border-left: 4px solid transparent;
            transition: var(--transition);
        }

        .sidebar__item--header {
            font-weight: 700;
            color: rgba(255, 255, 255, 0.6);
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 1px;
            padding-top: 20px;
        }

        .sidebar__item a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: var(--transition);
            font-weight: 500;
        }

        .sidebar__item:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-left-color: white;
        }

        .sidebar__item a:hover {
            color: #fff;
            transform: translateX(5px);
        }

        .sidebar__item span {
            min-width: 20px;
            text-align: center;
        }

        .sidebar__btn-dropdown {
            color: white !important;
            cursor: pointer;
        }

        .sidebar__dropdown {
            list-style: none;
            background-color: rgba(255, 255, 255, 0.1);
            margin-top: 10px;
        }

        .sidebar__dropdown-item {
            padding: 10px 30px;
            border-left: 4px solid transparent;
            transition: var(--transition);
        }

        .sidebar__dropdown-item a {
            color: rgba(255, 255, 255, 0.9);
            font-weight: 400;
            padding: 8px 0;
        }

        .sidebar__dropdown-item:hover {
            background-color: rgba(255, 255, 255, 0.15);
            border-left-color: white;
        }

        .sidebar__dropdown-item a:hover {
            color: white;
        }

        /* ===== MAIN CONTENT ===== */
        .main {
            padding: 30px;
            min-height: calc(100vh - 200px);
        }

        .main__header {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            margin-bottom: 30px !important;
        }

        .main__title h4 {
            font-weight: 700;
            color: var(--primary-color);
            margin: 0 0 15px 0;
            font-size: 28px;
        }

        .breadcrumb {
            margin: 0;
            background: transparent;
            padding: 0;
        }

        .breadcrumb-item {
            font-size: 13px;
        }

        .breadcrumb-item a {
            color: var(--primary-color);
            text-decoration: none;
            transition: var(--transition);
        }

        .breadcrumb-item a:hover {
            color: var(--secondary-color);
        }

        .breadcrumb-item.active {
            color: var(--text-muted);
        }

        /* ===== CARDS ===== */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            margin-bottom: 20px;
        }

        .card:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        .card-body {
            padding: 25px;
        }

        .card-title {
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 15px;
            font-size: 20px;
        }

        .card-subtitle {
            font-size: 13px;
            color: var(--text-muted);
        }

        .card-text {
            font-size: 14px;
            line-height: 1.6;
        }

        /* ===== INFO BOX ===== */
        .info-box {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 25px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
            transition: var(--transition);
        }

        .info-box:hover {
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
            transform: translateY(-3px);
        }

        .info-box__icon {
            font-size: 40px;
            opacity: 0.8;
        }

        .info-box__description {
            flex: 1;
        }

        .info-box__description h2 {
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
            margin: 0 0 10px 0;
            opacity: 0.8;
        }

        .info-box__description h1 {
            font-size: 36px;
            font-weight: 700;
            margin: 0;
        }

        .info-box__description time {
            font-size: 12px;
            opacity: 0.7;
            display: block;
            margin-top: 8px;
        }

        .info-box__btn-detail {
            font-size: 24px;
            color: white;
            text-decoration: none;
            opacity: 0.6;
            transition: var(--transition);
        }

        .info-box__btn-detail:hover {
            opacity: 1;
            transform: translateX(5px);
        }

        /* ===== FORMS ===== */
        .form-control, .custom-file-input {
            border: 2px solid var(--border-color);
            border-radius: 8px;
            padding: 10px 15px;
            font-size: 14px;
            transition: var(--transition);
            background-color: var(--light-bg);
        }

        .form-control:focus, .custom-file-input:focus {
            border-color: var(--primary-color);
            background-color: white;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            outline: none;
        }

        .form-control::placeholder {
            color: var(--text-muted);
        }

        .form-control.is-invalid {
            border-color: var(--danger-color);
            background-color: #fff5f5;
        }

        .form-control.is-invalid:focus {
            box-shadow: 0 0 0 4px rgba(221, 37, 37, 0.1);
        }

        label {
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 8px;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .invalid-feedback {
            color: var(--danger-color);
            font-size: 12px;
            margin-top: 5px;
            display: block;
        }

        .custom-file-label {
            padding: 10px 15px;
            border-radius: 8px;
            background-color: var(--light-bg);
            color: var(--text-muted);
        }

        .custom-file-input:focus ~ .custom-file-label {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        /* ===== BUTTONS ===== */
        .btn {
            font-weight: 600;
            border-radius: 8px;
            padding: 10px 24px;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: var(--transition);
            border: none;
            cursor: pointer;
        }

        .btn--blue {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        .btn--blue:hover {
            box-shadow: 0 6px 16px rgba(102, 126, 234, 0.4);
            transform: translateY(-2px);
            color: white;
        }

        .btn--blue:active {
            transform: translateY(0);
        }

        .badge {
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .badge-success {
            background-color: var(--success-color);
            color: white;
        }

        .badge-danger {
            background-color: var(--danger-color);
            color: white;
        }

        .badge-warning {
            background-color: var(--warning-color);
            color: white;
        }

        /* ===== TABLES ===== */
        table {
            width: 100%;
            margin-bottom: 20px;
        }

        thead tr {
            background-color: var(--light-bg);
        }

        thead th {
            font-weight: 700;
            color: var(--text-color);
            border: none;
            padding: 15px;
            text-align: left;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
            border-bottom: 2px solid var(--border-color);
        }

        tbody td {
            padding: 15px;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-color);
            font-size: 14px;
        }

        tbody tr {
            transition: var(--transition);
        }

        tbody tr:hover {
            background-color: var(--light-bg);
        }

        /* ===== DATATABLE ===== */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 6px 12px;
            margin: 0 3px;
            border-radius: 6px;
            border: 1px solid var(--border-color);
            color: var(--primary-color);
            cursor: pointer;
            transition: var(--transition);
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.active {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        /* ===== FOOTER ===== */
        .footer {
            background-color: white;
            padding: 20px 30px;
            text-align: center;
            border-top: 1px solid var(--border-color);
            color: var(--text-muted);
            font-size: 13px;
        }

        .footer p {
            margin: 0;
        }

        /* ===== ALERT ===== */
        .alert {
            border: none;
            border-radius: 8px;
            padding: 15px 20px;
        }

        .bg-danger {
            background: linear-gradient(135deg, #ff6b6b 0%, #dd2525 100%) !important;
            color: white;
        }

        .bg-success {
            background: linear-gradient(135deg, #51cf66 0%, #1bd741 100%) !important;
            color: white;
        }

        .bg-warning {
            background: linear-gradient(135deg, #ffd93d 0%, #f59e0b 100%) !important;
            color: white;
        }

        .bg-info {
            background: linear-gradient(135deg, #74c0fc 0%, #3b82f6 100%) !important;
            color: white;
        }

        /* ===== CHECKBOX & RADIO ===== */
        input[type="checkbox"], input[type="radio"] {
            accent-color: var(--primary-color);
            cursor: pointer;
            width: 18px;
            height: 18px;
        }

        /* ===== SELECT ===== */
        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23667eea' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 36px;
        }

        /* ===== TEXTAREA ===== */
        textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }

        /* ===== CHART ===== */
        .chart {
            background: white;
            padding: 20px;
            border-radius: 12px;
        }

        .chart__header {
            margin-bottom: 20px;
        }

        .chart__header h6 {
            font-weight: 700;
            color: var(--primary-color);
            margin: 0;
        }

        .chart__body {
            min-height: 300px;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .main {
                padding: 15px;
            }

            .navbar {
                padding: 12px 15px !important;
            }

            .main__title h4 {
                font-size: 22px;
            }

            .sidebar__item {
                padding: 10px 15px;
            }

            .info-box {
                flex-direction: column;
                text-align: center;
            }

            .info-box__description h1 {
                font-size: 28px;
            }

            table {
                font-size: 12px;
            }

            thead th, tbody td {
                padding: 10px;
            }
        }

        /* ===== UTILITIES ===== */
        .text-muted {
            color: var(--text-muted) !important;
        }

        .shadow {
            box-shadow: var(--card-shadow) !important;
        }

        .border-0 {
            border: none !important;
        }

        hr {
            border: none;
            border-top: 1px solid var(--border-color);
            margin: 20px 0;
        }

        pre {
            background-color: var(--light-bg);
            padding: 0;
            border: none;
            border-radius: 8px;
            overflow-x: auto;
        }
    </style>
</head>
<body>

    <!-- navbar -->
    <nav class="navbar justify-content-start navbar--white">
        <a class="navbar__sidebar-toggler" href="#"><span class="fa fa-bars"></span></a>
        <a class="navbar-brand ml-3" href="#">
            <img src="https://incrustwerush.org/img/site/icon.ico" width="30px" alt="logo icwr">
            In Crust We Rush
        </a>
    </nav>

    <!-- Sidebar -->
    @include('layout_dashboard/sidebar')

    @yield('main')

    <!-- footer -->
    <footer class="footer footer--ml-sidebar-width">
        <p class="mb-2 mb-sm-0">Copyright &copy; In Crust We Rush. All rights reserved</p>
        <p>Version 2.0.0</p>
    </footer>

    <!-- Pertama jQuery, kemudian Bootstrap JS, dan Reza Admin JS -->
    <script src="{{ asset('/dist/js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/dist/js/reza-admin.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
    @stack("script")
</body>
</html>
