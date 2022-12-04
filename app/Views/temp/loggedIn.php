<li class="nav-item login">
    <div class="dropdown dropstart ms-2">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Menu Lainnya
        </button>
        <ul class="dropdown-menu dropdown-menu-dark">
            <?php if (session()->get('role') == 'Admin') : ?>
                <li><a class="dropdown-item" href="<?php base_url() ?>/DashboardAdmin">Dashboard</a></li>
            <?php endif; ?>
            <?php if (session()->get('role') == 'UPK') : ?>
                <li><a class="dropdown-item" href="<?php base_url() ?>/DashboardUPK">Dashboard</a></li>
            <?php endif; ?>
            <?php if (session()->get('role') == 'BPH') : ?>
                <li><a class="dropdown-item" href="<?php base_url() ?>/DashboardBPH">Dashboard</a></li>
            <?php endif; ?>
            <li class="logout"><a class="dropdown-item" href="/Logout">Logout</a></li>
        </ul>
    </div>
</li>