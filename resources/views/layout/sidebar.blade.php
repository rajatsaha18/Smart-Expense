<div class="sidebar-wrapper">
    <nav class="mt-2">
      <!--begin::Sidebar Menu-->
      <ul
        class="nav sidebar-menu flex-column"
        data-lte-toggle="treeview"
        role="menu"
        data-accordion="false"
      >
      <!--check if role user then go to user dashboard-->
        <li class="nav-item menu-open">
            @if (Auth::user()->role == 'user')
            <a href="{{ route('user.dashboard') }}" class="nav-link active">
                <i class="nav-icon bi bi-speedometer"></i>
                <p>
                  Dashboard
                </p>
              </a>

            @else
          <a href="{{ route('admin.dashboard') }}" class="nav-link active">
            <i class="nav-icon bi bi-speedometer"></i>
            <p>
              Dashboard
            </p>
          </a>
          @endif
        </li>
        <li class="nav-item">
          <a href="{{ route('category.index') }}" class="nav-link">
            <i class="fa-solid fa-list"></i>
            <p>
                Category
            </p>
          </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('budget.index') }}" class="nav-link">
              <i class="fa-solid fa-money-check-dollar"></i>
              <p>
                  Budget
              </p>
            </a>
          </li>
        <li class="nav-item">
          <a href="{{ route('transaction.index') }}" class="nav-link">
            <i class="fa-solid fa-money-check-dollar"></i>
            <p>
                Transaction(Income & Expense Manage)
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('report.index') }}" class="nav-link">
            <i class="fa-solid fa-file-invoice"></i>
            <p>
                Reports
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('user.list') }}" class="nav-link">
            <i class="fa-solid fa-file-invoice"></i>
            <p>
                User List
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('profile.edit') }}" class="nav-link">
            <i class="fa-solid fa-user"></i>
            <p>
                Profile Update
            </p>
          </a>
        </li>

        {{-- <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-box-seam-fill"></i>
            <p>
              Widgets
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./widgets/small-box.html" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>Small Box</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./widgets/info-box.html" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>info Box</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./widgets/cards.html" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>Cards</p>
              </a>
            </li>
          </ul>
        </li> --}}
      </ul>
      <!--end::Sidebar Menu-->
    </nav>
  </div>
