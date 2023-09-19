package main

import (
	"fmt"
	"io"
	"net/http"
	"os"
	"sync"
	"time"
)

type TileDatabase struct {
	downloadUrl string
	region      string
	gridID      string
}

func main() {
	start_time := time.Now()
	var noaaDbArray = []TileDatabase{
		{
			downloadUrl: "https://distribution.charts.noaa.gov/ncds/mbtiles/ncds_01a.mbtiles",
			region:      "Vermont",
			gridID:      "01a",
		},
		{
			downloadUrl: "https://distribution.charts.noaa.gov/ncds/mbtiles/ncds_01b.mbtiles",
			region:      "Maine",
			gridID:      "01b",
		},
		{
			downloadUrl: "https://distribution.charts.noaa.gov/ncds/mbtiles/ncds_02a.mbtiles",
			region:      "New York State",
			gridID:      "02a",
		},
		{
			downloadUrl: "https://distribution.charts.noaa.gov/ncds/mbtiles/ncds_02b.mbtiles",
			region:      "Boston",
			gridID:      "02b",
		},
		{
			downloadUrl: "https://distribution.charts.noaa.gov/ncds/mbtiles/ncds_03.mbtiles",
			region:      "New York City",
			gridID:      "03",
		},
		{
			downloadUrl: "https://distribution.charts.noaa.gov/ncds/mbtiles/ncds_04.mbtiles",
			region:      "Eastern Maryland",
			gridID:      "04",
		},
		{
			downloadUrl: "https://distribution.charts.noaa.gov/ncds/mbtiles/ncds_05.mbtiles",
			region:      "Virginia",
			gridID:      "05",
		},
		{
			downloadUrl: "https://distribution.charts.noaa.gov/ncds/mbtiles/ncds_06.mbtiles",
			region:      "Kitty Hawk",
			gridID:      "06",
		},
		{
			downloadUrl: "https://distribution.charts.noaa.gov/ncds/mbtiles/ncds_07.mbtiles",
			region:      "Charlotte",
			gridID:      "07",
		},
		{
			downloadUrl: "https://distribution.charts.noaa.gov/ncds/mbtiles/ncds_08.mbtiles",
			region:      "Myrtle Beach",
			gridID:      "08",
		},
		{
			downloadUrl: "https://distribution.charts.noaa.gov/ncds/mbtiles/ncds_09.mbtiles",
			region:      "Jacksonville",
			gridID:      "09",
		},
		{
			downloadUrl: "https://distribution.charts.noaa.gov/ncds/mbtiles/ncds_10.mbtiles",
			region:      "Bahamas",
			gridID:      "10",
		},
		{
			downloadUrl: "https://distribution.charts.noaa.gov/ncds/mbtiles/ncds_11.mbtiles",
			region:      "Dominican Republic",
			gridID:      "11",
		},
		{
			downloadUrl: "https://distribution.charts.noaa.gov/ncds/mbtiles/ncds_12.mbtiles",
			region:      "Cancun",
			gridID:      "12",
		},
		{
			downloadUrl: "https://distribution.charts.noaa.gov/ncds/mbtiles/ncds_13.mbtiles",
			region:      "West Florida",
			gridID:      "13",
		},
		{
			downloadUrl: "https://distribution.charts.noaa.gov/ncds/mbtiles/ncds_14.mbtiles",
			region:      "New Orleans",
			gridID:      "14",
		},
		{
			downloadUrl: "https://distribution.charts.noaa.gov/ncds/mbtiles/ncds_15.mbtiles",
			region:      "Gulf of Mexico",
			gridID:      "15",
		},
		{
			downloadUrl: "https://distribution.charts.noaa.gov/ncds/mbtiles/ncds_16.mbtiles",
			region:      "Lake Erie",
			gridID:      "16",
		},
		{
			downloadUrl: "https://distribution.charts.noaa.gov/ncds/mbtiles/ncds_17.mbtiles",
			region:      "Lake Michigan",
			gridID:      "17",
		},
		{
			downloadUrl: "https://distribution.charts.noaa.gov/ncds/mbtiles/ncds_18.mbtiles",
			region:      "Lake Superior",
			gridID:      "18",
		},
		{
			downloadUrl: "https://distribution.charts.noaa.gov/ncds/mbtiles/ncds_19.mbtiles",
			region:      "Lake Huron",
			gridID:      "19",
		},
		{
			downloadUrl: "https://distribution.charts.noaa.gov/ncds/mbtiles/ncds_20.mbtiles",
			region:      "California",
			gridID:      "20",
		},
		{
			downloadUrl: "https://distribution.charts.noaa.gov/ncds/mbtiles/ncds_21.mbtiles",
			region:      "Washington State",
			gridID:      "21",
		},
		{
			downloadUrl: "https://distribution.charts.noaa.gov/ncds/mbtiles/ncds_22.mbtiles",
			region:      "Western Canada",
			gridID:      "22",
		},
		{
			downloadUrl: "https://distribution.charts.noaa.gov/ncds/mbtiles/ncds_23.mbtiles",
			region:      "Gulf of Alaska",
			gridID:      "23",
		},
		{
			downloadUrl: "https://distribution.charts.noaa.gov/ncds/mbtiles/ncds_24.mbtiles",
			region:      "Beaufort Sea",
			gridID:      "24",
		},
		{
			downloadUrl: "https://distribution.charts.noaa.gov/ncds/mbtiles/ncds_25.mbtiles",
			region:      "Bering Sea",
			gridID:      "25",
		},
		{
			downloadUrl: "https://distribution.charts.noaa.gov/ncds/mbtiles/ncds_26.mbtiles",
			region:      "North Pacific Ocean",
			gridID:      "26",
		},
		{
			downloadUrl: "https://distribution.charts.noaa.gov/ncds/mbtiles/ncds_27.mbtiles",
			region:      "Anchorage",
			gridID:      "27",
		},
		{
			downloadUrl: "https://distribution.charts.noaa.gov/ncds/mbtiles/ncds_28.mbtiles",
			region:      "Hawaii",
			gridID:      "28",
		}, {
			downloadUrl: "https://distribution.charts.noaa.gov/ncds/mbtiles/ncds_29.mbtiles",
			region:      "East China Sea",
			gridID:      "29",
		},
	}

	//lets use concurrency here to speed up the process
	var wg sync.WaitGroup

	for _, Tile := range noaaDbArray {
		wg.Add(1) // Increment the WaitGroup counter for each goroutine
		go func(Tile TileDatabase) {
			defer wg.Done() // Decrement the WaitGroup counter when done
			downloadTile(Tile)
		}(Tile)

	}
	wg.Wait()

	end_time := time.Now()
	run_time := end_time.Sub(start_time)
	fmt.Println("run time of ", run_time)
}

func downloadTile(Tile TileDatabase) {
	fmt.Println(Tile.region)
	response, err := http.Get(Tile.downloadUrl)
	defer response.Body.Close()
	if err != nil {
		panic(err)
	}
	filepath := Tile.gridID + ".mbtiles"
	out, err := os.Create(filepath)
	if err != nil {
		panic(err)
	}
	defer out.Close()

	_, err = io.Copy(out, response.Body)
	if err != nil {
		panic(err)
	}
	fmt.Println(Tile.region + " completed!")

	return
}
