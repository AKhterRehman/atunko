<x-layouts.admin :title="'System Settings'">
    <x-site.card title="Platform Configuration">
        <p class="mt-2 text-sm text-navy-900/60">Read-only overview of current operational configuration.</p>
        <dl class="mt-6 divide-y divide-navy-900/10">
            @foreach ($settings as $label => $value)
                <div class="flex items-center justify-between gap-4 py-3 text-sm">
                    <dt class="text-navy-900/60">{{ $label }}</dt>
                    <dd class="text-right font-medium text-navy-900">{{ $value }}</dd>
                </div>
            @endforeach
        </dl>
    </x-site.card>

    <x-site.card class="mt-6" title="Important Launch Conditions">
        <ul class="mt-4 space-y-2 text-sm text-navy-900/70">
            <li>&bull; Legal and compliance counsel must confirm jurisdictional KYC/AML, eligibility and disclosure requirements before production use.</li>
            <li>&bull; A real KYC/AML provider must be integrated before accepting live investor capital.</li>
            <li>&bull; Backups, monitoring and penetration testing must be configured before production deployment.</li>
        </ul>
    </x-site.card>
</x-layouts.admin>
