<header class="mb-4">
    <div class="px-3 py-2 bg-success text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                    <span class="fs-4">{{ config('app.name') }}</span>
                </a>

                <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small text-center">
                    <li>
                        <a href="#" class="nav-link text-white" data-class="text-dark">
                            <x-admin.icon icon="house" size="24px"></x-admin.icon>
                            <br>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users.index') }}" class="nav-link text-white">
                            <x-admin.icon icon="person" size="24px"></x-admin.icon>
                            <br>
                            Users
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <x-admin.icon icon="table" size="24px"></x-admin.icon>
                            <br>
                            Posts
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
