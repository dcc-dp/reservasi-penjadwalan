
@extends('layouts.user_type.auth')

@section('content')
<div class="container mt-4">
  <h4>Edit Profile Instruktur</h4>
  <form action="{{ route('profile-instruktur.update', $profile->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="user_id" class="form-label">User</label>
      <select name="user_id" id="user_id" class="form-control" required>
        @foreach ($users as $user)
          <option value="{{ $user->id }}" {{ $profile->user_id == $user->id ? 'selected' : '' }}>
            {{ $user->name }}
          </option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="keahlian" class="form-label">Keahlian</label>
      <input type="text" name="keahlian" id="keahlian" class="form-control" value="{{ $profile->keahlian }}" required>
    </div>
    <div class="mb-3">
      <label for="pengalaman" class="form-label">Pengalaman</label>
      <input type="text" name="pengalaman" id="pengalaman" class="form-control" value="{{ $profile->pengalaman }}" required>
    </div>
    <div class="mb-3">
      <label for="bio" class="form-label">Bio</label>
      <textarea name="bio" id="bio" class="form-control">{{ $profile->bio }}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('profile-instruktur.index') }}" class="btn btn-secondary">Batal</a>
  </form>
</div>
@endsection
