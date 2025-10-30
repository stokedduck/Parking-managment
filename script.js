// Currency formatter for Nepali Rupees
const formatter = new Intl.NumberFormat('en-NP', {
    style: 'currency',
    currency: 'NPR',
    minimumFractionDigits: 0,
    maximumFractionDigits: 0
});

// Format all price elements on the page
document.addEventListener('DOMContentLoaded', () => {
    const priceElements = document.querySelectorAll('[data-price]');
    priceElements.forEach(el => {
        const price = parseFloat(el.getAttribute('data-price'));
        el.textContent = formatter.format(price);
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
});

// Dark mode toggle (if implemented later)
function toggleDarkMode() {
    document.documentElement.classList.toggle('dark');
    localStorage.setItem('darkMode', document.documentElement.classList.contains('dark'));
}

// Check for saved dark mode preference
if (localStorage.getItem('darkMode') === 'true') {
    document.documentElement.classList.add('dark');
}