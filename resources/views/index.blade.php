<div class="d-flex justify-content-center align-items-center">
    @foreach (\App\Models\User::find(1)->roles as $role)

        {{$role->role->name}}

    @endforeach
</div>