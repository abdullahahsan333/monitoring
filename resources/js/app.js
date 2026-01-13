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
    // Clear browser caches
    if ('caches' in window) {
        caches.keys().then(function(names) {
            names.forEach(function(name) {
                caches.delete(name);
            });
        }).catch(function(error) {
            // Error clearing caches
        });
    }
    
    // Clear localStorage if needed
    try {
        if (typeof localStorage !== 'undefined') {
            // localStorage.clear(); // Uncomment if you want to clear everything
        }
    } catch (error) {
        // Error clearing localStorage
    }
    
    // Clear sessionStorage if needed
    try {
        if (typeof sessionStorage !== 'undefined') {
            // sessionStorage.clear(); // Uncomment if you want to clear everything
        }
    } catch (error) {
        // Error clearing sessionStorage
    }
}

// Global dropdown initialization function
function initializeAllDropdowns() {
    try {
        // Find all dropdown elements
        const dropdowns = document.querySelectorAll('.dd');
        
        dropdowns.forEach(function(dd, index) {
            try {
                const trigger = dd.querySelector('.dd-trigger');
                const panel = dd.querySelector('.dd-panel');
                const chevron = trigger ? trigger.querySelector('[data-dd-chevron]') : null;
                
                if (!trigger || !panel) {
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
                        if (chevron) {
                            chevron.classList.remove('rotate-180');
                        }
                    } else {
                        panel.classList.remove('hidden');
                        if (chevron) {
                            chevron.classList.add('rotate-180');
                        }
                    }
                });
                
                // Handle option clicks
                const options = panel.querySelectorAll('.dd-option');
                options.forEach(function(option) {
                    option.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        
                        const title = option.getAttribute('data-title');
                        const description = option.getAttribute('data-description');
                        const icon = option.querySelector('[data-dd-icon]');
                        
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
                            currentIcon.innerHTML = icon.innerHTML;
                        }
                        
                        // Update hidden input if exists
                        const input = dd.querySelector('input[type="hidden"]');
                        if (input) {
                            input.value = option.getAttribute('data-value') || '';
                        }
                        
                        // Close dropdown
                        panel.classList.add('hidden');
                        if (chevron) chevron.classList.remove('rotate-180');
                    });
                });
            } catch (error) {
                // Error initializing individual dropdown
            }
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
    } catch (error) {
        // Error in dropdown initialization
    }
}

// Global tabs initialization function
function initializeAllTabs() {
    const tabGroups = document.querySelectorAll('[data-tabs]');
    
    tabGroups.forEach(function(tabGroup) {
        const tabs = tabGroup.querySelectorAll('[data-tab]');
        const panels = tabGroup.querySelectorAll('[data-panel]');
        
        tabs.forEach(function(tab) {
            // Remove existing listeners
            const newTab = tab.cloneNode(true);
            tab.parentNode.replaceChild(newTab, tab);
            
            newTab.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetPanel = newTab.getAttribute('data-tab');
                
                // Remove active class from all tabs and panels
                tabs.forEach(function(t) {
                    t.classList.remove('active', 'bg-primary', 'text-white');
                    t.classList.add('text-neutral-400');
                });
                panels.forEach(function(p) {
                    p.classList.add('hidden');
                });
                
                // Add active class to clicked tab and corresponding panel
                newTab.classList.add('active', 'bg-primary', 'text-white');
                newTab.classList.remove('text-neutral-400');
                
                const targetPanelElement = tabGroup.querySelector('[data-panel="' + targetPanel + '"]');
                if (targetPanelElement) {
                    targetPanelElement.classList.remove('hidden');
                }
            });
        });
    });
}

// Global form elements initialization function
function initializeAllFormElements() {
    // Initialize switches
    const switches = document.querySelectorAll('[data-switch]');
    
    switches.forEach(function(switchEl) {
        const input = switchEl.querySelector('input[type="checkbox"]');
        const knob = switchEl.querySelector('span');
        
        if (!input || !knob) return;
        
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
}

// Main initialization function
function initializePage() {
    // Clear caches first
    clearCaches();
    
    // Wait a bit for everything to settle
    setTimeout(function() {
        // Initialize all components in proper order
        initializeAllDropdowns();
        initializeAllTabs();
        initializeAllFormElements();
        
        // Re-initialize after a short delay to catch any dynamically loaded elements
        setTimeout(function() {
            initializeAllDropdowns();
            initializeAllTabs();
            initializeAllFormElements();
        }, 200);
        
        // Final re-initialization for any remaining elements
        setTimeout(function() {
            initializeAllDropdowns();
            initializeAllTabs();
            initializeAllFormElements();
        }, 500);
    }, 100);
}

// Initialize when DOM is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializePage);
} else {
    // DOM already loaded
    initializePage();
}

// Also initialize on window load to catch any remaining issues
window.addEventListener('load', function() {
    setTimeout(function() {
        initializeAllDropdowns();
        initializeAllTabs();
        initializeAllFormElements();
    }, 100);
});

// Additional safety net - initialize on document ready as well
document.addEventListener('readystatechange', function() {
    if (document.readyState === 'complete') {
        setTimeout(function() {
            initializeAllDropdowns();
            initializeAllTabs();
            initializeAllFormElements();
        }, 50);
    }
});
