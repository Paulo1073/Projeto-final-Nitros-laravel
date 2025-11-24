document.addEventListener('DOMContentLoaded', () => {
    const savedColor = localStorage.getItem('primaryColor');
    if (savedColor) {
        document.documentElement.style.setProperty('--primary-color', savedColor);
    }
});
function changeColor(rgb) {
    document.documentElement.style.setProperty('--primary-color', rgb);
    localStorage.setItem('primaryColor', rgb);
}
