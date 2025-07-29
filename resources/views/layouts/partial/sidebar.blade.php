<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">

        <!-- Brand Logo -->
        <a class="sidebar-brand d-flex align-items-center gap-2 px-3 py-3" href="{{ url('/') }}">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" height="40" class="rounded-circle shadow-sm">
            <span class="align-middle fw-bold text-primary fs-5">PrintReceipt</span>
        </a>

        <ul class="sidebar-nav">

            <li class="sidebar-header">
                Pages
            </li>

            <!-- Dashboard -->
            <li class="sidebar-item active">
                <a class="sidebar-link" href="{{ url('/') }}">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <!-- Printer Type -->
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('printer.printer-type') }}">
                    <i class="align-middle" data-feather="printer"></i>
                    <span class="align-middle">Printer Type</span>
                </a>
            </li>

            <!-- Printer Management -->
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('printers.index') }}">
                    <i class="align-middle" data-feather="settings"></i>
                    <span class="align-middle">Printer Management</span>
                </a>
            </li>


            

        </ul>
    </div>
</nav>
