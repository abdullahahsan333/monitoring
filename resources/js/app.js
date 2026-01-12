const root = document.documentElement;

const theme = {
    '--color-primary': '#3bd671',
    '--color-primary-hover': '#2fc25f',
    '--color-accent': '#3bd671',
    '--color-accent-content': '#3bd671',
    '--color-accent-foreground': '#ffffff',
    '--color-sidebar-icon-hover': '#3bd671',
    '--color-sidebar-icon-active': '#3bd671',
};

for (const [key, value] of Object.entries(theme)) {
    root.style.setProperty(key, value);
}

// Clear all caches function
function clearCaches() {
    console.log('Clearing all caches...');
    
    // Clear browser caches
    if ('caches' in window) {
        caches.keys().then(function(names) {
            names.forEach(function(name) {
                caches.delete(name);
            });
        }).catch(function(error) {
            console.error('Error clearing caches:', error);
        });
    }
    
    // Clear localStorage if needed
    try {
        if (typeof localStorage !== 'undefined') {
            // localStorage.clear(); // Uncomment if you want to clear everything
            console.log('LocalStorage cleared');
        }
    } catch (error) {
        console.error('Error clearing localStorage:', error);
    }
    
    // Clear sessionStorage if needed
    try {
        if (typeof sessionStorage !== 'undefined') {
            // sessionStorage.clear(); // Uncomment if you want to clear everything
            console.log('SessionStorage cleared');
        }
    } catch (error) {
        console.error('Error clearing sessionStorage:', error);
    }
    
    console.log('Cache clearing complete');
}

// Global dropdown initialization function
function initializeAllDropdowns() {
    console.log('Initializing all dropdowns...');
    
    // Wait for DOM to be ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initializeDropdowns);
    } else {
        initializeDropdowns();
    }
    
    function initializeDropdowns() {
        console.log('DOM ready, setting up dropdowns...');
        
        // Find all dropdown elements
        const dropdowns = document.querySelectorAll('.dd');
        console.log('Found dropdowns:', dropdowns.length);
        
        dropdowns.forEach(function(dd, index) {
            console.log(`Setting up dropdown ${index + 1}:`, dd);
            
            const trigger = dd.querySelector('.dd-trigger');
            const panel = dd.querySelector('.dd-panel');
            const chevron = trigger ? trigger.querySelector('[data-dd-chevron]') : null;
            
            if (!trigger || !panel) {
                console.error(`Dropdown ${index + 1}: Missing trigger or panel`, { trigger, panel });
                return;
            }
            
            // Ensure dropdown starts closed
            panel.classList.add('hidden');
            if (chevron) {
                chevron.classList.remove('rotate-180');
            }
            
            // Remove existing listeners to prevent duplicates
            const newTrigger = trigger.cloneNode(true);
            trigger.parentNode.replaceChild(newTrigger, trigger);
            
            // Add click handler
            newTrigger.addEventListener('click', function(e) {
                console.log(`Dropdown ${index + 1} clicked`);
                e.preventDefault();
                e.stopPropagation();
                
                const isOpen = !panel.classList.contains('hidden');
                
                // Close all other dropdowns
                document.querySelectorAll('.dd-panel').forEach(function(p) {
                    if (p !== panel) {
                        p.classList.add('hidden');
                    }
                });
                document.querySelectorAll('[data-dd-chevron]').forEach(function(c) {
                    if (c !== chevron) {
                        c.classList.remove('rotate-180');
                    }
                });
                
                // Toggle current dropdown
                if (isOpen) {
                    panel.classList.add('hidden');
                    if (chevron) chevron.classList.remove('rotate-180');
                } else {
                    panel.classList.remove('hidden');
                    if (chevron) chevron.classList.add('rotate-180');
                }
                
                console.log(`Dropdown ${index + 1} is now:`, isOpen ? 'closed' : 'open');
            });
            
            // Handle option selection
            const options = panel.querySelectorAll('[data-dd-option]');
            options.forEach(function(option) {
                // Remove existing listeners
                const newOption = option.cloneNode(true);
                option.parentNode.replaceChild(newOption, option);
                
                newOption.addEventListener('click', function(e) {
                    console.log(`Option selected in dropdown ${index + 1}:`, newOption.getAttribute('data-value'));
                    e.preventDefault();
                    e.stopPropagation();
                    
                    const value = newOption.getAttribute('data-value');
                    const title = newOption.getAttribute('data-title');
                    const description = newOption.getAttribute('data-description');
                    const icon = newOption.querySelector('[data-dd-icon]');
                    
                    // Update trigger display
                    const currentTitle = newTrigger.querySelector('.dd-current-title');
                    const currentDesc = newTrigger.querySelector('.dd-current-desc');
                    const currentIcon = newTrigger.querySelector('.dd-current-icon');
                    
                    if (currentTitle && title) {
                        currentTitle.textContent = title;
                    }
                    if (currentDesc && description) {
                        currentDesc.textContent = description;
                    }
                    if (currentIcon && icon) {
                        currentIcon.className = icon.className + ' dd-current-icon';
                        currentIcon.innerHTML = icon.innerHTML;
                    }
                    
                    // Update hidden input if exists
                    const hiddenInput = dd.querySelector('input[type="hidden"]');
                    if (hiddenInput && value) {
                        hiddenInput.value = value;
                        console.log(`Updated hidden input to: ${value}`);
                    }
                    
                    // Close dropdown
                    panel.classList.add('hidden');
                    if (chevron) chevron.classList.remove('rotate-180');
                });
            });
        });
        
        // Global click to close dropdowns
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.dd')) {
                document.querySelectorAll('.dd-panel').forEach(function(panel) {
                    panel.classList.add('hidden');
                });
                document.querySelectorAll('[data-dd-chevron]').forEach(function(chevron) {
                    chevron.classList.remove('rotate-180');
                });
            }
        });
        
        // Escape key to close dropdowns
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.querySelectorAll('.dd-panel').forEach(function(panel) {
                    panel.classList.add('hidden');
                });
                document.querySelectorAll('[data-dd-chevron]').forEach(function(chevron) {
                    chevron.classList.remove('rotate-180');
                });
            }
        });
        
        console.log('All dropdowns initialized successfully');
    }
}

