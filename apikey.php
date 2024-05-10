<?php
namespace Madzae {

  $host = "localhost";
  $user = "user";
  $pass = "password";
  $database = "database";

    class GoogleMapsApiKey {
        public function apiKeyDirection() {
            global $host, $user, $pass, $database;
            $mysqli = new \mysqli($host, $user, $pass, $database);
            if ($mysqli->connect_error) {
                die("Connection failed: " . $mysqli->connect_error);
            }

            $result = $mysqli->query("SELECT * FROM googlemaps");

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo $row["apikey"];

                    $sqlDirection = "INSERT INTO googlemaps_usage (platform, platform_id) VALUES ('Direction API', '1')";
                    $mysqli->query($sqlDirection);

                }
            } else {
                echo "Error";
            }

            $mysqli->close();
        }

        public function apiKeyDistanceMatrix() {
            global $host, $user, $pass, $database;
            $mysqli = new \mysqli($host, $user, $pass, $database);
            if ($mysqli->connect_error) {
                die("Connection failed: " . $mysqli->connect_error);
            }

            $result = $mysqli->query("SELECT * FROM googlemaps");

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo $row["apikey"];

                    $sqlDistanceMatrix = "INSERT INTO googlemaps_usage (platform, platform_id) VALUES ('Distance Matrix API', '2')";
                    $mysqli->query($sqlDistanceMatrix);

                }
            } else {
                echo "Error";
            }

            $mysqli->close();
        }

        public function apiKeyGeocode() {
            global $host, $user, $pass, $database;
            $mysqli = new \mysqli($host, $user, $pass, $database);
            if ($mysqli->connect_error) {
                die("Connection failed: " . $mysqli->connect_error);
            }

            $result = $mysqli->query("SELECT * FROM googlemaps");

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo $row["apikey"];

                    $sqlGeocode = "INSERT INTO googlemaps_usage (platform, platform_id) VALUES ('Geocode API', '3')";
                    $mysqli->query($sqlGeocode);

                }
            } else {
                echo "Error";
            }

            $mysqli->close();
        }

        public function apiKeyJavascript() {
            global $host, $user, $pass, $database;
            $mysqli = new \mysqli($host, $user, $pass, $database);
            if ($mysqli->connect_error) {
                die("Connection failed: " . $mysqli->connect_error);
            }

            $result = $mysqli->query("SELECT * FROM googlemaps");

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo $row["apikey"];

                    $sqlJavascript = "INSERT INTO googlemaps_usage (platform, platform_id) VALUES ('Maps Javascript API', '4')";
                    $mysqli->query($sqlJavascript);

                }
            } else {
                echo "Error";
            }

            $mysqli->close();
        }

        public function apiUsage() {
            global $host, $user, $pass, $database;
            $mysqli = new \mysqli($host, $user, $pass, $database);

            if ($mysqli->connect_error) {
                die("Connection failed: " . $mysqli->connect_error);
            }

            $result = $mysqli->query("SELECT COUNT(*) AS total FROM googlemaps_usage");

            if ($result) {
                $row = $result->fetch_assoc();
                $totalRows = $row['total'];
              }

            $resultDirection = $mysqli->query("SELECT COUNT(*) AS total FROM googlemaps_usage WHERE platform_id = 1");

            if ($resultDirection) {
                $rowDirection = $resultDirection->fetch_assoc();
                $totalRowsDirection = $rowDirection['total'];
              }

            $resultDistanceMatrix = $mysqli->query("SELECT COUNT(*) AS total FROM googlemaps_usage WHERE platform_id = 2");

            if ($resultDistanceMatrix) {
                $rowDistanceMatrix = $resultDistanceMatrix->fetch_assoc();
                $totalRowsDistanceMatrix = $rowDistanceMatrix['total'];
              }

            $resultGeocode = $mysqli->query("SELECT COUNT(*) AS total FROM googlemaps_usage WHERE platform_id = 3");

            if ($resultGeocode) {
                $rowGeocode = $resultGeocode->fetch_assoc();
                $totalRowsGeocode = $rowGeocode['total'];
              }

            $resultJavascript = $mysqli->query("SELECT COUNT(*) AS total FROM googlemaps_usage WHERE platform_id = 4");

            if ($resultJavascript) {
                $rowJavascript = $resultJavascript->fetch_assoc();
                $totalRowsJavascript = $rowJavascript['total'];
              }

            $mysqli->close();

            $priceDirection = $totalRowsDirection*0.005;
            $priceDistanceMatrix = $totalRowsDistanceMatrix*0.005;
            $priceGeocode = $totalRowsGeocode*0.005;
            $priceJavascript = $totalRowsJavascript*0.007;
            $totalBill = $priceDirection+$priceDistanceMatrix+$priceGeocode+$priceJavascript;
            $creditLimit = 200-$totalBill;

            echo "Total Google Maps API Request: ".$totalRows." time(s)<br />";
            echo "<br />";
            echo "Direction API: ".$totalRowsDirection." time(s) / $".$priceDirection."<br />";
            echo "Distance Matrix API: ".$totalRowsDistanceMatrix." time(s) / $".$priceDistanceMatrix."<br />";
            echo "Geocode API: ".$totalRowsGeocode." time(s) / $".$priceGeocode."<br />";
            echo "Maps Javascript API: ".$totalRowsJavascript." time(s) / $".$priceJavascript."<br />";
            echo "<br />";
            echo "Total Bill: <strong>$".$totalBill."</strong>";
            echo "<br />";
            echo "<i>You have $".$creditLimit." credit limit</i>";


        }
    }
}

?>
