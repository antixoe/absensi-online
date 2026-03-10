require('./bootstrap');

// Custom modal functionality
window.Modal = {
    open: function(modalId) {
        document.getElementById(modalId).style.display = 'block';
    },
    close: function(modalId) {
        document.getElementById(modalId).style.display = 'none';
    }
};

// Close modal when clicking outside
window.onclick = function(event) {
    if (event.target.classList.contains('modal')) {
        event.target.style.display = 'none';
    }
};

// Enhanced form interactions
document.addEventListener('DOMContentLoaded', function() {
    // Add loading states to buttons
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function() {
            const submitBtn = form.querySelector('input[type="submit"], button[type="submit"]');
            if (submitBtn) {
                submitBtn.value = 'Loading...';
                submitBtn.disabled = true;
            }
        });
    });

    // Password visibility toggle (already in views, but enhanced)
    const passwordToggles = document.querySelectorAll('input[type="checkbox"][onclick*="click_change"]');
    passwordToggles.forEach(toggle => {
        toggle.addEventListener('change', function() {
            const passwordField = document.getElementById('change_password');
            if (passwordField) {
                passwordField.type = this.checked ? 'text' : 'password';
            }
        });
    });
});
