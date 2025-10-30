class CustomNavbar extends HTMLElement {
    connectedCallback() {
        this.attachShadow({ mode: 'open' });
        this.shadowRoot.innerHTML = `
            <style>
                nav {
                    background-color: white;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
                }
                
                .nav-container {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    padding: 1rem 2rem;
                    max-width: 1280px;
                    margin: 0 auto;
                }
                
                .logo {
                    font-weight: 700;
                    font-size: 1.5rem;
                    color: #1e40af;
                    display: flex;
                    align-items: center;
                    gap: 0.5rem;
                }
                
                .nav-links {
                    display: flex;
                    gap: 2rem;
                    align-items: center;
                }
                
                .nav-link {
                    color: #4b5563;
                    font-weight: 500;
                    transition: color 0.2s;
                }
                
                .nav-link:hover {
                    color: #1e40af;
                }
                
                .user-actions {
                    display: flex;
                    gap: 1rem;
                    align-items: center;
                }
                
                .btn-primary {
                    background-color: #3b82f6;
                    color: white;
                    padding: 0.5rem 1rem;
                    border-radius: 0.375rem;
                    font-weight: 500;
                    transition: background-color 0.2s;
                }
                
                .btn-primary:hover {
                    background-color: #2563eb;
                }
                
                .btn-outline {
                    border: 1px solid #d1d5db;
                    padding: 0.5rem 1rem;
                    border-radius: 0.375rem;
                    font-weight: 500;
                    transition: all 0.2s;
                }
                
                .btn-outline:hover {
                    border-color: #9ca3af;
                    background-color: #f3f4f6;
                }
                
                @media (max-width: 768px) {
                    .nav-links {
                        display: none;
                    }
                    
                    .mobile-menu-btn {
                        display: block;
                    }
                }
            </style>
            <nav>
                <div class="nav-container">
                    <a href="/" class="logo">
                        <i data-feather="map-pin"></i>
                        ParkEase
                    </a>
                    
                    <div class="nav-links">
                        <a href="/" class="nav-link">Home</a>
                        <a href="#find-parking" class="nav-link">Find Parking</a>
                        <a href="#how-it-works" class="nav-link">How It Works</a>
                        <a href="#" class="nav-link">Pricing</a>
                        <a href="#" class="nav-link">About</a>
                    </div>
                    
                    <div class="user-actions">
                        <a href="#" class="btn-outline">Sign In</a>
                        <a href="#" class="btn-primary">Sign Up</a>
                    </div>
                </div>
            </nav>
        `;
    }
}

customElements.define('custom-navbar', CustomNavbar);