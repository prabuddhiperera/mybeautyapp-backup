<!-- resources/views/auth/admin-login.blade.php -->
@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-12">
    <h2 class="text-2xl font-bold mb-4">Admin login</h2>

    @if ($errors->any())
      <div class="text-red-600 mb-4">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf

        <label>Name</label>
        <input name="name" value="{{ old('name') }}" class="w-full mb-2 p-2 border" />

        <label>Password</label>
        <input type="password" name="password" class="w-full mb-4 p-2 border" />

        <button class="px-4 py-2 bg-blue-600 text-white rounded">Login</button>
    </form>
</div>
@endsection
