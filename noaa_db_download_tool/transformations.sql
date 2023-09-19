--set gridID
SET @grid := "01a";

--rename tables
ALTER TABLE images 
RENAME to tile;

ALTER TABLE map
RENAME to `location`;

-- rename columns to match
ALTER TABLE `location`
RENAME COLUMN "zoom_level" TO map_z;
ALTER TABLE `location`
RENAME COLUMN "tile_row" TO map_row;
ALTER TABLE `location`
RENAME COLUMN "tile_column" TO map_col;
ALTER TABLE `location`
RENAME COLUMN "grid_id" TO gridID;
ALTER TABLE `location`
RENAME COLUMN "tile_id" TO tileID;

ALTER TABLE tile
RENAME COLUMN "tile_data" TO `image`;
ALTER TABLE tile
RENAME COLUMN "tile_id" TO id;

-- add grid id column to tile table
ALTER TABLE tile
ADD COLUMN gridID VARCHAR(3) DEFAULT @grid;

-- populate gridID column in location table
UPDATE `location`
SET gridID=@grid;

