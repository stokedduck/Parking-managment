<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ParkEase Nepal - Find & Book Parking in Kathmandu</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>
    <script src="components/navbar.js"></script>
    <script src="components/search-card.js"></script>
    <script src="components/parking-card.js"></script>
    <script src="components/footer.js"></script>
</head>
<body class="bg-gray-50">
    <custom-navbar></custom-navbar>

    <main class="container mx-auto px-4 py-8">
        <!-- Hero Section -->
        <section class="flex flex-col md:flex-row items-center justify-between gap-8 mb-12">
            <div class="md:w-1/2 space-y-6">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800">
                    Stress-Free Parking in <span class="text-blue-600">Kathmandu</span>
                </h1>
                <p class="text-lg text-gray-600">
                    Find, book and pay for parking in Nepal's capital with just a few taps. Save time and avoid the hassle.
                </p>
                <div class="flex gap-4">
                    <a href="#find-parking" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition">
                        Find Parking
                    </a>
                    <a href="#how-it-works" class="border border-blue-600 text-blue-600 hover:bg-blue-50 px-6 py-3 rounded-lg font-medium transition">
                        How It Works
                    </a>
                </div>
            </div>
            <div class="md:w-1/2">
                <img src="http://static.photos/cityscape/640x360/42" alt="Kathmandu cityscape" class="rounded-xl shadow-lg w-full h-auto">
            </div>
        </section>

        <!-- Search Card Component -->
        <custom-search-card></custom-search-card>

        <!-- Map Section -->
        <section class="mb-16" id="find-parking">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Available Parking Near You</h2>
                <div class="flex items-center gap-2">
                    <i data-feather="filter" class="text-gray-600"></i>
                    <span class="text-gray-600">Filters</span>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div id="map" class="h-96 w-full"></div>
            </div>
        </section>

        <!-- Featured Parking Spots -->
        <section class="mb-16">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Featured Parking in Kathmandu</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <custom-parking-card 
                    name="Durbar Marg Parking"
                    price="100"
                    distance="0.5"
                    spots="15"
                    image="http://static.photos/cityscape/320x240/10">
                </custom-parking-card>
                <custom-parking-card 
                    name="Thamel Parking Hub"
                    price="120"
                    distance="1.2"
                    spots="8"
                    image="http://static.photos/cityscape/320x240/20">
                </custom-parking-card>
                <custom-parking-card 
                    name="Boudha Parking Lot"
                    price="80"
                    distance="2.5"
                    spots="20"
                    image="http://static.photos/cityscape/320x240/30">
                </custom-parking-card>
            </div>
        </section>

        <!-- How It Works -->
        <section class="mb-16" id="how-it-works">
            <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">How ParkEase Works</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-sm text-center">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-feather="map-pin" class="text-blue-600 w-6 h-6"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Find Parking</h3>
                    <p class="text-gray-600">Search for available parking spots near your destination in Kathmandu.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm text-center">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-feather="calendar" class="text-blue-600 w-6 h-6"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Book & Pay</h3>
                    <p class="text-gray-600">Reserve your spot and pay securely with NPR through our platform.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm text-center">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-feather="check-circle" class="text-blue-600 w-6 h-6"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Park Stress-Free</h3>
                    <p class="text-gray-600">Arrive at your reserved spot and park without worrying about availability.</p>
                </div>
            </div>
        </section>
    </main>

    <custom-footer></custom-footer>

    <script>
        feather.replace();
        
        // Initialize Google Map
        function initMap() {
            const kathmandu = { lat: 27.7172, lng: 85.3240 };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 14,
                center: kathmandu,
                styles: [
                    {
                        featureType: "poi.parking",
                        elementType: "all",
                        stylers: [
                            { visibility: "on" },
                            { color: "#3b82f6" }
                        ]
                    }
                ]
            });
            
            // Add sample markers (in a real app, these would come from an API)
            const locations = [
                { position: { lat: 27.7172, lng: 85.3240 }, title: "Durbar Marg Parking" },
                { position: { lat: 27.7190, lng: 85.3220 }, title: "Thamel Parking Hub" },
                { position: { lat: 27.7203, lng: 85.3617 }, title: "Boudha Parking Lot" }
            ];
            
            locations.forEach(location => {
                new google.maps.Marker({
                    position: location.position,
                    map: map,
                    title: location.title,
                    icon: {
                        url: "https://maps.google.com/mapfiles/ms/icons/blue-dot.png"
                    }
                });
            });
        }
        
        // Initialize the map when the window loads
        window.onload = initMap;
    </script>
    <script src="script.js"></script>
