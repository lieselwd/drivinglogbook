<?php

use App\Data\LocationData;
use App\Models\LogbookEntry;
use Livewire\Attributes\Defer;
use Livewire\Component;

new class extends Component {
    public LogbookEntry $logbookEntry;
    public LocationData $startMap;
    public LocationData $finishMap;
    public string $mapHeight;
    public string $zoom;
    public array $centreCoordinates;

    private function getMapboxZoomLevel(float $lat1, float $lon1, float $lat2, float $lon2, int $mapWidth = 800, int $mapHeight = 600, int $tileSize = 512): int
    {
        // Latitude bounds
        $minLat = min($lat1, $lat2);
        $maxLat = max($lat1, $lat2);

        // Longitude bounds
        $minLon = min($lon1, $lon2);
        $maxLon = max($lon1, $lon2);

        // Convert latitude to Mercator Y
        $latToY = function ($lat) {
            $rad = deg2rad($lat);
            return log(tan(M_PI / 4 + $rad / 2));
        };

        $yMin = $latToY($minLat);
        $yMax = $latToY($maxLat);

        // World dimensions in pixels at zoom 0
        $worldSize = $tileSize;

        // Longitude and latitude spans
        $lonSpan = $maxLon - $minLon;
        $latSpan = abs($yMax - $yMin);

        // Avoid division by zero
        if ($lonSpan == 0 || $latSpan == 0) {
            return 20; // Max zoom fallback
        }

        // Zoom calculations
        $zoomX = log($mapWidth * 360 / ($lonSpan * $worldSize), 2);
        $zoomY = log($mapHeight * 2 * M_PI / ($latSpan * $worldSize), 2);

        // Choose the smaller zoom to ensure both points fit
        $zoom = floor(min($zoomX, $zoomY));

        // Clamp zoom to Mapbox limits
        return max(0, min(20, (int)$zoom)) - 0.5;
    }

    private function getMidpoint(float $lat1, float $lon1, float $lat2, float $lon2): array {
        // Convert degrees to radians
        $d2r = M_PI / 180;
        $lat1 = $lat1 * $d2r;
        $lon1 = $lon1 * $d2r;
        $lat2 = $lat2 * $d2r;
        $lon2 = $lon2 * $d2r;

        // Calculate difference in longitude
        $dLon = $lon2 - $lon1;

        // Calculate Bx and By components
        $Bx = cos($lat2) * cos($dLon);
        $By = cos($lat2) * sin($dLon);

        // Calculate midpoint latitude and longitude (in radians)
        $lat3 = atan2(
            sin($lat1) + sin($lat2),
            sqrt((cos($lat1) + $Bx) ** 2 + $By ** 2)
        );

        $lon3 = $lon1 + atan2($By, cos($lat1) + $Bx);

        // Convert back to degrees
        $r2d = 180 / M_PI;

        return [
            'lat' => round($lat3 * $r2d, 6),
            'long' => round($lon3 * $r2d, 6)
        ];
    }

    public function mount()
    {
        $startLocationMapbox = Http::get('https://api.mapbox.com/search/geocode/v6/forward?q=', [
            'q' => $this->logbookEntry->start_location->searchQuery,
            'access_token' => config('services.mapbox'),
            'country' => 'au',
            'types' => 'locality,place',
            'limit' => 1
        ])->json();

        $finishLocationMapbox = Http::get('https://api.mapbox.com/search/geocode/v6/forward?q=', [
            'q' => $this->logbookEntry->finish_location->searchQuery,
            'access_token' => config('services.mapbox'),
            'country' => 'au',
            'types' => 'locality,place',
            'limit' => 1
        ])->json();

        $this->startMap = LocationData::from([
            'suburb' => $startLocationMapbox['features'][0]['properties']['name'],
            'state' => $this->logbookEntry->start_location->state,
            'lat' => $startLocationMapbox['features'][0]['properties']['coordinates']['latitude'],
            'long' => $startLocationMapbox['features'][0]['properties']['coordinates']['longitude'],
        ]);

        $this->finishMap = LocationData::from([
            'suburb' => $finishLocationMapbox['features'][0]['properties']['name'],
            'state' => $this->logbookEntry->finish_location->state,
            'lat' => $finishLocationMapbox['features'][0]['properties']['coordinates']['latitude'],
            'long' => $finishLocationMapbox['features'][0]['properties']['coordinates']['longitude'],
        ]);

        $this->centreCoordinates = $this->getMidpoint((float)$this->startMap->lat, (float)$this->startMap->long, (float)$this->finishMap->lat, (float)$this->finishMap->long);
        $this->zoom = $this->getMapboxZoomLevel((float)$this->startMap->lat, (float)$this->startMap->long, (float)$this->finishMap->lat, (float)$this->finishMap->long);
    }
};
?>


<div>
    @assets
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.css" rel="stylesheet"/>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.js"></script>
    @endassets
    <x-mapbox id="mapId" position="relative" style="height: {{$mapHeight}};" :navigation-controls="true" :zoom="$zoom"
              :center="$centreCoordinates"
              :markers="[['lat' => $startMap->lat, 'long' => $startMap->long, 'description' => $startMap->suburb], ['lat' => $finishMap->lat, 'long' => $finishMap->long, 'description' => $finishMap->suburb]]"
    />
</div>
