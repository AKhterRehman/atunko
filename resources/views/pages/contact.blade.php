<x-layouts.public :title="'Contact'">

    <x-site.page-header eyebrow="Get In Touch" title="Contact ATUNKO Partnership"
        description="For investor enquiries, partnership proposals or general questions, reach out and our team will respond promptly." />

    <section class="bg-cream-50 px-6 py-24 lg:px-8">
        <div class="mx-auto grid max-w-6xl gap-16 lg:grid-cols-5">
            <div class="lg:col-span-2">
                <x-site.eyebrow>Contact Details</x-site.eyebrow>
                <dl class="mt-6 space-y-6 text-sm text-navy-900/70">
                    <div>
                        <dt class="font-semibold text-navy-900">General enquiries</dt>
                        <dd class="mt-1">enquiries@atunkopartnership.com</dd>
                    </div>
                    <div>
                        <dt class="font-semibold text-navy-900">Investor relations</dt>
                        <dd class="mt-1">investors@atunkopartnership.com</dd>
                    </div>
                    <div>
                        <dt class="font-semibold text-navy-900">Proposed international base</dt>
                        <dd class="mt-1">Bahrain &mdash; subject to regulatory approval</dd>
                    </div>
                </dl>
                <p class="mt-8 text-sm text-navy-900/50">
                    For investment enquiries, please use our
                    <a href="{{ route('register-interest') }}" class="text-gold-600 underline">investor registration</a> form instead.
                </p>
            </div>

            <div class="lg:col-span-3">
                <div class="rounded-sm border border-navy-900/10 bg-white p-8 shadow-sm">
                    @if (session('status'))
                        <div class="mb-6 rounded-sm border border-gold-500/40 bg-gold-500/10 px-4 py-3 text-sm text-gold-700">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.store') }}" class="space-y-6">
                        @csrf

                        <div>
                            <label for="name" class="text-xs font-semibold uppercase tracking-widest text-navy-900/50">Full Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                   class="mt-2 block w-full rounded-sm border-0 border-b border-navy-900/20 bg-transparent px-0 py-2.5 text-navy-900 focus:border-gold-500 focus:ring-0">
                            @error('name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="email" class="text-xs font-semibold uppercase tracking-widest text-navy-900/50">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                   class="mt-2 block w-full rounded-sm border-0 border-b border-navy-900/20 bg-transparent px-0 py-2.5 text-navy-900 focus:border-gold-500 focus:ring-0">
                            @error('email') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="subject" class="text-xs font-semibold uppercase tracking-widest text-navy-900/50">Subject</label>
                            <input type="text" name="subject" id="subject" value="{{ old('subject') }}"
                                   class="mt-2 block w-full rounded-sm border-0 border-b border-navy-900/20 bg-transparent px-0 py-2.5 text-navy-900 focus:border-gold-500 focus:ring-0">
                        </div>

                        <div>
                            <label for="message" class="text-xs font-semibold uppercase tracking-widest text-navy-900/50">Message</label>
                            <textarea name="message" id="message" rows="5" required
                                      class="mt-2 block w-full rounded-sm border-0 border-b border-navy-900/20 bg-transparent px-0 py-2.5 text-navy-900 focus:border-gold-500 focus:ring-0">{{ old('message') }}</textarea>
                            @error('message') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <button type="submit"
                                class="w-full rounded-sm bg-gold-500 px-6 py-3 text-sm font-semibold text-navy-950 transition hover:bg-gold-400">
                            Send message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</x-layouts.public>