</body>
</html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ParkEase Nepal - Find & Book Parking in Kathmandu</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>
    <script src="components/navbar.js"></script>
    <script src="components/search-card.js"></script>
    <script src="components/parking-card.js"></script>
    <script src="components/footer.js"></script>
</head>
<body class="bg-gray-50">
    <custom-navbar></custom-navbar>

    <main class="container mx-auto px-4 py-8">
        <!-- Hero Section -->
        <section class="flex flex-col md:flex-row items-center justify-between gap-8 mb-12">
            <div class="md:w-1/2 space-y-6">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800">
                    Stress-Free Parking in <span class="text-blue-600">Kathmandu</span>
                </h1>
                <p class="text-lg text-gray-600">
                    Find, book and pay for parking in Nepal's capital with just a few taps. Save time and avoid the hassle.
                </p>
                <div class="flex gap-4">
                    <a href="#find-parking" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition">
                        Find Parking
                    </a>
                    <a href="#how-it-works" class="border border-blue-600 text-blue-600 hover:bg-blue-50 px-6 py-3 rounded-lg font-medium transition">
                        How It Works
                    </a>
                </div>
            </div>
            <div class="md:w-1/2">
                <img src="http://static.photos/cityscape/640x360/42" alt="Kathmandu cityscape" class="rounded-xl shadow-lg w-full h-auto">
            </div>
        </section>

        <!-- Search Card Component -->
        <custom-search-card></custom-search-card>

        <!-- Map Section -->
        <section class="mb-16" id="find-parking">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Available Parking Near You</h2>
                <div class="flex items-center gap-2">
                    <i data-feather="filter" class="text-gray-600"></i>
                    <span class="text-gray-600">Filters</span>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div id="map" class="h-96 w-full"></div>
            </div>
        </section>

        <!-- Featured Parking Spots -->
        <section class="mb-16">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Featured Parking in Kathmandu</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <custom-parking-card 
                    name="Durbar Marg Parking"
                    price="100"
                    distance="0.5"
                    spots="15"
                    image="http://static.photos/cityscape/320x240/10">
                </custom-parking-card>
                <custom-parking-card 
                    name="Thamel Parking Hub"
                    price="120"
                    distance="1.2"
                    spots="8"
                    image="http://static.photos/cityscape/320x240/20">
                </custom-parking-card>
                <custom-parking-card 
                    name="Boudha Parking Lot"
                    price="80"
                    distance="2.5"
                    spots="20"
                    image="http://static.photos/cityscape/320x240/30">
                </custom-parking-card>
            </div>
        </section>

        <!-- How It Works -->
        <section class="mb-16" id="how-it-works">
            <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">How ParkEase Works</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-sm text-center">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-feather="map-pin" class="text-blue-600 w-6 h-6"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Find Parking</h3>
                    <p class="text-gray-600">Search for available parking spots near your destination in Kathmandu.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm text-center">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-feather="calendar" class="text-blue-600 w-6 h-6"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Book & Pay</h3>
                    <p class="text-gray-600">Reserve your spot and pay securely with NPR through our platform.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm text-center">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-feather="check-circle" class="text-blue-600 w-6 h-6"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Park Stress-Free</h3>
                    <p class="text-gray-600">Arrive at your reserved spot and park without worrying about availability.</p>
                </div>
            </div>
        </section>
    </main>

    <custom-footer></custom-footer>

    <script>
        feather.replace();
        
        // Initialize Google Map
        function initMap() {
            const kathmandu = { lat: 27.7172, lng: 85.3240 };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 14,
                center: kathmandu,
                styles: [
                    {
                        featureType: "poi.parking",
                        elementType: "all",
                        stylers: [
                            { visibility: "on" },
                            { color: "#3b82f6" }
                        ]
                    }
                ]
            });
            
            // Add sample markers (in a real app, these would come from an API)
            const locations = [
                { position: { lat: 27.7172, lng: 85.3240 }, title: "Durbar Marg Parking" },
                { position: { lat: 27.7190, lng: 85.3220 }, title: "Thamel Parking Hub" },
                { position: { lat: 27.7203, lng: 85.3617 }, title: "Boudha Parking Lot" }
            ];
            
            locations.forEach(location => {
                new google.maps.Marker({
                    position: location.position,
                    map: map,
                    title: location.title,
                    icon: {
                        url: "https://maps.google.com/mapfiles/ms/icons/blue-dot.png"
                    }
                });
            });
        }
        
        // Initialize the map when the window loads
        window.onload = initMap;
    </script>
    <script src="script.js"></script>
</body>
</html>

