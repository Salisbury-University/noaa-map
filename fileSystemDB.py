import os
import sqlite3

# Program that opens the database and 
# reads the number of rows the map table has
#conn = sqlite3.connect('./mbtiles/ncds_06.MBTILES')
#c = conn.cursor()
#c.execute('SELECT count(*) FROM map')
#rows = c.fetchall()
#print(rows)
#c.close()
#conn.close()


conn = sqlite3.connect('./mbtiles/noaaMapDB#2')
c = conn.cursor()


dir_path ='./mbtiles/ncds_06/'
dir1 = [i for i in os.listdir(dir_path)]
dir1.sort(key=int)
os.chdir(dir_path)
run = 0
for z in dir1:
    os.chdir(z)
    dir2 = [f for f in os.listdir(os.getcwd())]
    dir2.sort(key=int)
    for row in dir2:
        os.chdir(row)
        dir3 = [g for g in os.listdir(os.getcwd())]
        #dirs3.sort(key=lambda x: int(x.split('.')[0]))
        for col in dir3:
            print(col)
        os.chdir("..")
    os.chdir("..")
c.close()
conn.close()
