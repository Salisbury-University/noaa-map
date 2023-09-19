### Instructions of Using the Download Tool

There are 31 noaa provided mbtiles databases that we need to move into our databases each quarter. Each of these takes several minutes to download. This program uses Go's native goroutines which are a form of multithreading to speed up and automate the process. After installing Go (https://go.dev/doc/install), use the command `$ go run download_tool.go` to start the process.

### Instructions for Converting from SQLite to MySQL
- Use db browser to manipulate and rename table to match what we need for mysql
- This will involve renaming the table, and adding the proper GridID columns and values (transformations.sql)
- install sqlite on your command line
- `$ sqlite3`
- `$ open 01a.mbtiles`
- this part will need to be done twice - once for tile table and once for the location table
- `$ .output export_01a.sql`
- `$ .dump tableName`
- `$ .quit`
- `$ ./transform.sh export_01a.sql > import_01a.sql`
- remove create table lines from sql script
- back up production datbase
- make sure columns in mysql are in the same order as the sqlite tables
- use data import and select self contained file in mysql worbench to run our import
- look at metadata to get latt and long and insert into the grid table