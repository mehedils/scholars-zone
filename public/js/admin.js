// Admin Dashboard JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Initialize tooltips
    initializeTooltips();
    
    // Initialize search functionality
    initializeSearch();
    
    // Initialize toggle switches
    initializeToggles();
    
    // Initialize data tables
    initializeDataTables();
});

// Tooltip initialization
function initializeTooltips() {
    const tooltipElements = document.querySelectorAll('[data-tooltip]');
    tooltipElements.forEach(element => {
        element.addEventListener('mouseenter', showTooltip);
        element.addEventListener('mouseleave', hideTooltip);
    });
}

function showTooltip(event) {
    const tooltip = document.createElement('div');
    tooltip.className = 'absolute z-50 px-2 py-1 text-xs text-white bg-gray-900 rounded shadow-lg';
    tooltip.textContent = event.target.getAttribute('data-tooltip');
    tooltip.style.left = event.pageX + 10 + 'px';
    tooltip.style.top = event.pageY - 10 + 'px';
    document.body.appendChild(tooltip);
    event.target.tooltip = tooltip;
}

function hideTooltip(event) {
    if (event.target.tooltip) {
        event.target.tooltip.remove();
        event.target.tooltip = null;
    }
}

// Search functionality
function initializeSearch() {
    const searchInputs = document.querySelectorAll('.search-input');
    searchInputs.forEach(input => {
        input.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const table = this.closest('.searchable-table');
            if (table) {
                const rows = table.querySelectorAll('tbody tr');
                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(searchTerm) ? '' : 'none';
                });
            }
        });
    });
}

// Toggle switches
function initializeToggles() {
    const toggles = document.querySelectorAll('[role="switch"]');
    toggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            const isChecked = this.getAttribute('aria-checked') === 'true';
            this.setAttribute('aria-checked', !isChecked);
            
            if (isChecked) {
                this.classList.remove('bg-blue-600');
                this.classList.add('bg-gray-200');
                this.querySelector('span').classList.remove('translate-x-5');
                this.querySelector('span').classList.add('translate-x-0');
            } else {
                this.classList.remove('bg-gray-200');
                this.classList.add('bg-blue-600');
                this.querySelector('span').classList.remove('translate-x-0');
                this.querySelector('span').classList.add('translate-x-5');
            }
        });
    });
}

// Data tables
function initializeDataTables() {
    const tables = document.querySelectorAll('.data-table');
    tables.forEach(table => {
        const rows = table.querySelectorAll('tbody tr');
        const pagination = table.querySelector('.pagination');
        
        if (pagination && rows.length > 10) {
            // Simple pagination implementation
            const itemsPerPage = 10;
            const totalPages = Math.ceil(rows.length / itemsPerPage);
            
            // Hide all rows initially
            rows.forEach((row, index) => {
                if (index >= itemsPerPage) {
                    row.style.display = 'none';
                }
            });
            
            // Update pagination info
            updatePaginationInfo(table, 1, itemsPerPage, rows.length);
        }
    });
}

function updatePaginationInfo(table, currentPage, itemsPerPage, totalItems) {
    const infoElement = table.querySelector('.pagination-info');
    if (infoElement) {
        const start = (currentPage - 1) * itemsPerPage + 1;
        const end = Math.min(currentPage * itemsPerPage, totalItems);
        infoElement.textContent = `Showing ${start} to ${end} of ${totalItems} results`;
    }
}

// Notification system
function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg transition-all duration-300 transform translate-x-full`;
    
    if (type === 'success') {
        notification.classList.add('bg-green-500', 'text-white');
    } else if (type === 'error') {
        notification.classList.add('bg-red-500', 'text-white');
    } else if (type === 'warning') {
        notification.classList.add('bg-yellow-500', 'text-white');
    }
    
    notification.textContent = message;
    document.body.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
        notification.classList.remove('translate-x-full');
    }, 100);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        notification.classList.add('translate-x-full');
        setTimeout(() => {
            notification.remove();
        }, 300);
    }, 5000);
}

// Export functionality
function exportData(format = 'csv') {
    const table = document.querySelector('.data-table');
    if (!table) return;
    
    const rows = table.querySelectorAll('tbody tr');
    let data = [];
    
    // Get headers
    const headers = Array.from(table.querySelectorAll('thead th')).map(th => th.textContent.trim());
    data.push(headers);
    
    // Get row data
    rows.forEach(row => {
        const rowData = Array.from(row.querySelectorAll('td')).map(td => td.textContent.trim());
        data.push(rowData);
    });
    
    if (format === 'csv') {
        const csvContent = data.map(row => row.join(',')).join('\n');
        downloadFile(csvContent, 'export.csv', 'text/csv');
    } else if (format === 'json') {
        const jsonContent = JSON.stringify(data, null, 2);
        downloadFile(jsonContent, 'export.json', 'application/json');
    }
}

function downloadFile(content, filename, contentType) {
    const blob = new Blob([content], { type: contentType });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = filename;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    window.URL.revokeObjectURL(url);
}

// Make functions globally available
window.adminDashboard = {
    showNotification,
    exportData
};
