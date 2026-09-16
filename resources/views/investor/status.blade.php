@php
$steps = [
    'submitted' => 'Application Submitted',
    'under_review' => 'Under Review',
    'info_requested' => 'Additional Information Requested',
    'approved' => 'Approved',
    'rejected' => 'Not Approved',
];
$currentIndex = array_search($application?->status, array_keys($steps));
@endphp

<x-layouts.investor :title="'Application Status'">
    <x-site.card title="Application Status" class="mx-auto max-w-3xl">
        @if (! $application || $application->status === 'draft')
            <p class="mt-4 text-sm text-navy-900/60">
                You have not submitted your application yet.
                <a href="{{ route('investor.application.edit') }}" class="text-gold-600 underline">Complete it now</a>.
            </p>
        @else
            <div class="mt-8 space-y-6">
                @foreach ($steps as $key => $label)
                    @php $index = array_search($key, array_keys($steps)); @endphp
                    <div class="flex items-center gap-4">
                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full text-xs font-semibold
                            {{ $currentIndex !== false && $index <= $currentIndex ? 'bg-navy-900 text-gold-400' : 'bg-navy-900/10 text-navy-900/40' }}">
                            {{ $index + 1 }}
                        </span>
                        <span class="text-sm font-medium {{ $currentIndex !== false && $index <= $currentIndex ? 'text-navy-900' : 'text-navy-900/40' }}">
                            {{ $label }}
                        </span>
                        @if ($key === $application->status)
                            <span class="ml-auto text-xs font-semibold text-gold-600">Current</span>
                        @endif
                    </div>
                @endforeach
            </div>

            @if ($application->status === 'info_requested' && $application->reviewer_notes)
                <div class="mt-8 rounded-sm border border-gold-500/40 bg-gold-500/10 px-4 py-3 text-sm text-gold-700">
                    <strong>Reviewer note:</strong> {{ $application->reviewer_notes }}
                </div>
            @endif

            @if ($application->status === 'rejected' && $application->reviewer_notes)
                <div class="mt-8 rounded-sm border border-red-300 bg-red-50 px-4 py-3 text-sm text-red-700">
                    <strong>Reason:</strong> {{ $application->reviewer_notes }}
                </div>
            @endif

            <p class="mt-8 text-xs text-navy-900/40">
                Submitted {{ $application->submitted_at?->format('d M Y, H:i') }}
            </p>
        @endif
    </x-site.card>
</x-layouts.investor>
