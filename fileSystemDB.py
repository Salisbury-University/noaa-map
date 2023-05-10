from PIL import Image
from io import BytesIO
import numpy as np
import os
import sqlite3
import re
import mysql.connector

mSQL = mysql.connector.connect(
    host = "bathmap-db-1.cneazldeoyra.us-east-1.rds.amazonaws.com",
    username = "admin",
    password = "towMater",
    database = "bathmap_mysql_1"
)




# Program that opens the database and 
# reads the number of rows the map table has
"""
conn = sqlite3.connect('./mbtiles/ncds_06.MBTILES')
conn2 = sqlite3.connect('./mbtiles/noaaMapDB#3.DB')
c = conn.cursor()
c2 = conn2.cursor()
"""
#c = conn.cursor()
#c.execute('SELECT count(*) FROM map')
#rows = c.fetchall()
#print(rows)
#c.close()
#conn.close()


#conn = sqlite3.connect('./mbtiles/noaaMapDB#3')

#dir_path ='./mbtiles/ncds_06/'
#dir1 = [i for i in os.listdir(dir_path)]
#dir1.sort(key=int)
#os.chdir(dir_path)
#for z in dir1:
#    os.chdir(z)
#    dir2 = [f for f in os.listdir(os.getcwd())]
#    dir2.sort(key=int)
#    for row in dir2:
#        os.chdir(row)
#        dir3 = [g for g in os.listdir(os.getcwd())]
        #dirs3.sort(key=lambda x: int(x.split('.')[0]))
#        for col in dir3:
#            print(col)
#        os.chdir("..")
#    os.chdir("..")
#c.close()
#conn.close()

#c.execute('select zoom_level,tile_column,tile_row,tile_data,map.tile_id from map,images where map.tile_id = images.tile_id')
#c.execute('select tile_data from map,images where map.tile_id = images.tile_id and zoom_level = 5 and tile_row = 0 and tile_column = 31')
#c.execute('select distinct tile_id, tile_data from images')
#rows = c.fetchall()

#os.chdir("./mbtiles")
"""
for e in rows:
    dirName = str(e[0])
    if os.path.exists(dirName):
        os.chdir(dirName)
    else:
        os.mkdir(dirName)
        os.chdir(dirName)
    dirName = str(e[1])
    if os.path.exists(dirName):
        os.chdir(dirName)
    else:
        os.mkdir(dirName)
        os.chdir(dirName)
    dirName = str(e[2])
    if not os.path.isfile(dirName):
        image = Image.open(BytesIO(e[3]))
        imageo = image
        gray_image = image.convert('L')
        mean_value = np.mean(np.array(gray_image))
        if mean_value < 10:
            newImg = Image.new('RGB', (256,256), color='black')
            title = str(e[2]) + '.PNG'
            newImg.save(title,'PNG')
        else:
            title = str(e[2]) + '.PNG'
            imageo.save(title, 'PNG')
    os.chdir("..")
    os.chdir("..")
"""

"""
NEEDED FROM ORIGINAL:
ADDITIONAL INFO:
INSERTION:
TABLES:
-images
-map
-metadata
"""

inp = input("Input which grid to translate: ")
n = 0
#conn3 = sqlite3.connect('./mbtiles/noaaMapDB#3.DB')
#c3 = conn3.cursor()
gridID = 0
flooms = './mbtiles/ncds_01a.MBTILES'
index = flooms.index("0")  # find the index of "o" in "hello"
dest = " "
match = re.search(r'\d+', inp)
if match:
    n = match.group(0)
n = int(n)
florms = " "
if n < 10:
    florms = "0" + inp
else:
    florms = inp
dest = flooms[:index] + florms + flooms[index+3:]
conn = sqlite3.connect(dest)
conn2 = sqlite3.connect(dest)
conn3 = sqlite3.connect(dest)
c = conn.cursor()
c2 = conn2.cursor()
c3 = conn3.cursor()
c.execute('select zoom_level,tile_column,tile_row,tile_data,map.tile_id from map,images where map.tile_id = images.tile_id')
c2.execute('select distinct tile_id, tile_data from images')
c3.execute('select value from metadata where name = "bounds" or name = "center"')
rows = c.fetchall()
rows2 = c2.fetchall()
rows3 = c3.fetchall()
SQLcursor = mSQL.cursor()
isblank = 0

"""
SQLcursor.execute('Delete from testLocation')
mSQL.commit()
SQLcursor.execute('Delete from testTile')
mSQL.commit()
SQLcursor.execute('Delete from testGrid')
mSQL.commit()
"""
"""
SQLcursor.execute("select gridID,count(*) from location group by gridID")
rows3 = SQLcursor.fetchall()
print(rows3)
"""
"""
SQLcursor.execute("delete from location where gridID = '09'")
mSQL.commit()
"""

conn4 = sqlite3.connect(dest)
c4 = conn4.cursor()
c4.execute("select count(*) from map")
rows6 = c4.fetchall()
count = rows6[0][0]
count2 = 0

data = (florms, rows3[0][0], rows3[1][0])
SQLcursor.execute('Insert into grid (gridID, gridBounds, gridCenter) values (%s,%s,%s)', data)
mSQL.commit()

print("grid finished")

for f in rows2:
    data = (florms,f[0],f[1])
    SQLcursor.execute('INSERT INTO tile(gridID,id,image) VALUES (%s,%s,%s)', data)
    mSQL.commit()

print("tile finished")

for e in rows:
    data = 0
    dirName = str(e[2])
    if not os.path.isfile(dirName):
        data = (e[0],e[2],e[1],florms,e[4])
        print("Remaining tiles: ",count-count2)
        count2 = count2+1
        SQLcursor.execute('INSERT INTO location (map_z,map_row,map_col,gridID,tileID) VALUES (%s, %s, %s, %s, %s)', data)
        mSQL.commit()

print("GRID 1A FINISHED")
