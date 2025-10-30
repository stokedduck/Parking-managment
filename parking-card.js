class CustomParkingCard extends HTMLElement {
    connectedCallback() {
        const name = this.getAttribute('name') || 'Parking Spot';
        const price = this.getAttribute('price') || '0';
        const distance = this.getAttribute('distance') || '0';
        const spots = this.getAttribute('spots') || '0';
        const image = this.getAttribute('image') || 'http://static.photos/cityscape/320x240/1';

        this.attachShadow({ mode: 'open' });
        this.shadowRoot.innerHTML = `
            <style>
                .parking-card {
                    background-color: white;
                    border-radius: 0.75rem;
                    overflow: hidden;
                    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1), 0 1px 2px rgba(0, 0, 0, 0.06);
                    transition: transform 0.2s, box-shadow 0.2s;
                }
                
                .parking-card:hover {
                    transform: translateY(-4px);
                    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
                }
                
                .parking-image {
                    height: 180px;
                    width: 100%;
                    object-fit: cover;
                    position: relative;
                }
                
                .parking-details {
                    padding: 1.25rem;
                }
                
                .parking-name {
                    font-size: 1.125rem;
                    font-weight: 600;
                    margin-bottom: 0.5rem;
                    color: #1f2937;
                }
                
                .parking-meta {
                    display: flex;
                    justify-content: space-between;
                    margin-bottom: 1rem;
                }
                
                .parking-distance, .parking-spots {
                    display: flex;
                    align-items: center;
                    gap: 0.25rem;
                    color: #6b7280;
                    font-size: 0.875rem;
                }
                
                .parking-price {
                    font-weight: 700;
                    color: #1e40af;
                    margin-bottom: 1rem;
                    font-size: 1.25rem;
                }
                
                .book-btn {
                    width: 100%;
                    padding: 0.5rem;
                    border-radius: 0.375rem;
                    background-color: #3b82f6;
                    color: white;
                    font-weight: 500;
                    border: none;
                    cursor: pointer;
                    transition: background-color 0.2s;
                }
                
                .book-btn:hover {
                    background-color: #2563eb;
                }
            </style>
            <div class="parking-card">
                <img src="${image}" alt="${name}" class="parking-image">
                <div class="parking-details">
                    <h3 class="parking-name">${name}</h3>
                    <div class="parking-meta">
                        <div class="parking-distance">
                            <i data-feather="map-pin"></i>
                            ${distance} km
                        </div>
                        <div class="parking-spots">
                            <i data-feather="car"></i>
                            ${spots} spots
                        </div>
                    </div>
                    <div class="parking-price" data-price="${price}">NPR ${price}/hr</div>
                    <button class="book-btn">
                        Book Now
                    </button>
                </div>
            </div>
        `;
    }
}

customElements.define('custom-parking-card', CustomParkingCard);