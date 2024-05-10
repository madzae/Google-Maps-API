//1

CREATE TABLE `googlemaps` (
  `id` int(11) NOT NULL,
  `apikey` text NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

//2

CREATE TABLE `googlemaps_usage` (
  `id` int(11) NOT NULL,
  `date_request` timestamp NOT NULL DEFAULT current_timestamp(),
  `platform` varchar(500) NOT NULL,
  `platform_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