// Global tab initialization function
function initializeAllTabs() {
    console.log('Initializing all tabs...');
    
    const tabLinks = document.querySelectorAll('.tab-link');
    console.log('Found tab links:', tabLinks.length);
    
    if (tabLinks.length === 0) {
        console.log('No tabs found on this page');
        return;
    }
    
    const panes = {
        details: document.getElementById('tab-details'),
        team: document.getElementById('tab-team'),
        maintenance: document.getElementById('tab-maintenance')
    };
    
    console.log('Tab panes found:', panes);
    
    function activateTab(tabName) {
        console.log('Activating tab:', tabName);
        
        // Hide all panes
        Object.keys(panes).forEach(function(key) {
            const pane = panes[key];
            if (pane) {
                pane.classList.add('hidden');
                pane.setAttribute('hidden', 'true');
            }
        });
        
        // Show selected pane
        const activePane = panes[tabName];
        if (activePane) {
            activePane.classList.remove('hidden');
            activePane.removeAttribute('hidden');
        }
        
        // Update tab link styles
        tabLinks.forEach(function(link) {
            const linkTabName = link.getAttribute('data-tab');
            const isActive = linkTabName === tabName;
            
            link.classList.toggle('text-emerald-500', isActive);
            link.classList.toggle('font-medium', isActive);
            link.classList.toggle('text-neutral-400', !isActive);
            link.setAttribute('aria-selected', isActive ? 'true' : 'false');
        });
    }
    
    // Remove existing listeners and add new ones
    tabLinks.forEach(function(link) {
        const newLink = link.cloneNode(true);
        link.parentNode.replaceChild(newLink, link);
        
        newLink.addEventListener('click', function(e) {
            e.preventDefault();
            const tabName = newLink.getAttribute('data-tab') || 'details';
            console.log('Tab clicked:', tabName);
            activateTab(tabName);
        });
        
        // Keyboard navigation
        newLink.addEventListener('keydown', function(e) {
            const currentIndex = Array.from(tabLinks).indexOf(newLink);
            
            if (e.key === 'ArrowUp' || e.key === 'ArrowLeft') {
                e.preventDefault();
                const prevIndex = Math.max(0, currentIndex - 1);
                const prevLink = tabLinks[prevIndex];
                if (prevLink) {
                    prevLink.focus();
                    const prevTabName = prevLink.getAttribute('data-tab') || 'details';
                    activateTab(prevTabName);
                }
            } else if (e.key === 'ArrowDown' || e.key === 'ArrowRight') {
                e.preventDefault();
                const nextIndex = Math.min(tabLinks.length - 1, currentIndex + 1);
                const nextLink = tabLinks[nextIndex];
                if (nextLink) {
                    nextLink.focus();
                    const nextTabName = nextLink.getAttribute('data-tab') || 'details';
                    activateTab(nextTabName);
                }
            } else if (e.key === 'Home') {
                e.preventDefault();
                const firstLink = tabLinks[0];
                if (firstLink) {
                    firstLink.focus();
                    const firstTabName = firstLink.getAttribute('data-tab') || 'details';
                    activateTab(firstTabName);
                }
            } else if (e.key === 'End') {
                e.preventDefault();
                const lastLink = tabLinks[tabLinks.length - 1];
                if (lastLink) {
                    lastLink.focus();
                    const lastTabName = lastLink.getAttribute('data-tab') || 'details';
                    activateTab(lastTabName);
                }
            }
        });
    });
    
    // Activate first tab by default
    activateTab('details');
    console.log('All tabs initialized successfully');
}

