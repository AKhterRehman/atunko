<x-layouts.admin :title="'Users & Roles'">
    <x-site.card>
        <div class="grid grid-cols-12 gap-4 border-b border-navy-900/10 pb-3 text-xs font-semibold uppercase tracking-widest text-navy-900/40">
            <div class="col-span-3">Name</div>
            <div class="col-span-3">Email</div>
            <div class="col-span-2">Role</div>
            <div class="col-span-2">Status</div>
            <div class="col-span-2"></div>
        </div>

        <div class="divide-y divide-navy-900/5">
            @foreach ($users as $user)
                <form method="POST" action="{{ route('admin.users.update', $user) }}" class="grid grid-cols-12 items-center gap-4 py-3 text-sm">
                    @csrf
                    @method('PUT')
                    <div class="col-span-3 font-medium text-navy-900">{{ $user->name }}</div>
                    <div class="col-span-3 text-navy-900/60">{{ $user->email }}</div>
                    <div class="col-span-2">
                        <select name="role" class="w-full rounded-sm border border-navy-900/15 bg-white px-2 py-1.5 text-sm">
                            @foreach (['investor', 'reviewer', 'compliance', 'admin'] as $role)
                                <option value="{{ $role }}" @selected($user->role === $role)>{{ ucfirst($role) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-2">
                        <select name="account_status" class="w-full rounded-sm border border-navy-900/15 bg-white px-2 py-1.5 text-sm">
                            @foreach (['active', 'suspended', 'closed'] as $status)
                                <option value="{{ $status }}" @selected($user->account_status === $status)>{{ ucfirst($status) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-2 text-right">
                        <button type="submit" class="rounded-sm border border-navy-900/15 px-3 py-1.5 text-xs font-semibold text-navy-900 hover:border-gold-500">Save</button>
                    </div>
                </form>
            @endforeach
        </div>

        <div class="mt-6">{{ $users->links() }}</div>
    </x-site.card>
</x-layouts.admin>
