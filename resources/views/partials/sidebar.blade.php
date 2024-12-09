<html>
<!-- Sidebar -->
<ul id="accordionSidebar" class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-logo logo"></div>
        <div class="sidebar-brand-text mx-3">GrammarLeap</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Studies and Quiz Rooms
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Classic Study</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Foundational</h6>
                <a class="collapse-item" href="buttons.html">Parts of Speech</a>
                <a class="collapse-item" href="cards.html">Tenses of Verb</a>
                <h6 class="collapse-header">Proficiency</h6>
                <a class="collapse-item" href="buttons.html">Parts of Speech</a>
                <a class="collapse-item" href="cards.html">Tenses of Verb</a>
                <h6 class="collapse-header">Advanced</h6>
                <a class="collapse-item" href="buttons.html">Parts of Speech</a>
                <a class="collapse-item" href="cards.html">Tenses of Verb</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Quiz Rooms</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Games
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pos-hunter') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>POS Hunter</span></a>
    </li>
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Sentence Fixer</span></a>
    </li>
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Tense Challenge</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Sentence Sorter</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

</html>