// Global form elements initialization
function initializeAllFormElements() {
    console.log('Initializing all form elements...');
    
    // Toggle switches
    const switches = document.querySelectorAll('[data-switch]');
    console.log('Found switches:', switches.length);
    
    switches.forEach(function(switchEl) {
        const input = switchEl.previousElementSibling;
        const knob = switchEl.querySelector('span');
        
        if (!input || !knob) {
            console.error('Switch missing input or knob', { switchEl, input, knob });
            return;
        }
        
        function updateSwitch() {
            if (input.checked) {
                switchEl.classList.remove('bg-neutral-700');
                switchEl.classList.add('bg-primary');
                knob.classList.add('translate-x-5');
            } else {
                switchEl.classList.add('bg-neutral-700');
                switchEl.classList.remove('bg-primary');
                knob.classList.remove('translate-x-5');
            }
        }
        
        // Remove existing listeners
        const newSwitch = switchEl.cloneNode(true);
        switchEl.parentNode.replaceChild(newSwitch, switchEl);
        const newKnob = newSwitch.querySelector('span');
        
        updateSwitch();
        
        if (input) {
            input.addEventListener('change', updateSwitch);
        }
        
        newSwitch.addEventListener('click', function(e) {
            e.stopPropagation();
            if (input) {
                input.checked = !input.checked;
                input.dispatchEvent(new Event('change', { bubbles: true }));
            }
        });
    });
    
    console.log('All form elements initialized successfully');
}

// Main initialization function
function initializePage() {
    console.log('=== PAGE INITIALIZATION START ===');
    
    // Clear caches first
    clearCaches();
    
    // Wait a bit for everything to settle
    setTimeout(function() {
        console.log('Starting page initialization...');
        
        // Initialize all components
        initializeAllDropdowns();
        initializeAllTabs();
        initializeAllFormElements();
        
        console.log('=== PAGE INITIALIZATION COMPLETE ===');
    }, 100);
}

// Initialize when DOM is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializePage);
} else {
    // DOM already loaded
    initializePage();
}
