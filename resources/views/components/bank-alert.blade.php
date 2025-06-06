@props(['alert'])

<div class="bank-alert bank-alert-{{ $alert['type'] }} animate__animated animate__fadeInUp animate__faster">
    <div class="bank-alert-header">
        <div class="bank-alert-icon">
            @if($alert['icon'] === 'verified')
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
            @else
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
            @endif
        </div>
        <h3>{{ $alert['title'] }}</h3>
        <button class="bank-alert-close" aria-label="Close">
            &times;
        </button>
    </div>
    
    <div class="bank-alert-body">
        <p>{{ $alert['message'] }}</p>
        
        @isset($alert['account_number'])
        <div class="account-details">
            <div class="detail-row">
                <span>Account Number</span>
                <div class="detail-value">
                    <strong>{{ $alert['account_number'] }}</strong>
                    <button class="copy-btn" data-clipboard-text="{{ $alert['account_number'] }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                            <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                        </svg>
                    </button>
                </div>
            </div>
            
            @isset($alert['email'])
            <div class="detail-row">
                <span>Registered Email</span>
                <div class="detail-value">
                    {{ $alert['email'] }}
                </div>
            </div>
            @endisset
            
            @isset($alert['timestamp'])
            <div class="detail-row">
                <span>Opened On</span>
                <div class="detail-value">
                    {{ $alert['timestamp'] }}
                </div>
            </div>
            @endisset
        </div>
        @endisset
    </div>
    
    @isset($alert['actions'])
    <div class="bank-alert-footer">
        @foreach($alert['actions'] as $action)
        <a href="{{ $action['url'] }}" class="btn {{ $action['class'] }}">
            {{ $action['text'] }}
        </a>
        @endforeach
    </div>
    @endisset
    
    <div class="progress-bar"></div>
</div>


<script>

document.addEventListener('DOMContentLoaded', function() {
    // Initialize clipboard.js
    new ClipboardJS('.copy-btn');
    
    // Handle copy button feedback
    document.querySelectorAll('.copy-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const originalHTML = this.innerHTML;
            this.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                Copied!
            `;
            setTimeout(() => {
                this.innerHTML = originalHTML;
            }, 2000);
        });
    });
    
    // Show alert with animation
    const alert = document.querySelector('.bank-alert');
    if (alert) {
        setTimeout(() => {
            alert.classList.add('show');
        }, 100);
        
        // Auto-dismiss after 8 seconds
        setTimeout(() => {
            if (alert) {
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(-20px)';
                setTimeout(() => {
                    if (alert) alert.remove();
                }, 300);
            }
        }, 8000);
    }
    
    // Close button functionality
    document.querySelectorAll('.bank-alert-close').forEach(btn => {
        btn.addEventListener('click', function() {
            const alert = this.closest('.bank-alert');
            alert.style.opacity = '0';
            alert.style.transform = 'translateY(-20px)';
            setTimeout(() => {
                alert.remove();
            }, 300);
        });
    });
});
</script>

<style>

    /* Bank Alert System */
.bank-alert {
    position: relative;
    width: 100%;
    max-width: 500px;
    margin: 1rem auto;
    background: white;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    border-left: 4px solid #4CAF50;
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.3s ease-out;
}

.bank-alert.show {
    opacity: 1;
    transform: translateY(0);
}

.bank-alert-header {
    display: flex;
    align-items: center;
    padding: 1.25rem 1.5rem;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

.bank-alert-icon {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #E8F5E9;
    border-radius: 8px;
    margin-right: 1rem;
    color: #4CAF50;
}

.bank-alert-header h3 {
    margin: 0;
    font-size: 1.125rem;
    font-weight: 600;
    color: #2E3A4D;
    flex-grow: 1;
}

.bank-alert-close {
    background: none;
    border: none;
    font-size: 1.5rem;
    color: #97A1B1;
    cursor: pointer;
    line-height: 1;
    padding: 0 0.5rem;
    transition: color 0.2s;
}

.bank-alert-close:hover {
    color: #2E3A4D;
}

.bank-alert-body {
    padding: 1.5rem;
}

.bank-alert-body p {
    margin: 0 0 1.5rem;
    color: #5A6679;
    line-height: 1.5;
}

.account-details {
    background: #F8F9FA;
    border-radius: 8px;
    padding: 1rem;
    margin-top: 1rem;
}

.detail-row {
    display: flex;
    justify-content: space-between;
    padding: 0.5rem 0;
}

.detail-row:not(:last-child) {
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

.detail-row span {
    color: #5A6679;
    font-size: 0.875rem;
}

.detail-value {
    display: flex;
    align-items: center;
    font-weight: 500;
    color: #2E3A4D;
}

.copy-btn {
    background: none;
    border: none;
    color: #5A6679;
    margin-left: 0.5rem;
    cursor: pointer;
    padding: 0.25rem;
    border-radius: 4px;
    transition: all 0.2s;
}

.copy-btn:hover {
    background: rgba(0, 0, 0, 0.05);
    color: #2E3A4D;
}

.bank-alert-footer {
    display: flex;
    gap: 0.75rem;
    padding: 0 1.5rem 1.5rem;
}

.bank-alert-footer .btn {
    flex: 1;
    text-align: center;
    padding: 0.625rem 1rem;
    border-radius: 8px;
    font-weight: 500;
    font-size: 0.875rem;
    transition: all 0.2s;
}

.progress-bar {
    position: absolute;
    bottom: 0;
    left: 0;
    height: 4px;
    background: #E0E0E0;
    width: 100%;
}

.progress-bar::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background: #4CAF50;
    animation: progress 5s linear forwards;
}

@keyframes progress {
    from { width: 100%; }
    to { width: 0%; }
}

/* Animation */
.animate__animated {
    animation-duration: 0.5s;
}

.animate__fadeInUp {
    animation-name: fadeInUp;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>