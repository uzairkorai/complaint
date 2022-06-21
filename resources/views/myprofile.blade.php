<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot> --}}

    <div class="px-60 py-10">
        <div class="card">
            <div class="card-header">My Profile</div>
            {{-- <div class="p-6 bg-white border-b border-gray-200">
                    Profile <br>
                    Your name is: {{Auth::user()->name}} <br>
                    Your email address: {{Auth::user()->email}} <br>
                </div> --}}
            <div class="card-body">
                <form action="/dashboard/myprofile" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}">
                    </div>

                    <button type="submit" class="btn btn-success">Update Profile</button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
