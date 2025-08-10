@extends('layouts.app')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center py-10">
  <div class="w-full max-w-md bg-white shadow rounded-lg p-6">
    <h1 class="text-2xl font-bold mb-6 text-center">Admin Login</h1>
    @if ($errors->any())
      <div class="mb-4 text-red-600 text-sm">
        {{ $errors->first() }}
      </div>
    @endif
    <form method="POST" action="{{ route('login.attempt') }}">
      @csrf
      <div class="mb-4">
        <label class="block mb-1 font-medium" for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email', 'admin@admin.com') }}" required autofocus class="w-full border rounded px-3 py-2">
      </div>
      <div class="mb-4">
        <label class="block mb-1 font-medium" for="password">Password</label>
        <input id="password" type="password" name="password" value="password" required class="w-full border rounded px-3 py-2">
      </div>
      <div class="flex items-center justify-between mb-6">
        <label class="inline-flex items-center">
          <input type="checkbox" name="remember" class="mr-2">
          <span>Remember me</span>
        </label>
        <a class="text-purple-600 text-sm" href="#">Forgot password?</a>
      </div>
      <button type="submit" class="w-full bg-purple-600 text-white py-2 rounded hover:bg-purple-700 transition">Login</button>
    </form>
  </div>
  </div>
@endsection


