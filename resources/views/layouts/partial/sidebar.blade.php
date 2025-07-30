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

            <!-- Printer Type -->
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('printer.printer-type') }}">
                    <i class="align-middle" data-feather="layers"></i> <!-- better than printer -->
                    <span class="align-middle">Printer Type</span>
                </a>
            </li>

            <!-- Printer Settings -->
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('printer.printer-setting') }}">
                    <i class="align-middle" data-feather="sliders"></i> <!-- for settings -->
                    <span class="align-middle">Printer Setting</span>
                </a>
            </li>

            <!-- Printer Management -->
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('printers.index') }}">
                    <i class="align-middle" data-feather="cpu"></i> <!-- for actual printer device mgmt -->
                    <span class="align-middle">Printers</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
