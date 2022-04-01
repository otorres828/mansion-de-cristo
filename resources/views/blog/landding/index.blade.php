@extends('layouts.blog')

@section('title', 'Mansion de Cristo')

@section('main')
    <div style="height:100vh">
        <div class="card card-body shadow-sm table-wrapper table-responsive">
            <div class="table-settings mb-4">
                <div class="row justify-content-between align-items-center">
                    <div class="col-6 col-lg-4 d-flex">
                        <div class="input-group me-2 me-lg-3">
                            <span class="input-group-text"><svg class="icon icon-xs" x-description="Heroicon name: solid/search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                </svg></span>
                            <input wire:model="search" type="text" class="form-control" placeholder="Search roles">
                        </div>
                        <div class="col-2 d-flex">
                            <select wire:model="entries" class="form-select mb-0" id="entries" aria-label="Entries per page">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
                                                <table class="table user-table table-hover align-items-center overflow-hidden">
    <thead>
        <tr>
                        
            <th class="border-bottom">
            <a wire:click="sortBy('name')" class="text-default me-3">
            <span>Name</span>

            <span>
                                    <i class="fas fa-sort-up"></i>
                            </span>
        </a>
    </th>
                    <th class="border-bottom">
            <a wire:click="sortBy('description')" class="text-default me-3">
            <span>Description</span>

            <span>
                                    <i class="fas fa-sort"></i>                
                            </span>
        </a>
    </th>
                    <th class="border-bottom">
            <a wire:click="sortBy('created_at')" class="text-default me-3">
            <span>Date created</span>

            <span>
                                    <i class="fas fa-sort"></i>                
                            </span>
        </a>
    </th>
                                        <th class="border-bottom">
        <a class="text-default me-3">Action</a>
    </th>
                    
        </tr>
    </thead>


        <tbody>
            <tr>
    <td>
    <span>Admin</span>
</td>                        <td>
    <span>This is the administration role</span>
</td>                        <td>
    <span>01 Apr 2022</span>
</td>                                                <td>
    <span><div class="btn-group">
    <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
        <span class="visually-hidden">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1" style="margin: 0px;">
        <a class="dropdown-item rounded-top" href="https://volt-pro-laravel-admin-dashboard.updivision.com/edit-role/1"><span class="fas fa-user-shield me-2"></span> Edit role</a>
                                <a onclick="confirm('Are you sure you want to remove this role?') || event.stopImmediatePropagation()" wire:click="delete(1)" class="dropdown-item text-danger rounded-bottom"><span class="fas fa-user-times me-2"></span>Delete role</a>
    </div>
</div></span>
</td>
</tr>                                        <tr>
    <td>
    <span>Creator</span>
</td>                        <td>
    <span>This is the creator role</span>
</td>                        <td>
    <span>01 Apr 2022</span>
</td>                                                <td>
    <span><div class="btn-group">
    <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
        <span class="visually-hidden">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
        <a class="dropdown-item rounded-top" href="https://volt-pro-laravel-admin-dashboard.updivision.com/edit-role/2"><span class="fas fa-user-shield me-2"></span> Edit role</a>
                                <a onclick="confirm('Are you sure you want to remove this role?') || event.stopImmediatePropagation()" wire:click="delete(2)" class="dropdown-item text-danger rounded-bottom"><span class="fas fa-user-times me-2"></span>Delete role</a>
    </div>
</div></span>
</td>
</tr>                                        <tr>
    <td>
    <span>Member</span>
</td>                        <td>
    <span>This is the member role</span>
</td>                        <td>
    <span>01 Apr 2022</span>
</td>                                                <td>
    <span><div class="btn-group">
    <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
        <span class="visually-hidden">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
        <a class="dropdown-item rounded-top" href="https://volt-pro-laravel-admin-dashboard.updivision.com/edit-role/3"><span class="fas fa-user-shield me-2"></span> Edit role</a>
                                <a onclick="confirm('Are you sure you want to remove this role?') || event.stopImmediatePropagation()" wire:click="delete(3)" class="dropdown-item text-danger rounded-bottom"><span class="fas fa-user-times me-2"></span>Delete role</a>
    </div>
</div></span>
</td>
</tr>
        </tbody>
</table>            <div class="mt-3">
                <div>
    </div>

            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('components.footerT')
@endsection
