@extends('index')

@section('title', 'BPS Kabupaten Kaimana')

@section('content')
<!-- Menyertakan partial view untuk Toast -->
@include('partials.toast')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <h2 class="text-xl font-bold text-gray-800 mb-6 text-center">Access Management</h2>

    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="w-full text-sm text-left text-gray-700">
            <thead class="text-xs uppercase bg-gray-100 text-gray-600">
                <tr>
                    <th class="px-6 py-3">Nama</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3 text-center">Status</th>
                    <th class="px-6 py-3 text-center">Role</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($users as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $user->nama }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>

                        {{-- Status (toggle via form) --}}
                        <td class="px-6 py-4 text-center">
                            <form method="POST" action="{{ route('user.update.access', $user->email) }}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="isAccepted" value="{{ $user->isAccepted ? 0 : 1 }}">
                                <button type="submit" class="px-2 py-1 rounded text-xs font-semibold
                                    {{ $user->isAccepted ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-600' }}">
                                    {{ $user->isAccepted ? 'Aktif' : 'Nonaktif' }}
                                </button>
                            </form>
                        </td>

                        {{-- Role (dropdown auto-submit) --}}
                        <td class="px-6 py-4 text-center">
                            <form method="POST" action="{{ route('user.update.access', $user->email) }}">
                                @csrf
                                @method('PATCH')
                                <select name="isAdmin" onchange="this.form.submit()" class="text-sm border-gray-300 rounded px-2 py-1">
                                    <option value="0" {{ !$user->isAdmin ? 'selected' : '' }}>User</option>
                                    <option value="1" {{ $user->isAdmin ? 'selected' : '' }}>Admin</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
