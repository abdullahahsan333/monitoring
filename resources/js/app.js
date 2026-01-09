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
