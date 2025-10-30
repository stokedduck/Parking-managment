class CustomFooter extends HTMLElement {
    connectedCallback() {
        this.attachShadow({ mode: 'open' });
        this.shadowRoot.innerHTML = `
            <style>
                footer {
                    background-color: #1e293b;
                    color: white;
                    padding: 3rem 2rem;
                }
                
                .footer-container {
                    max-width: 1280px;
                    margin: 0 auto;
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                    gap: 2rem;
                }
                
                .footer-logo {
                    font-size: 1.5rem;
                    font-weight: 700;
                    margin-bottom: 1rem;
                    display: flex;
                    align-items: center;
                    gap: 0.5rem;
                }
                
                .footer-description {
                    color: #cbd5e1;
                    margin-bottom: 1.5rem;
                    line-height: 1.5;
                }
                
                .social-links {
                    display: flex;
                    gap: 1rem;
                }
                
                .social-link {
                    color: #cbd5e1;
                    transition: color 0.2s;
                }
                
                .social-link:hover {
                    color: white;
                }
                
                .footer-heading {
                    font-weight: 600;
                    margin-bottom: 1rem;
                    font-size: 1.125rem;
                }
                
                .footer-links {
                    display: flex;
                    flex-direction: column;
                    gap: 0.75rem;
                }
                
                .footer-link {
                    color: #cbd5e1;
                    transition: color 0.2s;
                }
                
                .footer-link:hover {
                    color: white;
                }
                
                .copyright {
                    text-align: center;
                    padding-top: 2rem;
                    margin-top: 2rem;
                    border-top: 1px solid #334155;
                    color: #94a3b8;
                }
            </style>
            <footer>
                <div class="footer-container">
                    <div>
                        <div class="footer-logo">
                            <i data-feather="map-pin"></i>
                            ParkEase
                        </div>
                        <p class="footer-description">
                            Find and book parking in Kathmandu with ease. Save time and avoid the hassle of searching for parking spots.
                        </p>
                        <div class="social-links">
                            <a href="#" class="social-link"><i data-feather="facebook"></i></a>
                            <a href="#" class="social-link"><i data-feather="twitter"></i></a>
                            <a href="#" class="social-link"><i data-feather="instagram"></i></a>
                            <a href="#" class="social-link"><i data-feather="linkedin"></i></a>
                        </div>
                    </div>
                    
                    <div>
                        <h4 class="footer-heading">Quick Links</h4>
                        <div class="footer-links">
                            <a href="#" class="footer-link">Home</a>
                            <a href="#find-parking" class="footer-link">Find Parking</a>
                            <a href="#how-it-works" class="footer-link">How It Works</a>
                            <a href="#" class="footer-link">Pricing</a>
                            <a href="#" class="footer-link">About Us</a>
                        </div>
                    </div>
                    
                    <div>
                        <h4 class="footer-heading">Support</h4>
                        <div class="footer-links">
                            <a href="#" class="footer-link">Help Center</a>
                            <a href="#" class="footer-link">Contact Us</a>
                            <a href="#" class="footer-link">FAQs</a>
                            <a href="#" class="footer-link">Terms of Service</a>
                            <a href="#" class="footer-link">Privacy Policy</a>
                        </div>
                    </div>
                    
                    <div>
                        <h4 class="footer-heading">Contact</h4>
                        <div class="footer-links">
                            <a href="#" class="footer-link flex items-center gap-2">
                                <i data-feather="mail"></i> hello@parkease.com.np
                            </a>
                            <a href="#" class="footer-link flex items-center gap-2">
                                <i data-feather="phone"></i> +977 9841XXXXXX
                            </a>
                            <a href="#" class="footer-link flex items-center gap-2">
                                <i data-feather="map-pin"></i> Kathmandu, Nepal
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="copyright">
                    &copy; ${new Date().getFullYear()} ParkEase Nepal. All rights reserved.
                </div>
            </footer>
        `;
    }
}

customElements.define('custom-footer', CustomFooter);