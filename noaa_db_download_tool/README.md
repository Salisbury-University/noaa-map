### Instructions of Using the Download Tool

There are 31 noaa provided mbtiles databases that we need to move into our databases each quarter. Each of these takes several minutes to download. This program uses Go's native goroutines which are a form of multithreading to speed up and automate the process. After installing Go (https://go.dev/doc/install), use the command `$ go run download_tool.go` to start the process. Note, this is pulling tiles from last quarter, and there are more now.
