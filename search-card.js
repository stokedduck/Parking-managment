class CustomSearchCard extends HTMLElement {
    connectedCallback() {
        this.attachShadow({ mode: 'open' });
        this.shadowRoot.innerHTML = `
            <style>
                .search-card {
                    background-color: white;
                    border-radius: 1rem;
                    padding: 1.5rem;
                    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
                    margin-bottom: 2rem;
                }
                
                .search-title {
                    font-size: 1.25rem;
                    font-weight: 600;
                    margin-bottom: 1rem;
                    color: #1f2937;
                }
                
                .search-form {
                    display: grid;
                    grid-template-columns: 1fr 1fr 1fr auto;
                    gap: 1rem;
                }
                
                .search-input {
                    padding: 0.75rem 1rem;
                    border: 1px solid #e5e7eb;
                    border-radius: 0.5rem;
                    width: 100%;
                    transition: border-color 0.2s;
                }
                
                .search-input:focus {
                    outline: none;
                    border-color: #3b82f6;
                }
                
                .search-btn {
                    background-color: #3b82f6;
                    color: white;
                    padding: 0.75rem 1.5rem;
                    border-radius: 0.5rem;
                    font-weight: 500;
                    border: none;
                    cursor: pointer;
                    transition: background-color 0.2s;
                    display: flex;
                    align-items: center;
                    gap: 0.5rem;
                }
                
                .search-btn:hover {
                    background-color: #2563eb;
                }
                
                @media (max-width: 768px) {
                    .search-form {
                        grid-template-columns: 1fr;
                    }
                }
            </style>
            <div class="search-card">
                <h3 class="search-title">Find Parking in Kathmandu</h3>
                <form class="search-form">
                    <input type="text" class="search-input" placeholder="Location or landmark" value="Kathmandu">
                    <input type="date" class="search-input">
                    <input type="time" class="search-input">
                    <button type="submit" class="search-btn">
                        <i data-feather="search"></i>
                        Search
                    </button>
                </form>
            </div>
        `;
    }
}

customElements.define('custom-search-card', CustomSearchCard);