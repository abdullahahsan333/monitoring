<x-layouts.app :title="__('Create Monitor')">
    <flux:modal name="monitors-modal" :show="true" focusable class="max-w-xl">
        <div class="w-full rounded-xl border border-neutral-200 !bg-panel p-6 shadow-sm">
            <div class="mb-4 flex items-center justify-between">
                <flux:heading size="xl" class="!text-white">{{ __('Create your first monitor') }}</flux:heading>
                <span class="text-xs text-white">{{ __('Step 1 of 4') }}</span>
            </div>

            <div class="space-y-4">
                <div class="grid gap-2">
                    <label class="text-sm font-medium text-white">{{ __('What would you like to monitor?') }}</label>
                    <div class="rounded-lg border border-neutral-200">
                        <div class="p-3">
                            <div class="text-sm font-medium text-white">{{ __('HTTP / website monitoring') }}</div>
                            <div class="text-xs text-white">{{ __('Use HTTP(s) monitor to monitor your website.') }}</div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 border-t border-neutral-200 p-3">
                            <label class="flex items-center gap-2 rounded-md border border-neutral-200 p-2 text-sm">
                                <input type="checkbox" name="monitor_features[]" value="keyword" class="shrink-0 size-4 rounded border-neutral-600 bg-neutral-800 accent-emerald-500">
                                <span class="text-white">{{ __('Keyword monitoring') }}</span>
                            </label>
                            <label class="flex items-center gap-2 rounded-md border border-neutral-200 p-2 text-sm">
                                <input type="checkbox" name="monitor_features[]" value="ping" class="shrink-0 size-4 rounded border-neutral-600 bg-neutral-800 accent-emerald-500">
                                <span class="text-white">{{ __('Ping monitoring') }}</span>
                            </label>
                            <label class="flex items-center gap-2 rounded-md border border-neutral-200 p-2 text-sm">
                                <input type="checkbox" name="monitor_features[]" value="port" class="shrink-0 size-4 rounded border-neutral-600 bg-neutral-800 accent-emerald-500">
                                <span class="text-white">{{ __('Port monitoring') }}</span>
                            </label>
                        </div>
                    </div>
                </div>

                <form id="monitor-create-form" class="grid gap-4" action="#" method="post">
                    @csrf
                    <flux:input
                        name="url"
                        :label="__('URL to monitor')"
                        type="text"
                        placeholder="https://example.com/"
                        required
                    />

                    <div class="grid gap-2">
                        <label class="text-sm font-medium text-white">{{ __('Tags') }}</label>
                        <div class="rounded-lg border border-neutral-200 p-3">
                            <div id="tags-container" class="space-y-2">
                                <div id="tags-list" class="flex flex-wrap gap-2 mb-2"></div>
                                <input 
                                    type="text" 
                                    id="tags-input" 
                                    class="w-full bg-transparent border-none outline-none text-white placeholder:text-neutral-400 text-sm"
                                    placeholder="{{ __('Type tags and press Enter or comma to add...') }}"
                                />
                            </div>
                            <input type="hidden" id="tags-value" name="tags" value="" />
                        </div>
                        <div class="text-xs text-neutral-400">
                            {{ __('Press Enter, comma, or Tab to add tags. Click × to remove.') }}
                        </div>
                    </div>

                    <div class="grid gap-2">
                        <label class="text-sm font-medium text-white">{{ __('Up HTTP status codes') }}</label>
                        <div class="rounded-lg border border-neutral-200 p-3">
                            <div id="status-codes-container" class="space-y-2">
                                <div id="status-codes-list" class="flex flex-wrap gap-2 mb-2"></div>
                                <input 
                                    type="text" 
                                    id="status-codes-input" 
                                    class="w-full bg-transparent border-none outline-none text-white placeholder:text-neutral-400 text-sm"
                                    placeholder="{{ __('Type status codes and press Enter or comma to add...') }}"
                                />
                            </div>
                            <input type="hidden" id="status-codes-value" name="status_codes" value="2xx, 3xx" />
                        </div>
                        <div class="text-xs text-neutral-400">
                            {{ __('Press Enter, comma, or Tab to add status codes. Click × to remove.') }}
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-3 text-center">
                        <div class="text-xs text-white">
                            {{ __('You can setup monitor interval, domain and SSL monitoring, cron job monitoring and more later in monitor settings.') }}
                        </div>

                        <flux:button 
                            type="submit"
                            class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-white hover:bg-primary-hover"
                        >
                            {{ __('Create monitor') }}
                        </flux:button>
                    </div>
                </form>
            </div>

            <div class="mt-6 text-center">
                <flux:link :href="route('monitoring.index')" class="text-sm" wire:navigate>{{ __('Skip onboarding') }}</flux:link>
            </div>
        </div>
    </flux:modal>

    @push('all_script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tagsInput = document.getElementById('tags-input');
            var tagsList = document.getElementById('tags-list');
            var tagsValue = document.getElementById('tags-value');
            
            function addTag(tag) {
                if (!tag || tag.trim().length === 0) return;
                tag = tag.trim();
                
                var existingTags = Array.from(tagsList.querySelectorAll('.tag-item')).map(function(el) {
                    return el.getAttribute('data-tag');
                });
                if (existingTags.indexOf(tag) !== -1) return;
                
                var tagEl = document.createElement('span');
                tagEl.className = 'tag-item inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-primary/20 text-primary text-xs font-medium';
                tagEl.setAttribute('data-tag', tag);
                tagEl.innerHTML = '<span>' + tag + '</span><button type="button" class="tag-remove hover:text-primary-hover ml-1" aria-label="Remove">×</button>';
                
                var removeBtn = tagEl.querySelector('.tag-remove');
                removeBtn.addEventListener('click', function() {
                    tagEl.remove();
                    updateTagsValue();
                });
                
                tagsList.appendChild(tagEl);
                updateTagsValue();
            }
            
            function updateTagsValue() {
                var tags = Array.from(tagsList.querySelectorAll('.tag-item')).map(function(el) {
                    return el.getAttribute('data-tag');
                });
                tagsValue.value = tags.join(',');
            }
            
            if (tagsInput && tagsList && tagsValue) {
                tagsInput.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' || e.key === ',' || e.key === 'Tab') {
                        e.preventDefault();
                        var value = tagsInput.value.trim();
                        if (value) {
                            if (value.indexOf(',') !== -1) {
                                var parts = value.split(',').map(function(p) { return p.trim(); }).filter(function(p) { return p.length > 0; });
                                parts.forEach(function(part) { addTag(part); });
                            } else {
                                addTag(value);
                            }
                            tagsInput.value = '';
                        }
                    } else if (e.key === 'Backspace' && tagsInput.value === '') {
                        var lastTag = tagsList.querySelector('.tag-item:last-child');
                        if (lastTag) {
                            lastTag.remove();
                            updateTagsValue();
                        }
                    }
                });
                
                tagsInput.addEventListener('blur', function() {
                    var value = tagsInput.value.trim();
                    if (value) {
                        if (value.indexOf(',') !== -1) {
                            var parts = value.split(',').map(function(p) { return p.trim(); }).filter(function(p) { return p.length > 0; });
                            parts.forEach(function(part) { addTag(part); });
                        } else {
                            addTag(value);
                        }
                        tagsInput.value = '';
                    }
                });
            }
            
            var statusCodesInput = document.getElementById('status-codes-input');
            var statusCodesList = document.getElementById('status-codes-list');
            var statusCodesValue = document.getElementById('status-codes-value');
            
            function addStatusCodeTag(tag) {
                if (!tag || tag.trim().length === 0) return;
                tag = tag.trim();
                
                var existingTags = Array.from(statusCodesList.querySelectorAll('.status-tag')).map(function(el) {
                    return el.getAttribute('data-tag');
                });
                if (existingTags.indexOf(tag) !== -1) return;
                
                var tagEl = document.createElement('span');
                tagEl.className = 'status-tag inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-primary/20 text-primary text-xs font-medium';
                tagEl.setAttribute('data-tag', tag);
                tagEl.innerHTML = '<span>' + tag + '</span><button type="button" class="status-tag-remove hover:text-primary-hover ml-1" aria-label="Remove">×</button>';
                
                var removeBtn = tagEl.querySelector('.status-tag-remove');
                removeBtn.addEventListener('click', function() {
                    tagEl.remove();
                    updateStatusCodesValue();
                });
                
                statusCodesList.appendChild(tagEl);
                updateStatusCodesValue();
            }
            
            function updateStatusCodesValue() {
                var tags = Array.from(statusCodesList.querySelectorAll('.status-tag')).map(function(el) {
                    return el.getAttribute('data-tag');
                });
                statusCodesValue.value = tags.join(', ');
            }
            
            function initStatusCodesTags() {
                var initialValue = statusCodesValue.value || '2xx, 3xx';
                var tags = initialValue.split(',').map(function(t) { return t.trim(); }).filter(function(t) { return t.length > 0; });
                tags.forEach(function(tag) { addStatusCodeTag(tag); });
            }
            
            if (statusCodesInput && statusCodesList && statusCodesValue) {
                initStatusCodesTags();
                
                statusCodesInput.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' || e.key === ',' || e.key === 'Tab') {
                        e.preventDefault();
                        var value = statusCodesInput.value.trim();
                        if (value) {
                            if (value.indexOf(',') !== -1) {
                                var parts = value.split(',').map(function(p) { return p.trim(); }).filter(function(p) { return p.length > 0; });
                                parts.forEach(function(part) { addStatusCodeTag(part); });
                            } else {
                                addStatusCodeTag(value);
                            }
                            statusCodesInput.value = '';
                        }
                    } else if (e.key === 'Backspace' && statusCodesInput.value === '') {
                        var lastTag = statusCodesList.querySelector('.status-tag:last-child');
                        if (lastTag) {
                            lastTag.remove();
                            updateStatusCodesValue();
                        }
                    }
                });
                
                statusCodesInput.addEventListener('blur', function() {
                    var value = statusCodesInput.value.trim();
                    if (value) {
                        if (value.indexOf(',') !== -1) {
                            var parts = value.split(',').map(function(p) { return p.trim(); }).filter(function(p) { return p.length > 0; });
                            parts.forEach(function(part) { addStatusCodeTag(part); });
                        } else {
                            addStatusCodeTag(value);
                        }
                        statusCodesInput.value = '';
                    }
                });
            }
            
            var form = document.getElementById('monitor-create-form');
            if (form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    window.location.href = '{{ route("monitors.notifications") }}';
                });
            }
        });
    </script>
    @endpush
</x-layouts.app>
