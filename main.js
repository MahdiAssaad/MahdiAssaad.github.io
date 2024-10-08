// JavaScript to handle the toggle functionality
document.getElementById('surah-toggle').addEventListener('click', function() {
    const dropdown = document.getElementById('dropdown-content');
    const parentItem = this.parentNode;
    
    // Toggle active class to show or hide the dropdown
    parentItem.classList.toggle('active');
});
